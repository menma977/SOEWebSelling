<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <title>AdminUX-PRO | Admin Dashboard HTML Template</title>
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
</head>

<!-- Head tag ends -->

<!-- Body -->

<body class="h-100 no-sidemenu">


<div class="wrapper">
  <div class="content shadow-sm position-relative">
    <header class="header">
      <!-- Fixed navbar -->
      <nav class="container-fluid">
        <div class="row">
          <div class="col align-self-center">
            <a href="" class="logo text-white">
              <img src="{{ asset('assets/img/logoicon.svg') }}" alt="" class="logo-icon">
              <div class="logo-text">
                <h5 class="fs22 mb-0">SOE Web <sup class="badge badge-danger">SELL</sup></h5>
              </div>
            </a>
          </div>
        </div>
      </nav>
    </header>
    <div class="background opac blur">
      <img src="{{ asset('assets/img/team.jpg') }}" alt="">
    </div>

    <!-- Main container starts -->
    <div class="container main-container" id="main-container">
      <div class="row login-row-height">
        <div class="col-12 col-md-6 col-lg-7 d-none d-md-flex"></div>
        @yield('content')
      </div>
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
</body>

<!-- Body ends -->

</html>
