@extends('samples')
@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Areas List
          </div>
          <div class="card-body">
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Area name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($areas as $area)
                    <tr>
                      <td>{{ $area->id }}</td>
                      <td>{{ $area->name }}</td>
                      <td>
                        <span>
                          <a class="badge badge-success" href="{{ url('admin/area/edit/'.$area->id) }}">Edit</a>
                          <a class="badge badge-secondary" href="{{ url('admin/area/list/'.$area->id) }}">Sub Areas</a>
                          <a class="badge badge-danger" href="{{ url('admin/area/remove/'.$area->id) }}">Delete</a>
                        </span>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
              <a class="btn btn-sm btn-primary" href="{{ route('admin.area.add') }}"><i class="fa fa-dot-circle-o"></i> Add a Area</a>
          </div>
        </div>
      </div>
      <!--/.col-->
    </div>
    <!--/.row-->
  </div>

</div>

@endsection