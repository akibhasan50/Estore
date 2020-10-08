<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="{{asset('ui/backend')}}/img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Dashboard</title>
  <link href="{{asset('ui/backend')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('ui/backend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="{{asset('ui/backend')}}/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('backend.layout.partials.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('backend.layout.partials.topbar')
        <!-- Topbar -->

        <!-- Container Fluid-->
       @yield('content')
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      @include('backend.layout.partials.footer')
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{asset('ui/backend')}}/vendor/jquery/jquery.min.js"></script>
  <script src="{{asset('ui/backend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('ui/backend')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="{{asset('ui/backend')}}/js/ruang-admin.min.js"></script>
  <script src="{{asset('ui/backend')}}/vendor/chart.js/Chart.min.js"></script>
  <script src="{{asset('ui/backend')}}/js/demo/chart-area-demo.js"></script>  
  @include('sweetalert::alert')

</body>

</html>