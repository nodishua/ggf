@include('app.admin.app.header')
<div class="content-wrapper">
<section class="content">
    <div class="content-header">
        <h1><strong>Data Event</strong></h1>
    </div>
        <div class="container-fluid">
                <div class="row">
                <div class="col-md-9">
                    <div class="card card-dark">
                    <div class="card-header">
                        <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#tambahEvent">Tambah Event</button>
                    </div>
                    <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table id="myTable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Event Name</th>
                            <th>Poster</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        @foreach($data_event as $event)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $event->name_event }}</td>
                            <td><img src="/images/poster/{{ $event->poster }} "style=" width:50px; height:50px"</td>
                            <td class="text-right py-0 align-middle">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.event_show', $event) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('admin.event_delete', $event) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
        </div>
    </section>
</div>

{{--  Modal Tambah Data Event --}}
<div class="modal fade" id="tambahEvent" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahEventLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahEventLabel">Add Event</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('admin.event') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name_event">Event Name</label>
                    <input id="name_event" type="text" class="form-control{{ $errors->has('name_event') ? ' is-invalid' : '' }}" name="name_event" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"rows="3"></textarea>
                  </div>

                <div class="custom-file mb-3">
                    <label for="poster">Poster</label>
                    <input type="file" class="text-center center-block file-upload "name="poster">
                </div>
                <button type="submit" class="btn btn-dark float-right">Submit</button>
            </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
@include('app.admin.app.footer')
