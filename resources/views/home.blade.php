@extends('app')

@section('content')
  

  
  @include('inc.header')

    <!-- Main Content -->
  <main>
    <!-- Header Profile -->
    <section id="header-profile">
      <div class="container-fluid">
        <div class="d-flex">
          <div class="header-profile-img">
            <img src="https://placehold.co/50x50" alt="Profile">
          </div>
          <div class="header-profile-content">
            <p>User Name</p>
            <hr class="profile-content-hr">
            <p>Referral Code</p>
          </div>
        </div>
      </div>
    </section>


    <!-- Product Slider -->
    <section id="product-slider">
      <div class="container-fluid">
        <div class="owl-carousel owl-theme">
          <div class="item">
            <img src="{{ asset('/frontend/images/product/product-1.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/product-2.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/product-3.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/product-4.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/product-5.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/product-6.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/product-7.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/product-8.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/product-9.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/product-10.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/thumb-1.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/thumb-2.jp') }}g" alt="Product Slider">
          </div>
          <div class="item">
            <img src="{{ asset('/frontend/images/product/thumb-3.jp') }}g" alt="Product Slider">
          </div>
        </div>
      </div>
    </section>

    <!-- Home Option -->
    <section id="home-options">
      <div class="container">
        <div class="row">
          <div class="col-4">
            <div class="home-option-content">
              <div class="home-option-icon">
                <img src="{{ asset('/frontend/images/home_option_icon/certificate.png') }}" alt="Home Option Menus">
              </div>
              <h6>Certificate</h6>
            </div>
          </div>
          <div class="col-4">
            <div class="home-option-content">
              <div class="home-option-icon">
                <img src="{{ asset('/frontend/images/home_option_icon/cash.png') }}" alt="Home Option Menus">
              </div>
              <h6>Withdraw</h6>
            </div>
          </div>
          <div class="col-4">
            <a href="{{ route('deposit') }}">
              <div class="home-option-content">
                <div class="home-option-icon">
                  <img src="{{ asset('/frontend/images/home_option_icon/deposit.png') }}" alt="Home Option Menus">
                </div>
                <h6>Deposit</h6>
              </div>
            </a>
          </div>
          <div class="col-4">
            <div class="home-option-content">
              <div class="home-option-icon">
                <img src="{{ asset('/frontend/images/home_option_icon/contract.png') }}" alt="Home Option Menus">
              </div>
              <h6>Contract</h6>
            </div>
          </div>
          <div class="col-4">
            <a href="#FAQ" data-toggle="modal">
              <div class="home-option-content">
                <div class="home-option-icon">
                  <img src="{{ asset('/frontend/images/home_option_icon/faq.png') }}" alt="Home Option Menus">
                </div>
                <h6>FAQ</h6>
              </div>
            </a>
          </div>
          <div class="col-4">
            <div class="home-option-content">
              <div class="home-option-icon">
                <img src="{{ asset('/frontend/images/home_option_icon/event.png') }}" alt="Home Option Menus">
              </div>
              <h6>Event</h6>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Brand Slider -->
    <section id="brand-slider">
      <div class="container-fluid">
        @include('inc.slider')
      </div>
    </section>
  </main>



  @include('inc.bottom-navbar')
  


@endsection