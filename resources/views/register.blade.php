@extends('app')

@section('content')
  <main id="login-bg">
    <!-- Login Header -->
    <div class="login-header">
      <div class="login-header-logo">
        <img src="{{ asset('/frontend/logo.png') }}" alt="">
      </div>
      <div class="login-header-text">
        <h1>Hybrid Theory</h1>
      </div>
    </div>

    <!-- Brand Slider -->
    <section id="login-brand-slider">
      <div class="container-fluid">
        @include('inc.slider')
      </div>
    </section>

    <!-- Login Form -->
    <section id="login-form">
        <div class="container">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="login-content">
                <div class="register-button">
                  <a href="{{ route('login') }}">Login</a>
                </div>
                <form action="{{ route('register.submit') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
                    @error('name') <span class="d-block form-error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <input type="text" name="email" placeholder="Email" value="{{ old('email') }}">
                    @error('email') <span class="d-block form-error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <input type="number" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                    @error('phone') <span class="d-block form-error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" placeholder="Password">
                    @error('password') <span class="d-block form-error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                    @error('confirm_password') <span class="d-block form-error">{{ $message }}</span> @enderror
                  </div>
                  <div class="login-button">
                    <button>Register</button>
                  </div>
                </form>
                <a href="#" class="login-forget">Forget Password?</a>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
      </section>

    <!-- Login Brand -->
    <section id="login-brand">
      <div class="container-fluid">
        @include('inc.brands')
      </div>
    </section>

    <!-- Login Footer -->
    <section id="login-footer">
        <div class="container">
          <p>&copy; GA Agency 2023. All Rights Reserved. Privacy Policy.</p>
        </div>
    </section>
  </main>

@endsection