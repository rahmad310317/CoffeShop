@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Laporan</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            @if (auth()->user()->role == 1)
                                <li class="breadcrumb-item text-muted active" aria-current="page">Admin</li>
                            @else
                                <li class="breadcrumb-item text-muted active" aria-current="page">Kasir</li>
                            @endif
                            <li class="breadcrumb-item text-muted active" aria-current="page">Laporan</li>
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
                                <div class="float-left">
                                    <h4 class="card-title">Daftar Laporan</h4>
                                </div>
                                <div class="float-right">
                                    {{ $laporan->links() }}
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">nama</th>
                                                <th scope="col">gambar</th>
                                                <th scope="col">harga</th>
                                                <th scope="col">{{ '' }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($laporan as $item)
                                            <tr>
                                                <th>1</th>
                                                <td>{{ $item->name }}</td>
                                                <td><img width="100" src="{{ asset('storage/' . $item->gambar) }}" alt=""></td>
                                                <td>{{ $item->harga }}</td>
                                                <td><div class="d-flex">
                                                        <button class="btn btn-info">tes</button>
                                                        <button class="btn btn-warning mx-2">edit</button>
                                                        <button class="btn btn-danger">hapus</button>
                                                    </div></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
