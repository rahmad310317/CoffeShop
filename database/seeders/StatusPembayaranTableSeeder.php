<?php

namespace Database\Seeders;

use App\Models\StatusPembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPembayaranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusPembayaran::create([
        'name'	=> 'Belum Terbayar',
        ]);

        StatusPembayaran::create([
        'name'	=> 'Sudah Terbayar',
        ]);
    }
}
