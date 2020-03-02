@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Form Transaksi
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Request</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
        <!-- general form elements -->
      <form role="form" method="POST" action="{{ route('tr.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">DATA PRIBADI</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->      
        <input type="hidden" name="0" id="nilai" value="0">         
        <div class="box-body">
          <div class="form-group">
            <label for="noid">ID</label>
            <input name="noid" type="text" class="form-control" id="Nomor Identitas" placeholder="Nomor Identitas" value="">              
              <span class="invalid-feedback" role="alert">
              </span>
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input name="nama" type="text" class="form-control" id="Nama" placeholder="Nama" value="">              
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" rows="4" placeholder="Alamat"></textarea>
          <span class="invalid-feedback" role="alert">
              <strong></strong>
          </span>
        </div>
                <!-- /.box-body -->
        </div>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">DATA KENDARAAN</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="nokend">Nomor Kendaraan</label>
                  <input name="nokend" type="text" class="form-control" id="nokend" placeholder="Nomor Kendaraan" value="">              
                    <span class="invalid-feedback" role="alert">
                    </span>
                </div>
                <div class="form-group">
                  <label for="nama_product">Merk</label>
                  <input name="nama_product" type="text" class="form-control" id="nama_product" placeholder="Merk" value="">              
                    <span class="invalid-feedback" role="alert">
                    </span>
                </div>
                <div class="form-group">
                  <label for="warna">Warna</label>
                  <input name="warna" type="text" class="form-control" id="warna" placeholder="Warna" value="">              
                    <span class="invalid-feedback" role="alert">
                    </span>
                </div>
              <div>
                <label for="norangka">Nomor Kerangka</label>
                <input name="norangka" type="text" class="form-control" id="norangka" placeholder="Nomor Kerangka" value="">              
                  <span class="invalid-feedback" role="alert">
                  </span>
              </div>
              <div>
                <label for="nomesin">Nomor Mesin</label>
                <input name="nomesin" type="text" class="form-control" id="nomesin" placeholder="Nomor Mesin" value="">              
                  <span class="invalid-feedback" role="alert">
                  </span>
              </div>
                <div class="form-group">
                  <label for="stnk">Stnk</label>
                  <input name="stnk" type="file" id="exampleInputFile">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="form-group">
                  <label for="bpkb">Bpkb</label>
                  <input name="bpkb" type="file" id="exampleInputFile">
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <!-- /.box-body -->  
            </div>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">PART CHANGE</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">
            <div class="form-group">
              <button type="button" class="btn btn-primary" id="addDetail">+ Add</button>
            </div>

            <div class="form-group" id="formDetail">
              <div class="row">
                  <div class="col-md-4">
                      <label><span class="badge badge-info text-white">Nomor seri part</span></label>
                  </div>
                  <div class="col-md-4">
                  <label><span class="badge badge-info text-white">Nama part</span></label>
                  </div>
                  <div class="col-md-4">
                      <label><span class="badge badge-info text-white">Biaya</span></label>           
                  </div>
              </div>
              <div class="form-group row detail">
                  <div class="col-md-4">
                      <input type="text" required class="form-control" placeholder="text" name="detail[nomor][0]">
                  </div>
                  <div class="col-md-4">
                      <input type="text" required class="form-control" placeholder="text" name="detail[nama][0]">
                  </div>
                  <div class="col-md-4">
                      <input type="text" class="form-control" placeholder="text" name="detail[cost][0]">                            
                  </div>
              </div>
          </div>
          
          <!-- /.box-body -->         
        </div>
        </div>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">DATA PEMBELIAN</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">
            <div class="form-group">
              <label for="cost">Biaya</label>
              <input name="cost" type="text" class="form-control" id="cost" placeholder="Harga pembelian" value="">              
                <span class="invalid-feedback" role="alert">
                </span>
            </div>
          <div class="form-group">
            <label for="stnk">Tanggal Beli</label>
            <input name="purchase_date" type="text" class="form-control pull-right datepicker" id="" value="{{ old('end_date') }}">
            <p class="help-block">Example block-level help text here.</p>
          </div>
          <!-- /.box-body -->
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label>Ket</label><br/>
                <label>* Harus di isi</label>
              </div>
            </div>
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
    </div>
</section>
    <script>
      $(document).ready(function(){
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
                    '<div class="col-md-4">'+
                        '<input type="text" class="form-control" placeholder="text" name="detail[nomor]['+ nomor +']">'+
                    '</div>'+
                    '<div class="col-md-4">'+
                        '<input type="text" required class="form-control" placeholder="text" name="detail[nama]['+ nomor +']">'+
                    '</div>'+
                    '<div class="col-md-4">'+
                        '<div class="input-group">'+
                            '<input type="text" class="form-control" placeholder="text" name="detail[cost]['+ nomor +']">'+
                            '<span class="input-group-btn">'+
                                '<button type="button" class="btn btn-danger delete">-</button>'+
                            '</span>'+
                    '</div>'+
                    '</div>'+
                '</div>');
           });

           $("body").on("click",".delete",function(){
                $(this).parents(".detail").remove();
           });
      });
    </script>
@endsection  
  