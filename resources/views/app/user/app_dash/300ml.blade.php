@include('app.user.app.header')
<div class="jumbotron mb-0 img-fluid w-100 d-block bg1">
<div class="container">
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">DITON KING 300ML COLOR CHART</h3>
              <div class="col-12">
                <img src="{{ URL::asset('/style/front/img/300ml_ver_1.png') }}" class="product-image" alt="Product Image">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">DITON KING 300ML COLOR CHART</h3>
              <p>Dinton King Spray Paint 300ML Memiliki 30 Chart Warna</p>
              <div class="col-12 product-image-thumbs">
                <div class="product-image-thumb active"><img src="{{ URL::asset('/style/front/img/300ml_ver_1.png') }}" alt="Product Image"></div>
                <div class="product-image-thumb" ><img src="{{ URL::asset('/style/front/img/chart300ml.jpg') }}" alt="Product Image"></div>
              </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@include('app.user.app.footer')
