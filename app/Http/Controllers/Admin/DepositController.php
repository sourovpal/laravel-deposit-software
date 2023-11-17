<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    //
    public function index()
    {
        $deposits = Deposit::orderBy('id', 'desc')->get();

        return view('backend.deposit.index', compact('deposits'));
    }
    public function edit(Request $request)
    {
        $edit = Deposit::findOrFail($request->id);

        return view('backend.deposit.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        $deposit = Deposit::findOrFail($request->id);

        $user = User::findOrFail($deposit->user_id);
        $total = Deposit::where('provider_id', $user->id)->count();
        if ($user->referral_id > 0 && $total == 0 && $request->transition_type == 2) {
            $referralProfit = (($deposit->amount * 25) / 100);
            Deposit::create([
                'user_id' => $user->referral_id,
                'provider_id' => $user->id,
                'type' => 'deposit',
                'amount' => $referralProfit,
                'status' => 1,
                'deposit_date' => now()->format('Y-m-d'),
                'note' => 'You get 25% commission, your referral code is used by ' . $user->name . ' - ' . $user->referral_code,
            ]);
        }


        $type = 'withdraw';
        $amount = 0;
        if ($request->transition_type == 1 && 0 < $request->amount) {
            $amount = 0 - $request->amount;
        } else {
            $amount = $request->amount;
            $type = 'deposit';
        }

        $deposit->update([
            'type' => e($type),
            'amount' => e($amount),
            'status' => e($request->status),
            'deposit_date' => now()->format('Y-m-d'),
            'note' => e($request->note),
        ]);
        return back()->withSuccess('Updated Successful');
    }
}
