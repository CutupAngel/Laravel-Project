@extends('layouts.account')
@section('content')


<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box">

      <h4 class="page-title">Reports</h4>

    </div>

  </div>
</div>
<!-- end page title -->

<div class="row">
  <div class="col-12">
    <div class="app-card app-card-progress-list h-100 shadow-sm">
      <div class="app-card-body p-4">

        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
          <thead>
            <tr>
              <th>Title</th>
              <th>Client</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($reports as $report)
            <tr>
              <td><a href="{{asset('$report->path')}}">{{$report->title}}</a></td>
              <td><a href="{{route('admin_client_show',$report->client_id)}}">{{$report->user_name}}</a></td>
              <td>{{$report->created_at}}</td>

              <td class="text-center">
                <a class="btn btn-danger btn-rounded" href="{{ route('admin_delete_report',$report->id) }}"> Delete</a>
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


@endsection