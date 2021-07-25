@extends('layouts.account')
@section('content')


<!-- start page title -->
<h1 class="app-page-title">Overview</h1>
<!-- end page title -->

<div class="row g-4 mb-4">
  <div class="col-6 col-lg-3">
    <div class="app-card app-card-stat shadow-sm h-100">
      <div class="app-card-body p-3 p-lg-4">
        <h4 class="stats-type mb-1">Total Reports</h4>
        <div class="stats-figure">{{count($reports)}}</div>
        <!-- <div class="stats-meta">New</div> -->
      </div>
      <!--//app-card-body-->
    </div>
    <!--//app-card-->
  </div>
  <!--//col-->
  <div class="col-6 col-lg-3">
    <div class="app-card app-card-stat shadow-sm h-100">
      <div class="app-card-body p-3 p-lg-4">
        <h4 class="stats-type mb-1">Total Notes</h4>
        <div class="stats-figure">{{count($notes)}}</div>
        <!-- <div class="stats-meta">New</div> -->
      </div>
      <!--//app-card-body-->
    </div>
    <!--//app-card-->
  </div>
  <!--//col-->
  <div class="col-6 col-lg-3">
    <div class="app-card app-card-stat shadow-sm h-100">
      <div class="app-card-body p-3 p-lg-4">
        <h4 class="stats-type mb-1">Total Clients</h4>
        <div class="stats-figure">{{count($clients)}}</div>
        <!-- <div class="stats-meta">Open</div> -->
      </div>
      <!--//app-card-body-->
    </div>
    <!--//app-card-->
  </div>
  <!--//col-->
  <div class="col-6 col-lg-3">
    <div class="app-card app-card-stat shadow-sm h-100">
      <div class="app-card-body p-3 p-lg-4">
        <h4 class="stats-type mb-1">Total Users</h4>
        <div class="stats-figure">{{count($users)}}</div>
        <!-- <div class="stats-meta">New</div> -->
      </div>
      <!--//app-card-body-->
    </div>
    <!--//app-card-->
  </div>
  <!--//col-->
</div>
<!--//row-->

<!--//app-card-->
<div class="app-card app-card-notification alert shadow-sm mb-4 border-left-decoration">
  <div class="app-card-body d-flex justify-content-between align-items-center">
    <h4 class="mb-0">Tasks</h4>
    <button class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#task_modal">
      New Task
      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="ms-1 bi bi-plus-lg" viewBox="0 0 16 16">
        <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
      </svg>
    </button>
  </div> <!-- end card body-->
</div> <!-- end card -->


@foreach($tasks as $task)
<div class="app-card app-card-notification shadow-sm mb-4">
  <div class="app-card-header px-4 py-3">
    <div class="row g-3 align-items-center">
      <div class="col-12 col-lg-auto text-center text-lg-start">
        <div class="app-icon-holder">
          @if($task->status == "InComplete")
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
            <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
          </svg>
          @else
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
            <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
            <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
          </svg>
          @endif
        </div>
        <!--//app-icon-holder-->
      </div>
      <!--//col-->
      <div class="col-12 col-lg-auto text-center text-lg-start">
        <div class="notification-type mb-2">
          @if($task->status == "InComplete")
          <span class="badge bg-secondary">Tasks</span>
          @else
          <span class="badge bg-info">Tasks</span>
          @endif
        </div>
        <h4 class="notification-title mb-1">Assigned to :: {{$task->name}}</h4>

        <ul class="notification-meta list-inline mb-0">
          <li class="list-inline-item">
            Status ::
            @if($task->status == "InComplete")
            <span class="badge bg-secondary">{{$task->status}}</span>
            @else
            <span class="badge bg-success">{{$task->status}}</span>
            @endif
          </li>
          <li class="list-inline-item">|</li>
          <li class="list-inline-item">
            <div class="d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1 bi bi-calendar-day" viewBox="0 0 16 16">
                <path d="M4.684 11.523v-2.3h2.261v-.61H4.684V6.801h2.464v-.61H4v5.332h.684zm3.296 0h.676V8.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a1.806 1.806 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98v4.105zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43zm.094 5.093h.672V7.418h-.672v4.105z" />
                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
              </svg>
              <?php
              echo date("dS M, Y H:i A", strtotime($task->created_at));
              ?>
            </div><!-- / END -->
          </li>
        </ul>

      </div>
      <!--//col-->
    </div>
    <!--//row-->
  </div>
  <!--//app-card-header-->
  <div class="app-card-body p-4">
    <div class="notification-content">{{$task->content}}</div>
  </div>
  <!--//app-card-body-->
  <div class="app-card-footer px-4 py-3">
    @if($task->status == "InComplete")
    <a class="action-link" href="{{route('admin_task_complete', $task->id)}}">
      Complete
      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-right ms-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
      </svg>
    </a>
    @else
    <a class="action-link" href="#">
      Completed
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-square" viewBox="0 0 16 16">
        <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
        <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
      </svg>
    </a>
    @endif
  </div>
  <!--//app-card-footer-->
</div>
@endforeach
<!--//app-card-->

<hr />

<div class="row g-4 mb-4">
  <div class="col-12 col-lg-12">
    <div class="app-card app-card-progress-list h-100 shadow-sm">
      <div class="app-card-header p-3">
        <div class="row justify-content-between align-items-center">
          <div class="col-auto">
            <h4 class="app-card-title">Recent Activities</h4>
          </div>
          <!--//col-->
        </div>
        <!--//row-->
      </div>
      <!--//app-card-header-->
      <div class="app-card-body p-4">
        @foreach($sections as $section)
        <div class="item p-3">
          <div class="row align-items-center">
            <div class="col-auto">
              <?php if (str_contains($section->content, 'added the note')) { ?>
                <div class="app-icon-holder text-warning" style="color:#f5f596;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sticky" viewBox="0 0 16 16">
                    <path d="M2.5 1A1.5 1.5 0 0 0 1 2.5v11A1.5 1.5 0 0 0 2.5 15h6.086a1.5 1.5 0 0 0 1.06-.44l4.915-4.914A1.5 1.5 0 0 0 15 8.586V2.5A1.5 1.5 0 0 0 13.5 1h-11zM2 2.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 .5.5V8H9.5A1.5 1.5 0 0 0 8 9.5V14H2.5a.5.5 0 0 1-.5-.5v-11zm7 11.293V9.5a.5.5 0 0 1 .5-.5h4.293L9 13.793z" />
                  </svg>
                </div>
              <?php } ?>
              <?php if (str_contains($section->content, 'added the report')) { ?>
                <div class="app-icon-holder" style="background:#e8f8ff;">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-flag" viewBox="0 0 16 16">
                    <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21.294 21.294 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21.317 21.317 0 0 0 14 7.655V1.222z" />
                  </svg>
                </div>
              <?php } ?>
            </div><!-- /.col END -->
            <div class="col">
              <div class="title mb-1">
                @if($section->content)
                <?php if (str_contains($section->content, 'added the note')) { ?>
                  <span class="">{{$section->content}}</span>
                <?php } ?>
                <?php if (str_contains($section->content, 'added the report')) { ?>
                  <span class="">{{$section->content}}</span>
                <?php } ?>
                @else
                <div class="alert alert-danger" role="alert">
                  no content
                </div>
                @endif
              </div>
              <date class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-2 bi bi-calendar-month" viewBox="0 0 16 16">
                  <path d="M2.56 11.332 3.1 9.73h1.984l.54 1.602h.718L4.444 6h-.696L1.85 11.332h.71zm1.544-4.527L4.9 9.18H3.284l.8-2.375h.02zm5.746.422h-.676V9.77c0 .652-.414 1.023-1.004 1.023-.539 0-.98-.246-.98-1.012V7.227h-.676v2.746c0 .941.606 1.425 1.453 1.425.656 0 1.043-.28 1.188-.605h.027v.539h.668V7.227zm2.258 5.046c-.563 0-.91-.304-.985-.636h-.687c.094.683.625 1.199 1.668 1.199.93 0 1.746-.527 1.746-1.578V7.227h-.649v.578h-.019c-.191-.348-.637-.64-1.195-.64-.965 0-1.64.679-1.64 1.886v.34c0 1.23.683 1.902 1.64 1.902.558 0 1.008-.293 1.172-.648h.02v.605c0 .645-.423 1.023-1.071 1.023zm.008-4.53c.648 0 1.062.527 1.062 1.359v.253c0 .848-.39 1.364-1.062 1.364-.692 0-1.098-.512-1.098-1.364v-.253c0-.868.406-1.36 1.098-1.36z" />
                  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                </svg>
                <?php
                echo date("H:m -- dS M, Y", strtotime($section->created_at));
                ?>
              </date>
            </div>
            <!--//col-->
            <div class="col-auto">
              <a href="{{route('delete_section',$section->id)}}" class="btn text-white btn-danger">
                Delete
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                </svg>
              </a>
            </div>
            <!--//col-->
          </div>
          <!--//row-->
          <!-- <a class="item-link-mask" href="#"></a> -->
        </div>
        @endforeach
      </div>
      <!--//app-card-body-->
    </div>
    <!--//app-card-->
  </div>
  <!--//col-->
</div>
<!--//row-->


<div id="task_modal" class="modal fade delete-modal" role="dialog">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="alarmDetailModalLabel">New Task </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('account_task_client')}}">
          @csrf
          <div class="card-box">

            <div class="mb-3">
              <label class="form-label" for="example-select">Task Details</label>
              <input type="text" name="content" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label" for="example-select">Users</label>
              <select class="form-control" name="user_id" id="example-select" required>
                <option selected>-- Select User --</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
            </div>
            <hr class="my-2">
            <div class="form-group mb-0">
              <button class="btn app-btn-primary" type="submit">New Task</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection