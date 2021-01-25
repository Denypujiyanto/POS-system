@extends('layouts.app', [
'elementActive' => $type
])


@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Penjualan</h3>
                        </div>
                        <div class="col-4 text-right">
                            @if($type == 'penjualan')
                            <a href="{{ route('penjualan.create') }}" class="btn btn-sm btn-primary">Add penjualan</a>
                            @endif
                            @if($type == 'laporanpenjualan')
                            <a href="{{ url('laporan/penjualan/cetak') }}" class="btn btn-sm btn-primary">Cetak
                                Laporan</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-12">
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Nomor Faktur</th>
                                <th scope="col">Nama Customer</th>
                                <th scope="col">Nomor Telpon</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $penjualan)

                            <tr>
                                <td>{{ $penjualan->no_faktur }}</td>
                                <td>{{ $penjualan->customer->nama }}</td>
                                <td>{{ $penjualan->customer->telp }}</td>
                                <td>
                                    <button type="submit" class="btn" style="padding: 5px 6px;font-size:1rem"
                                        title="Details" onclick="handleDetail({{$penjualan}})">
                                        <!-- <i class="nc-icon nc-bullet-list-67 text-warning"></i> -->
                                        Detail
                                    </button>
                                    @if($type == 'penjualan')
                                    <button type="submit" class="btn" style="padding: 5px 6px;font-size:1rem"
                                        onclick="handleRetur({{$penjualan}})">
                                        <!-- <i class="nc-icon nc-box-2 text-danger"></i> -->
                                        Retur
                                    </button>
                                    @endif
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

<!-- Modal Detail -->
<div class="modal fade" id="modalDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Nomor Faktur</td>
                            <td id="no_faktur"></td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td id="created_at"></td>
                        </tr>
                        <tr>
                            <td>Nama Customer</td>
                            <td id="nama_customer"></td>
                        </tr>
                        <tr>
                            <td>Nomor Telpon</td>
                            <td id="telp"></td>
                        </tr>
                        <tr>
                            <td>Total Pembelian</td>
                            <td id="total"></td>
                        </tr>
                    </thead>
                </table>

                <table class="table">
                    <thead>
                        <tr>
                            <td>Nama Sukucadang</td>
                            <td>Harga</td>
                            <td>Jumlah</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <tbody id="tbody">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Retur -->
<div class="modal fade" id="modalRetur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Retur Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('returpenjualan.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <td width="170px">Nama Sukucadang</td>
                                <td width="100px">Harga Beli</td>
                                <td width="120px">Jumlah</td>
                                <td>Alasan Retur</td>
                            </tr>
                        </thead>
                        <tbody id="tbodyRetur">

                        </tbody>
                    </table>
                    <label style="font-size: 12px">Silakan isi jumlah retur. (Biarkan kosong jika tidak retur)</label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const handleDetail = (data) => {
        console.log(data)
        $('#no_faktur').html(data.no_faktur)
        $('#created_at').html(data.created_at)
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
            <td><input type="number" name="total[]" class="form-control" value="${data.total}" readonly></td>
            <td><input type="number" name="jumlah[]" class="form-control" placeholder="max ${item.jumlah - jumlah}" min="1" max="${item.jumlah - jumlah}"></td>
            <td><input type="text" name="keterangan[]" class="form-control"></td>
        </tr>`)
        })
        $('#modalRetur').modal('show')
    }
</script>
@endpush