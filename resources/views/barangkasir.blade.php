@extends('layouts.kasir')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800"><i class="fas fa-fw fa-box"></i>| Barang</h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Barang</h6>
                        </div>
                        <div class="card-body">
                            <table id="barang" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Supllier</th>
                                        <th scope="col">Foto</th>
                                    </tr>
                                </thead>
                                @foreach ($barang as $item)
                                <tbody>
                                    <tr>
                                    <td>{{$item->id}}</td>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->harga}}</td>
                                        <td>{{$item->jumlah}}</td>
                                        <td>{{$item->supplier}}</td>
                                        <td><img style="height: 50px; width:90px;"
                                                src="{{asset('image/barang/'.$item->foto)}}"></td>
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
@include('sweetalert::alert')
@endsection
@section('footer')
<script>
    $(document).ready(function () {
        $('#barang').dataTable();
    });
    $('#close').click(function () {
        $('#nama').val('');
        $('#harga').val('');
        $('#jumlah').val('');
        $('#supplier').val('');
        $('#foto').val('');
    });

</script>
@endsection
