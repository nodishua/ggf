@include('app.user.app.header')
<div class="jumbotron mb-0 img-fluid w-100 d-block bg1">
<div class="container mt-3">
    <div class="card flex-row flex-wrap bb">
        <div class="card-header border-0">
            <img src="{{ url('images/poster') }}/{{ $event->poster}}" alt="" height="100%">
        </div>
        <div class="card-block px-2 mt-3">
            <h1 class="card-title"><strong>{{ $event->name_event }}</strong></h1>
            <hr>
            <p class="card-text">
                <strong>Description :</strong><br>
                {{ $event->description }}
            </p>
        </div>
    </div>
</div>
</div>
@include('app.user.app.footer')
