<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Permission $permissions)
    {
        $total_permissions = Permission::count();
        $search = $request->get('search');

        if ($search != "") {
            $permissions = Permission::where('name', 'LIKE', '%' . $search . '%')->latest()->paginate(10)->setPath('');
            if (isset($permissions)) {
                $pagination = $permissions->appends(array(
                    'search' => $request->get('search')
                ));
                if (count($permissions) > 0) {
                    return view('users.permissions.index', 
                    [
                        'total_permissions' => $total_permissions,
                        'permissions' => $permissions
                    ])
                    ->withStatus($permissions)->withQuery($search);
                }
                $records = 'No';
                return view('users.permissions.index', 
                [
                    'records' => $records, 
                    'total_permissions' => $total_permissions,
                    'permissions' => $permissions
                ])
                ->withStatus($permissions)->withQuery($search);
            }
        }
        return view('users.permissions.index', 
        [
            'total_permissions' => $total_permissions,
            'permissions' => $permissions->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.permissions.create');
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
            'name' => 'required|unique:permissions,name',
        ]);

        $permissions = Permission::create([
            'name' => $request->input('name')
        ]);

        return redirect()->route('permissions - create')->withStatus(__('Permissions Successfully Created.'));
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
    public function edit(Permission $permission)
    {
        $permission = Permission::find($permission->id);

        return view('users.permissions.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $permission = Permission::find($permission->id);
        $permission->name = $request->input('name');
        $permission->save();

        return redirect()->route('permissions')->withStatus(__('Permissions Successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        Permission::where('id', $permission->id)->delete();
        return redirect()->route('permissions')->withStatus(__('Permissions Successfully Deleted.'));
    }
}
