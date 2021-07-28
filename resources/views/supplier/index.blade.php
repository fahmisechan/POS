@extends('layouts.master')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800"><i class="fas fa-fw fa-box"></i>| Supplier</h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Input Supplier</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('supplier.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="nama">Nama Supplier</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                         required>
                                </div>
                                <div class="col-md-3">
                                    <label for="jenis kelamin">Jenis Kelamin</label>
                                    <select class="form-control" id="select2">
                                        <option value="L" {{(old('jk') == 'laki-laki') ? 'selected' : ''}}>Laki laki
                                        </option>
                                        <option value="L" {{(old('jk') == 'perempuan') ? 'selected' : ''}}>Perempuan
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="umur">umur</label>
                                    <input type="number" class="form-control" name="umur" id="umur" 
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label for="alamat">alamat</label>
                                    <input type="text" class="form-control" name="alamat" id="alamat"
                                         required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-5">
                                    <label for="fotos">Foto</label>
                                    <input type="file" class="form-control" name="foto" id="foto" required>
                                </div>
                            </div>
                            <hr>
                            <button id="close" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-primary btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Simpan</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Table Supplier</h6>
                        </div>
                        <div class="card-body">
                            <table id="barang" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Supplier</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Umur</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach ($supplier as $item)
                                <tbody>
                                    <tr>
                                        <th scope="row"><a href="/supplier/{{$item->id}}">{{$item->id}}</a></th>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->jk}}</td>
                                        <td>{{$item->umur}}</td>
                                        <td>{{$item->alamat}}</td>
                                        <td><img style="height: 50px; width:90px;"
                                                src="{{asset('image/supplier/'.$item->foto)}}"></td>
                                        <td align="center">
                                            <a href="{{route('supplier.edit',$item->id)}}"
                                                class="btn btn-warning btn-circle">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('supplier.destroy',$item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-circle">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
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
@include('sweetalert::alert')
@endsection
@section('footer')
<script src="{{asset('template/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#barang').dataTable();
        $('#select2').select2();
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
