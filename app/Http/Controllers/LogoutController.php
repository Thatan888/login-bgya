<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function perform()
    {
        Session::flush();
        
        Auth::logout();

        // return redirect('login');
        return redirect()->route('home.app');
    }
}
