<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Garage Graff</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('/style/front/img/favicon.png') }}"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/style/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="/style/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/style/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/style/admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/style/admin/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/style/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/style/admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/style/admin/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="/style/admin/css/button.css">
</head>
<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Website</a>
          </li>
        </ul>
      </nav>

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar elevation-4 sidebar-dark-warning">
        <!-- Brand Logo -->
        <a href="{{ route('admin.dashboard') }}"class="brand-link navbar-dark ">
          <img src="{{ URL::asset('style/admin/img/favicon.png') }}  "
               alt="Admin | Garage Graff "
               class="brand-image rounded img-circle"
               style="opacity: .8"
               >
            <span class="brand-text " style="color:white" >Admin | Garage Graff</span>
            </a>

        <div class="sidebar">
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header">UPDATE PANEL</li>
              <li class="nav-item has-treeview active menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-database"></i>
                  <p>
                    Data Store
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.data_admin') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Data Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.data_user') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Data User</p>
                        </a>
                    </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.product') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Product</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.event') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Event</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.order_data') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Data Order</p>
                    </a>
                  </li>
                  <li class="nav-item has-treeview active menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon far fa-plus-square"></i>
                      <p>
                        Status
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ route('admin.status_order') }}" class="nav-link">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Status Order</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.logout') }}" >
                        onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                      <i class="nav-icon fa fa-sign-out"></i>
                      <p>
                        Logout
                      </p>
                    </a>
                  </li>
                </ul>
              </li>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
