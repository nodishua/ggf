@include('app.admin.app.header')
<div class="content-wrapper">
    <section class="content">
        <div class="content-header">
            <h1><strong>Data Product</strong></h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-dark">
                    <div class="card-header">
                        <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#tambahProduct">Tambah Product</button>
                    </div>
                        <div class="table-responsive text-nowrap">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Product</th>
                                <th>Details</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Images</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($data_product as $product)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $product->name_product }}</td>
                                <td>{{ $product->details }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->harga }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td><img src="/images/products/{{ $product->image }} "style=" width:50px; height:50px"</td>
                                <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.product_show', $product) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ url('admin/product/'.$product->product_id.'/delete') }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--  <div class="ml-3">
                            {{ $data_product->links() }}
                        </div>  --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{--  Modal Tambah Data Product  --}}
<div class="modal fade" id="tambahProduct" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahproductLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahproductLabel">Tambah Data product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name_product">Nama product</label>
                    <input id="name_product" type="text" class="form-control{{ $errors->has('name_product') ? ' is-invalid' : '' }}" name="name_product" required>
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <input id="details" type="text" class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" name="details" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="harga">Price</label>
                    <input id="harga" type="text" class="form-control{{ $errors->has('harga') ? ' is-invalid' : '' }}" name="harga" required>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input id="quantity" type="text" class="form-control{{ $errors->has('quantity') ? ' is-invalid' : '' }}" name="quantity" required>
                </div>
                <div class="custom-file mb-3">
                    <label for="image">image</label>
                    <input type="file" class="text-center center-block file-upload "name="image">
                </div>

                <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>

        </div>
        <div class="modal-footer">
        </div>
        </div>
    </div>
</div>

@include('app.admin.app.footer')
