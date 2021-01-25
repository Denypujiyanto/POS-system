<?php

namespace App\Http\Controllers;

use App\ReturPenjualan;
use App\Sukucadang;
use Illuminate\Http\Request;

class ReturPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = [];
        for ($i = 0; $i < count($request->sukucadang_id); $i++) {
            array_push($data, [
                "sukucadang_id" => $request->sukucadang_id[$i], 
                "harga_jual" => $request->harga_jual[$i],
                "total" => $request->total[$i], 
                "jumlah" => $request->jumlah[$i], 
                "keterangan" => $request->keterangan[$i], 
                "penjualan_detail_id" => $request->penjualan_detail_id[$i]]);
        }

        foreach ($data as $item) {
            if($item['jumlah'] != null && $item['jumlah'] > 0){
                $retur = new ReturPenjualan();
                $retur->sukucadang_id = $item['sukucadang_id'];
                $retur->jumlah = $item['jumlah'];
                $retur->harga_jual = $item['harga_jual'];
                $retur->total = $item['jumlah'] * $item['harga_jual'];
                $retur->keterangan = $item['keterangan'];
                $retur->penjualan_detail_id = $item['penjualan_detail_id'];
                $retur->user_id = auth()->user()->id;

                $sukucadang = Sukucadang::find($item['sukucadang_id']);
                $sukucadang->stock = $sukucadang->stock + $item['jumlah'];
                $sukucadang->save();
    
                $retur->save();
            }
            return redirect()->back()->withMessage('Retur penjualan sukses!');
        }

        return redirect()->back()->withMessage('Retur pembelian gagal, harap cek form input kembali!')->withType('danger');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReturPenjualan  $returPenjualan
     * @return \Illuminate\Http\Response
     */
    public function show(ReturPenjualan $returPenjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReturPenjualan  $returPenjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturPenjualan $returPenjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReturPenjualan  $returPenjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturPenjualan $returPenjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReturPenjualan  $returPenjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturPenjualan $returPenjualan)
    {
        //
    }
}
