<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_info;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class RoleController extends Controller
{
    use HasRoles;
    public function index(): view
    {
        $roles = Role::all();
        return view('roles/roles', ['roles' => $roles]);
    }
    public function create(): view
    {
        $roles = Role::all();
        return view('roles/create', ['roles' => $roles]);
    }
    public function roleadd($id, $role_id)
    {
        $user = User::find($id);

        $role = Role::find($role_id);

        $user->assignRole($role);

        return redirect()->back();
    }
    public function remove($id, $role_id)
    {
        $user = User::find($id);
        $role = Role::find($role_id);
        $user->removeRole($role);
        return redirect()->back();
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Role::create([
            'name' => $request->name,
        ]);
        return redirect('/roles');
    }

    public function delete($id)
    {
        Role::destroy($id);
        return redirect('/roles');
    }


    public function show($id): view
    {
        $role = Role::find($id);
        $permissions = Permission::all();

        return view('roles/edit', ['role' => $role,'permissions' => $permissions]);
    }
    public function update(Request $request, $id)
    {
        $role = User::find($id);
        $user_info = User_info::where('user_id', $id)->first();

        $request->validate([
            'color' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
            'is_active' => ['required', 'string', 'max:255'],
        ]);

        $user->is_active = $request->is_active;
        $user->save();

        $user_info->color = $request->color;
        $user_info->job = $request->job;
        $user_info->save();

        return redirect()->back();

    }

}
