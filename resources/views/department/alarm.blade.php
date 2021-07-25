@extends('layouts.department')


@section('content')
<div class="content">
  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">

        <h4 class="page-title">Alarms</h4>

      </div>

    </div>
  </div>
  <!-- end page title -->

  <div class="row">
    <div class="col-12">
      <div class="app-card app-card-progress-list h-100 shadow-sm">
        <div class="app-card-body p-4">
          <div class="row mb-2">
            <div class="col-sm-4">
              <a href="{{route('create_alarm')}}" class="btn app-btn-primary mb-2">Create Alarm</a>
            </div>
          </div>
          <!-- Invoice Logo-->
          <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
              <tr>
                <th>JOB No</th>
                <th>Date</th>
                <th>Alarm Monitoring Company</th>
                <th>Client Name</th>
                <th>Client Address</th>
                <th>Sector Activation</th>
                <th>Time On Site</th>
                <th>Time Off Site</th>
                <th>Document No</th>
                <th>Invoice To</th>
                <th>Comments</th>
                <th>Security Officers Name</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              @foreach($alarms as $alarm)
              <tr>
                <td>{{$alarm->job_no}}</td>
                <td>{{$alarm->date}}</td>
                <td>{{$alarm->alarm_monitor_company}}</td>
                <td>{{$alarm->client_name}}</td>
                <td>{{$alarm->client_address}}</td>
                <td>{{$alarm->sector_activation}}</td>
                <td>{{$alarm->time_on_site}}</td>
                <td>{{$alarm->time_off_site}}</td>
                <td>{{$alarm->document_no}}</td>
                <td>{{$alarm->invoice_to}}</td>
                <td>{{$alarm->comment}}</td>
                <td>{{$alarm->security_officer_name}}</td>
                <td>
                  <a href="{{route('delete_alarm',$alarm->id)}}" class="btn app-btn-primary">Delete</a>
                </td>
              </tr>

              @endforeach
            </tbody>
          </table>

        </div><!-- end card-body-->
      </div> <!-- end card-->
    </div> <!-- end col -->
  </div>
  <!-- end row-->

</div>


@endsection