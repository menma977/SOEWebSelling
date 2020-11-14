<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <meta content="Worlds Best Admin UX Dashbaoard PRO version for bootstrap template, Select, Calandar, Report, Charts, Tables etc." name="description"/>
  <meta content="" name="author"/>
  <link rel="shortcut icon" href="{{ asset('assets/img/logoicon.png') }}">

  <!-- g fonts style -->
  <link href="{{ url('https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap') }}" rel="stylesheet">
  <!-- g fonts style ends -->

  <!-- Vendor or 3rd party style -->

  <!-- material icons -->
  <link href="{{ asset('assets/vendor/material-icons/material-icons.css') }}" rel="stylesheet">
  <!-- flags icons -->
  <link href="{{ asset('assets/vendor/flags/css/flag-icon.min.css') }}" rel="stylesheet">
  <!-- daterange picker -->
  <link href="{{ asset('assets/vendor/daterangepicker-master/daterangepicker.css') }}" rel="stylesheet">

  <!-- Vendor or 3rd party style ends -->

  <!-- Customized template style mandatory -->
  <link href="{{ asset('assets/css/style-tomato-dark.css') }}" rel="stylesheet" id="stylelink">
  <!-- Customized template style ends -->
  @yield('addCss')
</head>

<!-- Head tag ends -->

<!-- Body -->

<body class="sidemenu-open">
<!-- Sidebar starts -->
<x-side-bar></x-side-bar>
<!-- Sidebar ends -->

<!-- wrapper starts -->
<div class="wrapper">
  <div class="content shadow-sm">
    <div class="container-fluid header-container">
      <x-header></x-header>
      @yield('subHeader')
    </div>

    <!-- Main container starts -->
    <div class="container main-container" id="main-container">
      @yield('content')
    </div>
    <!-- Main container ends -->

  </div>

  <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md text-center text-md-left align-self-center">
          <p>All rights reserved by <a href="">SOE Web Sell</a></p>
        </div>
      </div>
    </div>
  </footer>

</div>
<!-- wrapper ends -->

<!-- Global js mandatory -->
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/cookie/jquery.cookie.js') }}"></script>

<!-- Global js ends -->

<!-- Vendor or 3rd party js -->

<!-- date range picker -->
<script src="{{ asset('assets/vendor/daterangepicker-master/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/daterangepicker-master/daterangepicker.js') }}"></script>


<!-- Vendor or 3rd party js ends -->

<!-- Customized template js mandatory -->
<script src="{{ asset('assets/js/main.js') }}"></script>
<!-- Customized template js ends -->

<script>
  $(function () {
    try {
      const newDate = new Date();
      const date = newDate.getDay() + "/" + newDate.getMonth() + "/" + newDate.getFullYear();
      const time = newDate.getHours() + ":" + newDate.getMinutes() + ":" + newDate.getSeconds();
      $('#time').html(date + " " + time);

      setInterval(function () {
        const newDate = new Date();
        const date = newDate.getDay() + "/" + newDate.getMonth() + "/" + newDate.getFullYear();
        const time = newDate.getHours() + ":" + newDate.getMinutes() + ":" + newDate.getSeconds();
        $('#time').html(date + " " + time);
      }, 1000);
    } catch (e) {

    }
  })
</script>

@yield('addJs')
</body>

<!-- Body ends -->

</html>
