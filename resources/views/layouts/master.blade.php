<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Point of Sales</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('template/css/all.min.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <link href="{{asset('template/css/select2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <div id="wrapper">

    @include('layouts.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">
      @include('layouts.navbar')
      <!-- Main Content -->
      @yield('content')
      <!-- End of Main Content -->

      <!-- Footer -->
      @include('layouts.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('template/js/jquery.min.js')}}"></script>
  <script src="{{asset('template/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('template/js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('template/js/sb-admin-2.min.js')}}"></script>
  <script src="{{asset('template/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('template/datatables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('template/js/sweetalert.min.js')}}"></script>
  @yield('footer')

  <!-- Custom scripts for all pages-->

</body>

</html>
