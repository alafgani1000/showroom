@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Barang Masuk
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
      <li class="active">Incoming Good</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-4">
        <!-- general form elements -->
        <form role="form" method="POST" action="{{ route('tr.store') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title ">FORM BARANG MASUK</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->      
              <input type="hidden" name="0" id="nilai" value="0">         
              <div class="box-body">
                  {{-- <div class="form-group">
                      <label for="noid">Kode</label>
                      <input name="incoming_code" type="text" class="form-control" id="incoming_code"  value="">              
                      <span class="invalid-feedback" role="alert" id="help_incoming_code">
                      </span>
                  </div> --}}
                  <div class="form-group">
                      <label for="goods_name">Nama Barang</label>
                      <input name="goods_name" type="text" class="form-control" id="goods_name" placeholder="Nama Barang" value="">              
                      <span class="invalid-feedback" role="alert" id="help_goods_name" >
                      </span>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="qty">Jumlah</label>
                        <input name="qty" type="text" class="form-control" id="qty" placeholder="Jumlah Barang" value="">              
                        <span class="invalid-feedback" role="alert"  id="help_qty">
                        </span>
                      </div>
                      <div class="col-md-6">                    
                        <label for="unit_id">Satuan</label>
                        <select class="form-control" name="unit_id" id="unit_id">
                            <option value="">Pilih Satuan</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="supplier_id">Suppleir</label>
                    <select class="form-control" name="supplier_id" id="supplier_id">
                        <option value="">Pilih Supllier</option>
                      
                    </select>
                  </div>
                  <div class="form-group">
                      <label for="date_of_buy">Tanggal Beli</label>
                      <input name="date_of_buy" type="text" class="form-control pull-right datepicker" id="date_of_buy" value="{{ old('end_date') }}">
                      <p class="help-block">Example block-level help text here.</p>
                  </div>
                  <div class="form-group">
                      <div class="row">
                          <div class="col-md-4">
                              <button type="submit" class="btn btn-primary">Input</button>
                          </div>
                      </div>
                  </div>     
                      <!-- /.box-body -->
              </div>
          </div>
        </form>
      </div>   

      <div class="col-md-8">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">DATA BARANG MASUK</h3>
          </div>
          <div class="box-body">
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
        </div>     
      </div>
</section>
    <script>
      var table;
      var incomingCode = $("#incoming_code").val();
      $(document).ready(function(){
          tabel = $("#example1").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/incoming_goods/"+incomingCode+"data') }}",
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

      });
    </script>
@endsection  
  