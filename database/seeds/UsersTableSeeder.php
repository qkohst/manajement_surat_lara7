<?php

use App\User;
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
    }
}
