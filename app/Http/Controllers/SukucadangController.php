<?php

namespace App\Http\Controllers;

use App\Sukucadang;
use Illuminate\Http\Request;

class SukucadangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sukucadang::all();

        return view('pages.sukucadang.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = new Sukucadang;

        return view('pages.sukucadang.form')->withData($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Sukucadang::create($request->except('_token')))
            return redirect()->route('sukucadang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sukucadang  $sukucadang
     * @return \Illuminate\Http\Response
     */
    public function show(Sukucadang $sukucadang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sukucadang  $sukucadang
     * @return \Illuminate\Http\Response
     */
    public function edit(Sukucadang $sukucadang)
    {
        return view('pages.sukucadang.form')->withData($sukucadang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sukucadang  $sukucadang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sukucadang $sukucadang)
    {
        $sukucadang->nama = $request->nama;
        $sukucadang->jumlah = $request->jumlah;
        $sukucadang->harga_jual = $request->harga_jual;
        $sukucadang->satuan = $request->satuan;
        $sukucadang->save();

        return redirect()->route('sukucadang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sukucadang  $sukucadang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sukucadang $sukucadang)
    {
        if ($sukucadang->delete()) {
            return 1;
        }

        return 0;
    }
}
