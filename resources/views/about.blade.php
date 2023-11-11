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
              <h3>About Us</h3>
              <div class="text-center">
                <img src="images/logo.png" alt="">
                <p>Helping businesses grow through the magic of creative and the science of digital marketing, we've remained doers who empathize with the real-world needs of businesses: from launching and growing our own products to open sourcing our own marketing plans, we practice what we preach.</p>
              </div>
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