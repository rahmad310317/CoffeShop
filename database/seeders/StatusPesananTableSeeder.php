<?php

namespace Database\Seeders;

use App\Models\StatusPesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPesananTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StatusPesanan::create([
        'name'	=> 'Proses',
        ]);

        StatusPesanan::create([
        'name'	=> 'Tunggu',
        ]);

        StatusPesanan::create([
        'name'	=> 'Selesai',
        ]);
    }
}
