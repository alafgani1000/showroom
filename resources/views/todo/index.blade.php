@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-default">
                    <div class="row">
                        <div class="col-10">
                            <div class="title">
                                Task List
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary rightButton float-right" data-toggle="modal" data-target="#modelId" id="modalInsert">Add Task</button>                        
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert" id="idalert1" style="display:none">
                                
                    </div>  
                    <table class="table display" id="dttodo" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Task</th>
                                <th>Pland Finish Date</th>
                                <th>Finish Date</th>
                                <th>Date Create</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                       
                    </table>
                </div>
                    
            </div>
            <!-- Button trigger modal -->
            
            <!-- Modal -->
            <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">FORM EDIT DETAIL TASK</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="form_detail_content">
                           
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">FORM EDIT TASK</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="form_edit_content">
                           
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">FORM CREATE TASK</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div id="form_content">
                            <form id="formtodo" action="{{ route('todo.store') }}" method="POST" class="form" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">   
                                    <div class="alert alert-success" role="alert" id="idalert" style="display:none">
                                        
                                    </div>  
                                    <input type="hidden" name="0" id="nilai" value="0">               
                                    <div class="form-group">
                                        <label for="todo">Task</label>
                                        <textarea class="form-control" name="todo" id="todo" rows="2"></textarea>
                                        <small id="helpTodo" class="text-danger"></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="plan_finish_date">Plan Finish Date</label>
                                        <input type="date" name="plan_finish_date" id="plan_finish_date" class="form-control" placeholder="" aria-describedby="">
                                        <small id="helpPlanFinishDate" class="text-danger"></small>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="button" class="btn btn-primary" id="addDetail">+ Add</button>
                                        </div>
                                    </div>
                                    <div id="formDetail">
                                        <div class="form-group row label">
                                            <div class="col">
                                                <label><span class="badge badge-info text-white">Detail Task</span></label>
                                            </div>
                                            <div class="col">
                                            <label><span class="badge badge-info text-white">Plan Finish</span></label>
                                            </div>
                                            <div class="col">
                                                <label><span class="badge badge-info text-white">Lampiran</span></label>           
                                            </div>
                                        </div>
                                        <div class="form-group row detail">
                                            <div class="col">
                                                <input type="text" required class="form-control" placeholder="text" name="detail[title][0]">
                                            </div>
                                            <div class="col">
                                                <input type="date" required class="form-control" placeholder="text" name="detail[detail_plan_finish][0]">
                                            </div>
                                            <div class="col">
                                                <input type="file" class="form-control" placeholder="text" name="detail[attachment][0]">                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        // global variable
        var table = '';
        
        function resetForm(){
            $("#todo").val('');
            $("#plan_finish_date").val('');
            $("#nilai").val(0);
            $(".detachdata").detach();
        }

        function resetMessage(){
            $("#helpPlanFinishDate").html('');
            $("#helpTodo").html('');
        }

        function resetAll(){
            resetForm();
            resetMessage();
        }

        function format ( d ) {
            var trs = '';
            $.each(d.todo_details, function(i, item) {
                trs += '<tr><td>'+item.id+'</td><td>'+item.text+'</td><td>'+item.plan_finish_date+'</td><td>'+item.finish_date+'</td><td><div class="btn-group"><button class="btn btn-primary btn-sm" onclick="edit_detail('+item.id+')"><i class="fas fa-edit text-white"></i></button><button class="btn btn-sm btn-danger"><i class="fas fa-check-square text-white"></i></button></div></td></tr>';
              });
            return '<table class="table" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                    '<th>Id</th>'+
                    '<th>detail Task</th>'+
                    '<th>Plan Finish Date</th>'+
                    '<th>Finish Date</th>'+
                    '<th>Action</th>'+
                '</tr>'+
                    trs
            '</table>';
        }

        function deleted(id = null){
            if(confirm('Delete ?')){
                $.ajax({
                    type:"POST",
                    url:"{{ url('/todo/delete') }}",
                    contentType:"JSON",
                    cache:false,
                    data:{
                        id:id
                    },
                    headers:{
                        "X-CSRF-TOKEN": $("#csrfToken").attr("content")
                    }

                })
                .done(function(data){
                    $("#idalert1").html(data);
                    $("#idalert1").css({'display':'block'});
                })
                .fail(function(){

                });
            }
        }

        function edit(id = null){
            $.ajax({
                type:"GET",
                url:"{{ url('/todo/edit') }}",
                contentType:"JSON",
                cache:false,
                data:{
                    id:id
                },
                headers:{
                    "X-CSRF-TOKEN":$("#csrfToken").attr("content")
                }
            })
            .done(function(data){
                $("#form_edit_content").html(data);
                $("#modal_edit").modal();
            });
        }

        function edit_detail(id = null){
            $.ajax({
                type:"GET",
                url:"{{ url('/todo/edit_detail') }}",
                contentType:"JSON",
                cache:false,
                data:{
                    id:id
                },
                headers:{
                    "X-CSRF-TOKEN":$("#csrfToken").attr("content")
                },
            })
            .done(function(data){
                $("#form_detail_content").html(data);
                $("#modal_detail").modal();
            });
        }

        $(function(){
            var table = $('#dttodo').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/todo/data') }}",
                    type: "GET",
                    dataType: "JSON",
                    data:{ _token: "{{csrf_token()}}"}
                },
                columns: [
                        {
                            className: 'details-control',
                            orderable: false,
                            data: null,
                            defaultContent: ''
                        },
                        {data:'name', name:'name'},
                        {data:'plan_finish_date', name:'plan_finish_date'},
                        {data:'finish_date', name:'finish_date'},
                        {data:'created_at', name:'created_at'},
                        {data:'id', render: function(d){
                            return '<div class="btn btn-group"><button class="btn btn-sm btn-primary" onclick="edit('+d+')"><i class="fa fa-edit"></i></button><button class="btn btn-sm btn-danger" onclick="deleted('+d+')"><i class="fa fa-trash"></i></button></div>';
                        }}
                    ],
            });

            $('#dttodo tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );
         
                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            });

            $("#formtodo").submit(function(event){
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
                    $("#idalert").html(data);
                    $("#idalert").css({'display':'block'});
                    resetAll();                
                })
                .fail(function(data){
                    let error = data.responseJSON.errors;
                    if (error !== undefined){
                        if(error.todo !== undefined){
                            $("#helpTodo").html(error.todo);
                        }
                        if(error.plan_finish_date !== undefined){
                            $("#helpPlanFinishDate").html(error.plan_finish_date);
                        }
                    }                  
                                           
                });
           });

           $("#addDetail").click(function(){
                let nilai = parseInt($("#nilai").val());
                let nomor;
                if(nilai == 0){
                    nomor = 1;
                }else{
                    nomor = nilai + 1;
                }
                $("#nilai").val(nomor);
                $("#formDetail").append('<div class="form-group row detail detachdata">'+
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

           $("body").on("click",".delete",function(){
                $(this).parents(".detail").remove();
           });

           $("#modalInsert").click(function(){
               resetAll();
           })
        });
    </script>
@endpush