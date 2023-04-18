<?php

namespace App\Http\Controllers;

use App\Models\Admin_contact;
use App\Models\Log_deleted_request;
use App\Models\Log_event;
use App\Models\Log_request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use PDF;

class Admin_contractController extends Controller
{
    public function index(): view
    {
        $requestsetting = \App\Models\App_setting::find(2);
        $requests = Admin_contact::all()->except('1');
        $requests = $requests->sortByDesc('id');
        return view('users/requests/requests', ['requests' => $requests, 'requestsetting' => $requestsetting]);
    }

    public function edit($id): view
    {
        $suggested = [];
//        $user = User::find($id);
        $request = Admin_contact::find($id);
//        str_contains(string $haystack, string $needle): bool
        $owned_urls = array('kantoor', 'admin', 'user', 'writer');
        $string = $request->description;
        foreach ($owned_urls as $url) {
            if (str_contains($string, $url)) { // mine version
                $suggests = Role::where('name', $url)->get();
                array_push($suggested, $suggests);
            }
        }
        $suggested = Collection::make($suggested);
        if ($suggested == ['']) {
            $suggested = 'Geen suggesties gevonden';
        }
        return view('users/requestadmin', ['request' => $request, 'suggested' => $suggested]);
    }


    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $log = new Log_event;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->logtype = 'request';
        $log->save();

        $oldrequest = Admin_contact::find($id);

        $log_request = new Log_request;
        $log_request->old_status = $oldrequest->status;
        $log_request->old_prio = $oldrequest->prio;

        $request->validate([
            'status' => ['required', 'string', 'max:255'],
            'prio' => ['required', 'string', 'max:255'],
        ]);

        $adminrequest = Admin_contact::find($id);
        $adminrequest->status = $request->status;
        $adminrequest->prio = $request->prio;
        $adminrequest->save();

        $User = User::find($adminrequest->user_id);
        if ($adminrequest->status == 'Accepted' || $adminrequest->status == 'Denied') {
            $User->revokePermissionTo('contacted');
        }
        elseif ($adminrequest->status !== 'Accepted' || $adminrequest->status !== 'Denied') {
            $User->givePermissionTo('contacted');
        }

        $log_request->log_event_id = $log->id;
        $log_request->eddited_id = $id;
        $log_request->new_status = $adminrequest->status;
        $log_request->new_prio = $adminrequest->prio;
        $log_request->is_deleted = 'no';
        $log_request->save();

        return redirect()->back();

    }


    public function delete($id)
    {
        $user = Auth::user();
        Admin_contact::find($id);

        $log = new Log_event;
        $log->user_id = $user->id;
        $log->user_email = $user->email;
        $log->logtype = 'deleted';
        $log->save();

        $oldrequest = Admin_contact::find($id);
        $log_deleted = new Log_deleted_request();
        $log_deleted->log_event_id = $log->id;
        $log_deleted->request_id = $id;
        $log_deleted->user_id = $oldrequest->user_id;
        $log_deleted->status = $oldrequest->status;
        $log_deleted->prio = $oldrequest->prio;
        $log_deleted->save();

        Admin_contact::destroy($id);
        $user->revokePermissionTo('contacted');
        return redirect('/admin/requests');
    }

    public function pdf($id)
    {
        $request = Admin_contact::find($id);
        $logs = Log_request::where('eddited_id', $id)->get();

        $data = [
            'title' => 'How To Create PDF File In Laravel 10 - Techsolutionstuff',
            'date' => date('d/m/Y'),
            'request' => $request,
            'logs' => $logs,
        ];

        $pdf = PDF::loadView('requestpdf', $data);
        return $pdf->download('Request_RQ' . $id . '.pdf');
    }
}
