<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@user.com',
            'role' => 'admin',
            'password' => Hash::make('adminsp'),
        ]);

        User::create([
            'name' => 'guest',
            'email' => 'guest@user.com',
            'role' => 'guest',
            'password' => Hash::make('guestsp'),
        ]);
    }
}
