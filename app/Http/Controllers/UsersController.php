<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        $roles=Role::all();
        $users=User::all();
        return view('admin.users',\compact('users','roles'));
    }

    public function editRole($id){
        $user=User::find($id);
        $roles=Role::all();
        return view('admin.user.edit',\compact('user','roles'));
    }
    public function updateRole(Request $request,$id){
        $request->validate([
            'role'=>'required|integer'
        ]);
        $user=User::find($id);
        if($user->id_role==1){
            return \redirect()->route('user');
        }
        $user->id_role=$request->role;
        $user->save();
        return redirect()->route('user');
    }

}