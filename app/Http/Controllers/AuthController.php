<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request){
        return view('register');
    }
    
    public function registerSubmit(Request $request){
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'phone' => 'required|max:100',
            'password' => 'required|string|max:100',
            'confirm_password' => 'required_with:password|same:password|max:100',
        ]);

        try{
            $data = [];
            $data['name']   = $request->name;
            $data['email']  = $request->email;
            $data['phone']  = $request->phone;
            $data['password'] = bcrypt($request->password);

            $user = User::create($data);
            Auth::guard('web')->login($user);

            return redirect()->route('home')->withSuccess('Successfully Sign Up');

        }catch(\Exception $e){
            return back()->withError($e);
        }

        return back()->withError('Invalid username or password');
    }

    public function login(Request $request){
        return view('login');
    }

    public function loginSubmit(Request $request){
        $request->validate([
            'email' => 'required|email|max:100|exists:users,email',
            'password' => 'required|string|max:100',
        ]);

        if(Auth::guard('web')->attempt($request->only(['email', 'password']))){
            $url = session()->get('url.intended');
            return redirect($url??route('home'))->withSuccess('Sign in successful.');
        }

        return back()->withError('Invalid username or password');
    }

    public function logout(){
        Auth::guard('web')->logout();
        return redirect()->route('login')->withSuccess('Successfully Logout.');
    }
}
