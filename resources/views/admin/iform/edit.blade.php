@extends('samples')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('admin.iform.editpost') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="iform_id" value="{{ $iform->id }}">
                    <div class="card">
                        <div class="card-header">
                            <strong>Edit a iForm</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">iForm Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="text-input" name="name" class="form-control" placeholder="iForm name" value="{{ $iform->name }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select">iForm Category</label>
                                <div class="col-md-9">
                                <select id="select" name="category" class="form-control">
                                    <option value="0">None</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if($category->id == $iform->category_id)
                                                selected
                                            @endif
                                        >{{ $category->name }}</option>
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
    document.addEventListener("DOMContentLoaded", function(event) { 
        var content = JSON.parse(<?= json_encode($content); ?>);
        
        for(var i = 0; i < content.length; i++){
            var obj = addTr();
            $('.clonetext', obj).val(content[i].label);
            $('.cloneselect', obj).val(content[i].type);
        }
    });
    function addTr()
    {
        index++;
        var obj = $('#tr-clone').clone();
        obj.show();
        obj.attr('name', 'row_' + index);
        $('.clonetext', obj).attr('name', 'label[]');
        $('.cloneselect', obj).attr('name', 'select[]');

        $('#tbody').append(obj);

        return obj;
    }

    function onRemove(obj){
        $(obj).closest('.trow').remove();
    }
</script>   