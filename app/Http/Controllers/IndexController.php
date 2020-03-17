<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class IndexController extends Controller
{
    public function index()
    {
        $users=User::inRandomOrder()->take(3)->get();
        return view('index',\compact('users'));
    }
}
