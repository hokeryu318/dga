@extends('samples')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('admin.iform.addpost') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add a iForm</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">iForm Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="text-input" name="name" class="form-control" placeholder="iForm name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select">iForm Category</label>
                                <div class="col-md-9">
                                <select id="select" name="category" class="form-control" required>
                                    <option value="">None</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>                                        
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                  <tr>
                                    <th>Label</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody id="tbody">
                                    <tr id="tr-clone" style="display:none;" class="trow">
                                        <td>
                                            <input type="text" class="form-control clonetext" placeholder="Label Text">
                                        </td>
                                        <td>
                                            <select class="form-control cloneselect">
                                                <option value="1">Text</option>
                                                <option value="2">Number</option>
                                            </select>
                                        </td>
                                        <td>
                                            <span>
                                                <a class="badge badge-danger aremove" href="#" onclick="onRemove(this)">Delete</a>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button type="button" onclick="addTr();" class="btn btn-sm btn-info"><i class="fa fa-ban"></i> Add Field</button>
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
    var index = 0;
    function addTr()
    {
        index++;
        var obj = $('#tr-clone').clone();
        obj.show();
        obj.attr('name', 'row_' + index);
        $('.clonetext', obj).attr('name', 'label[]');
        $('.cloneselect', obj).attr('name', 'select[]');
        $('.clonetext', obj).attr('required', 'required');

        $('#tbody').append(obj);
    }

    function onRemove(obj){
        $(obj).closest('.trow').remove();
    }
</script>   