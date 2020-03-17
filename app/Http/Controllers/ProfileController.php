<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class ProfileController extends Controller
{
    public function index()
    {
        $user=User::find(Auth::id());
        return view('admin.profile',\compact('user'));
    }
    public function edit()
    {
        $user=User::find(Auth::id());
        return view('admin.profile.edit',\compact('user'));
    }
    public function update(Request $request){
        $user=User::find(Auth::id());
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return \redirect()->route('profile');
        
    }
}
