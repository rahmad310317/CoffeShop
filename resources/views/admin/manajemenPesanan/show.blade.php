@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ $pesanan->kode_pesanan }}</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Detail Pesanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Menu</th>
                                                <th scope="col">Qty</th>
                                                <th scope="col">Jumlah harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pesanan->detailPesanan as $key => $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{ $item->menu->name }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>{{ $item->jumlah_harga }}</td>
                                                </tr>
                                            @endforeach
                                                <tr>
                                                    <td style="border: none" colspan="2"></td>
                                                    <th class="table-danger">Total</th>
                                                    <th class="table-danger">{{ $pesanan->total_harga_pesanan }}</th>
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
