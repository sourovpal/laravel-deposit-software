@extends('app')

@section('content')
  

  
  @include('inc.header')

    <main>
        <!-- Balance Info -->
        <section id="balance-info">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4">
                        <div class="balance-info-content">
                            <h6>Today's Profit</h6>
                            <p class="align-items-center">
                                <span class="material-icons">monetization_on</span>
                                10.50 usdt
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="balance-info-content">
                            <h6>Total Balance</h6>
                            <p class="align-items-center">
                                <span class="material-icons">monetization_on</span>
                                10.50 usdt
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="balance-info-content">
                            <h6>Frozen Balance</h6>
                            <p class="align-items-center">
                                <span class="material-icons">monetization_on</span>
                                10.50 usdt
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bit Product -->
        <section id="bit-product">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <!-- one  -->
                    <div class="col-7">
                        <div class="bit-product-button">
                            <button>Luxury</button>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="bit-product-img">
                            <img src="{{ asset('/frontend/images/bit-product/laxury.jpeg') }}" alt="">
                        </div>
                    </div>
                    <!-- two  -->
                    <div class="col-5">
                        <div class="bit-product-img">
                            <img src="{{ asset('/frontend/images/bit-product/laxury.jpeg') }}" alt="">
                        </div>
                    </div>                
                    <div class="col-7">
                        <div class="bit-product-button">
                            <button>Electronics</button>
                        </div>
                    </div>
                    <!-- three  -->
                    <div class="col-7">
                        <div class="bit-product-button">
                            <button>Furniture</button>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="bit-product-img">
                            <img src="{{ asset('/frontend/images/bit-product/laxury.jpeg') }}" alt="">
                        </div>
                    </div>
                    <!-- four  -->
                    <div class="col-5">
                        <div class="bit-product-img">
                            <img src="{{ asset('/frontend/images/bit-product/laxury.jpeg') }}" alt="">
                        </div>
                    </div>                
                    <div class="col-7">
                        <div class="bit-product-button">
                            <button>Cosmetics</button>
                        </div>
                    </div>
                    <!-- three  -->
                    <div class="col-7">
                        <div class="bit-product-button">
                            <button>Kitchenware</button>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="bit-product-img">
                            <img src="{{ asset('/frontend/images/bit-product/laxury.jpeg') }}" alt="">
                        </div>
                    </div>
                    <!-- six  -->
                    <div class="col-5">
                        <div class="bit-product-img">
                            <p>12/40</p>
                        </div>
                    </div>                
                    <div class="col-7">
                        <div class="bit-product-button">
                            <button>Drive Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



  @include('inc.bottom-navbar')
  


@endsection