@extends('admin.layouts.app')
@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Data {{ $jenisAkun }}</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Akun</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">{{ $jenisAkun }}</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                    <form action="{{ route($uri, $user->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">nama</label>
                            <input type="text" class="form-control" name="name" id="nama" value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_hp" class="form-label">nomor HP</label>
                            <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" value="{{ $user->nomor_hp }}">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" value="{{ $user->alamat }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label" value="{{ $user->password }}">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <button type="submit" class="btn btn-info">submit</button>
                    </form>
                </div>
        </div>
    </div>
@endsection
