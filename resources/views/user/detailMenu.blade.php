@extends('user.layouts.app')
@section('content')
    <div class="head">
        <div class="container">
            <h3 class="text-white my-4">Detail Menu</h3>
            <div class="row">
                <div class="col-9">
                    <div class="row">
                        <div class="col-5">
                            <div class="card h-100">
                                <img src="{{ asset('storage/' . $detailmenu->gambar) }}" class="card-img-top h-100" alt="...">
                            </div>
                        </div>
                        <div class="col-7 text-white">
                            <h2 class="text-primary" style="font-weight: bold">{{ $detailmenu->name }}</h2>
                            <p>Rp. {{ number_format($detailmenu->harga) }}</p>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Exercitationem numquam perferendis fuga, sint ipsam vel soluta quas itaque repellat. Nesciunt distinctio consequatur, aperiam, ad explicabo adipisci dolorem sequi obcaecati a quis sed. Aliquam cupiditate ea exercitationem, molestiae neque fugit perspiciatis corporis doloremque eum dignissimos, esse temporibus eos debitis, et vel?</p>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-title text-center" style="font-weight: bold">Pemesanan</div>
                        <div class="card-body">
                             <form action="{{ route('user.Keranjang.store', $detailmenu->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" placeholder="masukan jumlah" value="1" min="1" type="number" name="qty" id="qty" required>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Masuk Keranjang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
