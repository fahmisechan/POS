<?php

namespace App\Http\Controllers;

use App\Barang_transaksi;
use App\Transaksi;
use Illuminate\Http\Request;
use DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class LaporanController extends Controller
{
    public function table()
    {
        $transaksi = Transaksi::latest()->paginate(10);
        return view('laporan.table',compact(['transaksi']));
    }
    public function cetak($id)
    {
        $cetak = Transaksi::with('barang_transaksi')->find($id);
        return view('laporan.cetak',compact('cetak'));
    }
    public function chart()
    {
        $chart_options = [
            'chart_title' => 'Pemasukan Perbulan',
            'report_type' => 'group_by_date',
            'model' => 'App\Transaksi',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'total',
            
        ];
        $jumlah = new LaravelChart($chart_options);
        $chart_options = [
            'chart_title' => 'Total Transaksi',
            'report_type' => 'group_by_date',
            'model' => 'App\Transaksi',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $total = new LaravelChart($chart_options);
        return view('laporan.chart',compact('jumlah','total'));
    }
    public function getTahun()
    {
        // $tahun = request()->tahun();
        // $chart = Transaksi::with('barang_transaksi')->whereYear('created_at', '=', $tahun);
        // if($chart){
        //     return true;
        // }else{
        //     return 'error';
        // }
    }
}
