@extends('app')
@push('custom_styles')
     <link href="{{ asset('backend/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')

<main id="profile-page">
    <!-- Profile Header -->
    <section id="profile-header">
        <a href="{{ url()->previous()??route('home') }}">
            Back
        </a>
        <div class="profile-header-info mt-3">
            <img src="https://placehold.co/80x80" alt="">
            <h4>{{ $user->name }}</h4>
            <p>Referral Code <span>{{ $user->referral_code }}</span></p>
            <div class=wrapper>
                <div class="range">
                    <input type="range" min="0" max="100" value="100" id="range" />
                    <div class="value">100%</div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2">
                    <div class="profile-info-content">
                        <h1>{{ number_format(\App\Models\Deposit::where('type', 'deposit')->where('status', 1)->whereDate('deposit_date', now()->format('Y-m-d'))->where('user_id', $user->id)->sum('amount'), 2) }} USDT</h1>
                        <p>Today's Balance</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="profile-info-content">
                        <h1>{{ number_format(\App\Models\Deposit::where('type', 'profit')->where('status', 1)->whereDate('deposit_date', now()->format('Y-m-d'))->where('user_id', $user->id)->sum('amount'), 2) }} USDT</h1>
                        <p>Today's Profit</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="profile-info-content">
                        <h1>{{ number_format(abs(\App\Models\Deposit::whereDate('deposit_date', now()->format('Y-m-d'))->where('status', 1)->where('user_id', $user->id)->where('amount', '<', 0)->sum('amount')), 2) }} USDT</h1>
                        <p>Today's Withdraw</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="profile-info-content">
                        <h1>{{ number_format(abs(\App\Models\Deposit::where('user_id', $user->id)->where('status', 1)->where('amount', '<', 0)->sum('amount')), 2) }} USDT</h1>
                        <p>Total Withdraw</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="profile-info-content">
                        <h1>{{ number_format(\App\Models\Deposit::where('user_id', $user->id)->where('status', 1)->sum('amount'), 2) }} USDT</h1>
                        <p>Total Balance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="profile-transaction" class="pb-5 mb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 mx-auto mb-3 mb-lg-0">
                    <h4>Products History</h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <td width="5%">#</td>
                                    <td width="10%">Image</td>
                                    <td width="45%">Title</td>
                                    <td width="18%">Price</td>
                                    <td width="10%">Status</td>
                                    <td width="10%">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                @if(optional($order->product) )
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td> <img style="width:80px;" src="{{ asset('frontend/images/product/'.$order->product->image)}}" alt=""></td>
                                    <td>{{$order->product->title}}</td>
                                    <td>${{$order->product->price}} - ${{ $order->product->price_to }}</td>
                                    <td>
                                        @if ($order->status == 0)
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif ($order->status == 1)
                                            <span class="badge badge-success">Complete</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->status == 0)
                                            <form action="{{route('product_added')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="status" value="1">
                                                <input type="hidden" name="product_id" value="{{ $order->product->id }}">
                                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br>
    @include('inc.bottom-navbar')
</main>

@endsection


@push('custom_scripts')
<script src="{{ asset('backend/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/libs/datatables/dataTables.bootstrap4.min.js') }}"></script>

@endpush