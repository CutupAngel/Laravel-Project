<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Invoice | blade client</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="HomeTownSecurity Admin Panel" name="description" />
  <meta content="ayoubkhan558@hotmail.com" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <!-- App CSS -->
  <link id="theme-style" rel="stylesheet" href="{{asset('public/assets/css/portal.css')}}">
  <!-- FontAwesome JS-->
  <script defer src="{{asset('public/assets/plugins/fontawesome/js/all.min.js')}}"></script>


</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>
  <header class="app-header fixed-top">
    <div class="app-header-inner">
      <div class="container-fluid py-2">
        <div class="app-header-content">
          <div class="row justify-content-between align-items-center">

            <div class="col-auto">
              <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                  <title>Menu</title>
                  <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                </svg>
              </a>
            </div>
            <!--//col-->

            <div class="app-utilities col-auto">
              <div class="app-utility-item app-notifications-dropdown dropdown">
                <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" data-bs-auto-close="outside" aria-expanded="false" title="Notifications">
                  <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                    <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                  </svg>
                  @if(count($notifications) > 0)
                  <span class="icon-badge">1</span>
                  @endif
                </a>
                <!--//dropdown-toggle-->

                <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                  <div class="dropdown-menu-header p-3">
                    <h5 class="dropdown-menu-title mb-0">Notifications</h5>
                  </div>
                  <!--//dropdown-menu-title-->
                  <div class="dropdown-menu-content">

                    @if(count($notifications) > 0)
                    @foreach($notifications as $notification)
                    <!-- item-->
                    <div class="item p-3">
                      <div class="row gx-2 justify-content-between align-items-center">
                        <div class="col-auto">
                          <div class="app-icon-holder">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                              <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                            </svg>
                          </div>
                        </div>
                        <!--//col-->
                        <div class="col">
                          <div class="info">
                            <div class="desc"> {{$notification->content}} </div>
                            <div class="meta"> <?php echo $notification->created_at->diffForHumans(); ?> </div>
                          </div>
                        </div>
                        <!--//col-->
                      </div>
                      <!--//row-->
                      <a class="link-mask" href="{{route('notification',$notification->id)}}"></a>
                    </div>
                    @endforeach
                    @else
                    <!-- item-->
                    <div class="alert bg-light text-center w-100 mb-0">
                      <div class="desc"> No notifications yet </div>
                    </div>
                    @endif
                    <!--//item-->
                  </div>
                  <!--//dropdown-menu-content-->

                </div>
                <!--//dropdown-menu-->
              </div>
              <!--//app-utility-item-->

              <div class="app-utility-item app-user-dropdown dropdown">
                <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                  @if(is_null(auth()->user()->avatar))
                  <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user profile" class="rounded-circle">
                  @else
                  <img src="{{asset(auth()->user()->avatar)}}" alt="user profile" class="rounded-circle">
                  @endif
                  <span class="account-user-name">{{auth()->user()->name}}</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                  <li>
                    <a class="dropdown-item" href="{{route('profile')}}" onclick="event.preventDefault();">
                      <span class="account-user-name">{{auth()->user()->name}}</span> <br>
                      <span class="account-position">{{auth()->user()->email}}</span>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{route('change_client')}}">
                      Change Password
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">
                      <span>Log Out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                  </li>
                </ul>
              </div>
              <!--//app-user-dropdown-->
            </div>
            <!--//app-utilities-->
          </div>
          <!--//row-->
        </div>
        <!--//app-header-content-->
      </div>
      <!--//container-fluid-->
    </div>
    <!--//app-header-inner-->
    <div id="app-sidepanel" class="app-sidepanel">
      <div id="sidepanel-drop" class="sidepanel-drop"></div>
      <div class="sidepanel-inner d-flex flex-column">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
          <a class="app-logo" href="{{route('admin')}}">
            <!-- {{asset('assets/images/logo1.png')}} -->
            <img class="logo-icon me-2" src="{{asset('assets/images/logo_sm.png')}}" alt="logo">
            <span class="logo-text">
              HomeTown
            </span>
          </a>
        </div>
        <div class="app-user text-center mb-4">
          <div class="px-4">
            @if(is_null(auth()->user()->avatar))
            <img src="{{asset('assets/images/users/avatar-1.jpg')}}" alt="user profile" class="w-50 img-fluid rounded-circle">
            @else
            <img src="{{asset(auth()->user()->avatar)}}" alt="user profile" class="w-50 img-fluid rounded-circle">
            @endif
            <h6 class="mt-2 mb-0">{{auth()->user()->name}}</h6>
            <p class="mb-0">
              {{auth()->user()->email}}
            </p><!-- /.mb-0 END -->
          </div><!-- /.p-4 END -->
        </div>
        <!--//app-branding-->

        <div class="app-sidepanel-footer">
          <nav class="app-nav app-nav-footer">
            <ul class="app-menu footer-menu list-unstyled">
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('profile')) ? 'active' : '' }}" href="{{route('profile')}}">
                  <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                      <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    </svg>
                  </span>
                  <span class="nav-link-text">
                    @if(auth()->user()->role == 1)
                    Owner
                    @elseif(auth()->user()->role == 2)
                    Amin
                    @elseif(auth()->user()->role == 4)
                    Staff
                    @elseif(auth()->user()->role == 5)
                    Account Department
                    @endif
                  </span>
                </a>
                <!--//nav-link-->
              </li>
              <!--//nav-item-->
            </ul>
            <!--//footer-menu-->
          </nav>
        </div>
        <!--//app-sidepanel-footer-->

      </div>
      <!--//sidepanel-inner-->
    </div>
    <!--//app-sidepanel-->
  </header>
  <!--//app-header-->


  <!-- Left Sidebar End -->
  <div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
      <div class="container-xl">

        @yield('content')

      </div>
      <!--//container-fluid-->
    </div>
    <!--//app-content-->

    <footer class="app-footer">
      <div class="container text-center py-3">
        <small class="copyright">
          Copyright <?php echo date('Y', strtotime("now")); ?> | HomeTownSecurity | All rights reserved.
        </small>
      </div>
    </footer>
    <!--//app-footer-->

  </div>
  <!--//app-wrapper-->



  <!-- Javascript -->
  <script src="{{asset('public/assets/plugins/popper.min.js')}}"></script>
  <script src="{{asset('public/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

  <!-- Charts JS -->
  <!-- <script src="{{asset('assets/plugins/chart.js/chart.min.js')}}"></script> -->
  <!-- <script src="{{asset('assets/js/index-charts.js')}}"></script> -->
  <!-- datatables -->
  <script src="{{asset('public/assets/js/jstable.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('public/assets/js/polyfill-promise.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('public/assets/js/polyfill-fetch.min.js')}}" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/jstable.css')}}">

  <script src="{{asset('public/assets/js/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('public/assets/js/list.min.js')}}" type="text/javascript"></script>


  <!-- Page Specific JS -->
  <script src="{{asset('assets/js/app.js')}}"></script>

  <script>
    let tbl_reports = new JSTable("#tbl_reports", {
      sortable: true,
      searchable: true,
    });
    let datatable_users = new JSTable("#datatable_users", {
      sortable: true,
      searchable: true,
    });
    let datatable_clients = new JSTable("#datatable_clients", {
      sortable: true,
      searchable: true,
      perPage: 20,
    });
    let tbl_notes = new JSTable("#tbl_notes", {
      sortable: true,
      searchable: true,
    });
  </script>

  <script>
    (function() {
      var monkeyList = new List('test-list', {
        valueNames: ['name', 'msg_content'],
        page: 3,
        pagination: true
      });
    })();
  </script>


</body>

</html>