@extends('scaffold')
<?php
$title = 'Keuangan';
?>
@section('page-title', $title)
@section('content-title', $title)

@section('content-breadcrumbs')
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-header">Total Barang Masuk</div>
                        <div class="card-body">
                            <div class="text-right">
                                <h3>{{ $items }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-header">Total Barang Keluar</div>
                        <div class="card-body">
                            <div class="text-right">
                                <h3>{{ $out }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card bg-light">
                        <div class="card-header">Total Transaksi</div>
                        <div class="card-body">
                            <div class="text-right">
                                <h3>{{ $items + $out }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
