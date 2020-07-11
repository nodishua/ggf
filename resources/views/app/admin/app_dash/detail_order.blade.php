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
                            <a href="{{ route('admin.order_data') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                  <div class="card-header">
                      <div class ="row invoice-info">
                          <div class="col-sm-4 invoice-col">
                              To
                              <address>
                                <strong>{{ $order->user->name }}</strong><br>
                                {{ $order->user->address }}<br>
                                {{ $order->user->poscode }}<br>
                                Phone : {{ $order->user->phone_number }}<br>
                                Email : {{ $order->user->email }}
                                  <b>Order ID: {{ $order->order_id }}<b><br>
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
                                <th>Kode</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($order as $order_detail)
                            <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($order_detail->tanggal)->format('d F Y')}}</td>
                            <td>{{ $order_detail->name_product }}</td>
                            <td>{{ $order_detail->jumlah }}</td>
                            <td>{{ $order_detail->note }}</td>
                            <td><img src="{{ url('images/products') }}/{{ $order_detail->image }}" width="100" alt="..."></td>
                            <td>{{ number_format($order_detail->kode) }}</td>
                            <td>Rp. {{ number_format($order_detail->kode+$order_detail->jumlah_harga) }}</td>
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
