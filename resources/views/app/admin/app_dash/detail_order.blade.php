@include('app.admin.app.header')
<div class="content-wrapper">

    <section class="content">
          <div class="container-fluid">
            <div class="row">
              <!-- left column -->
              <div class="col-md-14">
                <!-- general form elements -->
                <div class="card card-dark">
                  <div class="card-header">
                    <h1 class="card-title">Detail Order</h1><br>
                    <div class="row invoice-info">
                        <div class="col-sm-6 invoice-col">
                          To
                          @foreach($data_order as $order)
                          <address>
                            <strong>{{ $order->name }}</strong><br>
                            {{ $order->address }}<br>
                            {{ $order->poscode }}<br>
                            Phone : {{ $order->phone_number }}<br>
                            Email : {{ $order->email }} <br>
                            No Order : <strong>{{ $order->order_id }}</strong>
                          </address>
                          @endforeach
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-md-12 mb-3 mt-3">
                            <a href="{{ route('admin.order_data') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
                        </div>
                    </div>
                  </div>
                <div class="table-responsive text-nowrap">
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
                                <td>{{ \Carbon\Carbon::parse($order->tanggal)->format('d F Y')}}</>
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
<hr/>
</section>

@include('app.admin.app.footer')
