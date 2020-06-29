@include('app.user.app.header')
<div class="jumbotron mb-0 img-fluid w-100 d-block bg1">
<div class="container" >
        <div class="card card-solid bb">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3 class="d-inline-block d-sm-none">Custom Your Jacket & Shoes Here</h3>
                  <div class="col-12">
                    <img src="{{ URL::asset('/style/front/img/cj.jpg') }}" class="product-image w-70" alt="Product Image">
                  </div>
                  <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="{{ URL::asset('/style/front/img/cj.jpg') }}" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="{{ URL::asset('/style/front/img/cj2.jpg') }}" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="{{ URL::asset('/style/front/img/cj3.jpg') }}" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="{{ URL::asset('/style/front/img/cs.jpg') }}" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="{{ URL::asset('/style/front/img/cs2.jpg') }}" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="{{ URL::asset('/style/front/img/c1.jpg') }}" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="{{ URL::asset('/style/front/img/c2.jpg') }}" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="{{ URL::asset('/style/front/img/c3.jpg') }}" alt="Product Image"></div>
                  </div>
                </div>
                <div class="col-12 col-sm-6">
                  <h3 class="my-3">Custom Your Jacket & Shoes Here</h3>
                  <p>
                    Rate harga 250k - 850k<br>
                    Harga bisa berubah tergantung deadline dan kesulitan dari desain<br>
                    Info order :<br>
                    Whatsapp :<br>
                    Majiw : <a href="https://wa.me/089601761330">0896-0176-1330</a><br>
                    Nose : <a href="https://wa.me/081218271505">0812-1827-1505</a><br>
                    <button onClick="window.open('https://www.instagram.com/garagegraffstore/')" class="btn btn-outline-dark"><i class="fa fa-fw fa-instagram"></i> Info</button><br>
                    Menerima Cod Sekitaran Cibubur dan Cileungsi<br>
                    Kirim Via JNE dan JNT<br>
                    OFFLINE STORE<br>
                    Perum.pondok damai Blok K.8, no.02 Rt/Rw 009/013 Cileungsi kidul</p>
                </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
</div>
@include('app.user.app.footer')
