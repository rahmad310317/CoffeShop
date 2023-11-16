@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Selamat Datang @if (auth()->user()->role == 1)Admin @else Kasir @endif</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        @if (auth()->user()->role == 1)
            <div class="row">
                <div class="col-md-6 col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <h4 class="card-title mb-0">Statistik Keuangan</h4>
                            </div>
                            <div class="pl-4 mb-5">
                                <div class="stats ct-charts position-relative" style="height: 200px;"></div>
                            </div>
                            <ul class="list-inline text-center mt-4 mb-0">
                                <li class="list-inline-item text-muted font-italic">Pendapatan Bulan Ini</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Total Pendapatan</h4>
                            <div class="mt-4 activity">
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="row">
                <div class="col col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><sup
                                            class="set-doller">Rp</sup>{{ number_format($pendapatan) }}
                                    </h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Pendapatan Hari ini
                                    </h6>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div>
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $pesanan }}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Pesanan</h6>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $makanan }}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Menu Makanan</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $minuman }}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Menu Minuman</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if (auth()->user()->role == 1)   
                    <div class="col col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 font-weight-medium">{{ $kasir }}</h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Kasir</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex d-lg-flex d-md-block align-items-center">
                                    <div>
                                        <h2 class="text-dark mb-1 font-weight-medium">{{ $pelanggan }}</h2>
                                        <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Pelanggan</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col col-md-4 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium">{{ $meja }}</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Meja</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
