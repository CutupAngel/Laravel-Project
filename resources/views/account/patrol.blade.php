@extends('layouts.account')
@section('content')


<!-- start page title -->
<h1 class="app-page-title">Patrol</h1>
<!-- end page title -->
<!-- <button class="btn app-btn-primary my-2" data-bs-toggle="modal" data-bs-target="#addReq">Add requirement</button> -->
<!-- <a href="#" data-toggle="modal" data-target="#addReq">Add Requirement</a> -->
<div class="row g-4">
  @foreach($patrols as $patrol)
  <div class="col-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
    <div class="app-card app-card-doc shadow-sm h-100">    
      <div class="accordion-patrol" style="display: flex; align-items: center; justify-content: space-between;">
        <input type="hidden" id="hedit_{{$patrol->id}}" value="{{$patrol->count}}">
        <input type="hidden" id="hpatrol_id" value="{{$patrol->id}}">
        <h5 class="col-4 col-md-4 col-sm-8 accordionTag" id="clientN">{{$patrol->userName}}</h5>
        <div class="col-4 col-md-4 col-sm-0"  id="dotGp" style="align-items-center">
          @if ($patrol->count == 3)
            <h5 id="comstate_{{$patrol->id}}" style="display: block; color: red;">COMPLETED</h5>
            <div  id="uncomstate_{{$patrol->id}}" style="display: none;">
              <input type="hidden" id="hdots_{{$patrol->id}}" value="{{$patrol->id}}">
              @for($id = 0; $id < 3 - $patrol->count; $id ++)
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
              @for($id = 0; $id < 3 - $patrol->count; $id ++)
                <span class="dot"></span>
              @endfor
              @for($id = 0; $id < $patrol->count;$id ++)  
                <span class="dot dotactive"></span>
              @endfor
            </div>
          @endif
        </div>
        <div class="col-4 col-md-4 col-sm-0" id="btnGp" style="text-align: right; margin-right: 10px; z-index: 99;">
          @if ($patrol->count == 3)
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
</div>
<!--//row-->



@endsection