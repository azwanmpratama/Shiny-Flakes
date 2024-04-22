<?php

namespace Database\Seeders;

use App\Models\User;
use App\Http\Controllers\AuthController;
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
        User::create([
            'name' => 'Azwan',
            'email' => 'azwan@gmail.com',
            'password' => Hash::make('azwan123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('kasir123'),
            'role' => 'kasir',
        ]);
    }
}
