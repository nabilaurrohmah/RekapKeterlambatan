<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'ps',
            'email' => 'siswa@gmail.com',
            'password' => Hash::make('siswa'),
            'role' => 'ps',
        ]);
    }
}
