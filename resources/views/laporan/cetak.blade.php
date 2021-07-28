
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('template/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body>
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <a href="/laporan/table"><i class="fas fa-arrow-left"></i></a>
                <button onclick="window.print()" class="btn btn-primary"><i class="fas fa-print"></i></button>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <table width="100%" class="table table-borderless">
                        <tr>
                            <td width="38%" class="font-weight-bold">Invoices Number</td>
                            <td width="2%" class="font-weight-bold">:</td>
                            <td width="60%" class="font-weight-bold">{{$cetak->code}}</td>
                        </tr>
                        <tr>
                            <td width="38%">Konsumen</td>
                            <td width="2%">:</td>
                            <td width="60%">{{$cetak->konsumen}}</td>
                        </tr>
                        <tr>
                            <td width="38%">Tanggal</td>
                            <td width="2%">:</td>
                            <td width="60%">{{$cetak->created_at->format('d, M Y')}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table width="100%" class="table table-borderless">
                        <tr>
                            <td width="38%">Pay</td>
                            <td width="2%">:</td>
                            <td width="60%">{{$cetak->pembayaran}}</td>
                        </tr>
                        <tr>
                            <td width="38%">Total</td>
                            <td width="2%">:</td>
                            <td width="60%">{{$cetak->total}}</td>
                        </tr>
                        <tr>
                            <td width="38%">Kembali</td>
                            <td width="2%">:</td>
                            <td width="60%">{{$cetak->kembalian}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nama Barang</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        @foreach ($cetak->barang_transaksi as $index=>$item)
                        <tbody>
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$item->barang->nama}}</td>
                                <td>{{$item->jumlah}}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
