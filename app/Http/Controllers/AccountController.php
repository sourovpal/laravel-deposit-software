<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Contract;
use App\Models\Event;
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
        $event = Event::findOrFail(1);
        $contract = Contract::findOrFail(1);
        $certificate = Certificate::findOrFail(1);
        return view('home', compact('event', 'contract', 'certificate'));
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
