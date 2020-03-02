<!-- Content Header (Page header) -->
<div class="modal fade" id="detailModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Detail Data</h4>
        </div>
        <div class="modal-body" id="modalResponse">
         
    <div class="row">
      <!-- left column -->
      <div class="col-md-10">
        <!-- general form elements -->
        {{ csrf_field() }}
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">DATA PRIBADI</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->      
        <input type="hidden" name="0" id="nilai" value="0"> 
        <input type="hidden" name="idproduct" value="{{ $product->id }}">  
        <input type="hidden" name="idsupplier" value="{{ $product->supplier->id }}">  
        <input type="hidden" name="idpurchase" value="{{ $product->purchase->id }}">       
        <div class="box-body">
          <div class="form-group">
            <label for="noid">ID</label>
            <input name="noid" type="text" class="form-control" id="Nomor Identitas" placeholder="Nomor Identitas" value="{{ $product->supplier->noid }}" readonly>              
              <span class="invalid-feedback" role="alert">
              </span>
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input name="nama" type="text" class="form-control" id="Nama" placeholder="Nama" value="{{ $product->supplier->nama }}" readonly>              
            <span class="invalid-feedback" role="alert">
            </span>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" rows="4" placeholder="Alamat" readonly>{{ $product->supplier->alamat }}</textarea>
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
                  <input name="nokend" type="text" class="form-control" id="nokend" placeholder="Nomor Kendaraan" value="{{ $product->nomor_kendaraan }}" readonly>              
                    <span class="invalid-feedback" role="alert">
                    </span>
                </div>
                <div class="form-group">
                  <label for="nama_product">Merk</label>
                  <input name="nama_product" type="text" class="form-control" id="nama_product" placeholder="Merk" value="{{ $product->nama_product }}" readonly>              
                    <span class="invalid-feedback" role="alert">
                    </span>
                </div>
                <div class="form-group">
                  <label for="warna">Warna</label>
                  <input name="warna" type="text" class="form-control" id="warna" placeholder="Warna" value="{{ $product->warna }}" readonly>              
                    <span class="invalid-feedback" role="alert">
                    </span>
                </div>
              <div>
                <label for="norangka">Nomor Kerangka</label>
                <input name="norangka" type="text" class="form-control" id="norangka" placeholder="Nomor Kerangka" value="{{ $product->norangka }}" readonly>              
                  <span class="invalid-feedback" role="alert">
                  </span>
              </div>
              <div>
                <label for="nomesin">Nomor Mesin</label>
                <input name="nomesin" type="text" class="form-control" id="nomesin" placeholder="Nomor Mesin" value="{{ $product->nomesin }}" readonly>              
                  <span class="invalid-feedback" role="alert">
                  </span>
              </div>
                <div class="form-group">
                  <label for="stnk">Stnk</label><br/>
                  <a href="" class="btn btn-lg btn-success">Image</a>
                </div>
                <div class="form-group">
                  <label for="bpkb">Bpkb</label><br/>
                  <a href="" class="btn btn-lg btn-success">Image</a>
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
                <table class="table">
                    <thead>
                        <th>Nomor seri part</th>
                        <th>Nama part</th>
                        <th>Biaya</th>
                        {{-- <th>Action</th> --}}
                    </thead>
                    <tbody>
                        @foreach ($product->partChanges as $item)
                            <tr>
                                <td>{{ $item->no_part }}</td>
                                <td>{{ $item->nama_part }}</td>
                                <td>{{ $item->biaya }}</td>
                                {{-- <td><button type="button" class="btn btn-danger btn-sm" onclick="deleteDetail(this,'{{ $item->id }}')"><i class="fa fa-trash"></i></button> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
              <input name="cost" type="text" class="form-control" id="cost" placeholder="Harga pembelian" value="{{ $product->purchase->cost }}" readonly>              
                <span class="invalid-feedback" role="alert">
                </span>
            </div>
          <div class="form-group">
            <label for="stnk">Tanggal Beli</label>
            <input name="purchase_date" type="text" class="form-control pull-right datepicker"  value="{{ $product->purchase->purchase_date }}" readonly>
          </div>                     
        </div>
        </div>
     
      </div>
    </div>

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