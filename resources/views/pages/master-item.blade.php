@extends('scaffold')
<?php
$title = 'Master Barang';
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

    <div class="card">
        <div class="card-header">
            <h4>{{ $title }}</h4>
            <div class="card-header-form">
                <div class="btn-group">
                    <form action="{{ route('dashboard.master.item', app('request')->all()) }}">
                        <input autocomplete="off" type="text" class="form-control float-right" name="q" value="{{ app('request')->input('q', '') }}" placeholder="Search sales .."
                               style="border-radius: 30px 30px 30px 30px !important; height: 32px; width: auto; margin-right: 5%;">
                    </form>
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
                </tr>
                </thead>
                <tbody>
                @forelse($items as $item)
                    <tr>
                        <th class="v-middle" scope="row">{{ $loop->iteration }}</th>
                        <td class="v-middle text-small">{{ $item->date_in->format('Y-m-d') }}</td>
                        <td class="v-middle text-small">{{ $item->product_name }}</td>
                        <td class="v-middle text-small">{{ $item->qty }}</td>
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
@endsection

