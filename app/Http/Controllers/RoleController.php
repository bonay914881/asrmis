<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Role $roles)
    {
        $total_roles = Role::count();
        $search = $request->get('search');

        if ($search != "") {
            $roles = Role::where('name', 'LIKE', '%' . $search . '%')->latest()->paginate(10)->setPath('');
            if (isset($roles)) {
                $pagination = $roles->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($roles) > 0) {
                    return view('users.roles.index', 
                    [
                        'total_roles' => $total_roles,
                        'roles' => $roles
                    ])
                    ->withStatus($roles)->withQuery($search);
                }
                $records = 'No';
                return view('users.roles.index', 
                [
                    'records' => $records, 
                    'total_roles' => $total_roles,
                    'roles' => $roles
                ])
                ->withStatus($roles)->withQuery($search);
            }
        }
        return view('users.roles.index', 
        [
            'total_roles' => $total_roles,
            'roles' => $roles->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::get();
        return view('users.roles.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create([
            'name' => $request->input('name')
        ]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles - create')->withStatus(__('Roles Successfully Created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        return view('users.roles.edit',compact('role','permission','rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles')->withStatus(__('Roles Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles')->withStatus(__('Roles Successfully Deleted.'));
    }
}
