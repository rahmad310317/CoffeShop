@extends('user.layouts.app')
@section('content')
    <div class="head">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row bg-light text-center rounded">
                        <div class="col border-bottom border-2 p-2 border-primary">Semua</div>
                        <div class="col p-2">Tunggu</div>
                        <div class="col p-2">Proses</div>
                        <div class="col p-2">Selesai</div>
                    </div>
                   <div class="row mt-2">
                     @foreach ($pesanan as $item)
                        <div class="card mb-2">
                            <div class="d-flex justify-content-between border-bottom p-3">
                                <div>{{ $item->kode_pesanan }}</div>
                                <div>{{ $item->status->name }} | {{ $item->pembayaran->name }}</div>
                            </div>
                            @foreach ($item->detailPesanan as $detail)
                                <div class="d-flex justify-content-between align-items-center border-bottom p-3">
                                    <div class="d-flex">
                                        <img src="{{ asset('storage/' . $detail->menu->gambar) }}" width="20%" alt="">
                                        <div>
                                            <h4 class="m-2">{{ $detail->menu->name }}</h4>
                                            <div class="m-2">x{{ $detail->qty }}</div>
                                        </div>
                                    </div>
                                    <div class="text-primary d-flex inline">Rp{{ number_format($detail->jumlah_harga) }}
                                    </div>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-end py-4 px-3 align-items-center">Total Pesanan : <h2>Rp. {{ number_format($item->total_harga_pesanan) }}</h2></div>
                        </div>
                    @endforeach
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
