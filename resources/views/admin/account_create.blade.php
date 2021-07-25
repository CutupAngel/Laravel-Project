@extends('layouts.admin')
@section('content')

<!-- start page title -->
<div class="d-flex align-items-center justify-content-between">
  <h1 class="app-page-title mb-0">Create User</h1>
  <a href="{{route('admin_account')}}" class="btn app-btn-secondary">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Back
  </a>
</div><!-- /.d-flex jsutify-content-between END -->
<!-- end page title -->
<!-- start page title -->

<hr class="my-4">

<div class="row g-4 settings-section">
  <div class="col-12 col-md-4">
    <h3 class="section-title">Create User</h3>
    <div class="section-intro">
      Create new user
    </div>
  </div>
  <div class="col-12 col-md-8">
    <div class="app-card app-card-settings shadow-sm p-3">

      <div class="app-card-body p-4">
        <form class="settings-form" method="POST" action="{{route('admin_account_store')}}" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label class="form-label" for="simpleinput">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name..." name="name" value="{{ old('name') }}" required />
          </div>

          <div class="mb-3">
            <label class="form-label" for="example-email"> Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address..." name="email" value="{{ old('email') }}" required />
          </div>

          <div class="mb-3">
            <label class="form-label" for="example-email"> Phone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone number..." name="phone" value="{{ old('phone') }}" required />
          </div>

          <div class="mb-3">
            <label class="form-label" for="simpleinput">Role</label>
            <select class="form-control" name="role" id="example-select">
              <option selected value="1">Owner</option>
              <option value="2">Admin</option>
              <option value="4">Staff</option>
              <option value="5">Accounts Department</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label" for="password"> Password</label>
            <div class="input-group input-group-merge">
              <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password..." name="password" value="{{ old('password') }}" required />
              <div class="input-group-text">

                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                </svg>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="example-email"> Photo</label>
            <input type="file" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone number..." name="avatar" required />
          </div>
          <div class="form-group mb-0">
            <button class="btn app-btn-primary" type="submit">Create User</button>
          </div>
        </form>

      </div>
      <!--//app-card-body-->

    </div>
    <!--//app-card-->
  </div>
</div>
<!--//row-->


@endsection