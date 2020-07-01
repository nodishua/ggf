@include('app.admin.app.header')
<div class="content-wrapper">
    <div class="jumbotron mb-0 img-fluid w-100 d-block bg1">
        <div class="container ">
            <div class="container-header">
                <br>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4><i class="fa fa-user"></i> My Profile</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td width="10">:</td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td>:</td>
                                        <td>{{ $user->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td>{{ $user->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>Poscode</td>
                                        <td>:</td>
                                        <td>{{ $user->poscode }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('app.admin.app.footer')
