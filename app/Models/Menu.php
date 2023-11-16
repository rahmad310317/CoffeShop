<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Menu extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'menu';

    protected $fillable = [
        'name',
        'slug',
        'harga',
        'gambar',
        'kategori_id'
    ];


    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function sluggable(): array{
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

}
