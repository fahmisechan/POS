@extends('layouts.kasir')
@section('content')
<div id="content">
   <div class="container-fluid">
    <div class="card">
        <div class="card-header">
          Welcome
        </div>
        <div class="card-body">
        <h5 class="card-title">Selamat Datang {{Auth::user()->name}}</h5>
          <p class="card-text">Semoga Harimu Menyenangkan</p>
        </div>
      </div>
   </div>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
@section('footer')
<script src="{{asset('template/js/Chart.min.js')}}"></script>
<script src="{{asset('template/js/chart-area-demo.js')}}"></script>
@endsection
