@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Barang Masuk
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Barang Masuk</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
          @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
          @endif
          <div class="box">
            <div class="box-header">
              {{-- <a href="{{ route('tr.create') }}" class="btn btn-primary">Add New Data</a> --}}
              <a href="{{ route('incoming_goods.create') }}" class="btn btn-default">
                Add Data
              </a>
            </div>
          </div>
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="alert alert-success" role="alert" style="display:none;" id="alert-loc">
                  
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Kode Barang Masuk</th>
                    <th>Barang Nama</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th>Supplier</th>
                    <th>Tanggal Input</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                     
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
      </div>
    </div>

    {{-- update modal --}}
      <!-- Content Header (Page header) -->
    <div class="modal fade" id="update-form">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">FORM UPDATE LOCATION</h4>
                </div>
                <div class="modal-body" id="content-response">
                    
                </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
      </div>
    </div>
    
  <!-- /.modal-content -->
    {{-- end update modal --}}
    
   <!-- Content Header (Page header) -->
    <div class="modal fade" id="creat-form">
        <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">FORM CREATE LOCATION</h4>
                </div>
                <div class="modal-body" id="modalResponse">
                    <div class="alert alert-success" role="alert" style="display:none;" id="alert-create">
                        {{ session('success') }}
                    </div>
                    <form role="form" method="POST" action="{{ route('loc.store') }}" enctype="multipart/form-data" id="loc-create">
                        {{ csrf_field() }}
                        <div class="box box-primary">
                           
                            <!-- /.box-header -->
                            <!-- form start -->      
                            <input type="hidden" name="0" id="nilai" value="0">         
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="text">Name</label>
                                    <input name="text" type="text" class="form-control" id="textid" placeholder="Text" value="">              
                                    <span class="invalid-feedback" role="alert" id="help-text">
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
                </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
        </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    </div>
    <script>
        var tabel;
        $(document).ready(function(){
            tabel = $("#example1").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/incoming_goods/data') }}",
                    type: "GET",
                    dataType: "JSON",
                    data:{ _token: "{{csrf_token()}}"}
                },
                columns: [
                        {data:'id', name:'id'},
                        {data:'incoming_data', name:'incoming_data'},
                        {data:'goods_name', name:'goods_name'},
                        {data:'qty', name:'qty'},
                        {data:'unit.text', name:'unit.text'},
                        {data:'price', name:'price'},
                        {data:'supplier.text', name:'supplier.text'},
                        {data:'created_at', name:'created_at'},
                        {data:'id', render: function(d){
                            return '<div class="btn btn-group"><button class="btn btn-sm btn-primary edit-data" data-id="'+d+'"> <i class="fa fa-edit"></i></button><button class="btn btn-sm btn-danger delete-data" data-id="'+d+'"> <i class="fa fa-trash"></i></button></div>';
                        }}
                    ],
            });

            $("#example1 tbody").on("click", "tr button.edit-data", function(){
                const id = $(this).attr('data-id');
                let route = "/loc/"+id+"/edit";
                $.ajax({
                  type:'GET',
                  url:route,
                  headers: {
                      "X-CSRF-TOKEN": $("#csrfToken").attr("content")
                  }
                })
                .done(function(data){
                  $("#content-response").html(data);
                  $("#update-form").modal();
                })
                .fail(function(data){
                  console.log(data);
                })
               
            });

            $("#example1 tbody").on("click", "tr button.delete-data", function(){
              const id = $(this).attr('data-id');
              if(confirm("Delete ?")){
                $.ajax({
                    type:"POST",
                    url:"{{ url('/loc/delete') }}",
                    data:{
                      id:id,
                      _token: "{{csrf_token()}}"
                    }
                  })
                  .done(function(data){
                    $("#alert-loc").html(data);
                    $("#alert-loc").css({"display":"block"});
                    tabel.ajax.reload();
                  })
                  .fail(function(data){
                    console.log(data);
                  })
              }
            });

            $("#loc-create").submit(function(event){
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
                    $("#alert-create").html(data);
                    $("#alert-create").css({"display":"block"});
                    $("#textid").val("");
                    tabel.ajax.reload();
                })
                .fail(function(data){
                    let error = data.responseJSON.errors;
                    if (error !== undefined){
                        if(error.text !== undefined){
                            $("#help-text").html(error.text);
                        }
                    }                  

                })
            });

            $("#loc-update").submit(function(event){
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
        });
    </script>
  </section>
@endsection  