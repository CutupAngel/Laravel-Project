@extends('layouts.account')
@section('content')

<!-- start page title -->
<div class="d-flex align-items-center justify-content-between">
  <h1 class="app-page-title mb-0">Show Client</h1>
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
        <button class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#note_modal">Add Note</button>
        <!-- Invoice Logo-->
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
          <thead>
            <tr>
              <th>Content</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($notes as $note)
            <tr>
              <td>{{$note->content}}</td>
              <td>{{$note->created_at}}</td>
              <td class="text-center">


                <a class="btn btn-danger btn-rounded" href="{{ route('delete_note',$note->id) }}"> Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="app-card app-card-progress-list h-100 shadow-sm">
      <div class="app-card-body p-4">
        <button class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#report_modal">Add Report</button>
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
      </div>
    </div>
  </div>
</div>
<!-- end row-->



<div id="note_modal" class="modal fade delete-modal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <form method="POST" action="{{route('add_note')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-box">

            <div class="row">
              <div class="col-md-12">
                <div class="profile-basic">
                  <div class="row">
                    <input type="hidden" name="id" value="{{$client->id}}">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label class="focus-label">Note</label>
                        <input type="text" name="content" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button class="btn app-btn-primary" style="width:100%" type="submit">Add Note</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="report_modal" class="modal fade delete-modal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body text-center">
        <form method="POST" action="{{route('add_report')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-box">

            <div class="row">
              <div class="col-md-12">
                <div class="profile-basic">
                  <div class="row">
                    <input type="hidden" name="id" value="{{$client->id}}">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label class="focus-label">Title</label>
                        <input type="text" name="title" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label class="focus-label">File</label>
                        <input type="file" name="pdf" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button class="btn app-btn-primary" style="width:100%" type="submit">Add Report</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection