@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Transaksi
      <small></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Transaction</li>
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
              <a href="{{ route('tr.create') }}" class="btn btn-primary">Add New Data</a>
              {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Launch Default Modal
              </button> --}}
            </div>
          </div>
          <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Merk</th>
                    <th>Warna</th>
                    <th>Nomor Kendaraan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      @php
                          $no = 0;
                      @endphp
                      @foreach ($products as $product)
                        @php
                            $no++;
                        @endphp
                        <tr>
                          <td>{{ $no }}</td>
                          <td>{{ $product->nama_product }}</td>
                          <td>{{ $product->warna }}</td>
                          <td>{{ $product->nomor_kendaraan }}</td>
                          <td>
                            <a href="{{ route('tr.edit',$product->id) }}" class="btn btn-primary">Edit</a>
                            <button type="button" id="detail" data-url="{{ route('tr.detail',$product->id) }}" class="btn btn-primary">Detail</button>
                          </td>
                        </tr> 
                      @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Merk</th>
                    <th>Warna</th>
                    <th>Produk</th>
                    <th>Aksi</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
      </div>
    </div>
    
    <div id="modalresponse" style="margin-top:2rem">
    </div>
    <script>
        $(".id-modal").on("click",function(e){
            var token = $("meta[name='csrf-token']").attr("content");
            var url = $(event.target).data('url');
            $.ajax({ 
                url: url,
                type: "GET",
                data: {"_token": token, },

                success: function (data, textStatus, jqXHR) {
                    $("#modalresponse").html(data.html);
                    $("#myModal").modal("show");
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                },
            });
        });
        $(document).ready(function(){
          $("#detail").on('click', function(e){
            var token = $("meta[name='csrf-token']").attr("content");
            var url = $(event.target).data('url');
            $.ajax({ 
                url: url,
                type: "GET",
                data: {"_token": token, },

                success: function (data, textStatus, jqXHR) {
                    $("#modalresponse").html(data);
                    $("#detailModal").modal();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
              });
          });
        });
    </script>
  </section>
@endsection  