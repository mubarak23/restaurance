<?php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;

use session;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function _constructor(){
        $this->middleware(['auth', 'isAuth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::all();
        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::all();
        return view('roles.add_role', ['permissions' => $permissions]);
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
            'name' => 'required|max:100',
            'permissions' => 'required'
        ]);

        $new_role = new Role();
        $new_role->name = $request['name'];
        $role->save;
        $permissions = $request['permissions'];

        forEach($permissions as $permission){
            $pro_permission = Permission::where('id', '=', $permission)->firstorFail();
            $role = Role::where('name', $request['name'])->first();
            $role = givePermissionTo($pro_permission);
        }
        return reidrect()->route('roles.index')->with('flash_message', 'Role'. $role->name. 'has Been Added!');

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
