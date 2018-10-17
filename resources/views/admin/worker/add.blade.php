@extends('samples')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.worker.addpost') }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="worker_form">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add a Worker</strong>
                        </div>
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select">Area</label>
                                <div class="col-md-9">
                                <select id="select" name="area" class="form-control" required>
                                    <option value="">None</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->id }}">{{ $area->name }}</option>                                        
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Email</label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Password</label>
                                <div class="col-md-9">
                                    <input type="password" id="text-password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Retype Password</label>
                                <div class="col-md-9">
                                    <input type="password" id="text-retype" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-sm btn-primary" onClick="onSubmit()"><i class="fa fa-dot-circle-o"></i> Submit</button>
                            <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                            <button type="submit" id="btn_submit" style="display:none" />
                        </div>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>
        </div>
        <!--/.row-->
    </div>

</div>

<script>
    function onSubmit(){
        if($('#text-password').val() != $('#text-retype').val()){
            alert('Retype your password correctly');
            return;
        }
        $('#btn_submit').trigger('click');
    }
</script>

@endsection