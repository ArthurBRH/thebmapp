<?php

namespace Database\Seeders;

use App\Models\Admin_contact;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class RequestSeeder extends Seeder
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function run(): void
    {
        Admin_contact::create([
            'user_id' => '1',
            'description' => 'Dit is een test request',
            'status' => 'NonUse',
            'prio' => 'Low',
        ]);
    }
}
