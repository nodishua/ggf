@extends('app.user.app.app')
@section('contents')
<div class="jumbotron mb-0 mt-0 img-fluid d-block bg1 w-100">
<div class="container">
    <div class="card text-center bb" >
        <div class="card-header ">
          <h3><strong> HOT PRODUCTS </strong></h3>
        </div>
    </div>
    <div class="row justify-content-center text ">
        @foreach($product as $products)
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="card bb">
              <img src="{{ url('images/products') }}/{{ $products->image}}" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">{{ $products->name_product }}</h5>
                <p class="card-text">
                    <strong>Harga :</strong> Rp. {{ number_format($products->harga)}} <br>
                    <strong>Stok :</strong> {{ $products->quantity }} <br>
                    <hr>
                    <strong>Details :</strong> {{ $products->details }}<br>
                    @if($products->name_product == "Diton King Spray")
                    <strong>List Warna : </strong><br>
                    <a href="{{ route('spray300ml') }}" class="btn btn-outline-dark"><span>Ukuran 300ML</span></a>
                    <a href="{{ route('spray400ml') }}" class="btn btn-outline-dark"><span>Ukuran 400ML</span></a>
                    @else
                    @endif
                    <strong>Description :</strong> <br>
                    {{ $products->description }}
                </p>
                <div class="card-footer">
                    <a href="{{ route('order.index',$products) }}" class="bt1 bt1--stripe bt1--m text-nowrap"><i class="fa fa-shopping-cart"></i> Order</a>
                    <a href="{{ route('product_show', $products) }}" class="bt1 bt1--stripe bt1--m"><i class="fa fa-eye"></i> View</a>
                </div>
              </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="ct">
    <a href="{{ route('product') }}" class="bt"><span class="bt-text">View More Product</span></a>
</div>
<div class="container">
    <div class="card text-center bb">
        <div class="card-header">
            <h3><strong> EVENTS </strong></h3>
        </div>
    </div>
    <div class="card flex-row flex-wrap bb">
        @foreach($event as $event)
        <div class="card-header border-0">
            <img src="{{ url('images/poster') }}/{{ $event->poster}}" alt="" width="150px">
        </div>
        <div class="card-block px-2 mt-3">
            <h4 class="card-title">{{ $event->name_event }}</h4>
            <p class="card-text">{{ $event->description }}</p>
            <a href="{{ route('event_show', $event) }}" class="bt1 bt1--stripe"><i class="fa fa-eye">View</i></a>
        </div>
        @endforeach
    </div>
</div>
<div class="ct">
    <a href="{{ route('event') }}" class="bt"><span class="bt-text">View More Event</span></a>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card bb">
                <div class="card-body">
                <img src="{{ URL::asset('/style/front/img/300ml.jpg') }}" alt="" width="100%">
                    <div class="text-center mt-3">
                        <a href="{{ route('spray300ml') }}" class="bt"><i class="fa fa-eye"></i><span class="bt-text">View Details</span></a>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card bb">
                <div class="card-body">
                <img src="{{ URL::asset('/style/front/img/400ml.jpg') }}" alt="" width="100%">
                    <div class="text-center mt-3">
                    <a href="{{ route('spray400ml') }}" class="bt"><i class="fa fa-eye"></i><span class="bt-text">View Details</span></a>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron jumbotron-fluid mb-0">
    <div class="container">
        <img src="{{ URL::asset('/style/front/img/butron1.png') }}" alt="" width="100%">
        <img src="{{ URL::asset('/style/front/img/butron2.png') }}" alt="" width="100%">
    </div>
</div>

@endsection

