@extends('samples')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <form action="{{ route('admin.equip.csvpost') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Equipments List
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="file-input">CSV File input</label>
                                <div class="col-md-9">
                                    <input type="file" id="file-input" class="form-control" name="file-input">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
            </div>
        <!--/.col-->
        </div>
    <!--/.row-->
    </div>
</div>

@endsection