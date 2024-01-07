<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'adminagmail@gmail.com',
            'password' => Hash::make('admin_role'),
            'role' => 'admin',
        ]);
    }
}
