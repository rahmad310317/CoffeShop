<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjang';

    protected $fillable = ['user_id', 'menu_id', 'total_harga', 'qty'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

}
