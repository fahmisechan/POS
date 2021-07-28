<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Barang_transaksi;
use Illuminate\Http\Request;
use Darryldecode\Cart\CartCondition;
use App\Transaksi;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class TransaksiController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $Barang_transaksi = Barang_transaksi::all();
        // $total = Barang_transaksi::select(\DB::raw('sum(sub_total) as total'))->first();
        $cart = \Cart::getContent();
        $total = \Cart::getTotal();
        $sub_total = \Cart::getSubTotal();
        $data_total = [
            'total' => $total,
            'sub_total' => $sub_total
        ];
        return view('transaksi.index',compact(['barang','Barang_transaksi','cart','data_total']));
    }
    public function store(Barang $barang,Request $request)
    {   
            $this->validate($request,[
                'barang_id' => 'required',
                'nama_barang' => 'required',
                'harga_barang' => 'required',
                'jumlah' => 'required|numeric|min:1',
            ]);
            $data =  \Cart::add([
                'id' => $request->barang_id,
                'name' =>$request->nama_barang,
                'price' => $request->harga_barang,
                'quantity' => $request->jumlah
            ]);
        return redirect('/transaksi')->withToastSuccess('berhasil');
    }
    public function autofill($id = 0)
    {
        $p = Barang::where('id',$id)->first();
        return response()->json($p);
    }
    public function destroy($id)
    {
        $delete = \Cart::remove($id);
        return redirect('/transaksi')->withToastSuccess('berhasil di hapus');
    }
    public function bayar(Request $request)
    {
        $bayar = $request->pembayaran;
        $cart_total = \Cart::getTotal();
        $kembalian = $bayar - $cart_total;

        $all_cart = \Cart::getContent();
        $id = IdGenerator::generate(['table' => 'transaksi', 'length' => 10, 'prefix' =>'INV-', 'field' => 'code']);
        Transaksi::create([
            'code' => $id,
            'konsumen' => $request->konsumen,
            'pembayaran' => $request->pembayaran,
            'kembalian' => $kembalian,
            'total' => $cart_total
        ]);
        foreach($all_cart as $all){
            Barang_transaksi::create([
                'barang_id' => $all['id'],
                'code' => $id,
                'jumlah' =>$all['quantity']
            ]);
        }
        \Cart::clear();       
        return redirect('/transaksi')->withToastSuccess('Transaksi Berhasil');
    }
    public function barangkasir()
    {
        $barang = \App\Barang::all();
        return view('barangkasir',compact('barang'));
    }
}