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
            <h4>{{$user->name}}</h4>
            <p>Referral Code <span>{{$user->referral_code}}</span></p>
            <div class=wrapper>
                <div class="range">
                    <input type="range" min="0" max="100" value="100" id="range" />
                    <div class="value">100%</div>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="profile-info-content">
                        <h1>0 USDT</h1>
                        <p>Today's Balance</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="profile-info-content">
                        <h1>0 USDT</h1>
                        <p>Today's Profit</p>
                    </div>
                </div>
                <div class="col-4">
                    <div class="profile-info-content">
                        <h1>512.16 USDT</h1>
                        <p>Total Balance</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profile Transaction -->
    <section id="profile-transaction">
        <div class="container-fluid">
            <h4>Transaction</h4>
            <ul>
                <li>
                    <a href="#">Deposit</a>
                </li>
                <li>
                    <a href="#">Withdraw</a>
                </li>
                <li>
                    <a href="#">Product Records</a>
                </li>
                <li>
                    <a href="#">Profile</a>
                </li>
                <li>
                    <a href="#">Edit Profile</a>
                </li>
                <li>
                    <a href="#">Update Withdraw Details</a>
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