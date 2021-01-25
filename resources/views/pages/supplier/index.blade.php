@extends('layouts.app', [
'elementActive' => 'supplier'
])


@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Supplier</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('supplier.create') }}" class="btn btn-sm btn-primary">Add supplier</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nomor Telpon</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $supplier)
                            <tr>
                                <td>{{ $supplier->nama }}</td>
                                <td>{{ $supplier->alamat }}</td>
                                <td>{{ $supplier->telp }}</td>
                                <td>
                                    <a href="{{ route('supplier.edit', $supplier->id) }}">
                                        <button type="submit" class="btn" style="padding: 5px 6px;font-size:1rem">
                                            <!-- <i class="nc-icon nc-settings text-warning"></i> -->
                                            Edit
                                        </button>
                                    </a>
                                    <button type="submit" class="btn" style="padding: 5px 6px;font-size:1rem" onclick="del(`{{ url('supplier') }}`, {{$supplier->id}} )">
                                        <!-- <i class="nc-icon nc-simple-remove text-danger"></i> -->
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection