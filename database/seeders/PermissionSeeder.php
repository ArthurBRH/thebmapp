<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'id' => '1',
            'name' => 'admin.*',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'supervisor on',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'supervisor can',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'contacted',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'app.setting.toggle',
            'guard_name' => 'web',
        ]);
        Permission::create([
            'name' => 'setting.log.toggle',
            'guard_name' => 'web',
        ]);

        $user = User::find(1);
        $user->GivePermissionTo('admin.*');
    }
}
