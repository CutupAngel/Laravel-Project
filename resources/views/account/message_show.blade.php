@extends('layouts.admin')
@section('content')

@foreach($messages as $message)
<!-- start page title -->
<h1 class="app-page-title">Reply to message from :: {{$message->from_name}}</h1>
<!-- end page title -->

<div class="row">
  <div class="col-12">
    <div class="row">
      <div class="col-md-6">
        <div class="app-card app-card-progress-list h-100 shadow-sm">
          <div class="app-card-header p-3">
            <h4 class="app-card-title">Message</h4>
          </div>
          <!--//app-card-header-->
          <div class="app-card-body p-4">
            <div class="mt-3">
              <h5 class="font-18">{{$message->subject}}</h5>

              <hr />

              <div class="media mb-3 mt-1">
                <div class="media-body">
                  <small class="float-right">{{$message->created_at}}</small>
                  <small class="text-muted">From: {{$message->from_name}}</small>
                  <small class="text-muted">To: {{$message->to_name}}</small>
                </div>
              </div>

              <p>{{$message->content}}</p>

            </div>
            <!-- end .mt-4 -->
            <!-- end card-body -->
          </div> <!-- end card-box -->
        </div><!-- /.col-md-6 END -->
      </div>
      <div class="col-md-6">
        <div class="app-card app-card-progress-list h-100 shadow-sm">
          <div class="app-card-header p-3">
            <h4 class="app-card-title">Reply</h4>
          </div>
          <!--//app-card-header-->
          <div class="app-card-body p-4">
            <form class="p-1" method="post" action="{{route('message_send')}}">
              @csrf
              <div class="mb-3">
                <label for="msgto" id="msgto">{{$message->from_name}}</label>
                <input type="hidden" name="id" id="idto" value="{{$message->id_from}}" class="form-control" />
              </div>
              <div class="mb-3">
                <label for="mailsubject">Subject</label>
                <input type="text" required name="subject" class="form-control" placeholder="your subject">
              </div>
              <div class="form-group write-mdg-box mb-3">
                <textarea name="content" class="form-control" rows="5" style="min-height: 200px;" required style="width: -webkit-fill-available;"></textarea>
              </div>

              <button type="submit" class="btn app-btn-primary"><i class="mdi mdi-send mr-1"></i> Send Message</button>
            </form>
            <!-- end card-body -->
          </div> <!-- end card-box -->
        </div><!-- /.col-md-6 END -->
      </div><!-- /.row END -->
    </div>
  </div>
</div><!-- End row -->
<!-- Compose Modal -->

@endforeach

@endsection