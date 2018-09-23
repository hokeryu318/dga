@extends('samples')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.area.editpost') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="area_id" value="{{ $obj->id }}">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit Area</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select">Parent Area</label>
                                <div class="col-md-9">
                                    <select id="select" name="parent" class="form-control">
                                    <option value="0">None</option>
                                    @foreach ($parents as $parent)
                                        <option value="{{ $parent->id }}" 
                                            @if($parent->id == $obj->parent_id)
                                            selected
                                            @endif
                                            >{{ $parent->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Area Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="text-input" name="areaname" class="form-control" placeholder="Area name" value="{{ $obj->name }}">
                                </div>
                            </div>
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