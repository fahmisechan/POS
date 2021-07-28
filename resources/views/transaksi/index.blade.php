@extends('layouts.kasir')
@section('content')
<div id="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h2 class="h4 mb-0 text-gray-800"><i class="fas fa-fw fa-box"></i>| Transaksi</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Input Barang Transaksi</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('transaksi.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <label for="nama">ID Barang</label>
                                <select class="form-control" id="id" name="barang_id">
                                    @foreach ($barang as $item)
                                    <option value="{{$item->id}}" selected="selected">{{$item->id}}</option>
                                    @endforeach
                                </select>
                                <label for="harga">Nama Barang</label>
                                <input type="text" class="form-control" name="nama_barang" id="nama" readonly>
                                <label for="harga">Harga</label>
                                <input type="text" class="form-control" name="harga_barang" id="harga" readonly>
                            </div>
                            <div class="form-row">
                                <label for="stok2">Jumlah</label>
                                <input type="number" class="form-control" hidden id="stok">
                                <input type="number" class="form-control" name="jumlah" id="stok2" required>
                                <br>
                                @error('jumlah')
                                <div class="alert alert-danger">Jumlah tidak boleh kurang dari 1</div>
                                @enderror
                                {{-- <input type="number" class="form-control" name="sub_total" id="sub_total" hidden> --}}
                            </div>
                            <hr>
                            <button id="close" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-success btn-icon-split" disabled id="submit">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Simpan</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card shadow mb-2">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Barang</h6>
                        </div>
                        <div class="card-body">
                            <table id="product" class="table table-striped table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach ($cart as $row)
                                <tbody>
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->price}}</td>
                                        <td align="center">{{$row->quantity}}</td>
                                        <td align="center">
                                            <form action="{{url('/cart/destroy',$row->id)}}" method="POST">
                                                @csrf
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
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Input Transaksi</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="/transaksi/bayar" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <label for="jumlah">Nama Konsumen</label>
                                <input type="text" class="form-control" name="konsumen" id="nama_konsumen"
                                    required>
                            </div>
                            <div class="form-row">
                                <label for="jumlah">Pembayaran</label>
                                <input type="number" class="form-control" id="oke" name="pembayaran">
                            </div>
                            <h3 hidden class="font-weight-bold mb-5" id="bayar"></h3>
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label for="Sub Total">Total :</label>
                                    <h3 class="font-weight-bold mb-5">
                                        {{ number_format($data_total['total'],2,',','.') }}</h3>
                                    <input type="hidden" class="form-control" id="hidden" name="total"
                                        value="{{$data_total['total']}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="Kembalian">Kembalian :</label>
                                    <h3 class="font-weight-bold mb-5" id="kembalian"></h3>
                                </div>
                            </div>
                            <button id="close2" class="btn btn-info btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                                <span class="text">Batal</span>
                            </button>
                            <button type="submit" class="btn btn-success btn-icon-split" disabled id="simpan">
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
    </div>
</div>
@include('sweetalert::alert')
@endsection
@section('footer')
<script src="{{asset('template/js/select2.min.js')}}"></script>
<script>
    $('#id').change(function () {
        var id = $(this).val();
        var url = '{{ route("autofill", ":id") }}';
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: 'get',
            dataType: 'json',
            success: function (response) {
                if (response != null) {
                    $('#nama').val(response.nama);
                    $('#harga').val(response.harga);
                    $('#stok').val(response.jumlah);
                }
            }
        });
    });

</script>
<script>
    $(document).ready(function () {
        $('#id').select2();
        $('#product').dataTable();
        // $('#jumlah').keyup(function () {
        //     var harga = $('#harga').val();
        //     var jumlah = $('#jumlah').val();
        //     $('#sub_total').val(harga * jumlah);
        // });
        $('#pembayaran').keyup(function () {
            var pembayaran = $('#pembayaran').val();
            var total = $('#total').val();
            $('#kembalian').val(pembayaran - total);
        });
    });
   stok2.oninput = function (){
        var stok2 = parseInt(document.getElementById('stok2').value) ? parseInt(document.getElementById('stok2')
            .value) : 0;
        var stok = parseInt(document.getElementById('stok').value) ? parseInt(document.getElementById('stok')
        .value) : 0;
        jumlah_stok(stok,stok2);
        const submit = document.getElementById("submit");
        if(stok === 0){
            submit.disabled = true;
        }
    }
    function jumlah_stok(stok,stok2){
        const submit = document.getElementById("submit");
        if(stok2 > stok){
            swal("Maaf Stok kurang","Jumlah Stok saat ini : " + stok,"error");
            submit.disabled = true;
        }else{
            submit.disabled = false;
        }
    }
    $('#close').click(function () {
        $('#nama').val('');
        $('#harga').val('');
        $('#stok2').val('');
    });
    $('#close2').click(function () {
        $('#nama_konsumen').val('');
        $('#total').val('');
        $('#PPN').val('');
        $('#kembalian').val('');
    });
    oke.oninput = function () {
        let jumlah = parseInt(document.getElementById('hidden').value) ? parseInt(document.getElementById('hidden')
            .value) : 0;
        let pembayaran = parseInt(document.getElementById('oke').value) ? parseInt(document.getElementById('oke')
            .value) : 0;
        let hasil = pembayaran - jumlah;
        document.getElementById("bayar").innerHTML = pembayaran ? 'Rp ' + rupiah(pembayaran) + ',00' : 'Rp ' + 0 +
            ',00';
        document.getElementById("kembalian").innerHTML = hasil ? 'Rp ' + rupiah(hasil) + ',00' : 'Rp ' + 0 +
            ',00';
        cek(pembayaran, jumlah);
        const simpan = document.getElementById("simpan");

        if (jumlah === 0) {
            simpan.disabled = true;
        }

    };

    function cek(pembayaran, jumlah) {
        const simpan = document.getElementById("simpan");
        if (pembayaran < jumlah) {
            simpan.disabled = true;
        } else {
            simpan.disabled = false;
        }
    }

    function rupiah(bilangan) {
        var number_string = bilangan.toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    }
</script>
<script>
</script>
@endsection
