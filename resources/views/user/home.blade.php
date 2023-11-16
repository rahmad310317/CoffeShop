@extends('user.layouts.app')
@extends('user.layouts.header')
@section('content')
    <section class="page-section bg-primary">
            <div class="container">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="text-center">
                        <h2 class="mt-0" style="font-weight: bold">Menu Terbaru</h2>
                        <hr class="divider divider-light" />
                        <div class="row row-cols-1 row-cols-md-6 g-4 mb-4">
                            @foreach ($menu as $item)
                                <div class="col">
                                    <a class="text-decoration-none text-black" href="{{ route('user.detailMenu', $item->slug) }}">
                                        <div class="card h-100">
                                            <img src="{{ asset('storage/' . $item->gambar) }}" class="card-img-top h-100" alt="...">
                                            <div class="card-body">
                                                <h5 class="text-primary" style="font-weight: bold">{{ $item->name }}</h5>
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
        </section>
        <!-- About -->
        <section class="page-section bg-light" id="about">
            <div class="container">
                <div class="row">
                    <div class="col align-self-center">
                        <h3>Kenyamanan Anda Adalah Prioritas Bagi Kami</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates earum voluptate cumque nesciunt dolorem, vitae molestiae, aut nisi laboriosam tenetur impedit dolore. Ad earum commodi tempora rerum. Ipsum blanditiis at nam, commodi cumque enim deserunt quia consequuntur beatae aliquid nihil consectetur veniam asperiores necessitatibus quasi ipsam quisquam omnis quibusdam, placeat saepe atque sed voluptatum illum. Ipsum explicabo natus ad tempora error, velit dignissimos ullam amet. Laudantium aperiam tempore libero laboriosam id iure, quos odit fugit, optio ad labore totam qui distinctio nihil sunt commodi inventore tenetur saepe. Itaque ullam doloribus rerum veritatis, minus ex repudiandae ratione sapiente expedita impedit molestiae.</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset('images/gerland1.jpg') }}" class="card-img-top" alt="...">
                    </div>
                </div>
            </div>
        </section>

         <!-- Album-->
        <section class="page-section bg-dark" id="Album">
            <div class="container">
                <div class="text-center">
                    <h2 class="mt-0 text-white" style="font-weight: bold">Album</h2>
                    <hr class="divider divider-light" />
                </div>
                <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('images/gerland1.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('images/gerland2.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('images/gerland3.jpg') }}" class="card-img-top" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
