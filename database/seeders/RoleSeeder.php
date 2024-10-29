<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create(['name' => 'admin', 'description' => 'Full access to all features']);
        Role::create(['name' => 'user', 'description' => 'General user access']);
        Role::create(['name' => 'member', 'description' => 'Limited member access']);    }
}
