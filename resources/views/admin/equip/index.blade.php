@extends('samples')
@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Equipments List
          </div>
          <div class="card-body">
            <table class="table table-responsive-sm table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Equipment name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($equips as $equip)
                    <tr>
                      <td>{{ $equip->id }}</td>
                      <td>{{ $equip->name }}</td>
                      <td>
                        <span>
                          <a class="badge badge-success" href="{{ url('admin/equip/edit/'.$equip->id) }}">Edit</a>
                          <a class="badge badge-danger" href="{{ url('admin/equip/remove/'.$equip->id) }}">Delete</a>
                        </span>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="card-footer">
              <a class="btn btn-sm btn-primary" href="{{ route('admin.equip.add') }}"><i class="fa fa-dot-circle-o"></i> Add a Equipment</a>
              <a class="btn btn-sm btn-info" href="{{ route('admin.equip.csv') }}"><i class="fa fa-dot-circle-o"></i> Import from CSV</a>
          </div>
        </div>
      </div>
      <!--/.col-->
    </div>
    <!--/.row-->
  </div>

</div>

@endsection