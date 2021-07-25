@extends('layouts.auth')

@section('content')

<div class="auth-fluid">
  <!--Auth fluid left content -->
  <div class="auth-fluid-form-box">
    <div class="align-items-center d-flex h-100">
      <div class="app-card-body p-4">

        <!-- Logo -->
        <div class="auth-brand text-center text-lg-left">
          <a href="index.html" class="logo-dark">
            <span><img src="{{asset('public/assets/images/logo1.png')}}" alt="" height="60"></span>
          </a>

        </div>

        <!-- title-->
        <h4 class="mt-0">Free Sign Up</h4>
        <p class="text-muted mb-4">Don't have an account? Create your account, it takes less than a minute</p>

        <!-- form -->
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="mb-3">
            <label for="fullname">Full Name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="emailaddress">Email address</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="mb-3">
            <label for="password">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

          </div>
          <div class="form-group mb-0 text-center">
            <button class="btn app-btn-primary btn-block" type="submit"><i class="mdi mdi-account-circle"></i> Sign Up </button>
          </div>

        </form>
        <!-- end form-->

        <!-- Footer-->
        <footer class="footer footer-alt">
          <p class="text-muted">Already have account? <a href="{{route('login')}}" class="text-muted ml-1"><b>Log In</b></a></p>
        </footer>

      </div> <!-- end .card-body -->
    </div> <!-- end .align-items-center.d-flex.h-100-->
  </div>
  <!-- end auth-fluid-form-box-->

  <!-- Auth fluid right content -->
  <div class="auth-fluid-right text-center">
    <div class="auth-user-testimonial">
      <h2 class="mb-3">HOMETOWN</h2>

    </div> <!-- end auth-user-testimonial-->
  </div>
  <!-- end Auth fluid right content -->
</div>
@endsection