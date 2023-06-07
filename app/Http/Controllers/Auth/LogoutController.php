<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Auth;
use Session;

class LogoutController extends Controller
{

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}
