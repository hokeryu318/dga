@extends('samples')
@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Works List
          </div>
          <div class="card-body">
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Work name</th>
                  <th>Worker</th>
                  <th>Equipment</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($works as $work)
                    <tr>
                        <td>{{ $work->id }}</td>
                        <td>{{ $work->name }}</td>
                        <td>{{ $work->worker->name }}</td>
                        <td>{{ $work->equip->name }}</td>
                        <td>{{ $work->plan_at }}</td>
                        <td>
                            <span>
                            <a class="badge badge-success" href="{{ url('admin/work/edit/'.$work->id) }}">Edit</a>
                            <a class="badge badge-danger" href="{{ url('admin/work/remove/'.$work->id) }}">Delete</a>
                            </span>
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
              <a class="btn btn-sm btn-primary" href="{{ route('admin.work.add') }}"><i class="fa fa-dot-circle-o"></i> Add a Work</a>
          </div>
        </div>
      </div>
      <!--/.col-->
    </div>
    <!--/.row-->
  </div>

</div>

@endsection