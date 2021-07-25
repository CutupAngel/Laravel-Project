@extends('layouts.client')
@section('content')


<div class="content">

  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">

        <h4 class="page-title">My Information</h4>
      </div>
    </div>
  </div>
  <!-- end page title -->

  <div class="row">
    <div class="col-12">
      <div class="app-card app-card-progress-list h-100 shadow-sm">
        <div class="app-card-body p-4">
          <h4 class="header-title mt-0 mb-3">Client Information</h4>
          <div class="row">
            <div class="col-md-4">
              <div class="text-left">
                <p class="text-muted">
                  <strong> Name : </strong>
                  <span class="ml-2">{{$client->name}}</span>
                </p>
                <p class="text-muted">
                  <strong> Email : </strong>
                  <span class="ml-2">{{$client->email}}</span>
                </p>
                <p class="text-muted">
                  <strong> Contact Number : </strong>
                  <span class="ml-2">{{$client->phone}}</span>
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="text-left">
                <p class="text-muted">
                  <strong> Patrols : </strong>
                  <span class="ml-2">{{$client->patrol}}</span>
                </p>
                <p class="text-muted">
                  <strong> Days : </strong>
                  <span class="ml-2">{{$client->days}} Days</span>
                </p>
                <p class="text-muted">
                  <strong> Lock Up : </strong>
                  @if($client->invoice_period == 0)
                  <span class="ml-2">Yes</span>
                  @else
                  <span class="ml-2">No</span>
                  @endif
                </p>
                <p class="text-muted">
                  <strong> Contract Length : </strong>
                  <span class="ml-2">{{$client->contract_length}}</span>
                </p>
                <p class="text-muted">
                  <strong> Site Name : </strong>
                  <span class="ml-2">{{$client->site_name}}</span>
                </p>
                <p class="text-muted">
                  <strong> Call Out Fee : </strong>
                  <span class="ml-2">{{$client->call_out}}</span>
                </p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="text-left">
                <p class="text-muted">
                  <strong> Payments : </strong>
                  <span class="ml-2">{{$client->payment}}</span>
                </p>
                <p class="text-muted">
                  <strong> Payment Terms : </strong>
                  <span class="ml-2">{{$client->payment_term}} Days</span>
                </p>
                <p class="text-muted">
                  <strong> Invoice Period : </strong>
                  @if($client->invoice_period == 0)
                  <span class="ml-2">End of Month</span>
                  @else
                  <span class="ml-2">Start of Month</span>
                  @endif
                </p>
              </div>
            </div>
          </div>


        </div><!-- end card-body-->
      </div> <!-- end card-->
    </div> <!-- end col -->
  </div>


  <div class="row">
    <div class="col-md-12">
      <div class="app-card app-card-progress-list h-100 shadow-sm">
        <div class="app-card-body p-4">

          <!-- Invoice Logo-->
          <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
              <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reports as $report)
              <tr>
                <td><a href="{{asset($report->path)}}" target="_new"> {{$report->title}}</a></td>
                <td>{{$report->created_at}}</td>
                <td class="text-center">


                  <a class="btn btn-danger btn-rounded" href="{{ route('delete_report',$report->id) }}"> Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- end row-->

</div>



@endsection