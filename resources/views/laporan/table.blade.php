@extends('layouts.master')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800"><i class="fas fa-fw fa-box"></i> | Laporan</h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Laporan Table</h6>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Konsumen</th>
                                        <th scope="col">Bayar</th>
                                        <th scope="col">Kembali</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Tanggal</th>
                                        <th>Cetak</th>
                                    </tr>
                                </thead>
                                @foreach ($transaksi as $item)
                                <tbody>
                                    <tr>
                                        <td>{{$item->code}}</td>
                                        <td>{{$item->konsumen}}</td>
                                        <td>{{$item->pembayaran}}</td>
                                        <td>{{$item->kembalian}}</td>
                                        <td>{{$item->total}}</td>
                                        <td>{{$item->created_at->format('d, M Y')}}</td>
                                        <td align="center">
                                        <a href="{{url('/laporan/cetak',$item->code)}}" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></a>
                                    </td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    $(document).ready(function(){
        $('#table').dataTable();
    });
</script>
@endsection
