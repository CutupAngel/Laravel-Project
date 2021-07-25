@extends('layouts.staff')
@section('content')


<!-- start page title -->
<h1 class="app-page-title">Reports</h1>
<!-- end page title -->

<div class="row g-4">
  @foreach($reports as $report)
  <div class="col-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
    <div class="app-card app-card-doc shadow-sm h-100">
      <div class="app-card-thumb-holder p-3">
        <span class="icon-holder">
          <i class="fas fa-file-<?php echo substr(asset($report->path), -3); ?> <?php echo substr(asset($report->path), -3); ?>-file"></i>
        </span>
        <span class="badge bg-primary"><?php echo strtoupper(substr(asset($report->path), -3)); ?></span>
        <a class="app-card-link-mask" href="#file-link"></a>
      </div>
      <div class="app-card-body p-3 has-card-actions">

        <h4 class="app-doc-title truncate d-block mb-0">
          <a href="{{asset($report->path)}}" class="d-flex align-items-center">
            {{$report->title}}
          </a>
        </h4>
        <h4 class="app-doc-title truncate d-block mb-0 mt-1 mb-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1 bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
          </svg>
          {{$report->user_name}}
        </h4>
        <div class="app-doc-meta">
          <div class="d-flex align-items-center">
            <span class="text-muted me-1">Date: </span>
            {{$report->created_at}}
          </div>
          <div>
            <span class="text-muted">Type: </span>
            <?php echo strtoupper(substr(asset($report->path), -3)); ?>
          </div>
          <!-- <div><span class="text-muted">Size:</span></div> -->
        </div>
        <!--//app-doc-meta-->

        <div class="app-card-actions">
          <div class="dropdown">
            <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
              </svg>
            </div>
            <!--//dropdown-toggle-->
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="{{asset($report->path)}}">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                    <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                  </svg>
                  Download</a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('admin_delete_report',$report->id) }}">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                  </svg>
                  Delete</a>
              </li>
            </ul>
          </div>
          <!--//dropdown-->
        </div>
        <!--//app-card-actions-->

      </div>
      <!--//app-card-body-->

    </div>
    <!--//app-card-->
  </div>
  @endforeach
  <!--//col-->
</div>
<!--//row-->

<!-- start page title -->
<h1 class="app-page-title mt-3">Patrol Reports</h1>
<!-- end page title -->

<div class="row g-4">
  @foreach($report2 as $report)
  <div class="col-6 col-md-4 col-lg-4 col-xl-4 col-xxl-4">
    <div class="app-card app-card-doc shadow-sm h-100">
      <div class="app-card-thumb-holder p-3">
        <span class="icon-holder">
          <i class="fas fa-file-<?php echo substr(asset($report->path), -3); ?> <?php echo substr(asset($report->path), -3); ?>-file"></i>
        </span>
        <span class="badge bg-primary"><?php echo strtoupper(substr(asset($report->path), -3)); ?></span>
        <a class="app-card-link-mask" href="#file-link"></a>
      </div>
      <div class="app-card-body p-3 has-card-actions">

        <h4 class="app-doc-title truncate d-block mb-0">
          <a href="{{asset($report->path)}}" class="d-flex align-items-center">
            {{$report->title}}
          </a>
        </h4>
        <h4 class="app-doc-title truncate d-block mb-0 mt-1 mb-1">
          <a href="{{route('admin_client_show',$report->client_id)}}" class="d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="me-1 bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
            </svg>
            {{$report->user_name}}
          </a>
        </h4>
        <div class="app-doc-meta">
          <div class="d-flex align-items-center">
            <span class="text-muted me-1">Date: </span>
            {{$report->created_at}}
          </div>
          <div>
            <span class="text-muted">Type: </span>
            <?php echo strtoupper(substr(asset($report->path), -3)); ?>
          </div>
          <!-- <div><span class="text-muted">Size:</span></div> -->
        </div>
        <!--//app-doc-meta-->

        <div class="app-card-actions">
          <div class="dropdown">
            <div class="dropdown-toggle no-toggle-arrow" data-bs-toggle="dropdown" aria-expanded="false">
              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
              </svg>
            </div>
            <!--//dropdown-toggle-->
            <ul class="dropdown-menu">              
              <li>
                <a class="dropdown-item" href="{{asset($report->path)}}">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                    <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                  </svg>
                  Download</a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a class="dropdown-item" href="{{ route('admin_delete_pat_report',$report->id) }}">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash me-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                  </svg>
                  Delete</a>
              </li>
            </ul>
          </div>
          <!--//dropdown-->
        </div>
        <!--//app-card-actions-->

      </div>
      <!--//app-card-body-->

    </div>
    <!--//app-card-->
  </div>
  @endforeach
</div>
<!--//row-->
@endsection