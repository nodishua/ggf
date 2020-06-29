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
            <img src="{{ url('images/products') }}/{{ $product->image}}" alt="" width="500px">
        </div>
        <div class="card-block px-2">
            <h5 class="card-title">{{ $product->name_product }}</h5>
                <p class="card-text">
                    <strong>Harga :</strong> Rp. {{ number_format($product->harga)}} <br>
                    <strong>Stock :</strong> {{ $product->quantity }} <br>
                    <hr>
                    <strong>Details :</strong> {{ $product->details }} <br>
                    <strong>Description :</strong> <br>
                    {{ $product->description }}
                </p>
            <a href="{{ route('order.index',$product) }}" class="btn btn-dark"><i class="fa fa-shopping-cart"></i> Order</a>
        </div>
    </div>
</div>
</div>
@include('app.user.app.footer')
