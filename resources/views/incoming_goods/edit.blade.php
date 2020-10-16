<div class="alert alert-success" role="alert" style="display:none;" id="alert-update">
    {{ session('success') }}
</div>
<form role="form" method="POST" action="{{ route('incoming_goods.update') }}" enctype="multipart/form-data" id="loc-update">
    {{ csrf_field() }}
    <div class="box box-primary">
       
        <!-- /.box-header -->
        <!-- form start -->      
        <input type="hidden" name="incoming_goods_id" id="incoming_goods_id" value="{{ $inc->id }}">         
        <div class="box-body">
            <div class="form-group">
                <label for="text">Nama barang</label>
                <input name="goods_name" type="text" class="form-control" id="goods_name" value="{{ $inc->goods_name }}">              
                <span class="invalid-feedback" role="alert" id="help-edit-text">
                </span>
            </div>
            <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <label for="qty">Jumlah</label>
                    <input name="qty" type="text" class="form-control" id="qty" placeholder="Jumlah Barang" value="{{ $inc->qty }}">              
                    <span class="invalid-feedback" role="alert"  id="help_qty">
                    </span>
                  </div>
                  <div class="col-md-6">                    
                    <label for="unit_id">Satuan</label>
                    <select class="form-control" name="unit_id" id="unit_id">
                            <option value="">Pilih Satuan</option>
                        @foreach ($units as $unit)
                            @if($unit->id == $inc->id)
                                <option value="{{ $unit->id }}" selected>{{ $unit->text }}</option> 
                            @else
                                <option value="{{ $unit->id }}">{{ $unit->text }}</option> 
                            @endif
                        @endforeach
                    </select>
                  </div>
                </div>
            </div>
            <div class="form-group">
                <label for="supplier_id">Supplier</label>
                <select class="form-control" name="supplier_id" id="supplier_id">
                        <option value="">Pilih Supllier</option>
                    @foreach ($suppliers as $supplier)
                        @if($supplier->id == $inc->supplier_id)
                            <option value="{{ $supplier->id }}" selected>{{ $supplier->nama }}</option> 
                        @else
                            <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option> 
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="price">Harga</label>
                <input name="price" type="text" class="form-control pull-right" id="price" value="{{ $inc->price }}">
                <p class="help-block">Example block-level help text here.</p>
            </div>
            <div class="form-group">
                <label for="date_of_buy">Tanggal Beli</label>
                <input name="date_of_buy" type="text" class="form-control pull-right datepicker" id="date_of_buy" value="{{ $inc->date_buy }}">
                <p class="help-block">Example block-level help text here.</p>
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
<script>
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
                    $("#update-form").modal('hide');
                   
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
</script>