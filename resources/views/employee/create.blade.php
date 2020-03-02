@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Form Data Karyawan
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">employee</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
        <!-- general form elements -->
      <form role="form" method="POST" action="{{ route('emp.store') }}" enctype="multipart/form-data">
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
            <label for="nip">Nip</label>
            <input name="nip" type="text" class="form-control" id="nip" placeholder="Nomor induk pegawai" value="">              
              <span class="invalid-feedback" role="alert">
              </span>
          </div>
        <div class="form-group">
            <label for="noid">Nomor Identitas</label>
            <input name="noid" type="text" class="form-control" id="noid" placeholder="Nomor identitas" value="">              
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
            <label>Jenis kelamin</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="0">Laki-Laki</option>
                <option value="1">Perempuan</option>
            </select>               
          </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" rows="4" placeholder="Alamat"></textarea>
          <span class="invalid-feedback" role="alert">
              <strong></strong>
          </span>
        </div>
            <!-- /.box-body -->
            <div class="form-group">
                <label for="tempat">Tempat</label>
                <input name="tempat" type="text" class="form-control" id="tempat" placeholder="Tempat Lahir" value="">              
                <span class="invalid-feedback" role="alert">
                </span>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input name="tanggal_lahir" type="text" class="form-control datepicker" id="tanggal_lahir" placeholder="Tanggal lahir" value="">              
                <span class="invalid-feedback" role="alert">
                </span>
            </div>
            <div class="form-group">
                <label for="telp">Telp</label>
                <input name="telp" type="text" class="form-control" id="telp" placeholder="Warna" value="">              
                <span class="invalid-feedback" role="alert">
                </span>
            </div>
            <div>
            <label for="email">Email</label>
            <input name="email" type="text" class="form-control" id="email" placeholder="Nomor Kerangka" value="">              
                <span class="invalid-feedback" role="alert">
                </span>
            </div>
            <!-- /.box-body -->  
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
  