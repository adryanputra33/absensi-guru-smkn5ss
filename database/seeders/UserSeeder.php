<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan user biasa
        User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('1234'), // Gantilah dengan password yang aman
        ]);

        // Menambahkan admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('1234'), // Gantilah dengan password yang aman

        ]);
    }
}
