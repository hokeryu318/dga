@extends('samples')
@section('content')
<div class="container-fluid">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('admin.equip.addpost') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="card">
                        <div class="card-header">
                            <strong>Add a iForm</strong>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="text-input">Eqipment Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="text-input" name="name" class="form-control" placeholder="Eqipment name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="select">iForm</label>
                                <div class="col-md-9">
                                <select id="select" name="iform" class="form-control" onchange="onChangeIform(this)">
                                    @foreach ($iforms as $iform)
                                        <option value="{{ $iform->id }}">{{ $iform->name }}</option>                                        
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                  <tr>
                                    <th>Label</th>
                                    <th>Value</th>
                                  </tr>
                                </thead>
                                <tbody id="tbody">
                                    <tr id="tr-clone" style="display:none;" class="trow">
                                        <td class="label">
                                            label
                                        </td>
                                        <input type="hidden" class="clonelabel">
                                        <td>
                                            <input type="text" class="form-control clonevalue" placeholder="Value Text">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
    var index = 0;
    document.addEventListener("DOMContentLoaded", function(event) { 
        var iformidx = $('#select').val();
        populateFields(iformidx);
    });
    function addTr()
    {
        index++;
        var obj = $('#tr-clone').clone();
        obj.show();
        obj.attr('name', 'row_' + index);
        $('.clonelabel', obj).attr('name', 'label[]');
        $('.clonevalue', obj).attr('name', 'value[]');
        $('.clonevalue', obj).attr('required', 'required');

        $('#tbody').append(obj);

        return obj;
    }

    function onRemove(obj){
        $(obj).closest('.trow').remove();
    }

    function onChangeIform(obj){
        clearTr();
        var iformidx = $('#select').val();
        populateFields(iformidx);
    }

    function populateFields(iformid){
        $.ajax({
            type: 'POST',
            url: "{{ route('admin.iform.info') }}",
            data: {
                id      : iformid,
                _token  : '{{ csrf_token() }}'
            },
            success: function(data){
                var arr = JSON.parse(data);
                
                for(var i = 0; i < arr.length; i++){
                    var obj = addTr();
                    $('.label', obj).html(arr[i].label);
                    $('.clonelabel', obj).val(arr[i].label);
                    $('.clonevalue', obj).val();
                }
            }
        });
    }

    function clearTr(){
        for(var i = 1; i <= index; i++){
            $('[name=row_' + i + ']').remove();
        }
    }
</script>   