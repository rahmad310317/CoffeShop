@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ $daftar }}</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Menu</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">{{ $breadcumb }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route($uri) }}" class="btn btn-rounded btn-success">tambah</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="col-md-4 ml-auto">
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{ $message }}</strong>
                </div>
            </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Harga</th>
                                        <th class="border-right" scope="col">Tersedia</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                            <tbody>
                                @foreach ($menu as $key => $item)
                                @if ($item->tersedia == 0)
                                    <tr class="table-active">
                                @else
                                    <tr>
                                @endif
                                        <th>{{ $menu->firstItem() + $key }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td><img width="70" height="40" src="{{ asset('storage/' . $item->gambar) }}" alt=""></td>
                                        <td>{{ $item->harga }}</td>
                                        <td class="border-right">@if ($item->tersedia == 1)
                                            Ya
                                        @else
                                            Tidak
                                        @endif</td>
                                        <td>
                                                @if (Route::is('makanan.index'))
                                                    {{-- <a href="{{ route('makanan.show', $item->slug) }}"><button class="badge badge-info border-0">detail</button></a> --}}
                                                    <a href="{{ route('makanan.edit', $item->slug) }}"><button class="badge badge-warning border-0">edit</button></a>
                                                    <form action="{{ route('makanan.destroy', $item->slug) }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="badge badge-danger border-0">hapus</button>
                                                    </form>
                                                @else
                                                    {{-- <a href="{{ route('minuman.show', $item->slug) }}"><button class="badge badge-info border-0">detail</button></a> --}}
                                                    <a href="{{ route('minuman.edit', $item->slug) }}"><button class="badge badge-warning border-0">edit</button></a>
                                                    <form action="{{ route('minuman.destroy', $item->slug) }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="badge badge-danger border-0">hapus</button>
                                                    </form>
                                                @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right mt-2">
                            {{ $menu->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(300, 0).slideUp(300, function(){
                $(this).remove();
            });
        }, 2000);
    </script>
@endsection
