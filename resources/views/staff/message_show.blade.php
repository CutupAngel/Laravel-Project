@extends('layouts.staff')
@section('content')
<div class="content">

  <!-- start page email-title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">

        <h4 class="page-title">Email Show</h4>
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
              <a href="{{route('message_sent')}}"><i class="dripicons-exit mr-2"></i>Sent Mail</a>
            </div>
          </div>
          <!-- End Left sidebar -->

          <div class="page-aside-right">
            @foreach($messages as $message)
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
              <p class="text-right"><button type="button" style="width:150px" class="btn btn-default btn-block" onclick="onReply('{{$message->from_name}}','{{$message->id_from}}')">Reply</button></p>
              <hr />


            </div>
            @endforeach
            <!-- end .mt-4 -->

          </div>
          <!-- end inbox-rightbar-->
        </div>
        <!-- end card-body -->
        <div class="clearfix"></div>
      </div> <!-- end card-box -->

    </div> <!-- end Col -->
  </div><!-- End row -->
  <!-- Compose Modal -->
  <div id="reply-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="compose-header-modalLabel" aria-hidden="true">
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
              <label for="msgto" id="msgto"></label>
              <input type="hidden" name="id" id="idto" />
            </div>
            <div class="mb-3">
              <label for="mailsubject">Subject</label>
              <input type="text" required name="subject" class="form-control" placeholder="your subject">
            </div>
            <div class="form-group write-mdg-box mb-3">

              <textarea name="content" required style="width: -webkit-fill-available;"></textarea>
            </div>

            <button type="submit" class="btn app-btn-primary"><i class="mdi mdi-send mr-1"></i> Send Message</button>
            <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


</div>
<script>
  function onReply(name, id) {
    $('#idto').val(id);
    $('#msgto').text(name);
    $('#reply-modal').modal();
  }
</script>
@endsection