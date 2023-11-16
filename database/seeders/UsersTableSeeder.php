<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'name'	=> 'Admin',
        'email'	=> 'admin@gmail.com',
        'nomor_hp'=> '089529591732',
        'alamat'=> 'krenekan',
        'role'=> '1',
        'password'	=> bcrypt('12345678')
        ]);

        User::create([
        'name'	=> 'Kasir',
        'email'	=> 'kasir@gmail.com',
        'nomor_hp'=> '089529591732',
        'alamat'=> 'krenekan',
        'role'=> '2',
        'password'	=> bcrypt('12345678')
        ]);

        User::create([
        'name'	=> 'user',
        'email'	=> 'user@gmail.com',
        'nomor_hp'=> '089529591732',
        'alamat'=> 'yogyakarta',
        'role'=> '0',
        'password'	=> bcrypt('12345678')
        ]);
    }
}
