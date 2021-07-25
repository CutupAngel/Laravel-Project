@extends('layouts.staff')
@section('content')


<!-- start page title -->
<h1 class="app-page-title">Patrol</h1>
<!-- end page title -->

<!-- <a href="#" data-toggle="modal" data-target="#addReq">Add Requirement</a> -->
<div class="row g-4">
  @foreach($patrols as $patrol)
  <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
    <div class="app-card app-card-doc shadow-sm h-100">    
      <div class="accordion-patrol col-12 col-md-12 col-sm-12">
        <input type="hidden" id="hedit_{{$patrol->id}}" value="{{$patrol->count}}">
        <input type="hidden" id="hpatrol_id" value="{{$patrol->id}}">
        <input type="hidden" id="hpatrol_tcount_{{$patrol->id}}" value="{{$patrol->total_count}}">
        <h5 class="col-lg-4 col-md-4 col-sm-4 accordionTag" id="clientN">{{$name}}</h5>
        <div class="col-lg-4 col-md-4 col-sm-2"  id="dotGp">
          @if ($patrol->count == $patrol->total_count)
            <h5 id="comstate_{{$patrol->id}}" style="display: block; color: red;">COMPLETED</h5>
            <div  id="uncomstate_{{$patrol->id}}" style="display: none;">
              <input type="hidden" id="hdots_{{$patrol->id}}" value="{{$patrol->id}}">
              @for($id = 0; $id < $patrol->total_count - $patrol->count; $id ++)
                <span class="dot"></span>
              @endfor
              @for($id = 0; $id < $patrol->count;$id ++)  
                <span class="dot dotactive"></span>
              @endfor
            </div>
          @else 
            <h5 id="comstate_{{$patrol->id}}" style="display: none; block; color: red;">COMPLETED</h5>
            <div  id="uncomstate_{{$patrol->id}}" style="display: block;">
              <input type="hidden" id="hdots_{{$patrol->id}}" value="{{$patrol->id}}">
              @for($id = 0; $id < $patrol->total_count - $patrol->count; $id ++)
                <span class="dot"></span>
              @endfor
              @for($id = 0; $id < $patrol->count;$id ++)  
                <span class="dot dotactive"></span>
              @endfor
            </div>
          @endif
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6" id="btnGp" style="text-align: right; margin-right: 10px;">
          @if ($patrol->count == $patrol->total_count)
            <button class="btn btn-danger disabled">Checkin</button>
            <button class="btn btn-primary disabled">Checkout</button>
          @else
            <button class="btn btn-danger" id="checkin_{{$patrol->id}}" onclick="checkIn({{$patrol->id}})">Checkin</button>
            <button class="btn btn-primary" id="checkout_{{$patrol->id}}" onclick="checkOut({{$patrol->id}})">Checkout</button>
          @endif
        </div>
      </div>
      <div class="panel">
        <p>{{$patrol->description}}</p>
        <div style="text-align: right;">
          <button class="btn app-btn-primary" data-bs-toggle="modal" data-bs-target="#reportModal">Report</button>
        </div>
      </div>
    </div>
    <!--//app-card-->
  </div>
  @endforeach
  <!--//col--> 
    <div id="reportModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

      <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <!-- <button type="button" class="close" data-dismiss="modal">×</button> -->
                  <h3 class="modal-title text-center primecolor">Report</h3>
              </div>
              <div class="modal-body" style="overflow: hidden;">
                  <div class="col-md-offset-1 col-md-12">
                      <form method="POST" id="Report">
                          {{ csrf_field() }}
                          <div class="form-group has-feedback">
                              <input type="text" id="reportTitle" placeholder="Title" class="form-control" />
                              <textarea type="text" id="reportDesc" class="form-control" placeholder="Report" style="height: 300px;"></textarea>
                              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                          </div>
                          <div class="row m-1">
                              <div class="col-xs-12 text-center">
                                <button type="button" id="reportForm" class="btn btn-primary btn-prime white btn-flat">Report</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>              
      </div>
    </div>
</div>
<!--//row-->



@endsection