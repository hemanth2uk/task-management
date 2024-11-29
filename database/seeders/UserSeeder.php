<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create an Admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@demo.com',
            'password' => Hash::make('123456'), 
            'role' => 'admin', 
        ]);

        // Create a regular User
        User::create([
            'name' => 'Regular User',
            'email' => 'user@demo.com',
            'password' => Hash::make('123456'), 
            'role' => 'user', 
        ]);
    }
}
