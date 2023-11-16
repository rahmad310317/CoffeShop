<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Meja;
use App\Models\StatusPesanan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StatusPesananTableSeeder::class);
        $this->call(StatusPembayaranTableSeeder::class);
        $this->call(KategoriTableSeeder::class);
        $this->call(MejaTableSeeder::class);
    }
}
