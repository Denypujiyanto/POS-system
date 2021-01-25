@extends('layouts.app', [
'class' => '',
'elementActive' => 'dashboard'
])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <x-card header="Pendapatan" :body="$pendapatan" />
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <x-card header="Pengeluaran" :body="$pengeluaran" />
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <x-card header="Keuntungan" :body="$keuntungan" />
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <x-card header="Jumlah Barang" :body="$jumlahBarang" icon='<i class="nc-icon nc-vector text-danger"></i>'
                footer=" Total Keseluruhan" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                    <h5 class="card-title">POS-System</h5>
                    <p class="card-category">AHASS 10053</p>
                </div>
                <div class="card-body ">
                    <p>
                        Selamat datang di POS System Honda. <br>
                        Kode Toko : AHASS 10053 <br>
                        Nama PT : PT. Bareno Tiga Bersaudara <br>
                        Alamat : Jl. RC Veteran No. 555 Ruko B - C Bintaro Pesanggrahan, Jakarta Selatan <br>
                        Telp : (021) 7375343
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection