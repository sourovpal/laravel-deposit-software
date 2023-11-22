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
                                {{ number_format(\App\Models\Deposit::where('type', 'profit')->where('status', 1)->whereDate('deposit_date', now()->format('Y-m-d'))->where('user_id', $user->id)->sum('amount'), 2) }} usdt
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="balance-info-content">
                            <h6>Total Balance</h6>
                            <p class="align-items-center">
                                <span class="material-icons">monetization_on</span>
                                {{ number_format(\App\Models\Deposit::where('user_id', $user->id)->where('status', 1)->sum('amount'), 2) }} usdt
                            </p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="balance-info-content">
                            <h6>Today's Balance</h6>
                            <p class="align-items-center">
                                <span class="material-icons">monetization_on</span>
                                {{ number_format(\App\Models\Deposit::where('type', 'deposit')->where('status', 1)->whereDate('deposit_date', now()->format('Y-m-d'))->where('user_id', $user->id)->sum('amount'), 2) }} usdt
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
                            <img src="{{ asset('/frontend/images/bit-product/lux.png') }}" alt="">
                        </div>
                    </div>
                    <!-- two  -->
                    <div class="col-5">
                        <div class="bit-product-img">
                            <img src="{{ asset('/frontend/images/bit-product/electronics.png') }}" alt="">
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
                            <img src="{{ asset('/frontend/images/bit-product/furni.png') }}" alt="">
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
    $product = null;
    $pending = \App\Models\Order::where('user_id', $user->id)->where('status', 0)->count();
    if($pending <= 0){
        $productsIds = \App\Models\Order::where('user_id', $user->id)->pluck('product_id')->toArray();
        $product = \App\Models\Product::where('position', $totalOrder+1)->whereNotIn('id', $productsIds)->where('status', 1)->first();
        if(!$product){
            $product = \App\Models\Product::inRandomOrder()->whereNotIn('id', $productsIds)->where('status', 1)->where('position', 0)->first();
        }
    }

    $total_balance = \App\Models\Deposit::where('user_id', $user->id)->where('status', 1)->sum('amount');
@endphp
    @if($product && $totalOrder <= 40 && $total_balance > 50)
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
                <input type="hidden" name="status" value="1">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if($pending > 0)
    <div class="modal" tabindex="-1" id="productModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Please Submit Pending Product</span></h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>            
          <div class="modal-footer">
            <a href="{{route('product')}}" class="btn btn-secondary">Go to Porduct List</a>            
          </div>
        </div>
      </div>
    </div>
    @endif
    
    
    @if($total_balance < 50)
    <div class="modal" tabindex="-1" id="productModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Can't Start Submiting Data Until The Balance Is 50</span></h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>            
          <div class="modal-footer">
            <a href="{{route('deposit')}}" class="btn btn-secondary">Go To Deposit</a>            
          </div>
        </div>
      </div>
    </div>
    @endif


@endsection

@push('custom_scripts')
<script>
    (function(){
        var product_id = '{{optional($product)->id??0}}';
        $('#showPorduct').click(function(){
            $('#productModal').modal('show');
            if(product_id > 0){
                $.ajax({
                    method:'post',
                    data:{
                        _token:'{{csrf_token()}}',
                        status:'0',
                        product_id,
                    },
                    success:function(res){
                        console.log(res);
                    }
                });
            }
        });

    })();
</script>
@endpush