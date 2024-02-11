<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Order;
use App\Models\Product;
use App\Models\AssignProduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('backend.user.index', compact('users'));
    }

    public function create(Request $request)
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Request $request)
    {
    }

    public function edit(Request $request)
    {
        $edit = User::findOrFail($request->id);
        return view('backend.user.edit', compact('edit'));
    }

    public function update(Request $request)
    {
        $edit = User::findOrFail($request->id);
        if ($request->amount > 0) {

            $data = [
                'user_id' => $edit->id,
                'provider_id' => 0,
                'type' => 'profit',
                'amount' => e(($request->amount * 25) / 100),
                'status' => 1,
                'deposit_date' => now()->format('Y-m-d'),
                'note' => 'Admin Added Profit',
            ];
            Deposit::create($data);
        }
        $percent_profit = 0.5;
        if ($request->level == 2) {
            $percent_profit = 1;
        } elseif ($request->level == 3) {
            $percent_profit = 1.5;
        } elseif ($request->level == 4) {
            $percent_profit = 2;
        }


        $user = [
            'name' => $request->name,
            'status' => $request->status,
            'amount' => $request->amount,
            'email' => $request->email,
            'phone' => $request->phone,
            'level' => $request->level ?? 1,
            'percent_profit' => $percent_profit,
        ];

        if ($request->password != '') {
            $user['password'] = bcrypt($request->password);
        }


        $edit->update($user);
        return back()->withSuccess('Updated Successful.');
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return back()->withSuccess('Deleted Successful.');
    }
    public function deposit(Request $request)
    {
        if ($request->amount > 0) {

            $data = [
                'user_id' => $request->id,
                'provider_id' => 1,
                'type' => 'deposit',
                'amount' => $request->amount,
                'status' => 1,
                'deposit_date' => now()->format('Y-m-d'),
                'note' => $request->note,
            ];
            Deposit::create($data);
        } else {
            return back()->withError('Please Enter Minimum 50 USDT!!');
        }
        return back()->withSuccess('Deposit Added Successful.');
    }

    public function addUser(Request $request)
    {
        return view('backend.user.create-user');
    }
    public function addUserCreate(Request $request)
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

            return redirect()->back()->withSuccess('Successfully Register A User.');
        } catch (\Exception $e) {
            return back()->withError($e);
        }

        return back()->withError('Invalid username or password');
    }

    public function reset(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->level = 1;
        $user->percent_profit = 0.5;
        $user->amount = 0;
        $user->save();
        Deposit::where('user_id', $user->id)->delete();
        Order::where('user_id', $user->id)->delete();
        AssignProduct::where('user_id', $user->id)->delete();

        return back()->withSuccess('Successfully Reset All Data.');
    }

    public function products(Request $request)
    {
        $user = User::findOrFail($request->id);
        $products = Product::orderBy('id', 'desc')->get();
        $assignIds = AssignProduct::where('user_id', $user->id)->pluck('product_id')->toArray();
        return view('backend.user.products', compact('products', 'user', 'assignIds'));
    }

    public function add_product(Request $request)
    {
        $assign = AssignProduct::where('product_id', $request->product_id)->where('user_id', $request->id)->first();
        if (is_null($assign)) {
            $assign = new AssignProduct();
            $assign->user_id = $request->id;
            $assign->product_id = $request->product_id;
            $assign->save();
            return back()->withSuccess('Successfully Assign Product.');
        }
        $assign->delete();
        return back()->withSuccess('Successfully Reset Assign Product.');
    }
}
