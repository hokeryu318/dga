@extends('samples')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.area.addpost') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add a Area</strong>
                        </div>
                        <div class="card-body">
                            
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>
        </div>
        <!--/.row-->
    </div>

</div>

@endsection