@include('app.admin.app.header')
<div class="content-wrapper">
    <section class="content">
        <div class="content-header"></div>
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-14">
                <!-- general form elements -->
                <div class="card card-dark">
                    <div class="row">
                        <div class="col-md-12 mb-3 mt-3 ml-3">
                            <a href="{{ route('admin.order_data') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                  <div class="card-header">
                      <div class ="row invoice-info">
                          <div class="col-sm-4 invoice-col">
                              To
                              <address>

                                  <strong>{{ $order->name }}</strong><br>
                                  {{ $order->address }}<br>
                                  {{ $order->poscode }}<br>
                                  Phone : {{ $order->phone_number }}<br>
                                  Email : {{ $order->email }}<br>
                                  <b>Order ID: {{ $order->order_id }}</b><br>
                                </address>
                            </div>
                        </div>
                  </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Order</th>
                                <th>Product</th>
                                <th>Jumlah Barang</th>
                                <th>Note</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($data_order as $order)
                            <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($order->tanggal)->format('d F Y')}}</td>
                            <td>{{ $order->name_product }}</td>
                            <td>{{ $order->jumlah }}</td>
                            <td>{{ $order->note }}</td>
                            <td><img src="{{ url('images/products') }}/{{ $order->image }}" width="100" alt="..."></td>
                            <td>{{ $order->harga }}</td>
                            <td>{{ $order->harga*$order->jumlah }}</td>
                        </tr>
                        @endforeach
                        <tr>
                                <td colspan="7" align="right"><strong>Kode Unik :</strong></td>
                                <td ><strong>Rp. {{ number_format($order->kode) }}</strong></td>
                            </tr>
                            <tr>
                                <td colspan="7" align="right"><strong>Total yang harus ditransfer :</strong></td>
                                <td ><strong>Rp. {{ number_format($order->kode+$order->jumlah_harga) }}</strong></td>

                            </tr>
                            </tbody>
                    </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr/>
</section>
</div>

@include('app.admin.app.footer')
