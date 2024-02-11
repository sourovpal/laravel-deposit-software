@extends('app')
@push('custom_styles')
     <link href="{{ asset('backend/libs/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        #myTab{
            display: flex;
            justify-content: space-between
        }
        .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link{
            color: #5569ED !important;
            border: none;
            font-weight: bold;
        }
        .nav-tabs .nav-link, .nav-tabs .nav-link:hover, .nav-tabs .nav-link:focus{
            border: none !important;
        }
        #profile-transaction ul li{
            border: none;
        }
        .record-content-top{
            display: flex;
            justify-content: start;
            gap: 45px;
            align-items: center;
            padding: 0;
        }
        .record-content-bottom{
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0;
        }
        .record-content-top p, .record-content-bottom p{
            color: #080808;
        }
        .record-content-bottom span{
            color: #5569ED;
        }
        .record-content-bottom h6{
            font-weight: bold;
        }
    </style>
@endpush
@section('content')

<main id="profile-page">
    <!-- Profile Header -->
    <section id="profile-header">
        <a href="{{ url()->previous()??route('home') }}">
            Back
        </a>
        <div class="profile-header-info mt-3">
            <h4 class="pt-3">{{ $user->name }}</h4>
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
                    <!-- Nav Tab Start -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#all" role="tab" aria-controls="home" aria-selected="true">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="profile" aria-selected="false">Pending</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="contact" aria-selected="false">Completed</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="home-tab">
                            @foreach($orders as $order)
                                @if(optional($order->product) )
                                    <div class="card shadow mb-3">
                                        <div class="card-body">
                                            <div class="record-content-top">
                                                <img width="80" src="{{ asset('frontend/images/product/'.$order->product->image)}}" alt="">
                                                <p>{{ Str::limit($order->product->title, 30) }}</p>
                                            </div>
                                            <hr>
                                            <div class="record-content-bottom">
                                                <div class="record-amount">
                                                    <span>Total Amount</span>
                                                    <h6>${{$order->product->price}} - ${{ $order->product->price_to }}</h6>
                                                </div>
                                                <div class="record-profit">                                        
                                                    <span>Status</span>
                                                    <h6>
                                                        @if ($order->status == 0)
                                                            <p>Pending</p>
                                                        @elseif ($order->status == 1)
                                                            <p>Complete</p>
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                             @endforeach
                        </div>
                        <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="profile-tab">
                            
                            @foreach(\App\Models\Order::where('user_id', $user->id)->where('status', 0)->get() as $order)
                                @if(optional($order->product))
                                    @if ($order->status == 0)
                                        <form action="{{route('product_added')}}" method="post" class="text-right my-2">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <input type="hidden" name="product_id" value="{{ $order->product->id }}">
                                            <button type="submit" class="btn btn-sm btn-outline-info">Submit</button>
                                        </form>
                                    @endif
                                    <div class="card shadow mb-3">
                                        <div class="card-body">
                                            <div class="record-content-top">
                                                <img width="80" src="{{ asset('frontend/images/product/'.$order->product->image)}}" alt="">
                                                <p>{{ Str::limit($order->product->title, 30) }}</p>
                                            </div>
                                            <hr>
                                            <div class="record-content-bottom">
                                                <div class="record-amount">
                                                    <span>Total Amount</span>
                                                    <h6>${{$order->product->price}} - ${{ $order->product->price_to }}</h6>
                                                </div>
                                                <div class="record-profit">                                        
                                                    <span>Status</span>
                                                    <h6>
                                                        @if ($order->status == 0)
                                                            <p>Pending</p>
                                                        @elseif ($order->status == 1)
                                                            <p>Complete</p>
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>     
                                @endif
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="contact-tab">
                            @foreach(\App\Models\Order::where('user_id', $user->id)->where('status', 1)->get() as $order)
                                @if(optional($order->product) )
                                    <div class="card shadow mb-3">
                                        <div class="card-body">
                                            <div class="record-content-top">
                                                <img width="80" src="{{ asset('frontend/images/product/'.$order->product->image)}}" alt="">
                                                <p>{{ Str::limit($order->product->title, 30) }}</p>
                                            </div>
                                            <hr>
                                            <div class="record-content-bottom">
                                                <div class="record-amount">
                                                    <span>Total Amount</span>
                                                    <h6>${{$order->product->price}} - ${{ $order->product->price_to }}</h6>
                                                </div>
                                                <div class="record-profit">                                        
                                                    <span>Status</span>
                                                    <h6>
                                                        @if ($order->status == 0)
                                                            <p>Pending</p>
                                                        @elseif ($order->status == 1)
                                                            <p>Complete</p>
                                                        @endif
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                             @endforeach
                        </div>
                    </div>
                    <!-- Nav Tab End -->
                    {{-- <div class="table-responsive">
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
                                    <td>{{ Str::limit($order->product->title, 30) }}</td>
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
                    </div> --}}
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