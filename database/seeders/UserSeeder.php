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
            'name' => 'Irnandaputri',
            'email' => 'Irnanda@gmail.com',
            'password' => Hash::make('admin'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Khusnul',
            'email' => 'Khusnul@gmail.com',
            'password' => Hash::make('admin1'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'Nikita',
            'email' => 'Nikita@gmail.com',
            'password' => Hash::make('admin2'),
            'role_id' => 3,
        ]);
    }
}
