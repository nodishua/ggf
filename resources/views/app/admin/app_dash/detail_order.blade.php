@include('app.admin.app.header')
<div class="content-wrapper">
    <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-14">
                <!-- general form elements -->
                <div class="card card-dark">
                    <div class="row">
                        <div class="col-md-12 mb-3 mt-3 ml-3">
                            <a href="{{ url('admin/data_reservasi') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                  <div class="card-header">
                      <div class ="row invoice-info">
                          <div class="col-sm-4 invoice-col">
                              To
                              <address>
                                  @foreach($data_order as $order)
                                  <strong>{{ $order->name }}</strong><br>
                                  {{ $order->address }}<br>
                                  {{ $order->poscode }}<br>
                                  Phone : {{ $order->phone_number }}<br>
                                  Email : {{ $order->email }}<br>
                                  <b>Order ID: {{ $order->order_id }}<b><br>
                                </address>
                            </div>
                            @endforeach
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
                                <th>Kode</th>
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
                            <td>{{ number_format($order->kode) }}</td>
                            <td>Rp. {{ number_format($order->kode+$order->jumlah_harga) }}</td>
                            </tr>
                            @endforeach
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
