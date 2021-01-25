<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan {{ $type }}</title>

<body>
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
            border-color: #ccc;
            width: 100%;
        }

        .tg td {
            font-family: Arial;
            font-size: 12px;
            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: #ccc;
            color: #333;
            background-color: #fff;
        }

        .tg th {
            font-family: Arial;
            font-size: 14px;
            font-weight: normal;
            padding: 10px 5px;
            border-style: solid;
            border-width: 1px;
            overflow: hidden;
            word-break: normal;
            border-color: #ccc;
            color: #333;
            background-color: #f0f0f0;
        }

        .tg .tg-3wr7 {
            font-weight: bold;
            font-size: 12px;
            font-family: "Arial", Helvetica, sans-serif !important;
            ;
            text-align: center
        }

        .tg .tg-ti5e {
            font-size: 10px;
            font-family: "Arial", Helvetica, sans-serif !important;
            ;
            text-align: center
        }

        .tg .tg-rv4w {
            font-size: 10px;
            font-family: "Arial", Helvetica, sans-serif !important;
        }

        .page-break {
            page-break-after: always;
        }
    </style>

    <table style="width: 100%">
        <tr>
            <td style="width: 20%"><img src="{{ public_path('logo-honda.png') }}" style="height:100px;" alt=""
                    srcset=""></td>
            <td style="text-align: center">
                AHASS 10053 - PT. BARENO TIGA BERSAUDARA <br>
                Jl. RC Veteran No. 555 Ruko B - C Bintaro <br>
                Pesanggrahan, Jakarta Selatan Telp. (021) 7375343
            </td>
        </tr>
    </table>
    <br>
    <br>
    @if ($type == 'Penjualan')

    <table style="margin-bottom:20px">
    <thead>
    <tr>
    <td>
    No Faktur 
    </td>
    <td>
    :
    </td>
    <td style="text">
    {{$penjualan->no_faktur}}
    </td>
    </tr>
    <tr>
    <td>
    Nama 
    </td>
    <td>
    :
    </td>
    <td style="text-transform:capitalize">
    {{$penjualan->customer->nama}}
    </td>
    </tr>
    <tr>
    <td>
    Alamat
    </td>
    <td>:</td>
    <td>
    {{$penjualan->customer->alamat}}
    </td>
    </tr>

    <tr>
    <td>
    No Polisi
    </td>
    <td>:</td>
    <td>
    {{$penjualan->customer->nopol}}
    </td>
    </tr>
    
    </thead>
    </table>
    <table class="tg">
        <thead>
            <tr>
                <th class="tg-3wr7">Nama Petugas</th>
                <th class="tg-3wr7">No. Faktur</th>
                <th class="tg-3wr7">Tanggal</th>
                <th class="tg-3wr7">Metode Bayar</th>
                <th class="tg-3wr7">Detail Barang</th>
                <th class="tg-3wr7">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$penjualan->user->name}}</td>
                <td>{{$penjualan->no_faktur}}</td>
                <td>{{$penjualan->created_at}}</td>
                <td>{{$penjualan->metode_bayar}}</td>
                <td>
                    @foreach ($penjualan->details as $detail)
                    {{ $detail->sukucadang->nama . ": ". $detail->jumlah }}
                    @endforeach
                </td>
                <td>{{$penjualan->total}}</td>
            </tr>
        </tbody>
    </table>
    @else
    <table class="tg">
        <thead>
            <tr>
                <th class="tg-3wr7">Supplier Name</th>
                <th class="tg-3wr7">Tanggal</th>
                <th class="tg-3wr7">Nama Petugas</th>
                <th class="tg-3wr7">No. Faktur</th>
                <th class="tg-3wr7">Metode Bayar</th>
                <th class="tg-3wr7">Detail Barang</th>
                <th class="tg-3wr7">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $pembelian)
            <tr>
                <td>{{$pembelian->supplier->nama}}</td>
                <td>{{$pembelian->created_at}}</td>
                <td>{{$pembelian->user->name}}</td>
                <td>{{$pembelian->no_faktur}}</td>
                <td>{{$pembelian->metode_bayar}}</td>
                <td>
                    @foreach ($pembelian->details as $detail)
                    {{ $detail->sukucadang->nama . ": ". $detail->jumlah }}
                    @endforeach
                </td>
                <td>{{$pembelian->total}}</td>
            </tr>

            @endforeach
            <tr>
                <td colspan="6" style="text-align:center;font-weight:bold">
                    TOTAL
                </td>
                <td>
                {{$total}}
                </td>
            </tr>
        </tbody>
    </table>
    @endif
   
</body>
</head>

</html>