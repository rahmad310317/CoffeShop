@extends('user.layouts.app')
@section('content')
    <div class="head">
        <div class="container">
            <h3 class="text-white my-4">Keranjang</h3>
            <div class="row">
                <div class="col-9">
                    <div class="m-1 p-2 row bg-light rounded">
                        <div class="col-4">Produk</div>
                        <div class="col text-center">Harga Satuan</div>
                        <div class="col text-center">Quantity</div>
                        <div class="col text-center">Total Harga</div>
                        <div class="col text-end">Aksi</div>
                    </div>
                    @if ($keranjang->sum('total_harga') == 0)
                        <h4 class="text-center my-4">Krenjang Kosong</h4>
                        <a href="{{ route("user.daftarmenu") }}" class="my-2 text-white d-flex justify-content-center">Tambah Makanan/Minuman</a>
                    @else
                        @foreach ($keranjang as $item)
                        <div class="m-1 p-2 row align-items-center bg-light rounded">
                                <div class="col-4">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('storage/' . $item->menu->gambar) }}" width="30%" alt="">
                                        {{ $item->menu->name }}
                                    </div>
                                </div>
                                <div class="col text-center">Rp. {{ number_format($item->menu->harga) }}</div>
                                <div class="col text-center">{{ $item->qty }}</div>
                                <div class="col text-center">Rp. {{ number_format($item->total_harga) }}</div>
                                <div class="col text-end">
                                    <form action="{{ route('user.Keranjang.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger border-0">hapus</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-3">
                    <div class="card p-2 my-1">
                        <h4 class="text-center">Pemesanan</h3>
                        <form action="{{ route('user.pesanan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="total keseluruhan" class="form-label">total keseluruhan</label>
                                <input type="text" name="total_harga_pesanan" id="total_keseluruhan" value="Rp. {{ number_format($keranjang->sum('total_harga')) }}" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="total keseluruhan" class="form-label">Atas Nama</label>
                                <input type="text" name="atas_nama" id="atas_nama" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="meja" class="form-label">Pilih Meja</label>
                                <select name="meja_id" id="meja_id" class="form-select">
                                        @foreach ($meja as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            @if (!$keranjang->sum('total_harga') == 0)
                            <button class="btn btn-success d-block">Order</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
