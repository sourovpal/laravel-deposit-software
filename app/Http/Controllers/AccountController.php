<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Contract;
use App\Models\Deposit;
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

    public function depositWithdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'transition_type' => 'required|integer|min:1|max:2',
            'note' => 'required|string|max:255',
        ]);
        $type = 'withdraw';
        $amount = 0;
        $userId = auth()->guard('web')->id();
        $balance = Deposit::where('user_id', $userId)->where('status', 1)->sum('amount');
        if ($request->transition_type == 1) {
            $amount = 0 - $request->amount;
        } else {
            $amount = $request->amount;
            $type = 'deposit';
        }
        if (0 > $amount && $balance < $request->amount) {
            return back()->withInput()->withError('Your account balance is insufficient for cash withdrawal.');
        }
        $deposit = Deposit::create([
            'user_id' => $userId,
            'provider_id' => 1,
            'type' => $type,
            'amount' => e($amount),
            'status' => 0,
            'deposit_date' => now()->format('Y-m-d'),
            'note' => e($request->note),
        ]);
        return back()->withSuccess('Successfully Submitted.');
    }
}
