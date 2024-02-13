<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
// use Spatie\Permission\Models\Permission as ModelsPermission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth');

    }
    public function index()
    {
        $permissions = Permission::all(); //Get all permissions

        return view('admin.permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::get(); //Get all roles

        // return view('permissions.create')->with('roles', $roles);
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
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $guard_name= 'web';
        $permission = new Permission();
        $permission->name = $name;
        $permission->guard_name = $guard_name;


        $permission->save();


        return redirect()->route('permissions.index')
            ->with('flash_message',
             'Permission'. $permission->name.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('permissions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $permission = Permission::findOrFail($id);

        // return view('permissions.edit', compact('permission'));
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
        // $permission = Permission::findOrFail($id);
        // $this->validate($request, [
        //     'name'=>'required|max:40',
        // ]);
        // $input = $request->all();
        // $permission->fill($input)->save();

        // return redirect()->route('permissions.index')
        //     ->with('flash_message',
        //      'Permission'. $permission->name.' updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
