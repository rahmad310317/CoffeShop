@extends('admin.layouts.app')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Daftar Pesanan</h4>
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
                                    {{ $pesanan->links() }}
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
                                        @foreach ($pesanan as $key => $item)
                                            @if ($item->status_pesanan_id == 4)
                                                <tbody class="table-success">
                                            @elseif ($item->status_pesanan_id == 1)
                                                <tbody class="table-danger">
                                            @else
                                                <tbody class="table-warning">
                                            @endif
                                                <tr>
                                                    <th>{{ $pesanan->firstItem() + $key }}</th>
                                                    <td>{{ $item->kode_pesanan }}</td>
                                                    <td>{{ $item->atas_nama }}</td>
                                                    <td>{{ $item->meja->name }}</td>
                                                    <td>{{ $item->total_harga_pesanan }}</td>
                                                    <td class="border-right">{{ $item->status->name }}</td>
                                                    <td class="border-right">{{ $item->pembayaran->name }}</td>
                                                    <td>
                                                        <a href="{{ route('pesanan.show', $item->kode_pesanan) }}"><button class="badge badge-info border-0">cek detail</button></a>
                                                        <a href="{{ route('pesanan.edit', $item->kode_pesanan) }}"><button class="badge badge-warning border-0">edit status</button></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
@endsection
