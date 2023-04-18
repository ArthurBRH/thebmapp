<?php

namespace App\Http\Controllers;

use App\Models\Admin_contact;
use App\Models\App_setting;
use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function dashboard(): view
    {
        $request_setting = App_setting::find(2);
        $user = Auth::user();
        $permissions = Permission::all();
        $contacts = Admin_contact::all();
        return view('dashboard', ['user' => $user, 'contacts' => $contacts, 'permissions' => $permissions, 'request_setting' => $request_setting]);
    }

    public function page1(): view
    {
        $user = Auth::user();
        $permissions = Permission::all();
        $contacts = Admin_contact::all();
        return view('pages.1', ['user' => $user, 'contacts' => $contacts, 'permissions' => $permissions]);
    }
    public function page2(): view
    {
        $user = Auth::user();
        $permissions = Permission::all();
        $contacts = Admin_contact::all();
        return view('pages.2', ['user' => $user, 'contacts' => $contacts, 'permissions' => $permissions]);
    }
    public function adminpanel(): view
    {
        $requestAmount = Admin_contact::where('status', 'Requested')->count();
        $Authuser = Auth::user();
        $users = User::all();
        $permissions = Permission::all();
        $roles = Role::all();
        $contacts = Admin_contact::all();
        $settings = App_setting::all();

        return view('admin.panel', ['Authuser' => $Authuser, 'settings' => $settings, 'users' => $users, 'roles' => $roles, 'contacts' => $contacts, 'requestAmount' => $requestAmount, 'permissions' => $permissions]);
    }

}
