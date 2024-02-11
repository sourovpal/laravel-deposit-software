@extends('app')

@section('content')
  <main id="register-bg">
    <!-- Login Header -->
    <div class="login-header">
      <div class="login-header-text mt-2">
        <img src="{{ asset('frontend/images/logo.png') }}" height="80" alt="">
      </div>
    </div>

    <!-- Login Form -->
    <section id="login-form">
        <div class="container">
          <h1 class="text-center text-light">Create Account</h1>
          <p class="text-center">Setup your Freelancer Account now</p>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="login-content">
                <form action="{{ url()->full() }}" method="post">
                  @csrf
                  <div class="form-group inputIcon">
                    <input required type="text" name="name" placeholder="" value="{{ old('name') }}">
                    <i class="fa fa-user"></i>
                    @error('name') <span class="d-block form-error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group inputIcon">
                    <input required type="text" name="email" value="{{ old('email') }}">
                    <i class="fa fa-envelope"></i>
                    @error('email') <span class="d-block form-error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group inputIcon">
                    <input required type="text" name="phone" id="phone" value="{{ old('phone') }}">
                    @error('phone') <span class="d-block form-error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group inputIcon">
                    <input required type="password" name="password">
                    <i class="fa fa-lock"></i>
                    @error('password') <span class="d-block form-error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group inputIcon">
                    <input required type="password" name="confirm_password">
                    <i class="fa fa-lock"></i>
                    @error('confirm_password') <span class="d-block form-error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group inputIcon">
                    <input required type="text" name="referral_code">
                    <i class="fa fa-users"></i>
                    @error('referral_code') <span class="d-block form-error">{{ $message }}</span> @enderror
                  </div>
                  <div class="login-button">
                    <button>Sign Up</button>
                  </div>
                </form>
                <div class="text-center">
                  <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                </div>
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
        </div>
      </section>
  </main>

@endsection