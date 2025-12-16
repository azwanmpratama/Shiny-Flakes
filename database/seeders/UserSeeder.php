<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Azwan',
            'email' => 'azwan@gmail.com',
            'password' => Hash::make('qwertyuiop123'), // Password
            'role' => 'admin',
        ]);
    }
}