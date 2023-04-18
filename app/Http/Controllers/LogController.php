<?php

namespace App\Http\Controllers;

use App\Models\App_setting;
use App\Models\Group;
use App\Models\Log_deleted_request;
use App\Models\Log_event;
use App\Models\Log_request;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Pagination\LengthAwarePaginator as paginate;

class LogController extends Controller
{
    public function index()
    {
        $setting = App_setting::find(1);
        $logs = Log_event::all()->sortByDesc('id');

        return view('logs/logs', ['logs' => $logs, 'setting' => $setting]);


    }
}
