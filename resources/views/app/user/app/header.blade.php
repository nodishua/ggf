<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Garage Graff</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('/style/front/img/favicon.png') }}"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link href="/style/front/css/login-register.css" rel="stylesheet" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/style/front/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/style/front/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/style/front/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/style/front/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="/style/front/css/cart.css">
  <link rel="stylesheet" href="/style/front/css/animate.css">
  <link rel="stylesheet" href="/style/front/css/style.css">
  <link rel="stylesheet" href="/style/front/css/card.css">
  <link rel="stylesheet" href="/style/front/css/button.css">
  <link rel="stylesheet" href="/style/front/css/bg.css">
  <link rel="stylesheet" href="/style/front/css/media-queries.css">
  <script src="/style/front/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="/style/front/js/bootstrap.js" type="text/javascript"></script>
  <script src="/style/front/js/login-register.js" type="text/javascript"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <div style="background-image:" >
        <img src="{{ URL::asset('/style/front/img/ggflogo.png') }}" class="img-fluid w-100 d-block">
    </div>
    <!--navbar-->
    <nav class="navbar navbar-dark bg-gradient-dark navbar-expand-md justify-content-center" >
        <div class="navbar-brand d-flex w-50 mr-auto"></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="collapsingNavbar3" >
            <ul class="navbar-nav w-100 justify-content-center">
                <li class="nav-item active">
                    <a class="nav-link text-nowrap" href="{{ route('home') }}"><i class="fa fa-home"> Home</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-nowrap" href="{{ route('product') }} ">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-nowrap" href="{{ route('event') }} ">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  text-nowrap" href="{{ route('custom') }}">Custom Yours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-nowrap" href="{{ route('how-to-order') }}">How To Order</a>
                </li>
            </ul>
            <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @else
            <li class="nav-item">
                    <?php
                     $pesanan_utama = \App\Order::where('user_id', Auth::user()->user_id)->where('status',0)->first();
                     if(!empty($pesanan_utama))
                        {
                         $notif = \App\OrderDetail::where('order_id', $pesanan_utama->order_id)->count();
                        }
                    ?>
                    <a class="nav-link" href="{{ url('user/check_out') }}">
                        <i class="fa fa-shopping-cart"></i>
                        @if(!empty($notif))
                        <span class="badge badge-danger">{{ $notif }}</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('user/profile') }}">
                            Profile
                        </a>

                        <a class="dropdown-item" href="{{ url('user/history') }}">
                            Order History
                        </a>

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</div>
</nav>
