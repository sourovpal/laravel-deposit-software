<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Contract;
use App\Models\Deposit;
use App\Models\Event;
use App\Models\Order;
use App\Models\Product;
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

    public function product_added(Request $request)
    {
        if ($request->product_id > 0) {
            $userId = auth()->guard('web')->id();
            $product = Product::findOrFail($request->product_id);

            $order = Order::updateOrCreate(['product_id' => $request->product_id, 'user_id' => $userId], [
                'user_id' => $userId,
                'product_id' => $request->product_id,
                'status' => $request->status,
            ]);

            if (Order::where('product_id', $request->product_id)->where('user_id', $userId)->where('status', 1)->first()) {
                $profit = (($product->price + $product->price_to) * 0.5) / 100;
                $data = [
                    'user_id' => $userId,
                    'provider_id' => 0,
                    'type' => 'profit',
                    'amount' => $profit,
                    'status' => 1,
                    'deposit_date' => now()->format('Y-m-d'),
                    'note' => 'Product Added Profit 0.5%',
                ];
                Deposit::create($data);
            }


            if (!$request->ajax()) {
                return back()->withSuccess('Successfully added.');
            }
        }
        return back()->withError('Something want wrong!');
    }

    public function profile()
    {
        return view('profile');
    }

    public function deposit()
    {
        return view('deposit');
    }

    public function product()
    {
        $orders = Order::where('user_id', auth()->guard('web')->id())->get();
        return view('product', compact('orders'));
    }

    public function depositWithdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'transition_type' => 'required|integer|min:1|max:2',
            'note' => 'required|string|max:255',
            'screenshort' => 'nullable|image|mimes:png,jpg,jpeg,webp'
        ]);

        $type = 'withdraw';
        $amount = 0;
        $userId = auth()->guard('web')->id();
        $balance = Deposit::where('user_id', $userId)->where('status', 1)->sum('amount');
        if ($request->transition_type == 1) {
            $amount = 0 - $request->amount;
            $order = Order::where('user_id', $userId)->count();
            if ($order < 40) {
                return back()->withInput()->withError('Please Complete 40 product submit then withdrawal.');
            }
        } else {
            $amount = $request->amount;
            $type = 'deposit';
        }
        if (0 > $amount && $balance < $request->amount) {
            return back()->withInput()->withError('Your account balance is insufficient for cash withdrawal.');
        }

        $data = [
            'user_id' => $userId,
            'provider_id' => 1,
            'type' => $type,
            'amount' => e($amount),
            'status' => 0,
            'deposit_date' => now()->format('Y-m-d'),
            'note' => e($request->note),
        ];

        if ($request->hasFile('screenshort') && $file = $request->file('screenshort')) {
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '-' . md5(rand()) . '.' . $ext;
            $file->move(public_path('/document'), $filename);
            $data['address'] = $filename;
        } else if ($request->address && $request->address != '') {
            $data['address'] = $request->address;
        }

        $deposit = Deposit::create($data);
        return back()->withSuccess('Successfully Submitted.');
    }
}
