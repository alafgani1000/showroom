<div class="alert alert-success" role="alert" style="display:none;" id="alert-update">
    {{ session('success') }}
</div>
<form role="form" method="POST" action="{{ route('unit.update') }}" enctype="multipart/form-data" id="unit-update">
    {{ csrf_field() }}
    <div class="box box-primary">
       
        <!-- /.box-header -->
        <!-- form start -->      
        <input type="hidden" name="unit_id" id="unit_id" value="{{ $unit->id }}">         
        <div class="box-body">
            <div class="form-group">
                <label for="text">Name</label>
                <input name="text" type="text" class="form-control" id="textid" placeholder="Text" value="{{ $unit->text }}">              
                <span class="invalid-feedback" role="alert" id="help-edit-text">
                </span>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>      
        </div>
    </div>
</form>
<script>
    $("#unit-update").submit(function(event){
        event.preventDefault();
        let method = $(this).attr("method");
        let route = $(this).attr("action");
        let enctype = $(this).attr('enctype');
        let data = new FormData(this);

        $.ajax({
            type:method,
            url:route,
            enctype:enctype,
            processData:false,
            contentType:false,
            cache:false,
            data:data,
            headers: {
                "X-CSRF-TOKEN": $("#csrfToken").attr("content")
            }
        })
        .done(function(data){
            $("#alert-update").html(data);
            $("#alert-update").css({"display":"block"});
            tabel.ajax.reload();
            $("#update-form").modal('hide');
            
        })
        .fail(function(data){
            let error = data.responseJSON.errors;
            if (error !== undefined){
                if(error.text !== undefined){
                    $("#help-edit-text").html(error.text);
                }
            }                  

        })
    });
</script>