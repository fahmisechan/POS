@extends('layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-xl-11 col-md-11 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <h4 class="text-primary">{{ $jumlah->options['chart_title'] }}</h4>
                {!! $jumlah->renderHtml() !!}
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-xl-11 col-md-11 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <h4 class="text-primary">{{ $total->options['chart_title'] }}</h4>
                {!! $total->renderHtml() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
{!! $jumlah->renderChartJsLibrary() !!}
{!! $jumlah->renderJs() !!}
{!! $total->renderJs() !!}
{{-- <script>
  Highcharts.chart('chart', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Laporan Pemasukan Bulanan'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: [
            'Jan'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Jumlah Transaksi',
        data: {!!json_encode($tr)!!}

    }, {
        name: 'Pemasukan',
        data: [ 51.1]

    }]
});
</script> --}}
<script>
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
@endsection
