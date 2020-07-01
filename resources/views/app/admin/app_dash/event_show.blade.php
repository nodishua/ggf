@include('app.admin.app.header')
<div class="content-wrapper">
    <section class="content">
        <div class="content-header">
            <h1><strong>Event Detail</strong></h1>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card card-dark">
                    <div class="card-body">
                    {{ csrf_field() }}
                    {!! Form::model($event, ['route'=>['admin.event_update',$event->event_id], 'method'=>'PUT', 'files'=>true]) !!}

                        <img src="/images/poster/{{ $event->poster }}" height="300" width="300" class="rounded mx-auto d-block"  alt="poster">
                        <div class="form-group">
                            <label for="name_event">Nama Event</label>
                            <input type="text" class="form-control" name="name_event" required value="{{ $event->name_event }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{ $event->description }}</textarea>
                        </div>
                        <div class="custom-file mb-3">
                            <label for="poster">Poster</label>
                            <input type="file" class="text-center center-block file-upload "name="poster">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@include('app.admin.app.footer')
