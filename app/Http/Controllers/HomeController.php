<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user; 
class HomeController extends Controller
{
    function home()

    {
        $user= user::first();
        
        return view('dashboard')->with(compact('user'));
    }
}
