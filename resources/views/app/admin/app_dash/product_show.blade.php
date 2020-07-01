@include('app.admin.app.header')
<div class="content-wrapper">
    <section class="content">
        <div class="content-header">
            <h1><strong>Data Product</strong></h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-dark">
                        <div class="card-body">
                        {{ csrf_field() }}
                        {!! Form::model($product, ['route'=>['admin.product_update',$product->product_id], 'method'=>'PUT', 'files'=>true]) !!}

                            <img src="/images/products/{{ $product->image }}" height="300" width="300" class="rounded mx-auto d-block"  alt="poster">
                            <div class="form-group ml-3">
                                <label for="name_product">Product</label>
                                <input type="text" class="form-control" name="name_product" required value="{{ $product->name_product }}">
                            </div>
                            <div class="form-group ml-3">
                                <label for="details">Details</label>
                                <input type="text" class="form-control" name="details" required value="{{ $product->details }}">
                            </div>
                            <div class="form-group ml-3">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3">{{ $product->description }}</textarea>
                            </div>
                            <div class="form-group ml-3">
                                <label for="harga">Price</label>
                                <input type="text" class="form-control" name="harga" required value="{{ $product->harga }}">
                            </div>
                            <div class="form-group ml-3">
                                <label for="quantity">Quantity</label>
                                <input type="text" class="form-control" name="quantity" required value="{{ $product->quantity }}">
                            </div>
                            <div class="custom-file mb-3 ml-3">
                                <label for="image">Image</label>
                                <input type="file" class="text-center center-block file-upload "name="image">
                            </div>
                            <button type="submit" class="btn btn-dark ml-3">Save</button>
                    {!! Form::close() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@include('app.admin.app.footer')
