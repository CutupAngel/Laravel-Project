<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>HomeTownSecurity | blade admin</title>
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

<body class="app loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": true}'>
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
                  <span class="icon-badge">{{count($notifications)}}</span>
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
                    <a class="dropdown-item" href="{{route('profile')}}">
                      Profile
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

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
          <ul class="app-menu list-unstyled accordion" id="menu-accordion">
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('admin/dashbord')) ? 'active' : '' }}" href="{{route('admin')}}">
                <span class="nav-icon">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                    <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                  </svg>
                </span>
                <span class="nav-link-text">Overview</span>
              </a>
              <!--//nav-link-->
            </li>
            <!--//nav-item-->
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('alarm')) || (request()->is('alarm/create')) ? 'active' : '' }} @if(request()->routeIs('alarm*')) active @else '' @endif" href="{{route('alarm_system')}}">
                <span class="nav-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
                    <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z" />
                    <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z" />
                  </svg>
                </span>
                <span class="nav-link-text">Alarms</span>
              </a>
              <!--//nav-link-->
            </li>
            <!--//nav-item-->
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('admin/report')) ? 'active' : '' }}" href="{{route('admin_report')}}">
                <span class="nav-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                  </svg>
                </span>
                <span class="nav-link-text">Reports</span>
              </a>
              <!--//nav-link-->
            </li>
            <!--//nav-item-->
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('message/inbox')) || (request()->is('message/sent')) ? 'active' : '' }}" href="{{route('message_inbox')}}">
                <span class="nav-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                  </svg>
                </span>
                <span class="nav-link-text">Messages</span>
              </a>
              <!--//nav-link-->
            </li>
            <!--//nav-item-->
            <li class="nav-item has-submenu" href="{{route('admin_account')}}">
              <a class="nav-link submenu-toggle {{ (request()->is('admin/account')) || (request()->is('admin/account/create')) ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                <span class="nav-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                  </svg>
                </span>
                <span class="nav-link-text">Users</span>
                <span class="submenu-arrow">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                  </svg>
                </span>
                <!--//submenu-arrow-->
              </a>
              <!--//nav-link-->
              <div id="submenu-1" class="collapse submenu submenu-1  {{ (request()->is('admin/account')) || (request()->is('admin/account/create')) ? 'show' : '' }}" data-bs-parent="#menu-accordion">
                <ul class="submenu-list list-unstyled">
                  <li class="submenu-item">
                    <a class="submenu-link  {{ (request()->is('admin/account'))  ? 'active' : '' }}" href="{{route('admin_account')}}">
                      Users List
                    </a>
                  </li>
                  <li class="submenu-item">
                    <a class="submenu-link  {{ (request()->is('admin/account/create')) ? 'active' : '' }}" href="{{route('admin_account_create')}}">
                      Create User
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!--//nav-item-->
            <li class="nav-item has-submenu" href="{{route('admin_client')}}">
              <a class="nav-link submenu-toggle {{ (request()->is('admin/client')) || (request()->is('admin/client/create')) ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-2">
                <span class="nav-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                    <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z" />
                  </svg>
                </span>
                <span class="nav-link-text">Clients</span>
                <span class="submenu-arrow">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                  </svg>
                </span>
                <!--//submenu-arrow-->
              </a>
              <!--//nav-link-->
              <div id="submenu-2" class="collapse submenu submenu-2  {{ (request()->is('admin/client')) || (request()->is('admin/client/create')) ? 'show' : '' }}" data-bs-parent="#menu-accordion">
                <ul class="submenu-list list-unstyled">
                  <li class="submenu-item">
                    <a class="submenu-link  {{ (request()->is('admin/client'))  ? 'active' : '' }}" href="{{route('admin_client')}}">
                      Clients
                    </a>
                  </li>
                  <li class="submenu-item">
                    <a class="submenu-link  {{ (request()->is('admin/client/create')) ? 'active' : '' }}" href="{{route('admin_client_create')}}">
                      Create Client
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <!--//nav-item-->            
            <li class="nav-item">
              <a class="nav-link {{ (request()->is('admin/patrol')) ? 'active' : '' }}" href="{{route('admin_patrol')}}">
                <span class="nav-icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16">
                    <path d="M 5.46875 4.0625 L 4 8.46875 L 5.71875 11.15625 L 6.53125 8.65625 L 9.625 9.75 L 9.53125 11.96875 C 9.49425 12.79875 9.82225 13.5955 10.40625 14.1875 L 12.78125 16.625 C 12.86025 16.705 12.9755 16.7425 13.0625 16.8125 C 12.3685 21.5255 12.00775 23.843 11.84375 25 L 13.875 25 C 14.12 23.291 14.5615 20.21325 14.9375 17.65625 L 18.3125 18.65625 C 18.3805 18.67725 18.438 18.716 18.5 18.75 L 17.71875 25 L 19.71875 25 L 20.21875 21.09375 L 22.875 25 L 25.28125 25 L 20.5 17.9375 C 20.115 17.3685 19.56325 16.949 18.90625 16.75 L 14.625 15.46875 C 14.466 15.42075 14.33575 15.33775 14.21875 15.21875 L 11.8125 12.78125 C 11.6175 12.58325 11.51925 12.30825 11.53125 12.03125 L 11.75 7.1875 L 9.75 7.09375 L 9.71875 7.65625 L 7.1875 6.75 L 7.8125 4.8125 L 5.46875 4.0625 z M 18.25 6.90625 C 16.122846 6.90625 14.375 8.6540957 14.375 10.78125 C 14.375 12.908404 16.122846 14.65625 18.25 14.65625 C 20.377154 14.65625 22.125 12.908404 22.125 10.78125 C 22.125 8.6540957 20.377154 6.90625 18.25 6.90625 z M 18.25 8.90625 C 19.296274 8.90625 20.125 9.7349759 20.125 10.78125 C 20.125 11.827524 19.296274 12.65625 18.25 12.65625 C 17.203726 12.65625 16.375 11.827524 16.375 10.78125 C 16.375 9.7349759 17.203726 8.90625 18.25 8.90625 z M 10 26 L 10 28 L 28 28 L 28 26 L 10 26 z"/>
                  </svg>
                </span>
                <span class="nav-link-text">Patrol Run</span>
              </a>
              <!--//nav-link-->
            </li>
            <!--//nav-item-->
          </ul>
          <!--//app-menu-->
        </nav>
        <!--//app-nav-->
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



  <div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
      <div class="container-xl">

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
        @yield('content')
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

  <style>
    .accordion-patrol {
      background-color: #eee;
      color: #444;
      padding: 18px;
      width: 100%;
      border: none;
      /*text-align: left;*/
      outline: none;
      font-size: 15px;
      transition: 0.4s;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .accordionTag {
      cursor: pointer;
    }

    .active, .accordion-patrol:hover {
      background-color: #ccc; 
    }

    .panel {
      padding: 18px 18px;
      display: none;
      background-color: white;
      overflow: hidden;
    }

    .dot {
      cursor: pointer;
      height: 20px;
      width: 20px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      /*transition: background-color 0.6s ease;*/
    }

    .dotactive {
      background-color: #0fa;
    }

    @media (min-width: 280px) and (max-width: 576px) {
      #dotGp, #clientN {
        display: none;
      }
      .accordion-patrol {
        justify-content: space-around;
      }
    }
  </style>


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

  <script>
    var acc = document.getElementsByClassName("accordionTag");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.parentElement.classList.toggle("active");
        var panel = this.parentElement.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
        } else {
          panel.style.display = "block";
        }
      });
    }

    function checkIn(id) {
      var checkedCount = parseInt($("#hedit_" + id).val());
      var tcount = parseInt($("#hpatrol_tcount_" + id).val());
      console.log(checkedCount);
            console.log(tcount);
            console.log($("hpatrol_tcount_" + id).val());
      $.ajax({
        type: 'GET',
        url: "/admin/patrol/checkin",
        data: {
          patrol_id: id,
          count: checkedCount,
          _token: "{{csrf_token()}}" 
        },
        success: function (data) {
          if (checkedCount + 1 == tcount) {
            $("#uncomstate_"+id).css("display","none");
            $("#comstate_"+id).css("display","block");
            $("#checkin_"+id).addClass("disabled");
            $("#checkout_"+id).addClass("disabled");
          } else {
            console.log(data);
            console.log(tcount);
            $("#hedit_" + id).val(checkedCount + 1);
            var dots = $("#hdots_" + id);
            for (var i = 0; i < tcount; i++) {
              dots = dots.next();
              dots.removeClass("dotactive");
            }
            // dots = $("#hdots_" + id);
            for (var j = checkedCount+1; j > 0 ; j --) {
              dots.addClass("dotactive");
              dots = dots.prev();
            }
          }
        },
        error: function (err) {
          if (err.status == 422) {
            printErrorMsg(err.responseJSON);
          }
        }
      });   
    }

    function deletePat(id) {
        alert();
        $.ajax({
            url:'/admin/patrol/delete',
            type:'POST',
            data: {
              patrol_id: id,
              _token: "{{csrf_token()}}"
            },
            success: function(response){
              window.location.replace("/admin/patrol");
            },
        });
    }

    function checkOut(id) {
      var checkedCount = parseInt($("#hedit_" + id).val());
      var tcount = parseInt($("#hpatrol_tcount_"+id).val());
      $.ajax({
        type: 'GET',
        url: "/admin/patrol/checkout",
        data: {
          patrol_id: id,
          count: checkedCount,
          _token: "{{csrf_token()}}" 
        },
        success: function (data) {
          console.log(data);
          $("#hedit_" + id).val(checkedCount - 1);
          var dots = $("#hdots_" + id);
          for (var i = 0; i < tcount; i++) {
            dots = dots.next();
            dots.removeClass("dotactive");
          }
          // dots = $("#hdots_" + id);
          for (var j = checkedCount-1; j > 0 ; j --) {
            dots.addClass("dotactive");
            dots = dots.prev();
          }
        },
        error: function (err) {
          if (err.status == 422) {
            printErrorMsg(err.responseJSON);
          }
        }
      });  
    }
  </script>
  <script type="text/javascript">
      $('body').on('click', '#submitForm', function(){
          $("#submitForm").empty();
          $("#submitForm").append('<i class="fa fa-spinner fa-spin"></i> Loading');
          $("#submitForm").addClass("disabled");
          var registerForm = $("#Register");
          var formData = registerForm.serialize();
          // $( '#name-error' ).html( "" );
          // $( '#email-error' ).html( "" );
          console.log(formData);
          $("#submitForm").val("Loading");

          $.ajax({
              url:'/admin/patrol/add',
              type:'POST',
              data:{
                clientid: $("#clientList").val(),
                tcount: $("#tcount").val(),
                desc: $("#hdesc").val(),
                _token: "{{csrf_token()}}" 
              },
              success:function(data) {
                  $("#reportForm").empty();
                  $("#reportForm").removeClass("disabled");
                  $("#reportForm").text("add");
                  window.location.replace("/admin/patrol");
                  console.log(data);
                  if(data.errors) {
                      if(data.errors.email){
                          $( '#email-error' ).html( data.errors.email[0] );
                      }
                  }
              },
          });
      });
      $('body').on('click', '#reportForm', function(){
          $("#reportForm").empty();
          $("#reportForm").append('<i class="fa fa-spinner fa-spin"></i> Loading');
          $("#reportForm").addClass("disabled");
          var registerForm = $("#Report");
          var formData = registerForm.serialize();
          // $( '#name-error' ).html( "" );
          // $( '#email-error' ).html( "" );
          console.log(formData);

          $.ajax({
              url:'/admin/patrol/report',
              type:'POST',
              data:{
                title: $("#reportTitle").val(),
                desc: $("#reportDesc").val(),
                _token: "{{csrf_token()}}" 
              },
              success: function(response){
                  $("#reportForm").empty();
                  $("#reportForm").removeClass("disabled");
                  $("#reportForm").text("Report");
                  // $("#reportForm").append('<i class="fa fa-spinner fa-spin"></i> Loading');
                  console.log(response);
                  $('#reportModal').modal('hide');
              },
              error: function(response){
                  console.log("response");
              }
          });
      });
  </script>

</body>

</html>