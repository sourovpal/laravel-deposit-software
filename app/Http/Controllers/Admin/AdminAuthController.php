<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request){
        return view('backend.auth.login');
    }

    public function loginSubmit(Request $request){
        $request->validate([
            'email' => 'required|email|max:100|exists:admins,email',
            'password' => 'required|string|max:100',
        ]);

        if(Auth::guard('admin')->attempt($request->only(['email', 'password']))){
            $url = session()->get('url.intended');
            return redirect($url??route('dashboard.index'))->withSuccess('Admin Sign in successful.');
        }

        return back()->withError('Invalid username or password');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('dashboard.login')->withSuccess('Successfully Logout.');
    }

}
