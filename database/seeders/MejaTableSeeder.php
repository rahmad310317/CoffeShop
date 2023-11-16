<?php

namespace Database\Seeders;

use App\Models\Meja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MejaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meja::create([
        'name'	=> 'Meja 1',
        ]);

        Meja::create([
        'name'	=> 'Meja 2',
        ]);
    }
}
