<form id="form_edit_todo" action="{{ route('todo.update') }}" method="POST" class="form" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">   
        <div class="alert alert-success" role="alert" id="idalert-edit" style="display:none">
            
        </div>  
        <input type="hidden" name="nilai_edit" id="nilai_edit" value="0">           
        <input type="hidden" name="id" id="todo_id" value="{{ $todo->id }}">     
        <div class="form-group">
            <label for="todo">Task</label>
            <textarea class="form-control" name="todo" id="todo_edit" rows="2">{{ $todo->name }}</textarea>
            <small id="helpTodo_edit" class="text-danger"></small>
        </div>
        <div class="form-group">
            <label for="plan_finish_date">Plan Finish Date</label>
            <input type="date" name="plan_finish_date" id="plan_finish_date_edit" class="form-control" placeholder="" aria-describedby="" value="{{ $todo->plan_finish_date }}">
            <small id="helpPlanFinishDate_edit" class="text-danger"></small>
        </div>
        <div class="form-group">
            <table class="table">
                <thead>
                    <th>Detail Task</th>
                    <th>Plan Finish</th>
                    <th>Attachment</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($todo->todoDetails as $item)
                        <tr>
                            <td>{{ $item->text }}</td>
                            <td>{{ $item->plan_finish_date }}</td>
                            <td>{{ $item->attachment }}</td>
                            <td><button type="button" class="btn btn-danger btn-sm" onclick="deleteDetail(this,'{{ $item->id }}')"><i class="fa fa-trash"></i></button>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="button" class="btn btn-primary" id="add_edit_detail">+ Add</button>
            </div>
        </div>
        <div id="form_edit_etail">
            <div class="form-group row label">
                <div class="col">
                    <label><span class="badge badge-info text-white">Detail Task</span></label>
                </div>
                <div class="col">
                <label><span class="badge badge-info text-white">Plan Finish</span></label>
                </div>
                <div class="col">
                    <label><span class="badge badge-info text-white">Attachment</span></label>           
                </div>
            </div>
            
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
<script>
    function resetForm(){
        $("#todo_edit").val('');
        $("#plan_finish_date_edit").val('');
        $("#nilai_edit").val(0);
        $(".detachdata").detach();
    }

    function resetMessage(){
        $("#helpPlanFinishDate_edit").html('');
        $("#helpTodo_edit").html('');
    }

    function resetAll(){
        resetForm();
        resetMessage();
    }

    function deleteDetail(sys, id = null){
        if(confirm('Delete ?')){
            $.ajax({
                type:"POST",
                url:"{{ url('/todo/delete_detail') }}",
                data:{
                    id:id
                },
                headers:{
                    "X-CSRF-TOKEN":$('#csrfToken').attr("content")
                }
            })
            .done(function(data){
                $("#idalert-edit").html(data);
                $("#idalert-edit").css({'display':'block'});
                $(sys).parent().parent().remove();
            });
        }
    }

    $(function(){
        $("#form_edit_todo").submit(function(event){
            event.preventDefault();
            let method = $(this).attr("method");
            let url = $(this).attr("action");
            let enctype = $(this).attr("enctype");
            let data = $(this).serialize(); 
            var formData = new FormData(this);
            
            $.ajax({
                type: method,
                url: url,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                data:formData,
                headers: {
                    "X-CSRF-TOKEN": $("#csrfToken").attr("content")
                },
                beforeSend: function(){
                    
                }
            })
            .done(function(data){
                $("#idalert-edit").html(data);
                $("#idalert-edit").css({'display':'block'});
                resetAll();                
            })
            .fail(function(data){
                let error = data.responseJSON.errors;
                if (error !== undefined){
                    if(error.todo !== undefined){
                        $("#helpTodo_edit").html(error.todo);
                    }
                    if(error.plan_finish_date !== undefined){
                        $("#helpPlanFinishDate_edit").html(error.plan_finish_date);
                    }
                }                  
                                    
            });
        });

        $("#add_edit_detail").click(function(){
            let nilai = parseInt($("#nilai_edit").val());
            let nomor;
            if(nilai == 0){
                nomor = 1;
            }else{
                nomor = nilai + 1;
            }
            $("#nilai_edit").val(nomor);
            $("#form_edit_etail").append('<div class="form-group row detail detachdata">'+
                    '<div class="col">'+
                        '<input type="text" class="form-control" placeholder="text" name="detail[title]['+ nomor +']">'+
                    '</div>'+
                    '<div class="col">'+
                        '<input type="date" required class="form-control" placeholder="text" name="detail[detail_plan_finish]['+ nomor +']">'+
                    '</div>'+
                    '<div class="col">'+
                        '<div class="input-group">'+
                            '<input type="file" class="form-control" placeholder="text" name="detail[attachment]['+ nomor +']">'+
                            '<div class="input-group-append">'+
                                '<button type="button" class="btn btn-danger btn-sm delete">-</button>'+
                            '</div>'+
                    '</div>'+
                    '</div>'+
                '</div>');
        });
    })
</script>