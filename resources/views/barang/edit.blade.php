@extends('layouts.master')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800"><i class="fas fa-fw fa-box"></i>| Edit Barang</h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Barang</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('barang.update',$barang->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="nama">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                value="{{$barang->nama}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="harga">Harga</label>
                                <input type="text" class="form-control" name="harga" id="harga" value="{{$barang->harga}}"
                                        required>

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah"
                                    value="{{$barang->jumlah}}" required>

                                </div>
                                <div class="col">
                                    <label for="supplier">Supplier</label>
                                    <input type="text" class="form-control" name="supplier" id="supplier"
                                    value="{{$barang->supplier}}" required>

                                </div>
                            </div>
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto"  value="{{$barang->foto}}" required>
                            <p>{{$barang->foto}}</p>
                            <hr>
                            <button id="close" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Update</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    $('#close').click(function(){
        $('#nama').val('');
        $('#harga').val('');
        $('#jumlah').val('');
        $('#supplier').val('');
        $('#foto').val('');
    });
</script>
@endsection
