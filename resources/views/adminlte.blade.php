<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Berbaju Laundry | {{ $subtitle }} </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
 
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('dashboard') }}" class="brand-link">
      {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Berbaju Laundry</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
           <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
          @auth
              <a href="#" class="d-block"> HI, {{ Auth::user()->name }} <br> [{{ Auth::user()->role }}]</a>
          @endauth
      </div>
      
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           
          <li class="nav-item">
            <a href="{{url('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-home text-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
        

          @if(Auth::user()->role =='admin')
          <li class="nav-item">
            <a href="{{url('products')}}" class="nav-link">
              <i class="nav-icon fas fa-box"></i>
              <p>
                Products
              </p>
            </a>
          </li>
          @endif
          

           @if(Auth::user()->role !=='owner')
          <li class="nav-item">
            <a href="{{url('transactions')}}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
              Transactions
              </p>
            </a>
          </li>
          @endif
        
          @if(Auth::user()->role == 'admin' )
          <li class="nav-item">
            <a href="{{url('users')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Users
              </p>
            </a>
          </li>
        @endif

        @if(Auth::user()->role == 'owner' )
          <li class="nav-item">
            <a href="{{route('laporan.index')}}" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          @endif
        @if(Auth::user()->role == 'owner' )
          <li class="nav-item">
            <a href="{{url('log')}}" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Log
              </p>
            </a>
          </li>
          @endif
          
          <li class="nav-item">
            <a href="{{route('logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt text-danger"></i>
              <p class =" text-danger">Logout</p>
            </a>
          </li>

              {{-- <a class="btn btn-danger shadow" href="{{ route('logout') }}">
                <i class="nav-icon fas fa-sign-out-alt"></i> Logout
              </a> --}}
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    {{-- <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div> --}}
    <strong>Copyright &copy; 2023 By: Anggi</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{url('../../dist/js/demo.js')}}"></script> --}}


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>


</body>
</html>