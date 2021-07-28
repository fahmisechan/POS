@extends('layouts.master')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800"><i class="fas fa-fw fa-box"></i>| Barang</h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Input Barang</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('barang.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="nama">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama" id="nama"
                                         required>
                                </div>
                                <div class="col-md-3">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" name="harga" id="harga"
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah"
                                         required>

                                </div>
                                <div class="col-md-3">
                                    <label for="supplier">Supplier</label>
                                    <select name="supplier" class="form-control">
                                        <option value="" disabled>Supplier</option>
                                        @foreach ($supplier as $item)
                                    <option value="{{$item->nama}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control" name="supplier" id="supplier"
                                        required> --}}
                                </div>
                            </div>
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" placeholder="Foto" required>

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
                                       <th>aksi</th>
                                    </tr>
                                </thead>
                                @foreach ($barang as $item)
                                <tbody>
                                    <tr>
                                        <th scope="row"><a
                                                href="{{route('barang.profile',$item->id)}}">{{$item->id}}</a></th>
                                        <td>{{$item->nama}}</td>
                                        <td>{{$item->harga}}</td>
                                        <td>{{$item->jumlah}}</td>
                                        <td>{{$item->supplier}}</td>
                                        <td><img style="height: 50px; width:90px;"
                                                src="{{asset('image/barang/'.$item->foto)}}"></td>
                                        <td align="center">
                                            <a href="{{route('barang.edit',$item->id)}}"
                                                class="btn btn-warning btn-circle">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form action="{{ route('barang.destroy',$item->id) }}" method="POST">
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
<script>
</script>
@endsection
