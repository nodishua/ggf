
    @if (Session('sukses'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('sukses') }}</strong>
    </div>
    @endif


    @if (Session('destroy'))
    <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ session('destroy') }}</strong>
    </div>
    @endif

    @if ($errors->has('name'))
    <div class="alert alert-danger" role="alert">
        <strong>{{ $errors->first('name') }}</strong>
    </div>
    @endif

    @if ($errors->has('email'))
        <div class="alert alert-danger" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </div>
     @endif
    @if ($errors->has('Password'))
        <div class="alert alert-danger" role="alert">
            <strong>{{ $errors->first('Password') }}</strong>
        </div>
    @endif

    @if (Session('gagal'))
    <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
        <a>{{ session('gagal') }}</a>
    </div>
    @endif
