@extends('layouts.client')
@section('content')
<div class="content">

  <!-- start page email-title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <h4 class="page-title">Inbox</h4>
      </div>
    </div>
  </div>
  <!-- end page email-title -->

  <div class="row">

    <!-- Right Sidebar -->
    <div class="col-12">
      <div class="app-card app-card-progress-list h-100 shadow-sm">
        <div class="app-card-body p-4">
          <!-- Left sidebar -->
          <div class="page-aside-left">

            <button type="button" class="btn btn-danger btn-block" data-bs-toggle="modal" data-bs-target="#compose-modal">Compose</button>

            <div class="email-menu-list mt-3">
              <a href="{{route('message_inbox')}}"><i class="dripicons-inbox mr-2"></i>Inbox</a>
              <a href="{{route('message_sent')}}" class="text-danger font-weight-bold"><i class="dripicons-exit mr-2"></i>Sent Mail</a>
            </div>
          </div>
          <!-- End Left sidebar -->

          <div class="page-aside-right">
            <div class="mt-3">
              <ul class="email-list">
                @foreach($messages as $message)
                <li>
                  <div class="email-content">
                    <a href="{{route('message_show',$message->id)}}" class="email-subject">
                      {{$message->content}}
                    </a>
                    <div class="email-date" style="width: auto;"> {{$message->created_at}}</div>
                  </div>
                  <div class="email-action-icons">
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <a href="{{route('sent_destroy',$message->id)}}"><i class="mdi mdi-delete email-action-icons-item"></i></a>
                      </li>
                    </ul>
                  </div>
                </li>

                @endforeach
              </ul>
            </div>
            <!-- end .mt-4 -->


            <!-- end row-->
          </div>
          <!-- end inbox-rightbar-->
        </div>
        <!-- end card-body -->
        <div class="clearfix"></div>
      </div> <!-- end card-box -->

    </div> <!-- end Col -->
  </div><!-- End row -->

  <!-- Compose Modal -->
  <div id="compose-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="compose-header-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header modal-colored-header bg-primary">
          <h4 class="modal-title" id="compose-header-modalLabel">New Message</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body p-3">
          <form class="p-1" method="post" action="{{route('message_send')}}">
            @csrf
            <div class="mb-3">
              <label for="msgto">To</label>
              <select class="form-control select2" required name="id" data-bs-toggle="select2" required>
                <option>-- Select User Name --</option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="mailsubject">Subject</label>
              <input type="text" id="mailsubject" required name="subject" class="form-control" placeholder="your subject">
            </div>
            <div class="form-group write-mdg-box mb-3">

              <textarea id="simplemde1" name="content" required style="width: -webkit-fill-available;"></textarea>
            </div>

            <button type="submit" class="btn app-btn-primary"><i class="mdi mdi-send mr-1"></i> Send Message</button>
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

</div>
@endsection