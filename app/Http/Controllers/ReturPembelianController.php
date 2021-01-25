<?php

namespace App\Http\Controllers;

use App\ReturPembelian;
use App\Sukucadang;
use Illuminate\Http\Request;

class ReturPembelianController extends Controller
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

        $data = [];
    
        for ($i = 0; $i < count($request->sukucadang_id); $i++) {
            array_push($data, ["sukucadang_id" => $request->sukucadang_id[$i], "harga_beli" => $request->harga_beli[$i], "harga_beli" => $request->harga_beli[$i],
            "total" => $request->total[$i], 
            "jumlah" => $request->jumlah[$i], 
            "keterangan" => $request->keterangan[$i], 
            "pembelian_detail_id" => $request->pembelian_detail_id[$i]]);
        }

        foreach ($data as $item) {
            if($item['jumlah'] != null && $item['jumlah'] > 0){
                $retur = new ReturPembelian();
                $retur->sukucadang_id = $item['sukucadang_id'];
                $retur->jumlah = $item['jumlah'];
                $retur->harga_beli = $item['harga_beli'];
                $retur->total = $item['jumlah'] * $item['harga_beli'];
                $retur->keterangan = $item['keterangan'];
                $retur->pembelian_detail_id = $item['pembelian_detail_id'];
                $retur->user_id = auth()->user()->id;

                $sukucadang = Sukucadang::find($item['sukucadang_id']);
                $sukucadang->stock = $sukucadang->stock - $item['jumlah'];
                $sukucadang->save();
    
                $retur->save();
            }
            return redirect()->back()->withMessage('Retur pembelian sukses!');
        }

        return redirect()->back()->withMessage('Retur pembelian gagal, harap cek form input kembali!')->withType('danger');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReturPembelian  $returPembelian
     * @return \Illuminate\Http\Response
     */
    public function show(ReturPembelian $returPembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReturPembelian  $returPembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturPembelian $returPembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReturPembelian  $returPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturPembelian $returPembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReturPembelian  $returPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturPembelian $returPembelian)
    {
        //
    }
}
