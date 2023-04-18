<?php

namespace App\Http\Controllers;

use App\Mail\UserInvite;
use App\Models\Admin_contact;
use App\Models\App_setting;
use App\Models\Invite_User;
use App\Models\Log_created_user;
use App\Models\Log_event;
use App\Models\Log_request;
use App\Models\User;
use App\Models\User_info;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Mockery\Generator\StringManipulation\Pass\Pass;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Role as RoleModel;

class UserController extends Controller
{
    public function index(): view
    {
        $users = User::all();
        $roles = Role::all();
        return view('users/users', ['roles' => $roles, 'users' => $users]);
    }

    public function show($id): view
    {
        $user = User::find($id);
        $roles = Role::all();
        $permissions = Permission::whereNotIn('id', [1, 2])->get();

        return view('users/edit', ['roles' => $roles, 'user' => $user, 'permissions' => $permissions]);
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);


        $colors = array("red", "blue", "black", "green", "orange");
        $icon = array_rand($colors, 2);
        $name = $request->name;
        $icon_letter = $name[0];
        $icon_letter = strtoupper($icon_letter);
        $user = new User();
        $user->name = $name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->icon_color = $colors[$icon[0]];
        $user->icon = $icon_letter;
        $user->is_active = 'Active';
        $user->save();

        $authUser = Auth::user();
        $log = new Log_event;
        $log->user_id = $authUser->id;
        $log->user_email = $authUser->email;
        $log->logtype = 'newuser';
        $log->save();

        $log_newuser = new Log_created_user();
        $log_newuser->log_event_id = $log->id;
        $log_newuser->user_id = $user->id;
        $log_newuser->name = $user->name;
        $log_newuser->email = $user->email;
        $log_newuser->save();

        event(new Registered($user));

        $request->validate([
            'color' => ['required', 'string', 'max:255'],
            'job' => ['required', 'string', 'max:255'],
        ]);

        User_info::create([
            'user_id' => $user->id,
            'color' => $request->color,
            'job' => $request->job,
        ]);

        return redirect('/users');
    }

    public function activate()
    {
        $user = Auth::user();

        $user->is_active = 'Active';
        $user->save();

        return redirect('/dashboard');
    }

    public function deactivate()
    {
        $user = Auth::user();

        $user->is_active = 'Inactive';
        $user->save();

        return redirect('/status');
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
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
//        $user_info->save([
//            'user_id' => $id,
//            'color' => $request->color,
//            'job' => $request->job,
//        ]);

        return redirect()->back();

    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();

    }

    public function contact_admin($id): view
    {
        $setting = App_setting::find(2);
        $user = Auth::user();
        $roles = Role::all();
        $permissions = Permission::whereNotIn('id', [1, 2])->get();

        return view('users/contactadmin', ['roles' => $roles, 'user' => $user, 'permissions' => $permissions, 'setting' => $setting]);
    }

    public function contact_admin_post(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'description' => ['required', 'string', 'max:255'],
        ]);
        $user->givePermissionTo('contacted');
        Admin_contact::create([
            'user_id' => $user->id,
            'description' => $request->description,
            'status' => 'Requested',
            'prio' => 'Low',
        ]);


        return redirect('/dashboard');

    }

    public function invitestore(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'role' => ['required', 'string', 'max:255'],
        ]);
        do {
            $code = random_int(100000, 999999);
        } while (Invite_User::where("invite_code", "=", $code)->first());
        $invite_code = $code;

        $user = new Invite_User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->invite_code = $invite_code;
        $user->is_used = '0';
        $user->save();

        $invite = $user->id;

        return redirect()->action(
            [UserController::class, 'mail'], ['invite' => $invite]
        );
    }

    public function mail($invite)
    {
        $invite = Invite_User::find($invite);

        $invite_email = $invite->email;
        $invite_name = $invite->name;
        $invite_code = $invite->invite_code;


        Mail::to($invite_email)->send(new UserInvite($invite, $invite_name, $invite_email, $invite_code));

        return redirect('/users')->with('status', 'De user is geïnvite');
    }

    public function invite(): View
    {
        return view('users.invite');
    }


    public function invitedUser(): View
    {
        return view('users.invited.code');
    }

    public function invitedUserPass(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'max:255']
        ]);
        $code = $request->code;
        $invite = Invite_User::where('invite_code', $code)->first();
        if ($invite !== NULL) {
            if ($invite->is_used === '0') {
                return view('users.invited.store', ['code' => $code]);
            } else {
                return redirect('/invite')->with('status', 'Code is niet geldig');
            }
        }
        else {
        return redirect('/invite')->with('status', 'Code is niet geldig');
    }
    }

    public function invitedUserStore(Request $request, $code): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);
        $invite = Invite_User::where('invite_code', $code)->first();
        if ($invite->is_used === '0') {
            $colors = array("red", "blue", "black", "green", "orange");
            $icon = array_rand($colors, 2);
            $name = $invite->name;
            $icon_letter = $name[0];
            $icon_letter = strtoupper($icon_letter);

            $user = new User();
            $user->name = $name;
            $user->email = $invite->email;
            $user->password = Hash::make($request->password);
            $user->icon_color = $colors[$icon[0]];
            $user->icon = $icon_letter;
            $user->is_active = 'Active';
            $user->save();

            $invite->is_used = '1';
            $invite->save();

            event(new Registered($user));

            User_info::create([
                'user_id' => $user->id,
                'color' => 'black',
                'job' => $invite->role,
            ]);


            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('status', 'Code is niet geldig');
        }
    }

}
