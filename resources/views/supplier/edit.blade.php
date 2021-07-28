@extends('layouts.master')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800"><i class="fas fa-fw fa-box"></i>| Supplier</h2>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Input Supplier</h6>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('supplier.update',$supplier->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="nama">Nama Supplier</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{$supplier->nama}}"
                                required>
                        </div>
                        <div class="col-md-6">
                            <label for="jenis kelamin">Jenis Kelamin</label>
                            <select class="form-control">
                                <option value="@if($supplier->jk == 'laki-laki')" selected @endif>Laki laki</option>
                                <option value="@if($supplier->jk == 'perempuan')" selected @endif">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="umur">umur</label>
                            <input type="number" class="form-control" name="umur" id="umur" value="{{$supplier->umur}}"
                                required>

                        </div>
                        <div class="col">
                            <label for="alamat">alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat"
                                value="{{$supplier->alamat}}" required>
                        </div>
                    </div>
                    <label for="fotos">Foto</label>
                    <input type="file" class="form-control" name="foto" value="{{$supplier->foto}}" id="foto" required>
                    <label for="fotos">{{$supplier->foto}}</label>
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
@include('sweetalert::alert')
@endsection
@section('footer')
<script>
    $(document).ready(function () {
        $('#barang').dataTable();
    });
    $('#close').click(function () {
        $('#nama').val('');
        $('#jk').val('');
        $('#alamat').val('');
        $('#umur').val('');
        $('#foto').val('');
    });

</script>
<script>
</script>
@endsection
