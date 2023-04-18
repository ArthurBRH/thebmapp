<?php

namespace App\Http\Controllers;

use App\Models\App_setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class SettingController extends Controller
{
    public function toggle($id)
    {
        $user = Auth::user();
        $setting = App_setting::find($id);
        if ($user->hasPermissionTo($setting->permission)) {
            if ($setting->status === 'true') {
                $setting->status = 'false';
                $setting->save();
            }
            elseif ($setting->status === 'false') {
                $setting->status = 'true';
                $setting->save();
            }
        }
        return redirect('/admin/panel');
    }
}
