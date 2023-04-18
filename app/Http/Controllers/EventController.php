<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Event_detail;
use App\Models\Event_user;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Spatie\Permission\Models\Role;

class EventController extends Controller
{

    public function index(): view
    {
        function createDateRangeArray($strDateFrom,$strDateTo) {
            // Input two dates in the following formate -> (Y-m-d) and you will be returned an array of dates between the inputs
            $aryRange=array();
            $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
            $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

            if ($iDateTo>=$iDateFrom) {
                array_push($aryRange,date('m/d/y',$iDateFrom)); // first entry
                while ($iDateFrom<$iDateTo) {
                    $iDateFrom+=86400; // add 24 hours
                    array_push($aryRange,date('m/d/y',$iDateFrom));
                }
            }
            return $aryRange;
        }
      function halfHourTimes() {
        $formatter = function ($time) {
            if ($time % 3600 == 0) {
                return date('H:i', $time);
            } else {
                return date('H:i', $time);
            }
        };
        $halfHourSteps = range(0, 47*1800, 1800);
        return array_map($formatter, $halfHourSteps);
    }
        $roles = Role::all();
        $events = Event::all();
        $users = Event_user::all();
        $begindate = date("Y-m-d",strtotime('monday this week'));
        $enddate = date("Y-m-d",strtotime("sunday this week"));
        $week = createDateRangeArray($begindate, $enddate);
        $hourss = halfHourTimes();

        return view('events/events', ['roles' => $roles, 'events' => $events, 'week' => $week, 'hourss' => $hourss, 'users' => $users]);

    }
    public function create(): View
    {
        $users = User::all();
        return view('events.create', ['users' => $users]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:255'],
            'begin_time' => ['required', 'string', 'max:255'],
            'end_time' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'array', 'max:255'],
        ]);
        $event = new Event();
        $event->title = $request->title;
        $event->creator_id = Auth::user()->id;
        $event->save();

        $event_details = new Event_detail();
        $event_details->event_id = $event->id;
        $event_details->date = $request->date;
        $event_details->begin_time = $request->begin_time;
        $event_details->end_time = $request->end_time;
        $event_details->description = $request->description;
        $event_details->save();


        foreach ($request->user_id as $user) {
            $event_user = new Event_user();
            $event_user->event_id = $event->id;
            $event_user->user_id = $user;
            $event_user->save();
        }

        return redirect('/events');
    }
}
