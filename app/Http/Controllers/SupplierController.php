<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.index',compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = Supplier::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('image/supplier/',$request->file('foto')->getClientOriginalName());
            $supplier->foto = $request->file('foto')->getClientOriginalName();
            $supplier->save();
        }
         return redirect('/supplier')->withToastSuccess('Data Terinput');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('supplier.edit',compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('image/supplier/',$request->file('foto')->getClientOriginalName());
            $supplier->foto = $request->file('foto')->getClientOriginalName();
            $supplier->save();
        }
         return redirect('/supplier')->withToastSuccess('Data Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect('/supplier')->withToastSuccess('Data Terhapus');
    }
    public function profile($id)
    {
        $supplier = Supplier::find($id);
        return view('supplier.profile',compact('supplier'));
    }
}
