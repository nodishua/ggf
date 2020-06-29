@include('app.admin.app.header')
<div class="content-wrapper">
<section class="content">
    <div class="content-header">
        <h1><strong>Admin Data</strong></h1>
    </div>
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card card-dark">
                <div class="card-header">
                <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#tambahAdmin">New Admin</button>
                </div>
                <div class="table-responsive text-nowrap">
                    <table id="myTable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Admin</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        @foreach($data_admin as $admin)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td class="py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ $admin->admin_id }}/delete" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

{{--  Modal Tambah Data Admin --}}
<div class="modal fade" id="tambahAdmin" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahAdminLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahAdminLabel">Tambah Data Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.tambah_data_admin') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Admin Name</label>
                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" required>
                </div>
                <div class="form-group">
                    <label for="Email">Email address</label>
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
@include('app.admin.app.footer')
