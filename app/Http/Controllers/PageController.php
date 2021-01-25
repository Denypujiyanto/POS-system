<?php

namespace App\Http\Controllers;

use App\Pembelian;
use App\Penjualan;
use App\Sukucadang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        if (view()->exists("pages.{$page}")) {
            if ($page == 'dashboard') {

                $pendapatan = Penjualan::whereDate(
                    'created_at',
                    '=',
                    Carbon::today()
                )->get()->sum('total');
                $pengeluaran = Pembelian::whereDate(
                    'created_at',
                    '=',
                    Carbon::today()
                )->get()->sum('total');
                $keuntungan = $pendapatan - $pengeluaran;

                $barangs = Sukucadang::all();
                $isPopUp = false;
                
                foreach ($barangs as $val) {
                    if ($val->stock < 10) {
                        $isPopUp = true;
                        $barang = $val;
                        break;
                    }
                }
                
            

                $jumlahBarang = $barangs->sum('stock');
                if(isset($barang)) {
                    Session::flash('message',"Stock ". $barang->nama . ' Akan Habis');
                    Session::flash('type',"danger");
                }

                return view('pages.dashboard')
                    ->withPendapatan("Rp. " . $pendapatan)
                    ->withPengeluaran("Rp. " . $pengeluaran)
                    ->withKeuntungan("Rp. " . $keuntungan)
                    ->withJumlahBarang($jumlahBarang);
                    // ->withMessage('asdasdas')->withType('danger');
            }

            return view("pages.{$page}");
        }

        return abort(404);
    }
}
