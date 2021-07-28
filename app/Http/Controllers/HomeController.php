<?php

namespace App\Http\Controllers;

use App\Barang_transaksi;
use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total = \App\Transaksi::select(\DB::raw('sum(total) as totals'))->first();
        $transaksi = \App\Transaksi::select('code')->count();
        $barang = \App\Barang::select('id')->count();
        $data_terbanyak = \DB::table('barang')
            ->leftJoin('barang_transaksi','barang.id','=','barang_transaksi.barang_id')
            ->selectRaw('barang.*, COALESCE(sum(barang_transaksi.jumlah),0) total')
            ->groupBy('barang.id')
            ->orderBy('total','DESC')
            ->take(1)
            ->get();
        return view('dashboard',compact('total','transaksi','barang','data_terbanyak'));
    }
    public function home()
    {
        return view('/home');
    }
}
