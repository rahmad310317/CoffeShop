@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Status Pesanan</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item text-muted active" aria-current="page">Pesanan</li>
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
                                <div class="float-right">
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Kode pesanan</th>
                                                <th scope="col">Atas Nama</th>
                                                <th scope="col">Meja</th>
                                                <th scope="col">Total harga</th>
                                                <th class="border-right" scope="col">Status pesanan</th>
                                                <th class="border-right" scope="col">Status Pembayaran</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <form action="{{ route('pesanan.update', $pesanan->kode_pesanan) }}" method="POST">
                                            @method('put')
                                            @csrf
                                            <tr>
                                                <th>1</th>
                                                <th>{{ $pesanan->kode_pesanan }}</th>
                                                <th>{{ $pesanan->atas_nama }}</th>
                                                <th>{{ $pesanan->meja->name }}</th>
                                                <th>{{ $pesanan->total_harga_pesanan }}</th>
                                                <th><select class="form-control" name="status_pesanan_id" id="status_pesanan_id" class="form-select">
                                                        @foreach ($status as $item)
                                                            @if ($pesanan->status_pesanan_id == $item->id)
                                                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @else{
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            }
                                                            @endif

                                                        @endforeach
                                                    </select>
                                                </th>
                                                <th><select class="form-control" name="status_pembayaran_id" id="status_pembayaran_id" class="form-select">
                                                        @foreach ($pembayaran as $item)
                                                            @if ($pesanan->status_pembayaran_id == $item->id)
                                                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                                            @else{
                                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                            }
                                                            @endif

                                                        @endforeach
                                                    </select>
                                                </th>
                                                <th>
                                                    <a href="{{ route('pesanan.index') }}" class="badge badge-warning border-0">batal</a>
                                                    <button type="submit" class="badge badge-primary border-0">simpan</button>
                                                </th>
                                            </tr>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
