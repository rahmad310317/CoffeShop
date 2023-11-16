@extends('user.layouts.app')
@section('content')
    <div class="head">
        <div class="container">
            <div class="row">
                <div class="row row-cols-1 row-cols-md-6 g-4 mb-4">
                        @foreach ($menu as $item)
                            <div class="col">
                                <a class="text-decoration-none text-black" href="{{ route('user.detailMenu', $item->slug) }}">
                                    <div class="card h-100 text-center">
                                        <img src="{{ asset('storage/' .$item->gambar) }}" class="card-img-top h-100" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title text-primary" style="font-weight: bold">{{ $item->name }}</h5>
                                            <p class="card-text">Rp. {{ number_format($item->harga) }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
