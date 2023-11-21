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
                            @php
                                $totalOrder = \App\Models\Order::where('user_id', $user->id)->where('status', 1)->count();
                            @endphp
                            <p>{{ $totalOrder }}/40</p>
                        </div>
                    </div>                
                    <div class="col-7">
                        <div class="bit-product-button">
                            <button id="showPorduct">Drive Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



  @include('inc.bottom-navbar')

  @php
    $product = \App\Models\Product::where('position', $totalOrder+1)->first();
    if(!$product){
        $product = \App\Models\Product::inRandomOrder()->where('position', 0)->first();
    }
    
    @endphp
    @if($product && $totalOrder <= 40 )
    <div class="modal" tabindex="-1" id="productModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Product / <span class="text-muted">{{ $product->title }}</span></h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="d-flex justify-content-center align-items-center">
                <img style="width: 60%;" class="img-thumbnail" src="{{ asset('frontend/images/product/'.$product->image) }}" alt="">
            </div>
            <br><br>
            <div class="d-flex justify-content-center align-items-center">
                <p>Price: ${{ $product->price }} - ${{ $product->price_to }}</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form action="" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endif

@endsection

@push('custom_scripts')
<script>
    (function(){

        $('#showPorduct').click(function(){
            $('#productModal').modal('show');
        });

    })();
</script>
@endpush