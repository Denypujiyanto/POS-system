@extends('layouts.app', [
'elementActive' => 'sukucadang'
])


@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Suku Cadang</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('sukucadang.create') }}" class="btn btn-sm btn-primary">Add Suku
                                Cadang</a>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No. Parts</th>
                                <th scope="col">Jenis Suku Cadang</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $sukucadang)
                            <tr>
                                <td>{{ $sukucadang->nama }}</td>
                                <td>{{ $sukucadang->jenis }}</td>
                                <td>{{ $sukucadang->stock }}</td>
                                <td>{{ $sukucadang->satuan }}</td>
                                <td>Rp. {{ $sukucadang->harga_jual }}</td>
                                <td>
                                    <a href="{{ route('sukucadang.edit', $sukucadang->id) }}">
                                        <button type="submit" class="btn" style="padding: 5px 6px;font-size:1rem">
                                            <!-- <i class="nc-icon nc-settings text-warning"></i> -->
                                            Edit
                                        </button>
                                    </a>
                                    <button type="submit" class="btn" style="padding: 5px 6px;font-size:1rem"
                                        onclick="del(`{{ url('sukucadang') }}`, {{$sukucadang->id}} )">
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