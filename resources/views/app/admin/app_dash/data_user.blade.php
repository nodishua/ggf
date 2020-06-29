@include('app.admin.app.header')
<div class="content-wrapper">
    <section class="content">
        <div class="content-header">
            <h1><strong>User Data</strong></h1>
        </div>
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-6">
                    <div class="card card-dark">
                        <div class="table-responsive text-nowrap">
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($data_user as $user)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $user->name}}</td>
                                <td>{{ $user->email }}</td>
                                <td class="text-right py-0 align-middle">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.user_profile', $user) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    <a href="{{ $user->user_id }}/delete" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
        </div>
    </section>
</div>
@include('app.admin.app.footer')
