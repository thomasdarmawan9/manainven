<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Update Vendor
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $vendor['id_vendor'];?>">
                        <div class="form-group">
                            <label for="name">Vendor Name</label>
                            <input type="text" class="form-control" name="name" id="nama_vendor" value="<?php echo $vendor['nama_vendor']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('name');?></small>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="alamat" value="<?php echo $vendor['alamat']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('address');?></small>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="number" class="form-control" name="phoneNumber" id="no_tlp" value="<?php echo $vendor['no_tlp']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('phoneNumber');?></small>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        <a href="<?php echo base_url(); ?>vendor" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>