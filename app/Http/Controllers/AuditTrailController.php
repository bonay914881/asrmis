<?php

namespace App\Http\Controllers;

use App\Models\AuditTrail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditTrailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, User $users)
    {
        $total_users = User::where('unitcode', Auth::user()->unitcode)->count();

        $users = User::where('unitcode', Auth::user()->unitcode)
                                    ->whereHas('roles', function ($query) {
                                        $query->where('name', 'logistics')
                                        ->orWhere('name', 'personnel');
                                    });

        $search = $request->get('search');

        if ($search != "") {
            $users = User::where('lastname', 'LIKE', '%' . $search . '%')->orWhere('firstname', 'LIKE', '%' . $search . '%')->where('unitcode', Auth::user()->unitcode)->latest()->paginate(10)->setPath('');

            if (isset($users)) {
                $pagination = $users->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($users) > 0) {
                    return view('audittrail.index', 
                    [
                        'total_users' => $total_users,                 
                        'users' => $users
                    ])->withStatus($users)->withQuery($search);
                }
                $records = 'No';
                return view('audittrail.index', 
                [
                    'records' => $records, 
                    'total_users' => $total_users,                 
                    'users' => $users
                ])->withStatus($users)->withQuery($search);
            }
        }
        return view('audittrail.index', 
        [
            'total_users' => $total_users,    
            'users' => $users->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function show(AuditTrail $auditTrail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function viewlogs(User $user)
    {
        return view('audittrail.viewlogs', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuditTrail $auditTrail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuditTrail  $auditTrail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuditTrail $auditTrail)
    {
        //
    }
}
