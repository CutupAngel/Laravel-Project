@extends('layouts.admin')
@section('content')


<!-- start page title -->
<div class="d-flex align-items-center justify-content-between">
  <h1 class="app-page-title">Show Client</h1>
  <a href="{{route('admin_client')}}" class="btn app-btn-secondary">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
    </svg>
    Back
  </a>
</div><!-- /.d-flex jsutify-content-between END -->
<!-- end page title -->

<div class="settings-section mb-4">
  <div class="app-card app-card-settings shadow-sm p-3">

    <div class="app-card-body p-4">
      <div class="row g-3">
        <div class="col-md-4 col-sm-6 col-xs-6">
          <div class="mb-2"><strong>Name:</strong> {{$client->name}}</div>
          <div class="mb-2"><strong>Email:</strong> {{$client->email}}</div>
          <div class="mb-0">
            <strong>Contact Number:</strong> <br>
            {{$client->phone}}
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
          <div class="mb-2"><strong>Patrols:</strong> {{$client->patrol}}</div>
          <div class="mb-2"><strong>Days:</strong> {{$client->days}} Days</div>
          <div class="mb-2"><strong>
              Lock Up:</strong>
            @if($client->invoice_period == 0)
            <span class="ml-2">Yes</span>
            @else
            <span class="ml-2">No</span>
            @endif
          </div>
          <div class="mb-2"><strong>Contract Length:</strong> {{$client->contract_length}}</div>
          <div class="mb-2"><strong>Contract Length:</strong> {{$client->site_name}} </div>
          <div class="mb-0">
            <strong>Call Out Fee:</strong>
            <span class="badge bg-primary">
              {{$client->call_out}}
            </span>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-6">
          <div class="mb-2"><strong>Payments:</strong> {{$client->payment}}</div>
          <div class="mb-2"><strong>Payment Terms:</strong>
            <span class="badge bg-success">
              {{$client->payment_term}} Days
            </span>
          </div>
          <div class="mb-2"><strong>Invoice Period:</strong>
            @if($client->invoice_period == 0)
            <span class="ml-2">End of Month</span>
            @else
            <span class="ml-2">Start of Month</span>
            @endif
          </div>
        </div>
      </div>
    </div>
    <!--//app-card-body-->

  </div>
  <!--//app-card-->
</div>
<!--//row-->

<div class="app-card app-card-orders-table shadow-sm mb-4">
  <div class="app-card-header p-3">
    <div class="row justify-content-between align-items-center">
      <div class="col-auto">
        <h4 class="app-card-title">Notes</h4>
      </div>
      <!--//col-->
      <div class="col-auto">
        <div class="card-header-action">
          <button class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#note_modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
              <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
            </svg>
            Add Note
          </button>
        </div>
        <!--//card-header-actions-->
      </div>
      <!--//col-->
    </div>
    <!--//row-->
  </div>
  <!--//app-card-header-->
  <div class="app-card-body p-4">
    @if(count($notes) > 0)
    <div class="table-responsive">
      <table class="table app-table-hover mb-0 text-left" id="tbl_notes">
        <thead>
          <tr>
            <th class="cell ps-3 ps-md-3">Content</th>
            <th class="cell">Date</th>
            <th class="cell pe-3 pe-md-3"> Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($notes as $note)
          <tr class="">
            <td class="cell ps-3 ps-md-3"><span class="truncate">{{$note->content}}</span></td>
            <td class="cell">
              <span>
                <?php
                echo date("dS M, Y", strtotime($note->created_at));
                ?>
              </span>
              <span class="note">
                <?php
                echo date("h:m A", strtotime($note->created_at));
                ?>
              </span>
            </td>
            <td class="cell pe-3 pe-md-3">
              <a class="btn-sm app-btn-secondary border-danger text-danger" href="{{ route('admin_delete_note',$note->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
                Delete
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!--//table-responsive-->
    @else
    <div class="p-4">
      <div class="alert alert-info text-center mb-0" role="alert">
        Nothing here yet! Try to add new notes
      </div>
    </div><!-- /.p-4 END -->
    @endif
  </div>
  <!--//app-card-body-->
</div>
<!--//app-card-->

<div class="app-card app-card-orders-table shadow-sm mb-4">
  <div class="app-card-header p-3">
    <div class="row justify-content-between align-items-center">
      <div class="col-auto">
        <h4 class="app-card-title">Reports</h4>
      </div>
      <!--//col-->
      <div class="col-auto">
        <div class="card-header-action">
          <button class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#report_modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
              <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
            </svg>
            Add Report
          </button>
        </div>
        <!--//card-header-actions-->
      </div>
      <!--//col-->
    </div>
    <!--//row-->
  </div>
  <!--//app-card-header-->
  <div class="app-card-body p-4">
    @if(count($reports) > 0)
    <div class="table-responsive">
      <table class="table app-table-hover mb-0 text-left" id="tbl_reports">
        <thead>
          <tr>
            <th class="cell ps-3 ps-md-3">Content</th>
            <th class="cell">Date</th>
            <th class="cell pe-3 pe-md-3">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($reports as $report)
          <tr class="">
            <td class="cell ps-3 ps-md-3"><a href="{{asset($report->path)}}" target="_new" class="truncate"> {{$report->title}}</a></td>
            <td class="cell">
              <span>
                <?php
                echo date("dS M, Y", strtotime($report->created_at));
                ?>
              </span>
              <span class="note">
                <?php
                echo date("H:i A", strtotime($report->created_at));
                ?>
              </span>
            </td>
            <td class="cell pe-3 pe-md-3">
              <a class="btn-sm app-btn-secondary me-2" href="{{asset($report->path)}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16">
                  <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z" />
                  <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
                </svg>
                Download
              </a>
              <a class="btn-sm app-btn-secondary border-danger text-danger" href="{{ route('admin_delete_report',$report->id) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
                Delete
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!--//table-responsive-->
    @else
    <div class="p-4">
      <div class="alert alert-info text-center mb-0" role="alert">
        Nothing here yet! Try to add new reports
      </div>
    </div><!-- /.p-4 END -->
    @endif
  </div>
  <!--//app-card-body-->
</div>
<!--//app-card-->
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="report_modal" tabindex="-1" aria-labelledby="report_modalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="report_modalModalLabel">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
            <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
          </svg>
          Add Report
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('admin_add_report')}}" enctype="multipart/form-data">
          <div>@csrf</div>
          <input type="hidden" name="id" value="{{$client->id}}">
          <div class="mb-3">
            <label class="form-label" for="inputtitle">Title</label>
            <input type="text" name="title" id="inputtitle" placeholder="report title.." class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="inputpdf">File</label>
            <input type="file" name="pdf" id="inputpdf" class="form-control" required>
          </div>
          <div class="mt-2">
            <button class="btn app-btn-primary" type="submit">Add Report</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="note_modal" tabindex="-1" aria-labelledby="note_modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="note_modalLabel">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
            <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1h-11zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293L9 13.793z" />
          </svg>
          New Note
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('admin_add_note')}}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="id" value="{{$client->id}}">
          <div class="mb-3">
            <label class="form-label">Note</label>
            <input type="text" name="content" class="form-control" required>
          </div>
          <button class="btn app-btn-primary" style="width:100%" type="submit">Add Note</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection