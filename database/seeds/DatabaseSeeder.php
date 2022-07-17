<?php

use App\Instansi;
use App\Klasifikasi;
use App\User;
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
        // Add user Admin table seeder 
        User::create([
            'name'    => 'Admin',
            'avatar' => 'default.png',
            'email'    => 'admin@mail.com',
            'password'    => bcrypt('123456'),
            'role' => 1,
        ]);
        // Add user Pertugas table seeder 
        User::create([
            'name'    => 'Petugas',
            'avatar' => 'default.png',
            'email'    => 'petugas@mail.com',
            'password'    => bcrypt('123456'),
            'role' => 2,
        ]);
        // Add Data Instansi 
        Instansi::create([
            'nama'    => 'Universitas Merdeka',
            'alamat' => 'Jl. Indonesia Merdeka Kabupaten Tuban Jawa Timur',
            'pimpinan'    => 'Dr. Merdeka',
            'email'    => 'merdeka.mail.com',
            'logo' => 'default_istansi.png',
        ]);
        // Add Data Klasifikasi 
        Klasifikasi::create([
            'nama'    => 'Undangan',
            'kode' => 'A',
            'keterangan'    => 'Klasifikasi Untuk Undangan',
        ]);
    }
}
