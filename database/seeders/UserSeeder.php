<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\User_info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'id' => '1',
            'name' => 'Admin',
            'email' => 'tester@broekhuislease.nl',
            'password' => Hash::make('Admin123'),
            'icon_color' => 'blue',
            'icon' => 'A',
            'is_active' => 'Active',
        ]);

        \App\Models\User_info::create([
            'user_id' => '1',
            'color' => 'blue',
            'job' => 'Example',
        ]);
    }
}
