<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Laporan Penjualan</title>

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
    <table class="tg">
        <thead>
            <tr>
                <th class="tg-3wr7">Customer Name</th>
                <th class="tg-3wr7">Nama Petugas</th>
                <th class="tg-3wr7">No. Faktur</th>
                <th class="tg-3wr7">Tanggal</th>
                <th class="tg-3wr7">Detail Barang</th>
                <th class="tg-3wr7">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $pembelian)
            <tr>
                <td>{{$pembelian->customer->nama}}</td>
                <td>{{$pembelian->user->name}}</td>
                <td>{{$pembelian->no_faktur}}</td>
                <td>{{$pembelian->created_at}}</td>
                <td>
                    @foreach ($pembelian->details as $detail)
                    {{ $detail->sukucadang->nama . ": ". $detail->jumlah }} <br>
                    @endforeach
                </td>
                <td>{{$pembelian->total}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="5" style="text-align:center;font-weight:bold">
                    TOTAL
                </td>
                <td>
                {{$total}}
                </td>
            </tr>
        </tbody>
    </table>
</body>
</head>

</html>