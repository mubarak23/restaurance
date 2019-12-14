<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Auth;

use session;

class PermissionController extends Controller
{

    public function __constructor(){
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permissions = Permission::all();
        return view('permissions.index')->with('permissions', $permissions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('permissions.create')->with('roles', $roles);
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
        $this->validate($request, [
            'name' => 'required|max:40'
        ]);
        $permission = new Permission();
        $permission->name = $request['name'];
        $roles = $request['roles'];

        if(!empty($request['roles'])){
            foreach($roles as $role){
                $role_db = Role::where('id', '=', $role)->frstOrFail();
                $permission = Permission::where('name', '=', $request['name'])->first();
                $role_db->givePermissionTo($permission);

            }
        return view('permissions.index')->with('flash_message', 'Permission'. $permission->name.' added!');

            
            
        }
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
        //
        $permission = Permission::findOrFind($id);
        return view('permissions.edit', compact('permission'));

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
        //
        $permission = Permission::findOrFind($id);
        $this->validate($request, [
            'name' => 'required|max:40'
        ]);
        $input = $request->all();
        $permission->fill($input)->save();
        return redirect()->route('permissions.index')->with('flash_message', 'Permssion'. $permission->name. 'updated!');

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
        $permission = Permission::findOrFind($id);
        if($permission->name == 'adminsterative role & permissions'){
            return redirect('permissions.index')->with('flash_message', 'Cannot delete this permission');
        }
        $permission->deleted();
        return redirect('permissions.index')->with('flash_message', 'Permission Deleted!');
       
    }
}
