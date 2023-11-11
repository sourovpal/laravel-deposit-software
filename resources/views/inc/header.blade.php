<div class="site-mobile-menu site-navbar-target">
  <div class="site-mobile-menu-header">
    <div class="site-mobile-menu-close mt-3">
      <span class="icon-close2 js-menu-toggle"></span>
    </div>
  </div>
  <div class="site-mobile-menu-body"></div>
</div>
<header class="site-navbar site-navbar-target" role="banner">
    <div class="container">
      <div class="row align-items-center position-relative">

        <div class="col-8">
          <div class="site-logo">
            <a href="{{ url('/') }}" class="font-weight-bold text-white">
              <img src="{{ asset('/frontend/images/logo.png') }}" alt="">
              Hybrid Theory
            </a>
          </div>
        </div>

        <div class="col-4 text-right">
          <span class="d-inline-block d-lg-block">
            <a href="#" class="text-black site-menu-toggle js-menu-toggle py-5">
              <span class="icon-menu h3 text-white"></span>
            </a>
          </span>

          <nav class="site-navigation text-right ml-auto d-none d-lg-none" role="navigation">
            <ul class="site-menu main-menu js-clone-nav ml-auto ">
              <li class="active"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
              <li><a href="{{ route('profile') }}" class="nav-link">Profile</a></li>
              <li><a href="{{ route('home') }}" class="nav-link">Withdraw</a></li>
              <li><a href="{{ route('home') }}" class="nav-link">Careers</a></li>
              <li><a href="{{ route('about') }}" class="nav-link">About</a></li>
              <li><a href="{{ route('home') }}" class="nav-link">Contact Us</a></li>
              <li><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
</header>