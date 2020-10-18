@extends('scaffold')

@section('page-title', 'Dashboard')
@section('content-title', 'Dashboard')

@section('content-breadcrumbs')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="card profile-widget" style="margin-top:13px;">
                <div class="profile-widget-description pb-0">
                    <table class="table table-shrink" style="min-height: 168px">
                        <tr>
                            <th>Total Barang Masuk</th>
                            <td>912.012</td>
                        </tr>
                        <tr>
                            <th>Total Barang Keluar</th>
                            <td>810.134</td>
                        </tr>
                        <tr>
                            <th class="success">Total Keseluruhan</th>
                            <td>1.722.146</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="card profile-widget" style="margin-top:13px;">
                <div class="profile-widget-description pb-0">
                    <table class="table table-shrink" style="min-height: 168px">
                        <tr>
                            <th>Total Pemasukan</th>
                            <td>{{ 'Rp.'.number_format(1120010100, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Total Pengeluaran</th>
                            <td>{{ 'Rp.'.number_format(1201091, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th class="success">Total Transaksi</th>
                            <td>@currency(1120010100 + 1201091)</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="card profile-widget" style="margin-top:13px;">
                <div class="profile-widget-description pb-0">
                    <table class="table table-shrink" style="min-height: 168px">
                        <tr>
                            <th>Total Kepuasan Pelanggan</th>
                            <td>112.001</td>
                        </tr>
                        <tr>
                            <th>Total Kekecewaan Pelanggan</th>
                            <td>12.000</td>
                        </tr>
                        <tr class="success">
                            <th>Total</th>
                            <td>124.001</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="profile-widget-description pb-0">
                    <table class="table table-shrink" style="margin-bottom:10px">
                        <canvas id="transaction-chart-1" style="width: 100%;" height="380"></canvas>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        var chart1 = document.getElementById('transaction-chart-1');
        var chart1Obj = new Chart(chart1, {
            type: 'bar',
            data: {
                labels: ['Testimoni Pelanggan'],
                datasets: [{
                    label: '# PUAS',
                    data: [112001],
                    backgroundColor: ['rgba(54, 162, 235, 0.4)'],
                    borderWidth: 1
                }, {
                    label: '# KECEWA',
                    data: [12000],
                    backgroundColor: ['rgba(255, 255, 132, 0.4)'],
                    borderWidth: 1
                }, {
                    label: '# RATING',
                    data: [10000],
                    backgroundColor: ['rgba(250, 180, 30, 0.4)'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                onClick: function (e, a, b, c) {
                    console.log(a, b, c);
                }
            }
        });
    </script>
@endsection
