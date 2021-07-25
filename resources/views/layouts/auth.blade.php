<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Client Mangement</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="HomeTownSecurity Admin Panel" name="description" />
  <meta content="ayoubkhan558@hotmail.com" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <!-- App CSS -->
  <link id="theme-style2" rel="stylesheet" href="{{asset('public/assets/css/portal.css')}}">
  <!-- FontAwesome JS-->
  <script defer src="{{asset('public/assets/plugins/fontawesome/js/all.min.js')}}"></script>

</head>

<body class="authentication-bg app app-login p-0" data-layout-config='{"darkMode":false}'>
  @yield('content')

  <!-- end auth-fluid-->

  <!-- Javascript -->
  <script src="{{asset('public/assets/plugins/popper.min.js')}}"></script>
  <script src="{{asset('public/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
 

</body>

</html>