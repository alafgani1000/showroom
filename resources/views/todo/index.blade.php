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
                                Todo List
                            </div>
                        </div>
                        <div class="col-2">
                            <button type="button" class="btn btn-primary rightButton float-right" data-toggle="modal" data-target="#modelId">Add Todo</button>                        
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th>Todo</th>
                                <th>Date Of Take</th>
                                <th>Date Create</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                    
            </div>
            <!-- Button trigger modal -->
            
            
            <!-- Modal -->
            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">FORM CREATE TODO</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form id="formtodo" action="{{ route('todo.store') }}" method="post" class="form" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">     
                                <input type="hidden" name="0" id="nilai" value="0">               
                                <div class="form-group">
                                    <label for="todo">Todo</label>
                                    <textarea class="form-control" name="todo" id="todo" rows="4"></textarea>
                                    <small id="helpTodo" class="text-danger">Help text</small>
                                </div>
                                <div class="form-group">
                                    <label for="dateoftake">Date</label>
                                    <input type="date" name="dateoftake" id="dateoftake" class="form-control" placeholder="" aria-describedby="">
                                    <small id="helpDateoftake" class="text-danger">Help text</small>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="button" class="btn btn-primary" id="addDetail">+ Add</button>
                                    </div>
                                </div>
                                <div id="formDetail">
                                    <div class="form-group row detail">
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="text" name="detail[title][0]">
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
@endsection
@push('scripts')
    <script>
        $(function(){
           $("#formtodo").submit(function(event){
                event.preventDefault();
                let path = $(this).attr('action');
                let method = $(this).attr('method');

                
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
                $("#formDetail").append('<div class="form-group row detail">'+
                        '<div class="col">'+
                            '<input type="text" class="form-control" placeholder="text" name="detail[title]['+ nomor +']">'+
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
        });
    </script>
@endpush