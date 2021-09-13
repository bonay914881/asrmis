<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\UnitCode;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request, User $users)
    {
        $total_users = User::where('unitcode', Auth::user()->unitcode)->count();
        $users = User::where('unitcode', Auth::user()->unitcode);

        $count_adminusers = User::count();
        $adminusers = User::get();

        $search = $request->get('search');

        if ($search != "") {
            $users = User::where('lastname', 'LIKE', '%' . $search . '%')->orWhere('firstname', 'LIKE', '%' . $search . '%')->where('unitcode', Auth::user()->unitcode)->latest()->paginate(10)->setPath('');
            $adminusers = User::where('lastname', 'LIKE', '%' . $search . '%')->orWhere('firstname', 'LIKE', '%' . $search . '%')->latest()->paginate(10)->setPath('');

            if (isset($users)) {
                $pagination = $users->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($users) > 0) {
                    return view('users.index', 
                    [
                        'total_users' => $total_users,
                        'count_adminusers' => $count_adminusers,
                        'adminusers' => $adminusers,                        
                        'users' => $users
                    ])->withStatus($users)->withQuery($search);
                }
                $records = 'No';
                return view('users.index', 
                [
                    'records' => $records, 
                    'total_users' => $total_users,
                    'count_adminusers' => $count_adminusers,
                    'adminusers' => $adminusers,                    
                    'users' => $users
                ])->withStatus($users)->withQuery($search);
            }

            elseif (isset($adminusers)) {
                $pagination = $adminusers->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($adminusers) > 0) {
                    return view('users.index', 
                    [
                        'total_users' => $total_users,
                        'count_adminusers' => $count_adminusers,
                        'adminusers' => $adminusers,                        
                        'users' => $users
                    ])->withStatus($users)->withQuery($search);
                }
                $records = 'No';
                return view('users.index', 
                [
                    'records' => $records, 
                    'total_users' => $total_users,
                    'count_adminusers' => $count_adminusers,
                    'adminusers' => $adminusers,                    
                    'users' => $users
                ])->withStatus($adminusers)->withQuery($search);
            }
        }
        return view('users.index', 
        [
            'total_users' => $total_users,
            'count_adminusers' => $count_adminusers,
            'adminusers' => $adminusers,            
            'users' => $users->latest()->paginate(10)
        ]);
    }

    public function create()
    {        
        $roles = Role::get();
        $unitcodes = UnitCode::where('unitgroup_code', '=', 'ASR')->get();

        return view('users.create',compact('roles','unitcodes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'rankcode' => 'required',
            'unitcode' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:8'],
            'roles' => 'required',
        ]);        

        $pamu = $request->get('pamu');
        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['pamu'] = $pamu;
        $user = User::create($input);        
        $user->assignRole($request->input('roles'));

        return redirect()->route('users - create')->withStatus(__('User Successfully Created.'));
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        $unitcodes = UnitCode::where('unitgroup_code', '=', 'ASR')->get();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('users.edit', ['roles' => $roles, 'userRole' => $userRole, 'user' => $user, 'unitcodes' => $unitcodes]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'rankcode' => 'required',
            'unitcode' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',                         
            'email' => 'required',
            'roles' => 'required',
        ]);  

        $user->update([
            'rankcode' => $request->rankcode,
            'unitcode' => $request->unitcode,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'appendage' => $request->appendage,
            'email' => $request->email,
        ]);

        $user = User::find($user->id);
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();
        $user->assignRole($request->input('roles'));

        return redirect()->route('users')->withStatus(__('User Successfully Updated.'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users')->withStatus(__('User Successfully Deleted.'));
    }
}
