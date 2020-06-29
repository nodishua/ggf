@include('app.user.app.header')
<div class="jumbotron mb-0 img-fluid w-100 d-block bg1">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product</li>
            </ol>
        </nav>
    <div class="card flex-row flex-wrap">
        <div class="card-header border-0">
            <img src="{{ url('images/products') }}/{{ $product->image}}" alt="" width="500px" class=" img-fluid h-100 d-block">
        </div>
        <div class="card-block px-3 mt-3">
            <h3 class="card-title"><strong>{{ $product->name_product }}</strong></h3>
                <p class="card-text">
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
@include('app.user.app.footer')
