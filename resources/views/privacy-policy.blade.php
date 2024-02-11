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
              @foreach (\App\Models\About::where('id', 1)->get() as $about)
                <h3>Privacy Policy</h3>
                <div class="text-center">
                    <img src="{{ asset('/frontend/images/logo.png') }}" alt="">
                    <p>   
                    Fivetran Inc. ("Fivetran") respects your right to privacy. This Privacy Notice explains who we are, how we collect, store, share and use personal data about you, and how you can exercise your privacy rights. This Privacy Notice applies to personal data that we collect, including through our website at www.fivetran.com, within our product(s) and on other websites that Fivetran operates and that link to this policy ("collectively Websites”).
                    If you have any questions or concerns about our use of your personal data, then please contact us using the contact details provided at the bottom of this Privacy Notice.
                    </p>
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