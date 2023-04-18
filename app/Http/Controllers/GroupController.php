<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class GroupController extends Controller
{
    public function index(): view
    {
        $groups = Group::all();
        return view('groups/groups', ['groups' => $groups]);
    }

    public function group($id): view
    {
        $messages = Message::where('group_id', $id)->get();
        $group = Group::where('id', $id)->get();
        return view('groups/chat', ['group' => $group, 'messages' => $messages]);
    }
    public function settings($id): view
    {
        $users = User::all();
        $group = Group::find($id);
        return view('groups/group', ['group' => $group, 'users' => $users]);
    }
    public function create(): view
    {
        $permissions = Permission::all();
        return view('groups/create', ['permissions' => $permissions]);
    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'icon' => ['required', 'string', 'max:255'],
        ]);
        $permission = 'groups.';
        $permission .= strtolower($request->name);

        $group = new Group();
        $group->name = $request->name;
        $group->description = $request->description;
        $group->icon = $request->icon;
        $group->permission = $permission;
        $group->save();


        Permission::create([
            'name' => $permission,
        ]);
        $user = Auth::user();
        $perm = $permission;

        $user->givePermissionTo($perm);

        return redirect('/groups');
    }

    public function delete($id)
    {
        $group = Group::find($id);
        $perm_id = $group->permission;
        $perm = Permission::where('name', $perm_id)->get();
        Permission::destroy($perm);
        Group::destroy($id);
        return redirect('/groups');
    }
    public function user_remove($id, $user_id)
    {
        $group = Group::find($id);
        $perm_id = $group->permission;
        $perm = Permission::where('name', $perm_id)->get();
        $user = User::find($user_id);
        $user->revokePermissionTo($perm);
        return redirect()->back();    }
    public function user_add($id, $user_id)
    {
        $group = Group::find($id);
        $perm_id = $group->permission;
        $perm = Permission::where('name', $perm_id)->get();
        $user = User::find($user_id);
        $user->givePermissionTo($perm);
        return redirect()->back();    }
}
