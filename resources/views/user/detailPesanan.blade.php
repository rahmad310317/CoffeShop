@extends('user.layouts.app')
@section('content')
    <ul>   
        @foreach ($detail as $item)
        <li>
            {{ $item->menu->name }}
            {{ $item->qty }}
            {{ $item->jumlah_harga }}
        </li>
        @endforeach
        {{ $detail->sum('jumlah_harga') }}
    </ul>
@endsection