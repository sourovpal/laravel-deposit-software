@extends('app')

@section('content')
  <main id="login-bg">
    <!-- Login Header -->
    <div class="login-header">
      <div class="login-header-text my-5">
        <img src="{{ asset('frontend/images/logo.png') }}" height="80" alt="">
      </div>
    </div>

    <!-- Login Form -->
    <section id="login-form">
      <h1 class="text-center text-light">Welcome Back!</h1>
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="login-content">
              <form action="{{ route('login.submit') }}" method="post">
                @csrf
                <div class="form-group inputIcon">
                  <input type="text" name="email" value="{{ old('email') }}">
                  <i class="fa fa-envelope"></i>
                  @error('email') <span class="d-block form-error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group inputIcon">
                  <input type="password" name="password">
                  <i class="fa fa-lock"></i>
                  @error('password') <span class="d-block form-error">{{ $message }}</span> @enderror
                </div>
                <div class="text-right">
                  <a href="{{ route('forgot.password.form') }}">Forget Password?</a>
                </div>
                <div class="login-button mb-3">
                  <button>Login</button>
                </div>
                <a href="{{ route('register') }}" class="text-light">Create a New Account</a>
              </form>
              <div class="mt-5 text-center">
                <p>Copyright also ©2023 Fivetran Inc.</p>
              </div>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </section>
  </main>

@endsection