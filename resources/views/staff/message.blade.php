@extends('layouts.staff')
@section('content')

<!-- start page title -->
<div class="d-flex align-items-center justify-content-between">
  <h1 class="app-page-title mb-0">Inbox</h1>
  <button type="button" class="btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#compose-modal">
    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
      <path d="M8 0a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2H9v6a1 1 0 1 1-2 0V9H1a1 1 0 0 1 0-2h6V1a1 1 0 0 1 1-1z" />
    </svg>
    Compose
  </button>
</div><!-- /.d-flex jsutify-content-between END -->
<!-- end page title -->

<hr>

<!-- Right Sidebar -->
<div class="app-card app-card-progress-list h-100 shadow-sm">
  <div class="app-card-body p-4">
    <div class="row">
      <!-- Left sidebar -->
      <div class="col-md-3">
        <div class="list-group rounded-0 mail-list">
          <a href="{{route('message_inbox')}}" class="list-group-item list-group-item-action d-flex align-items-center justify-content-between {{ (request()->is('message/inbox')) ? 'active' : '' }}">
            <span class="d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="me-1 bi bi-envelope" viewBox="0 0 16 16">
                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z" />
              </svg>
              Inbox
            </span>
            <span class="badge bg-primary">{{count($messages)}}</span>
          </a>
          <a href="{{route('message_sent')}}" class="list-group-item list-group-item-action {{ (request()->is('message/sent')) ? 'active' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
              <path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z" />
            </svg>
            Sent Mail
          </a>
        </div>

      </div>
      <!-- End Left sidebar -->

      <!-- Right Sidebar -->
      <div class="col-md-9">
        <div id="test-list">
          @if(count($messages) > 0)
          <input type="text" class="search form-control mb-3" placeholder="Filter messages..." />
          <ul class="list-group rounded-0 mails list">
            @foreach($messages as $message)
            <li class="mail list-group-item list-group-item-action shadow-sm p-3 mb-1" aria-current="true">
              <div class="d-flex w-100 justify-content-between align-items-center">
                <a href="#" type="button" class="text-primary w-100" data-bs-toggle="modal" data-bs-target="#message_detail_model" data-bs-subject="{{$message->subject}}" data-bs-content="{{$message->content}}" data-bs-date="{{$message->created_at}}">
                  <p class="name h6">{{$message->subject}}</p>
                  <p class="msg_content mb-1 text-truncate text-secondary pe-4">
                    <?php echo substr($message->content, 0, 105); ?>
                  </p>
                </a>
              </div>
              <footer class="d-flex w-100 justify-content-between align-items-center pt-2">
                <small class="d-flex align-items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="me-1 bi bi-calendar-day" viewBox="0 0 16 16">
                    <path d="M4.684 11.523v-2.3h2.261v-.61H4.684V6.801h2.464v-.61H4v5.332h.684zm3.296 0h.676V8.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a1.806 1.806 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98v4.105zm2.805-5.093c0 .238.192.425.43.425a.428.428 0 1 0 0-.855.426.426 0 0 0-.43.43zm.094 5.093h.672V7.418h-.672v4.105z" />
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                  </svg>
                  <?php echo date("dS M, Y", strtotime($message->created_at)); ?>
                </small>
                <!-- <small>Vie</small> -->
                <a href="{{route('inbox_destroy',$message->id)}}" class="lh-1 btn-sm app-btn-secondary border-danger text-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                  </svg>
                  <small>Delete</small>
                </a><!-- /.btn btm-secondary END -->
              </footer>
            </li>
            @endforeach
          </ul>
          <ul class="pagination"></ul>
          @else
          <div class="p-0">
            <div class="alert alert-info text-center" role="alert">
              Inbox is empty!
            </div>
          </div><!-- /.p-4 END -->
          @endif
        </div>
      </div> <!-- end Col-9 -->
    </div><!-- End row -->
  </div><!-- /.app-card-body END -->
</div> <!-- end card-box -->


<!-- Compose Modal -->
<div id="compose-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="compose-header-modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="compose-header-modalLabel">New Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-3">
        <form class="p-1" method="post" action="{{route('message_send')}}">
          @csrf
          <div class="mb-2">
            <label for="msgto">To</label>
            <select class="form-control select2" id="msgto" required name="id" data-bs-toggle="select2" required>
              <option>-- Select User Name --</option>
              @foreach($users as $user)
              <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-2">
            <label for="mailsubject">Subject</label>
            <input type="text" id="mailsubject" required name="subject" class="form-control" placeholder="Message subject...">
          </div>
          <div class="write-mdg-box mb-3">
            <label for="mailsubject">Message content:</label>
            <textarea class="form-control" id="simplemde1" name="content" row="5" col="8" required style="width: -webkit-fill-available;min-height: 200px;"></textarea>
          </div>

          <button type="submit" class="btn app-btn-primary"><i class="mdi mdi-send mr-1"></i> Send Message</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- // message detail model  -->
<div class="modal fade" id="message_detail_model" tabindex="-1" aria-labelledby="message_detail_modelLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="message_detail_modelLabel">Message Detail </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
          <h5 class="badge bg-primary">Subject:</h5>
          <h5 id="message_subject"></h5><!-- /#message_subject END -->
        </div>
        <div>
          <h5 class="badge bg-primary">Message Content:</h5>
          <p id="message_content"></p><!-- /#message_content END -->
        </div>
        <div>
          <h5 class="badge bg-primary">Date:</h5>
          <date id="message_date"></date><!-- /#message_date END -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  var message_detail_model = document.getElementById('message_detail_model')
  message_detail_model.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    var button = event.relatedTarget;
    // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-subject');
    var content = button.getAttribute('data-bs-content');
    var date = button.getAttribute('data-bs-date');
    //
    // Update the modal's content.
    var modalTitle = message_detail_model.querySelector('.modal-title');
    var message_content = message_detail_model.querySelector('#message_content');
    var modalBodyInput = message_detail_model.querySelector('#message_subject');
    var message_date = message_detail_model.querySelector('#message_date');

    modalTitle.textContent = 'Message detail : ' + recipient;
    modalBodyInput.innerHTML = recipient;
    message_content.innerHTML = content;
    message_date.innerHTML = date;
  })
</script>

@endsection