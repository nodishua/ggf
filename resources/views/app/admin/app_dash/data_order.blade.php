@include('app.admin.app.header')
<div class="content-wrapper">
    <section class="content">
        <div class="content-header">
            <h1><strong>Order Data</strong></h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                        <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Order Id</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Tanggal Order</th>
                                <th>Status</th>
                                <th>Details</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($data_order as $order)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->jumlah }}</td>
                                <td>Rp. {{ number_format($order->jumlah_harga) }}</td>
                                <td>{{ $order->tanggal }}</td>
                                <td>
                                    @if ($order->status == "1")
                                    Sudah Checkout
                                    @elseif($order->status == "2")
                                    Sedang Dikemas
                                    @elseif($order->status == "3")
                                    Barang Telah Dikirim
                                    @elseif($order->status == "4")
                                    Order Selesai
                                    @else
                                    Order Gagal
                                    @endif
                                </td>
                                <td class="align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ url('admin/data_order/'.$order->order_id) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>TOTAL</strong></td>
                            <td>Rp. {{ number_format($total) }}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tbody>
                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('app.admin.app.footer')
