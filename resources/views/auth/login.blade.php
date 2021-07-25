@extends('layouts.auth')

@section('content')


<div class="row g-0 app-auth-wrapper">
  <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
    <div class="d-flex flex-column align-content-end">
      <div class="app-auth-body mx-auto">
        <div class="app-auth-branding mb-4">
          <a class="app-logo" href="{{ route('login') }}">
            <img class="logo-icon me-2" src="{{asset('public/assets/images/logo1.png')}}" alt="logo">
          </a>
        </div>
        <h2 class="auth-heading text-center mb-5">Log in to Portal</h2>
        <div class="auth-form-container text-start">
          <!-- form -->
          <form class="auth-form login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="email mb-3">
              <label for="emailaddress">Email address</label>
              <input id="emailaddress" type="email" class="form-control signin-email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required autocomplete="email" autofocus>
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="password mb-3">
              <label for="password">Password</label>
              <input id="password" type="password" class="form-control signin-password @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
              <div class="extra mt-3 row justify-content-between">
                <div class="col-6">
                  <!-- <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="RememberPassword">
                    <label class="form-check-label" for="RememberPassword">
                      Remember me
                    </label>
                  </div> -->
                </div>
                <!--//col-6-->
                <div class="col-6">
                  <div class="forgot-password text-end">
                    <a href="{{ route('password.request') }}">Forgot password?</a>
                  </div>
                </div>
                <!--//col-6-->
              </div>
              <!--//extra-->
            </div>
            <div class="form-group mb-0 text-center">
              <button class="btn app-btn-primary w-100 theme-btn mx-auto" type="submit"><i class="mdi mdi-login"></i> Log In </button>
            </div>
          </form>
          <!-- <div class="auth-option text-center pt-5">No Account? Sign up <a class="text-link" href="signup.html">here</a>.</div> -->
        </div>
        <!--//auth-form-container-->

      </div>
      <!--//auth-body-->

      <footer class="app-auth-footer">
        <div class="container text-center py-3">
          <small class="copyright">
            Copyright 2021 | HomeTownSecurity | All rights reserved.
          </small>
        </div>
      </footer>
      <!--//app-auth-footer-->
    </div>
    <!--//flex-column-->
  </div>
  <!--//auth-main-col-->
  <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
    <div class="auth-background-holder">
    </div>
    <div class="auth-background-mask"></div>
    <div class="auth-background-overlay p-3 p-lg-5">
      <div class="d-flex flex-column align-content-end h-100">
        <div class="h-100"></div>
        <div class="overlay-content p-3 p-lg-4 rounded">
          <blockquote>
            “You will have to make up for the smallness of your size by your courage and selfless devotion to duty, for it is not life that matters, but the courage, fortitude and determination you bring to it.”
          </blockquote>
          <h5 class="mb-3 overlay-title">~ Muhammad Ali Jinnah</h5>
        </div>
      </div>
    </div>
    <!--//auth-background-overlay-->
  </div>
  <!--//auth-background-col-->

</div>
<!--//row-->

@endsection