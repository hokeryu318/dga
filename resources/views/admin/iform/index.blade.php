@extends('samples')
@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> IForms List
          </div>
          <div class="card-body">
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>IForm name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($iforms as $iform)
                    <tr>
                      <td>{{ $iform->id }}</td>
                      <td>{{ $iform->name }}</td>
                      <td>
                        <span>
                          <a class="badge badge-success" href="{{ url('admin/iform/edit/'.$iform->id) }}">Edit</a>
                          <a class="badge badge-danger" href="{{ url('admin/iform/remove/'.$iform->id) }}">Delete</a>
                        </span>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
              <a class="btn btn-sm btn-primary" href="{{ route('admin.iform.add') }}"><i class="fa fa-dot-circle-o"></i> Add a IForm</a>
          </div>
        </div>
      </div>
      <!--/.col-->
    </div>
    <!--/.row-->
  </div>

</div>

@endsection