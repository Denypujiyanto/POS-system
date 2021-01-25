@extends('layouts.app', [
'elementActive' => 'customer'
])


@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ isset($data->id) ? 'Edit' : 'Tambah'}} Customer</h3>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <?php
                    $url = isset($data->id) ? route('customer.update', $data->id) : route('customer.store');
                    ?>
                    <form method="POST" action="{{ $url }}">
                        @csrf
                        @if(isset($data->id))
                        @method('patch')
                        @endif
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama"
                                value="{{ $data->nama }}">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat"
                                value="{{ $data->alamat }}">
                        </div>
                        <div class="form-group">
                            <label>Nomor Telpon</label>
                            <input type="number" name="telp" class="form-control" placeholder="Masukan Nomor Telpon"
                                value="{{ $data->telp }}">
                        </div>
                        <div class="form-group">
                            <label>Nomor Polisi</label>
                            <input type="text" name="nopol" class="form-control" placeholder="Masukan Nomor Polisi"
                                value="{{ $data->nopol }}">
                        </div>
                        <div class="form-group">
                            <label>Nomor Rangka</label>
                            <input type="text" name="norangka" class="form-control" placeholder="Masukan Nomor Rangka"
                                value="{{ $data->norangka }}">
                        </div>
                        <div class="form-group">
                            <label>Nomor Mesin</label>
                            <input type="text" name="nomesin" class="form-control" placeholder="Masukan Nomor Mesin"
                                value="{{ $data->nomesin }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
