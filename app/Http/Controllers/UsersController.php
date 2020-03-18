<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index()
    {
        if(!Auth::check()&&Auth::user()->id_role<=2){
            return redirect()->back();
        }
        $roles=Role::all();
        $users=User::all();
        return view('admin.users',\compact('users','roles'));
    }
    public function add(){
        if(!Auth::check()&&Auth::user()->id_role<=2){
            return redirect()->back();
        }
        $roles=Role::all();
        return view('admin.user.add',\compact('roles'));
    }
    public function save(Request $request){
        if(!Auth::check()&&Auth::user()->id_role<=2){
            return redirect()->back();
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',   
        ]);
        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->id_role=$request->role;
        $user->save();
        return redirect()->route('user');
    }
    public function editRole($id){
        $user=User::find($id);
            if(!Auth::check()&&Auth::user()->id_role>=$user->id_role){
                return redirect()->back();
            }
        $roles=Role::all();
        return view('admin.user.edit',\compact('user','roles'));
    }
    public function updateRole(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'required|string|min:8',   
        ]);
        $user=User::find($id);
        if(!Auth::check()&&Auth::user()->id_role>=$user->id_role){
            return redirect()->back();
        }
        if($user->id==1 && $user->id_role==1){
            return \redirect()->back();
        }
        $user->id_role=$request->role;
        $user->save();
        return redirect()->route('user');
    }
    public function destroy($id){
        $user=User::find($id);
        if(!Auth::check()&&Auth::user()->id_role>=$user->id_role){
            return redirect()->back();
        }
        $user->delete();
        return \redirect()->route('user');
    }

}