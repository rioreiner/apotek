<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin Apotek',
            'email' => 'admin@apotek.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Regular user
        User::create([
            'name' => 'User Test',
            'email' => 'user@apotek.com', 
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);
    }
}