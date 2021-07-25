@extends('layouts.account')
@section('content')


<!-- start page title -->
<div class="d-flex align-items-center justify-content-between">
  <h1 class="app-page-title mb-0">Create Client</h1>
  <a href="{{route('account_client')}}" class="btn app-btn-secondary mb-2">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Back
  </a>
</div><!-- /.d-flex jsutify-content-between END -->
<!-- end page title -->

<hr class="my-2">

<div class="row">
  <div class="col-12">
    <div class="app-card app-card-progress-list h-100 shadow-sm">
      <div class="app-card-body p-4">
        @if ($errors->any())
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <form method="POST" action="{{route('account_client_update', $client->id)}}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" for="simpleinput">Name</label>
                <input type="text" id="simpleinput" value="{{$client->name}}" class="form-control @error('name') is-invalid @enderror" name="name" required>
              </div>

              <div class="mb-3">
                <label class="form-label" for="example-email">Contact Email</label>
                <input type="email" value="{{$client->email}}" id="example-email" class="form-control @error('email') is-invalid @enderror" name="email" required>
              </div>

              <div class="mb-3">
                <label class="form-label" for="simpleinput">Contact Number</label>
                <input type="text" value="{{$client->phone}}" id="simpleinput" class="form-control @error('phone') is-invalid @enderror" name="phone" required>
              </div>

              <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password">
                  <div class="input-group-text">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
                      <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z" />
                      <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                    </svg>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label" for="example-date">Payments</label>
                <input type="text" value="{{$client->payment}}" id="simpleinput" class="form-control @error('payment') is-invalid @enderror" name="payment" required>
              </div>

              <div class="mb-3">
                <label class="form-label" for="example-select">Payment Terms</label>
                <select class="form-control" name="payment_term" id="example-select">
                  <option selected value="7">7 Days</option>
                  <option value="15">14 Days</option>
                  <option value="30">30 Days</option>
                  <option value="45">45 Days</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="example-select">Invoice Period</label>
                <select class="form-control" name="invoice_period" id="example-select">
                  <option selected value="0">End of Month</option>
                  <option value="1">Start of Month</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="example-fileinput">Avatar</label>
                <input type="file" id="example-fileinput" name="avatar" class="form-control form-control-file" require>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label class="form-label" for="simpleinput">Patrols</label>
                <input type="text" value="{{$client->patrol}}" id="simpleinput" class="form-control @error('patrol') is-invalid @enderror" name="patrol" required>
              </div>

              <div class="mb-3">
                <label class="form-label" for="simpleinput">Days</label>
                <select class="form-control" name="days" id="example-select">
                  <option selected value="Monday">Monday</option>
                  <option value="Tuesday">Tuesday</option>
                  <option value="Wednesday">Wednesday</option>
                  <option value="Thursday">Thursday</option>
                  <option value="Friday">Friday</option>
                  <option value="Saturday">Saturday</option>
                  <option value="Sunday">Sunday</option>
                  <option value="7 Days">7 Days)</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="example-select">Lock Up</label>
                <select class="form-control" name="lock_up" id="example-select">
                  <option selected value="0">Yes</option>
                  <option value="1">No</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="example-select">Contract Length</label>
                <select class="form-control" name="contract_length" id="example-select">
                  <option selected value="1">1 Month</option>
                  <option value="3">3 Month</option>
                  <option value="6">6 Month</option>
                  <option value="12">12 Month</option>
                </select>
              </div>

              <div class="mb-3">
                <label class="form-label" for="example-date">Site Name</label>
                <input type="text" value="{{$client->site_name}}" id="simpleinput" class="form-control @error('site_name') is-invalid @enderror" name="site_name" required>
              </div>

              <div class="mb-3">
                <label class="form-label" for="example-date">Call Out Fee</label>
                <input type="text" value="{{$client->call_out}}" id="simpleinput" class="form-control @error('call_out') is-invalid @enderror" name="call_out" required>
              </div>
            </div>
          </div>
          <div class="form-group mb-0">
            <button class="btn app-btn-primary" type="submit">Update Client</button>
          </div>
        </form>
      </div><!-- end card-body-->
    </div> <!-- end card-->
  </div> <!-- end col -->
</div>
<!-- end row-->

@endsection