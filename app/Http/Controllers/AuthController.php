<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB; 
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        return view('register');
    }

    public function registerSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'phone' => 'required|max:100',
            'password' => 'required|string|max:100',
            'confirm_password' => 'required_with:password|same:password|max:100',
            'referral_code' => 'required|string|max:100|exists:users,referral_code',
        ]);

        try {
            $str_result = 'ABCDEFGHIJKLMN1234567890OPQRSTUVWXYZ1234567890';
            $code = substr(str_shuffle($str_result), 0, 6);
            $refUser = User::where('referral_code', $request->referral_code)->first();

            $data = [];
            $data['name']   = $request->name;
            $data['email']  = $request->email;
            $data['phone']  = $request->phone;
            $data['password'] = bcrypt($request->password);
            $data['referral_code']  = $code;
            $data['referral_id']  = optional($refUser)->id ?? 0;
            $user = User::create($data);
            $deposit = Deposit::create([
                'user_id' => $user->id,
                'type' => 'deposit',
                'amount' => 20,
                'status' => 1,
                'deposit_date' => now()->format('Y-m-d'),
                'note' => 'Created new account so you got $20 gift',
            ]);
            Auth::guard('web')->login($user);

            return redirect()->route('home')->withSuccess('Successfully Sign Up');
        } catch (\Exception $e) {
            return back()->withError($e);
        }

        return back()->withError('Invalid username or password');
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:100|exists:users,email',
            'password' => 'required|string|max:100',
        ]);

        if (Auth::guard('web')->attempt($request->only(['email', 'password']))) {
            $url = session()->get('url.intended');
            return redirect($url ?? route('home'))->withSuccess('Sign in successful.');
        }

        return back()->withError('Invalid username or password');
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login')->withSuccess('Successfully Logout.');
    }

    // Forget Password 
    public function showForgotForm(){
        return view('forgot');
    }
    public function showResetLink(Request $request){
        $request->validate([
            'email' => 'required|email|max:100|exists:users,email',
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        
        $action_link = route('reset.password.form', ['token'=>$token,'email'=>$request->email]);
        $body = "We are received a request to reset the password for <b>Your app Name </b> account associated with ".$request->email.". You can reset your password by clicking the link below";
        
        \Mail::send('email-forgot',['action_link'=>$action_link,'body'=>$body], function($message) use ($request){
            $message->from('noreply@example.com','Fivetran');
            $message->to($request->email,'Your name')
                    ->subject('Reset Password');
      });

      return back()->withSuccess('We have e-mailed your password reset link!');
    }

}
