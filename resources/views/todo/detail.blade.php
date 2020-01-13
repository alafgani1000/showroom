<form id="form_edit_todo_detail" action="{{ route('todo.update_detail') }}" method="POST" class="form" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">   
        <div class="alert alert-success" role="alert" id="idalert-edit" style="display:none">
            
        </div>  
        <input type="hidden" name="nilai_edit" id="nilai_edit" value="0">           
        <input type="hidden" name="id" id="todo_id" value="{{ $todoDetail->id }}">     
        <div class="form-group">
            <label for="todo">Task</label>
            <textarea class="form-control" name="text" id="text" rows="2">{{ $todoDetail->text }}</textarea>
            <small id="helpTodo_edit" class="text-danger"></small>
        </div>
        <div class="form-group">
            <label for="plan_finish_date">Plan Finish Date</label>
            <input type="date" name="plan_finish_date" id="plan_finish_date_edit" class="form-control" placeholder="" aria-describedby="" value="{{ $todoDetail->plan_finish_date }}">
            <small id="helpPlanFinishDate_edit" class="text-danger"></small>
        </div>
        <div id="formDetail">
            <div class="form-group row label">
                <div class="col">
                    <label><span class="badge badge-info text-white">Lampiran</span></label>           
                </div>
            </div>
            <div class="form-group row detail">
                <div class="col">
                    <input type="file" class="form-control" placeholder="text" name="attachment">
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
   
</script>