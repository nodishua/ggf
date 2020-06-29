

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Login User </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('/style/front/img/favicon.png') }}"/>
   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/admin/css/login.css">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
            <div class = "text-center">
			<div class="card-header">
				<h3>Login</h3>
            </div>
            </div>
			<div class="card-body">
				<form method="POST" action="{{ route('login.submit') }}" aria-label="{{ __('Login User') }}">
                    @csrf
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">

                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    @if (Session('gagal'))
                    <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ session('gagal') }}</strong>
                    </div>
                    @endif
					<div class="form-group">
                        <button type="submit" class="btn float-left login_btn">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <br/>
                    <br/>
                    <a href="/register" class="links">Register Here...</a>
                    @if (Session('sukses'))
                    <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ session('sukses') }}</strong>
                    </div>
                    @endif
				</form>
			</div>
		</div>
	</div>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')
</body>
</html>
