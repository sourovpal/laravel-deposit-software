<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            view()->share('user', auth()->guard('web')->user());
            return $next($request);
        });
    }

    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function start()
    {
        return view('start');
    }

    public function profile()
    {
        return view('profile');
    }

    public function deposit()
    {
        return view('deposit');
    }
}
