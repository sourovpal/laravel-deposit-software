@extends('app')

@section('content')
  
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>
  @include('inc.header')

  <!-- Main Content -->
  <main>
    <!-- About Us -->
    <section id="about-us">
      <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="about-content">
              <h4>Hybrid Theory</h4>
              @foreach (\App\Models\About::where('id', 1)->get() as $about)
                <h3>{{ $about->title }}</h3>
                <div class="text-center">
                  <img src="{{ asset('/frontend/images/logo.png') }}" alt="">
                  <p>{!! $about->content !!}</p>
                </div>
              @endforeach
            </div>
          </div>
          <div class="col-md-2"></div>
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


  <!-- Fixed bottom navbar  -->
  @include('inc.bottom-navbar')
  


@endsection