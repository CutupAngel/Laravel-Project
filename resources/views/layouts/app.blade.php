<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- App CSS -->
  <link id="theme-style" rel="stylesheet" href="{{asset('public/assets/css/portal.css')}}">
  <!-- FontAwesome JS-->
  <script defer src="{{asset('public/assets/plugins/fontawesome/js/all.min.js')}}"></script>
</head>

<body class="app app-reset-password p-0">

  @yield('content')

  <!-- Javascript -->
  <script src="{{asset('public/assets/plugins/popper.min.js')}}"></script>
  <script src="{{asset('public/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>


</body>

</html>