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
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'),
            'phone' => '1234567890',
            'position' => 'Super Admin',
            'bio' => 'This is a sample bio for John Doe.',
            'status' => 'active',
            'photo' => null,
        ]);
    }
}