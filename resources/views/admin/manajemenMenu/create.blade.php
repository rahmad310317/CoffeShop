@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Tambahkan {{ $kategori }}</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Menu</li>
                            @if (Request::is('admin/menu/makanan/create'))
                                <li class="breadcrumb-item text-muted active" aria-current="page">Makanan</li>
                            @else
                                <li class="breadcrumb-item text-muted active" aria-current="page">Minuman</li>
                            @endif
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
                <form action="{{ route($uri) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">nama</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                            name="slug" required readonly value="{{ old('slug') }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">harga</label>
                        <input type="text" class="form-control" name="harga" id="harga">
                    </div>
                    <div class="mb-3">
                        <label for="rating" class="form-label">rating</label>
                        <input type="text" class="form-control" name="rating" id="rating">
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">gambar</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="gambar" id="gambar">
                            <label class="custom-file-label" for="gambar">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info">submit</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        name.addEventListener('change', function() {
            fetch('/checkSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
