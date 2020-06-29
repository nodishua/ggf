@include('app.user.app.header')
<div class="jumbotron mb-0 img-fluid w-100 d-block bg1">
<div class="container mt-3">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Check Out</h3>
                    @if(!empty($order))
                    <p align="right">Tanggal Pesan : {{ $order->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama product</th>
                                <th>Note</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($order_details as $order_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('images/products') }}/{{ $order_detail->product->image}}" width="100" alt="...">
                                </td>
                                <td class="text-nowrap">{{ $order_detail->product->name_product }}</td>
                                <td>{{ $order_detail->note }}</td>
                                <td>{{ $order_detail->jumlah }}</td>
                                <td class="text-nowrap">Rp. {{ number_format($order_detail->product->harga) }}</td>
                                <td class="text-nowrap">Rp. {{ number_format($order_detail->jumlah_harga) }}</td>
                                <td>
                                    <form action="{{ url('user/check_out') }}/{{ $order_detail->order_id }}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="6" align="right"><strong>Total Harga :</strong></td>
                                <td><strong>Rp. {{ number_format($order->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('user/konfirmasi_check_out') }}" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                                        <i class="fa fa-shopping-cart"></i> Check Out
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('app.user.app.footer')
