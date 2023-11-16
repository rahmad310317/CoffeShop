@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Akun {{ $jenisAkun }}</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Akun</li>
                            <li class="breadcrumb-item text-muted active " aria-current="page">{{ $jenisAkun }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="{{ route($uri['create']) }}" class="btn btn-rounded btn-success">tambah {{ $jenisAkun }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-right">
                                    {{ $akun->links() }}
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Nomor Hp</th>
                                                <th class="border-right" scope="col">Alamat</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($akun as $item)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->nomor_hp }}</td>
                                                <td class="border-right">{{ $item->alamat }}</td>
                                                <td>
                                                    {{-- <a href="{{ route($uri['show'], $item->id) }}"><button class="badge badge-info border-0">detail</button></a> --}}
                                                    <a href="{{ route($uri['edit'], $item->id) }}"><button class="badge badge-warning border-0">edit</button></a>
                                                    <form action="{{ route($uri['destroy'], $item->id) }}" method="POST" class="d-inline">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="badge badge-danger border-0">hapus</button>
                                                    </form>
                                                </td>
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
