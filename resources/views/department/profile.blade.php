@extends('layouts.department')
@section('content')
<div class="content">

  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">

        <h4 class="page-title">Profile1</h4>
      </div>
    </div>
  </div>
  <!-- end page title -->


  <div class="row">
    <div class="col-sm-12">
      <!-- Profile -->
      <div class="card bg-primary">
        <div class="card-body profile-user-box">

          <div class="row">
            <div class="col-sm-8">
              <div class="media">
                <span class="float-left m-2 mr-4">
                  @if(is_null($user->avatar))
                  <img src="{{asset('public/assets/images/users/avatar-2.jpg')}}" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
                  @else
                  <img src="{{asset($user->avatar)}}" style="height: 100px;" alt="" class="rounded-circle img-thumbnail">
                  @endif
                </span>
                <div class="media-body">

                  <h4 class="mt-1 mb-1 text-white">{{$user->name}}</h4>
                  <p class="font-13 text-white-50"> {{$user->email}}</p>
                  <p class="font-13 text-white-50"> {{$user->phone}}</p>

                </div> <!-- end media-body-->
              </div>
            </div> <!-- end col-->

            <div class="col-sm-4">
              <div class="text-center mt-sm-0 mt-3 text-sm-right">
                <a class="btn btn-light" href="{{route('profile_edit')}}">
                  <i class="mdi mdi-account-edit mr-1"></i> Edit Profile 2
                </a>
              </div>
            </div> <!-- end col-->
          </div> <!-- end row -->

        </div> <!-- end card-body/ profile-user-box-->
      </div>
      <!--end profile/ card -->
    </div> <!-- end col-->
  </div>
</div>
@endsection