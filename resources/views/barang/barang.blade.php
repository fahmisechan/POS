@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-5">
<div class="card shadow mb-5">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Foto Barang</h6>
    </div>
    <div class="card-body">
      <div class="text-center">
      <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="{{asset('image/barang/'.$barang->foto)}}" alt="">
      </div>
      
    </div>
  </div>
</div>
<div class="col-md-7">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Info Barang</h6>
    </div>
    <div class="card-body">
    <p><strong>Nama :</strong> {{$barang->nama}}</p>
    <p><strong>Harga :</strong> {{$barang->harga}}</p>
    <p><strong>Jumlah :</strong> {{$barang->jumlah}}</p>
    <p><strong>Supplier :</strong> {{$barang->supplier}}</p>
    </div>
  </div>
</div>
</div>
@endsection