<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Add Receive
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                         <label class="col-form-label col-3 text-lg-right text-left">ID Purchase</label>
                         <div class="col-9">
                            <select class="form-control form-control-lg form-control-solid" name="purchase_id" id="purchase_id">
                                <option selected value="" disabled="">Choose Purchase ID</option>
                                <?php foreach ($data as $key): ?>
                                    <option value="<?php echo $key['purchase_id']; ?>"><?php echo $key['purchase_id']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>                   
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                            <small class="form-text text-danger"><?php echo form_error('nama_produk');?></small>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" id="jumlah">
                            <small class="form-text text-danger"><?php echo form_error('jumlah');?></small>
                        </div>
                        <div class="form-group">
                            <label for="kualitas">Kualitas</label>
                            <input type="text" class="form-control" name="kualitas" id="kualitas">
                            <small class="form-text text-danger"><?php echo form_error('kualitas');?></small>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="<?php echo base_url(); ?>receive" class="btn btn-secondary">Cancel</a>
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