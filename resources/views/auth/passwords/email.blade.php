@extends('layouts.app')

@section('content')

<div class="row g-0 app-auth-wrapper">
  <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
    <div class="d-flex flex-column align-content-end">
      <div class="app-auth-body mx-auto">
        <div class="app-auth-branding mb-4">
          <a class="app-logo" href="{{ route('password.request') }}">
            <img class="logo-icon me-2" src="{{asset('public/assets/images/logo1.png')}}" alt="logo">
          </a>
        </div>
        <h2 class="auth-heading text-center mb-4">{{ __('Reset Password') }}</h2>

        <div class="auth-intro mb-4 text-center">
          Enter your email address below. We'll email you a link to a page where you can easily create a new password.
        </div>

        <div class="app-card-body p-4">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif
          <div class="auth-form-container text-left">
            <form class="auth-form resetpass-form" method="POST" action="{{ route('password.email') }}">
              @csrf

              <div class="email mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-right" placeholder="Your Email" required="required">{{ __('E-Mail Address') }}</label>

                <div class="">
                  <input id="email" type="email" class="form-control login-email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="">
                <button type="submit" class="btn app-btn-primary btn-block theme-btn mx-auto">
                  {{ __('Reset Password') }}
                </button>
              </div>
            </form>
            <div class="auth-option text-center pt-5">
              <a class="app-link" href="{{ route('login') }}">Log in</a>
              <!-- <span class="px-2">|</span> -->
              <!-- <a class="app-link" href="login.html">Sign up</a> -->
            </div>
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
            “With faith, discipline and selfless devotion to duty, there is nothing worthwhile that you cannot achieve.”
          </blockquote>
          <h5 class="mb-3 overlay-title">~ Muhammad Ali Jinnah</h5>
        </div>
      </div>
    </div>
    <!--//auth-background-overlay-->
  </div>
  <!--//auth-background-col-->
  <!--//row-->
</div>

@endsection