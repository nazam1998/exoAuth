<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Role::all();
        return view('admin.roles',\compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.role.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role'=>'required|unique:roles'
        ]);
        $role=new Role();
        $role->role=$request->role;
        $role->save();
        return \redirect()->route('role');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id<=2){
            return \redirect()->route('role');
        }
        
        $role=Role::find($id);
        return \view('admin.role.edit',\compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($id<=2){
            return \redirect()->route('role');
        }
        $request->validate([
            'role'=>'required|unique:roles,role,'.$id
        ]);
        $role=Role::find($id);
        $role->role=$request->role;
        $role->save();
        return \redirect()->route('role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id<=2){
            return \redirect()->route('role');
        }
        $role=Role::find($id);
        $role->delete();
        return \redirect()->route('role');
    }
}
