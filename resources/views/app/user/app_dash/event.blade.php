@include('app.user.app.header')
<div class="jumbotron mb-0 img-fluid w-100 d-block bg1">
<div class="container">
</div>
<div class="container">
    <div class="row justify-content-center">
        @foreach($event as $event)
        <div class="col-md-4">
            <div class="card">
              <img src="{{ url('images/poster') }}/{{ $event->poster}}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">{{ $event->name_event }}</h5>
                <p class="card-text">
                    <strong>Description :</strong> <br>
                    {{ $event->description }}
                </p>
                <a href="{{ route('event_show', $event) }}" class="bt1 bt1--stripe bt1--m"><i class="fa fa-eye"></i> View</a>
              </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@include('app.user.app.footer')
