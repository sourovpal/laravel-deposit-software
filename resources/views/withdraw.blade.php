@extends('app')

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
                <div class="col-4">
                    <div class="profile-info-content">
                        <h1>{{ number_format(abs(\App\Models\Deposit::whereDate('deposit_date', now()->format('Y-m-d'))->where('user_id', $user->id)->where('amount', '<', 0)->sum('amount')), 2) }} USDT</h1>
                        <p>Today's Withdraw</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="profile-info-content">
                        <h1>{{ number_format(abs(\App\Models\Deposit::where('user_id', $user->id)->where('amount', '<', 0)->sum('amount')), 2) }} USDT</h1>
                        <p>Total Withdraw</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="profile-info-content">
                        <h1>{{ number_format(\App\Models\Deposit::where('user_id', $user->id)->sum('amount'), 2) }} USDT</h1>
                        <p>Total Balance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profile Transaction -->
    <section id="profile-transaction">
        <div class="container-fluid">
            <h4>Deposit</h4>
            <ul>
                <li>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="#">Tron 20</a>
                        </div>
                        <div id="tron_val">
                            TPnpCi7R97ri646irrv5xxcYnp59BXhonT
                        </div>
                        <div class="align-items-center">
                            <button id="tron_btn" class="btn btn-sm btn-primary">
                                <span class="material-icons">content_copy</span>
                                <span style="display: none;" id="tronMSG">Copied</span>
                            </button>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="#">ERC 20</a>
                        </div>
                        <div id="erc_val">
                            TPnpCi7R97ri646irrv5xxcYnp59BXhonT
                        </div>
                        <div>
                            <button id="erc_btn" class="btn btn-sm btn-primary">
                                <span class="material-icons">content_copy</span>
                                <span style="display: none;" id="ercMSG">Copied</span>
                            </button>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="profile-important-note">
                <h5>Important Note</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque nisi incidunt eaque vitae recusandae eius. Itaque ea, optio minima repellendus doloremque molestias quo similique nemo facilis soluta, distinctio magnam. Pariatur aliquid laboriosam eligendi ut eum officia consectetur debitis dolor autem assumenda! Ab ut at maxime labore, recusandae a magni quidem.</p>
            </div>
        </div>
    </section>
    @include('inc.bottom-navbar')
</main>

@endsection