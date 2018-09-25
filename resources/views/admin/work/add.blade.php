@extends('samples')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.work.addpost') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add a Work</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Worker Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="text-input" name="name" class="form-control" placeholder="Work name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select">Worker</label>
                                <div class="col-md-9">
                                <select id="select_worker" name="worker" class="form-control">
                                    @foreach ($workers as $worker)
                                        <option value="{{ $worker->id }}">{{ $worker->name }}</option>                                        
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select">Equipment</label>
                                <div class="col-md-9">
                                <select id="select_equipment" name="equip" class="form-control">
                                    @foreach ($equips as $equip)
                                        <option value="{{ $equip->id }}">{{ $equip->name }}</option>                                        
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Work Date</label>
                                <div class="col-md-9">
                                    <input type="text" id="text-input" name="date" class="form-control">
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
<script>
    document.addEventListener("DOMContentLoaded", function(event) { 
        
    });  
</script>
