@include('app.admin.app.header')
<div class="content-wrapper">
    <section class="content">
        <div class="content-header">
            <h1><strong>Data Order</strong></h1>
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
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $no = 1; ?>
                                @foreach($data_order as $order)
                                <tr>
                                <form  action="{{ route('admin.status_update', $order->order_id) }}" method="POST">
                                @csrf
                                <td>{{ $no++ }}</td>
                                <td>{{ $order->order_id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->phone_number }}</td>
                                <td>
                                <select name="status" id="status">
                                    <option value="0" selected="selected">Select Here...</option>
                                    <option value="1" <?php if($order->status=="1") echo 'selected="selected"'; ?>>Sudah Checkout</option>
                                    <option value="2" <?php if($order->status=="2") echo 'selected="selected"'; ?>>Sedang Dikemas</option>
                                    <option value="3" <?php if($order->status=="3") echo 'selected="selected"'; ?>>Barang Telah Dikirim</option>
                                </select>
                                </td>
                                <td>
                                    <button type="submit" id="cf-submit" name="submit" class="btn btn-primary"><i class="fa fa-refresh"></i> Update</>
                                </td>
                                </form>
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
    </section>
</div>
@include('app.admin.app.footer')
