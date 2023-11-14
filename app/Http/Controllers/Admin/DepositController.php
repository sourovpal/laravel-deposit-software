<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    //
    public function index(){
        return [
            'total_deposit' => Deposit::where('type', 'deposit')->whereDate('deposit_date', date('Y-m-5'))->where('user_id', 7)->sum('amount'),
            'total_withdraw' => Deposit::where('amount', '<', 0)->sum('amount'),
            'current_balance' => Deposit::sum('amount'),
        ];
        return Deposit::sum('amount');        
    }

}
