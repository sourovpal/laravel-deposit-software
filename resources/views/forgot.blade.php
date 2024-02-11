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
      <h1 class="text-center text-light">Forget Password</h1>
      <p class="text-center text-light">Enter your valid mail address and we will send a link on you a link to reset password</p>
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <div class="login-content">
              <form action="{{ route('forgot.password.link') }}" method="post">
                @csrf
                <div class="form-group inputIcon">
                  <input type="text" name="email" value="{{ old('email') }}">
                  <i class="fa fa-envelope"></i>
                  @error('email') <span class="d-block form-error">{{ $message }}</span> @enderror
                </div>
                <div class="login-button my-4">
                  <button>Send Link</button>
                </div>
                <a href="{{ route('login') }}">Go Back To The Login Page</a>
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