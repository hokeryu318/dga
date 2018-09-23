@extends('samples')
@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Workers List
          </div>
          <div class="card-body">
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Worker name</th>
                  <th>Area</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($workers as $worker)
                    <tr>
                      <td>{{ $worker->id }}</td>
                      <td>{{ $worker->name }}</td>
                      <td>{{ $worker->area_id }}</td>
                      <td>
                        <span>
                          <a class="badge badge-success" href="{{ url('admin/worker/edit/'.$worker->id) }}">Edit</a>
                          <a class="badge badge-danger" href="{{ url('admin/worker/remove/'.$worker->id) }}">Delete</a>
                        </span>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
              <a class="btn btn-sm btn-primary" href="{{ route('admin.worker.add') }}"><i class="fa fa-dot-circle-o"></i> Add a Worker</a>
          </div>
        </div>
      </div>
      <!--/.col-->
    </div>
    <!--/.row-->
  </div>

</div>

@endsection