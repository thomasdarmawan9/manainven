<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Add Purchase Order
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('Purchase/save'); ?>" method="post">
                        <div class="form-group">
                         <label class="col-form-label col-3 text-lg-right text-left">Vendor Name</label>
                         <div class="col-9">
                            <select class="form-control form-control-lg form-control-solid" name="id_vendor" id="nama_vendor">
                                <option selected value="" disabled="">Choose Vendor</option>
                                <?php foreach ($data as $key): ?>
                                    <option value="<?php echo $key['id_vendor']; ?>"><?php echo $key['nama_vendor']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                        <!-- <div class="form-group">
                            <label for="produk">Produk</label>
                            <input type="text" class="form-control" name="produk" id="produk"> 
                            <small class="form-text text-danger"><?php echo form_error('produk');?></small>
                            <th style="width:10%"><button type="button" id="add_row" class="btn btn-default"><i class="fa fa-plus"></i></button></th>
                        </div> -->

                        <div class="form-group">
                            <label for="produk">Produk</label>
                            <div id="inputFormRow">
                                <div class="input-group mb-3">
                                    <input type="text" name="produk[]" class="form-control m-input" autocomplete="off">
                                    <div class="input-group-append">                
                                        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div id="newRow"></div>
                            <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" id="jumlah">
                            <small class="form-text text-danger"><?php echo form_error('jumlah');?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga">
                            <small class="form-text text-danger"><?php echo form_error('harga');?></small>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                            <input type="date" class="form-control datepicker" name="tanggal_pengiriman" id="tanggal_pengiriman">
                            <small class="form-text text-danger"><?php echo form_error('tanggal_pengiriman');?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat">
                            <small class="form-text text-danger"><?php echo form_error('alamat');?></small>
                        </div>
                        <div class="form-group">
                            <label for="pembayaran">Pembayaran</label>
                            <input type="text" class="form-control" name="pembayaran" id="pembayaran">
                            <small class="form-text text-danger"><?php echo form_error('pembayaran');?></small>
                        </div>
                        <div class="form-group">
                            <label for="create_date">Create Date</label>
                            <input type="date" class="form-control datepicker" name="create_date" id="create_date">
                            <small class="form-text text-danger"><?php echo form_error('create_date');?></small>
                        </div>
                        <div class="form-group">
                            <label for="create_by">Create By</label>
                            <input type="text" class="form-control" name="create_by" id="create_by">
                            <small class="form-text text-danger"><?php echo form_error('create_by');?></small>
                        </div>
                        <input type="submit" name="add" class="btn btn-primary">
                        <a href="<?php echo base_url(); ?>purchase" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
   $(function(){
      $(".datepicker").datepicker({
          format: 'yyyy-mm-dd',
          autoclose: true,
          todayHighlight: true,
      });
  });
</script>

<script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="produk[]" class="form-control m-input" placeholder="Enter title" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script>