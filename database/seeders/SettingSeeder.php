<?php

namespace Database\Seeders;

use App\Models\App_setting;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'title' => 'no messages',
            'description' => 'Get no messages from other members',
            'permission' => 'setting.user.nm',
        ]);
        App_setting::create([
            'id' => '1',
            'title' => 'Logs',
            'description' => 'Zet logs aan of uit',
            'status' => 'true',
            'permission' => 'setting.log.toggle',
        ]);
        App_setting::create([
            'id' => '2',
            'title' => 'Requests',
            'description' => 'Requests voor permissions',
            'status' => 'true',
            'permission' => 'setting.requests.toggle',
        ]);
    }
}
