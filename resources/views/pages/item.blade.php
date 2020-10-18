@extends('scaffold')
<?php
$title = 'Barang';
?>

@section('page-title', $title)
@section('content-title', $title)

@section('content-breadcrumbs')
    @include('components.breadcrumb-item', ['text' => $title, 'active' => false])
@endsection
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card" id="karyawan-form" style="display: none;">
        <div class="card-header">
            <h4>{{ $title }}</h4>
            <div class="card-header-form">
                <button id="close-form" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('dashboard.item.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="tanggal">Tanggal Masuk Barang</label>
                    <input type="date" name="date_in" class="form-control daterangepicker" id="tanggal">
                    <input type="hidden" name="id" class="form-control" id="id" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="nama-produk">Nama Barang</label>
                    <input type="text" name="product_name" class="form-control" id="nama_barang">
                </div>
                <div class="form-group">
                    <label for="penjualan">Jumlah Barang</label>
                    <input type="text" name="qty" class="form-control" id="penjualan">
                </div>
                <button type="button" class="btn btn-warning float-right btn-admin-cancel" style="display: none;">Cancel</button>
                <button type="submit" class="btn btn-primary float-right" style="margin-right: 10px;">Submit</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
                <h4>{{ $title }}</h4>
            <div class="card-header-form">
                <div class="btn-group">
                    <form action="{{ route('dashboard.item.index', app('request')->all()) }}">
                        <input autocomplete="off" type="text" class="form-control float-right" name="q" value="{{ app('request')->input('q', '') }}" placeholder="Search sales .."
                               style="border-radius: 30px 30px 30px 30px !important; height: 32px; width: auto; margin-right: 5%;">
                    </form>
                    <button id="add-new" class="btn btn-primary" style="border-radius: 0px !important;">
                        Buat Data
                    </button>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-md table-hover table-compact" id="table-1">
            <thead>
            <tr>
                <th scope="col" width="1">#</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah Barang</th>
                <th scope="col">Pengaturan</th>
            </tr>
            </thead>
            <tbody>
            @forelse($items as $item)
                <tr>
                    <th class="v-middle" scope="row">{{ $loop->iteration }}</th>
                    <td class="v-middle text-small">{{ $item->created_at->format('Y-m-d') }}</td>
                    <td class="v-middle text-small">{{ $item->product_name }}</td>
                    <td class="v-middle text-small">{{ $item->qty }}</td>
                    <td>
                        <a href="#" data-toggle="dropdown" class="btn btn-info dropdown-toggle">
                            <i class="fa fa-cog"></i>
                            Pengaturan
                        </a>
                        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <li>
                                <a href="#"
                                   data-id="{{ $item->id }}"
                                   data-tanggal="{{ $item->created_at->format('Y-m-d') }}"
                                   data-nama_barang="{{ $item->product_name }}"
                                   data-penjualan="{{ $item->qty }}"
                                   value="{{ $item->id }}"
                                   class="dropdown-item btn-for-edit">
                                    <i class="fas fa-pen"></i>&nbsp;&nbsp;&nbsp;&nbsp;Edit
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('dashboard.item.delete', ['id' => $item->id]) }}"
                                      method="post">
                                    {{ csrf_field() }} {{ method_field('DELETE') }}
                                    <button class="dropdown-item" type="submit"
                                            onclick="return confirm('Hapus data?')" style="color: #6c757d;"><i
                                            class="fas fa-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</button>
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td class="v-middle text-center" colspan="8">No out items available yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        </div>
        <div class="col-md-12 col-xs-12" style="margin-top: 16px;">
            <div class="float-right">
                {{ $items->appends(request()->except('page'))->render() }}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('.btn-for-edit').each(function (index) {
                $(this).on('click', function (e) {
                    let id = $(this).data('id');
                    let tanggal = $(this).data('tanggal');
                    let nama_barang = $(this).data('nama_barang');
                    let penjualan = $(this).data('penjualan');

                    $('#karyawan-form').show();
                    $('.btn-admin-cancel').show();

                    $('#id').val(id);
                    $('#tanggal').val(tanggal);
                    $('#nama_barang').val(nama_barang);
                    $('#penjualan').val(penjualan);
                });
            });

            $('.btn-admin-cancel').on('click', function (e) {
                e.preventDefault();

                $('#id').val('');
                $('#tanggal').val('');
                $('#nama_barang').val('');
                $('#penjualan').val('');

                $('#karyawan-form').hide();
                $('.btn-admin-cancel').hide();
            });

            // add new klik
            $('#add-new').on("click",function(){
                console.log("clicked");
                $('#karyawan-form').show();
            });

            // close klik
            $("#close-form").on("click", function () {
                $('#karyawan-form').hide();
            });
        });
    </script>
@endsection

