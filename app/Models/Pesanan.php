<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = ['user_id', 'atas_nama', 'kode_pesanan', 'total_harga_pesanan', 'meja_id', 'status_pesanan_id', 'status_pembayaran_id'];

    public function getRouteKeyName()
    {
        return 'kode_pesanan';
    }

    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(StatusPesanan::class, 'status_pesanan_id');
    }

    public function pembayaran()
    {
        return $this->belongsTo(StatusPembayaran::class, 'status_pembayaran_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function meja()
    {
        return $this->belongsTo(Meja::class, 'meja_id');
    }
}
