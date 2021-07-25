@extends('layouts.department')
@section('content')


<div class="content">

  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">

        <h4 class="page-title">Create Alarm</h4>
      </div>
    </div>
  </div>
  <!-- end page title -->

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
          <div class="row mb-2">
            <div class="col-sm-4">
              <a href="{{route('alarm_system')}}" class="btn app-btn-primary mb-2">Back</a>
            </div>
          </div>
          <form method="POST" action="{{route('store_alarm')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label" for="simpleinput">Job No</label>
                  <input type="text" id="simpleinput" class="form-control @error('job_no') is-invalid @enderror" name="job_no" value="{{ old('job_no') }}" required>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="example-email">Date</label>
                  <input type="date" id="example-email" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="simpleinput">Alarm Monitoring Company</label>
                  <input type="text" id="simpleinput" class="form-control @error('alarm_monitor_company') is-invalid @enderror" name="alarm_monitor_company" value="{{ old('alarm_monitor_company') }}" required>
                </div>


                <div class="mb-3">
                  <label class="form-label" for="example-select" >Client Name</label>
                  <input type="text" id="simpleinput" class="form-control @error('clinet_name') is-invalid @enderror" name="clinet_name" value="{{ old('clinet_name') }}" required>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="simpleinput">Clients Address</label>
                  <input type="text" id="simpleinput" class="form-control @error('client_address') is-invalid @enderror" name="client_address" value="{{ old('client_address') }}" required>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="simpleinput">Sector Activation</label>
                  <input type="text" id="simpleinput" class="form-control @error('sector_activation') is-invalid @enderror" name="sector_activation" value="{{ old('sector_activation') }}" required>
                </div>


                <div class="mb-3">
                  <label class="form-label" for="example-date" >Time On Site</label>
                  <input type="text" id="simpleinput" class="form-control @error('time_on_site') is-invalid @enderror" name="time_on_site" value="{{ old('time_on_site') }}" required>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="example-date" >Time Off Site</label>
                  <input type="text" id="simpleinput" class="form-control @error('time_off_site') is-invalid @enderror" name="time_off_site" value="{{ old('time_off_site') }}" required>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="example-date" >Doc No</label>
                  <input type="text" id="simpleinput" class="form-control @error('document_no') is-invalid @enderror" name="document_no" value="{{ old('document_no') }}" required>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="example-date" >Invoice To</label>
                  <input type="text" id="simpleinput" class="form-control @error('invoice_to') is-invalid @enderror" name="invoice_to" value="{{ old('invoice_to') }}" required>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="example-date" >Comments</label>
                  <input type="text" id="simpleinput" class="form-control @error('comment') is-invalid @enderror" name="comment" value="{{ old('comment') }}" required>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="example-date" >Security Officers Name</label>
                  <input type="text" id="simpleinput" class="form-control @error('security_officer_name') is-invalid @enderror" name="security_officer_name" value="{{ old('security_officer_name') }}" required>
                </div>
              </div>
            </div>
            <div class="form-group mb-0">
              <button class="btn app-btn-primary" type="submit">Create Alarm</button>
            </div>
          </form>
        </div><!-- end card-body-->
      </div> <!-- end card-->
    </div> <!-- end col -->
  </div>
  <!-- end row-->

</div>


@endsection