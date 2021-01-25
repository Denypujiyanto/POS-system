@extends('layouts.app', [
'elementActive' => 'penjualan'
])


@section('content')

<div class="content">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Users</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{route('user.create') }}" class="btn btn-sm btn-primary">Add user</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Creation Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>{{$user->level}}</td>
                                    <td>{{ $user->created_at}}</td>

                                    <td>
                                        <a href="{{ route('user.edit', $user->id) }}">
                                            <button type="submit" class="btn" style="padding: 5px 6px;font-size:1rem">
                                                <!-- <i class="nc-icon nc-settings text-warning"></i> -->
                                                Edit
                                            </button>
                                        </a>
                                        <button type="submit" class="btn" style="padding: 5px 6px;font-size:1rem" onclick="del(`{{ url('user') }}`, {{$user->id}} )">
                                            <!-- <i class="nc-icon nc-simple-remove text-danger"></i> -->
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{$users->links()}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const handleDetail = (data) => {
        console.log(data)
        $('#no_faktur').html(data.no_faktur)
        $('#nama_customer').html(data.customer.nama)
        $('#telp').html(data.customer.telp)
        $('#total').html(data.total)
        $('#tbody').empty()
        data.details.map((item) => {
            $('#tbody').append(`<tr>
            <td>${item.sukucadang.nama}</td>
            <td>${item.harga_jual}</td>
            <td>${item.jumlah}</td>
            <td>${item.total}</td>
        </tr>`)
        })

        $('#modalDetails').modal('show')
    }

    const handleRetur = (data) => {
        console.log(data)
        $('#tbodyRetur').empty()
        $('#pembelian_detail_id').empty()
        data.details.map((item) => {
            let jumlah = 0
            for (let i = 0; i < item.returpenjualan.length; i++) {
                jumlah = jumlah + item.returpenjualan[i].jumlah;
            }
            $('#tbodyRetur').append(`<tr>
            <td><input type="text" name="sukucadang_id[]" value="${item.sukucadang_id}" style="display:none">
            <input type="text" class="form-control" value="${item.sukucadang.nama}" readonly>
            <input type="hidden" name="penjualan_detail_id[]" value="${item.id}" id="penjualan_detail_id">
            </td>
            <td><input type="number" name="harga_jual[]" class="form-control" value="${item.harga_jual}" readonly></td>
            <td><input type="number" name="jumlah[]" class="form-control" placeholder="max ${item.jumlah - jumlah}" min="1" max="${item.jumlah - jumlah}"></td>
            <td><input type="text" name="keterangan[]" class="form-control"></td>
        </tr>`)
        })
        $('#modalRetur').modal('show')
    }
</script>
@endpush