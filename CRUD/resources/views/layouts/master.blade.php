<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>AdminLTE 3 | CRUD Laravel</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  {{-- navbar --}}
  @include('clients.blocks.navbar')

  <!-- Main Sidebar Container -->
  @include('clients.blocks.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('add-product')
    @yield('list-product')
    @yield('edit-product')

  </div>
  <!-- /.content-wrapper -->

  {{-- footer --}}
  @include('clients.blocks.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('js/app.js')}}"></script>

{{-- <script>
$(function () {
  bsCustomFileInput.init();
});
</script> --}}
</body>
</html>
