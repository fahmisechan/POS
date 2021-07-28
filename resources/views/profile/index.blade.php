@extends('layouts.master')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800"><i class="fas fa-fw fa-box"></i>| Kasir</h2>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Input Akun Kasir</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('akun.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label for="nama">Nama </label>
                                    <input type="text" class="form-control" name="name" id="name"
                                         required>
                                </div>
                                <div class="col-md-3">
                                    <label for="umur">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" 
                                        required>
                                </div>
                                <div class="col-md-3">
                                    <label for="alamat">Password</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                         required>
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
                            <h6 class="m-0 font-weight-bold text-primary">Table Kasir</h6>
                        </div>
                        <div class="card-body">
                            <table id="barang" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                       
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach ($user as $item)
                                <tbody>
                                    <tr>
                                        <th scope="row"><a href="/supplier/{{$item->id}}">{{$item->id}}</a></th>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td align="center">
                                            <form action="{{ route('akun.destroy',$item->id) }}" method="POST">
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
        $('#name').val('');
        $('#email').val('');
        $('#password').val('');
    });

</script>
<script>
</script>
@endsection
