<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\User;

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
        $edit->update([
            'name' => $request->name,
            'status' => $request->status,
            'amount' => $request->amount,
        ]);
        return back()->withSuccess('Updated Successful.');
    }

    public function destroy(Request $request)
    {
    }
}
