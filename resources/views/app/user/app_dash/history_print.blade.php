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
  <link rel="stylesheet" href="/style/front/style.css">
  <link rel="stylesheet" href="/style/front/css/media-queries.css">
  <link rel="stylesheet" href="/style/front/css/carousel.css">
  <script src="/style/front/js/jquery-1.10.2.js" type="text/javascript"></script>
  <script src="/style/front/js/bootstrap.js" type="text/javascript"></script>
  <script src="/style/front/js/login-register.js" type="text/javascript"></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <style type="text/css">
  @media print{
      @page {margin : 0;}
      body {margin:1.6cm;}
  }
  </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-gradient-dark navbar-expand-md justify-content-center mb-3" >
        <a href="/" class="navbar-brand d-flex w-50 mr-auto"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
            <ul class="navbar-nav w-100 justify-content-center">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-home"> Home</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('product') }}">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('event') }}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('how-to-order') }}">How To Order</a>
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
                            History Order
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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <h5>order anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BRI Nomer Rekening : 32113-821312-123</strong> dengan nominal : <strong>Rp. {{ number_format($order->kode+$order->jumlah_harga) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                    @if(!empty($order))
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          To
                          <address>
                            <strong>{{ $order->user->name }}</strong><br>
                            {{ $order->user->address }}<br>
                            {{ $order->user->poscode }}<br>
                            Phone : {{ $order->user->phone_number }}<br>
                            Email : {{ $order->user->email }} <br>
                            No order : {{ $order->order_id }}
                          </address>
                        </div>
                        </div>
                        <p align="right">Tanggal Pesan : {{ $order->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($order_details as $order_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('images/products') }}/{{ $order_detail->product->image }}" width="100" alt="...">
                                </td>
                                <td>{{ $order_detail->product->name_product }}</td>
                                <td>{{ $order_detail->jumlah }}</td>
                                <td align="right">Rp. {{ number_format($order_detail->product->harga) }}</td>
                                <td align="right">Rp. {{ number_format($order_detail->jumlah_harga) }}</td>

                            </tr>
                            @endforeach

                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($order->jumlah_harga) }}</strong></td>

                            </tr>
                            <tr>
                                <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($order->kode) }}</strong></td>

                            </tr>
                             <tr>
                                <td colspan="5" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($order->kode+$order->jumlah_harga) }}</strong></td>

                            </tr>
                        </tbody>
                    </table>
                    @endif
                    <div class="row ">
                        <div class="col-12">
                          <a href="" onclick="window.print()" target="_blank" class="btn btn-default"><i class="fas fa-print" value="print a div!"></i> Print</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="/style/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/style/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/syle/admin/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/style/admin/js/demo.js"></script>
<script src="/style/front/js/jquery-3.3.1.min.js"></script>
<script src="/style/front/js/jquery-migrate-3.0.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="/style/front/js/jquery.backstretch.min.js"></script>
<!-- DataTables -->
<script src="/style/front/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/style/front/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/style/front/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/style/front/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/style/front/js/wow.min.js"></script>
<script src="/style/front/js/scripts.js"></script>
</body>
</html>
