@include('app.user.app.header')
<div class="jumbotron mb-0 img-fluid w-100 d-block bg1">
    <div class="container" >
        <div class="card card-solid bb">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">Product</h3>
                    <div class="col-12">
                        <img src="{{ url('images/products') }}/{{ $product->image}}" alt="" class="card-img-top" style="width:327px; height:200px">>
                    </div>
                </div>
                    <div class="col-12 col-sm-6">
                    <h3 class="my-3"><strong>{{ $product->name_product }}</strong></h3>
                        <p>
                            <strong>Price :</strong> Rp. {{ number_format($product->harga)}} <br>
                            <strong>Stock :</strong> {{ $product->quantity }} <br>
                            <hr>
                            <strong>Details :</strong> {{ $product->details }} <br>
                            <strong>Description :</strong> <br>
                            {{ $product->description }}
                        </p>
                        <form method="POST" action="{{ route('order',$product->product_id) }}">
                            @csrf
                            <strong> Quantity : </strong> <br>
                            <input type="text" name="jumlah_order" class="form-control" required>
                            <strong> Note : </strong> <br>
                            <textarea class="form-control" id="note" name="note"rows="5"></textarea>
                            <button type="submit" class="btn btn-dark mt-3 mb-3"><i class="fa fa-shopping-cart"></i> Add To Cart</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('app.user.app.footer')
