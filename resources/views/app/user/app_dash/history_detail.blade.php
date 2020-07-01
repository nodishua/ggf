@include('app.user.app.header')
<div class="jumbotron mb-0 img-fluid w-100 d-block bg1">
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('user/history') }}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <p>
                        <h5>Order Anda Telah Sukses Dicheckout Selanjutnya Untuk Pembayaran Dapat Melalui</h5>
                        1. Transfer Ke Rekening <strong>Bank BNI : A/N DIMAS LUTHFI AMRULLAH 0618416066</strong>
                        </strong> <br>
                        2. OVO/GOPAY/DANA : <strong>082210949186</strong><br>
                        Dengan nominal : <strong>Rp. {{ number_format($order->kode+$order->jumlah_harga) }}</strong><br>
                    </p>
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
                            Email : {{ $order->user->email }}
                          </address>
                        </div>
                        </div>
                        <p align="right">Tanggal Pesan : {{ $order->tanggal }}</p>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Note</th>
                                    <th style="text-align: right">Harga</th>
                                    <th style="text-align: right">Total Harga</th>

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
                                    <td >{{ $order_detail->jumlah }}</td>
                                    <td>{{ $order_detail->note }}</td>
                                    <td align="right">Rp. {{ number_format($order_detail->product->harga) }}</td>
                                    <td align="right">Rp. {{ number_format($order_detail->jumlah_harga) }}</td>

                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" align="right"><strong>Total Harga :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($order->jumlah_harga) }}</strong></td>

                                </tr>
                                <tr>
                                    <td colspan="6" align="right"><strong>Kode Unik :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($order->kode) }}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="6" align="right"><strong>Harga Ongkir :</strong></td>
                                    <td align="right"><strong>Free Ongkir</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="6" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($order->kode+$order->jumlah_harga) }}</strong></td>

                                </tr>
                            </tbody>
                        </table>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('app.user.app.footer')
