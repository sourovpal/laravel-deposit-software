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

        $amount = $request->amount;
        $type = 'withdraw';
        if (0 > $amount) {
            $type = 'withdraw';
        } else {
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
