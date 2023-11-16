@extends('admin.layouts.app')
@section('content')

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambah Meja</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Admin</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Meja</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('meja.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection