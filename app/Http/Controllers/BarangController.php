<?php

namespace App\Http\Controllers;

use App\User;
use App\Barang;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::all();
        $supplier = Supplier::all();
        return view('barang.index',compact(['barang','supplier']));
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
        $barang = Barang::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('image/barang/',$request->file('foto')->getClientOriginalName());
            $barang->foto = $request->file('foto')->getClientOriginalName();
            $barang->save();
        }
        return redirect('/barang')->withToastSuccess('Data Terinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $barang->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('image/barang/',$request->file('foto')->getClientOriginalName());
            $barang->foto = $request->file('foto')->getClientOriginalName();
            $barang->save();
        }
        return redirect()->route('barang.index')->withToastSuccess('Data Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->withToastSuccess('Data Terhapus');
    }
    public function profile($id)
    {
        $barang = Barang::find($id);
        return view('barang.barang',compact('barang'));
    }
}
