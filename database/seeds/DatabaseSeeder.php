<?php

use App\Instansi;
use App\Klasifikasi;
use App\SuratKeluar;
use App\SuratMasuk;
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
            'name' => 'Admin',
            'avatar' => 'default.png',
            'email' => 'admin@mail.com',
            'password' => bcrypt('123456'),
            'role' => 1,
        ]);
        // Add user Pertugas table seeder 
        User::create([
            'name' => 'Petugas',
            'avatar' => 'default.png',
            'email' => 'petugas@mail.com',
            'password' => bcrypt('123456'),
            'role' => 2,
        ]);
        // Add Data Instansi 
        Instansi::create([
            'nama' => 'Universitas Merdeka',
            'alamat' => 'Jl. Indonesia Merdeka Kabupaten Tuban Jawa Timur',
            'pimpinan' => 'Dr. Merdeka',
            'email' => 'merdeka.mail.com',
            'logo' => 'default_istansi.png',
        ]);
        // Add Data Klasifikasi 
        Klasifikasi::create([
            'nama' => 'Undangan',
            'kode' => 'A',
            'keterangan' => 'Klasifikasi Untuk Undangan',
        ]);
        // Add Data SuratMasuk 
        SuratMasuk::create([
            'users_id' => 1,
            'klasifikasis_id' => 1,
            'nomor_surat' => '20/HSO/HSJ/VII/2022',
            'asal_surat' => 'Kementrian Indonesia',
            'isi_surat' => 'Data default',
            'tanggal_surat' => '2022-07-14',
            'file' => 'default.jpg',
            'keterangan' => 'Keterangan data default'
        ]);

        // Add Data SuratMasuk 
        SuratKeluar::create([
            'users_id' => 1,
            'klasifikasis_id' => 1,
            'nomor_surat' => '20/HSO/HSJ/VII/2022',
            'tujuan_surat' => 'Kementrian Indonesia',
            'isi_surat' => 'Data default',
            'tanggal_surat' => '2022-07-14',
            'file' => 'default.jpg',
            'keterangan' => 'Keterangan data default'
        ]);
    }
}
