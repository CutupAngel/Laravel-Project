@extends('layouts.client')
@section('content')


<div class="content">

  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">

        <h4 class="page-title">Change Password</h4>
      </div>
    </div>
  </div>
  <!-- end page title -->

  <div class="row">
    <div class="col-12">
      <div class="app-card app-card-progress-list h-100 shadow-sm">
        <div class="app-card-body p-4">
          <form method="POST" action="{{ route('change_client_password') }}">
            @csrf

            @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
            @endforeach

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

              <div class="col-md-6">
                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
              </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

              <div class="col-md-6">
                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
              </div>
            </div>

            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn app-btn-primary">
                  Update Password
                </button>
              </div>
            </div>
          </form>

        </div><!-- end card-body-->
      </div> <!-- end card-->
    </div> <!-- end col -->
  </div>


  <!-- end row-->

</div>


@endsection