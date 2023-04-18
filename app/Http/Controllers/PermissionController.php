<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionController extends Controller
{
    public function supervisor_on()
    {
        $user = Auth::user();
        if ($user->hasPermissionTo('supervisor can')) {
            $user->givePermissionTo('supervisor on');
        } else {
            return redirect()->back();
        }

        return redirect()->back();
    }

    public function supervisor_off()
    {
        $user = Auth::user();
        $user->revokePermissionTo('supervisor on');

        return redirect()->back();
    }

    public function add($id, $perm_id)
    {
        $user = User::where('id', '=', $id)->first();
        $perm = Permission::where('id', '=', $perm_id)->first();

        $user->givePermissionTo($perm);

        return redirect()->back();
    }

    public function remove($id, $perm_id)
    {
        $user = User::where('id', '=', $id)->first();
        $perm = Permission::where('id', '=', $perm_id)->first();

        $user->revokePermissionTo($perm);

        return redirect()->back();
    }

    public function addToRole($id, $perm_id)
    {
        $role = Role::where('id', '=', $id)->first();
        $perm = Permission::where('id', '=', $perm_id)->first();

        $role->givePermissionTo($perm);

        return redirect()->back();
    }

    public function removeFromRole($id, $perm_id)
    {
        $role = Role::where('id', '=', $id)->first();
        $perm = Permission::where('id', '=', $perm_id)->first();

        $role->revokePermissionTo($perm);

        return redirect()->back();
    }

    public function index(): view
    {
        $permissions = Permission::all();
        return view('permissions/permissions', ['permissions' => $permissions]);
    }

    public function create(): view
    {
        $permissions = Permission::all();
        return view('permissions/create', ['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Permission::create([
            'name' => $request->name,
        ]);
        return redirect('/permissions');
    }

    public function delete($id)
    {
        Permission::destroy($id);
        return redirect('/permissions');
    }
}
