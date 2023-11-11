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
            <h4>Username</h4>
            <p>Referral Code <span>RZ323</span></p>
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
            <h4>Deposit</h4>
            <ul>
                <li>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="#">Tron 20</a>
                        </div>
                        <div>
                            TPnpCi7R97ri646irrv5xxcYnp59BXhonT
                        </div>
                        <div>
                            <button id="deposit_copy" class="btn btn-sm btn-primary">
                                <span class="material-icons">content_copy</span>
                            </button>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <a href="#">ERC 20</a>
                        </div>
                        <div>
                            TPnpCi7R97ri646irrv5xxcYnp59BXhonT
                        </div>
                        <div>
                            <button id="deposit_copy" class="btn btn-sm btn-primary">
                                <span class="material-icons">content_copy</span>
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