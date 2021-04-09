<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Add Customer
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Customer Name</label>
                            <input type="text" class="form-control" name="name" id="customerName">
                            <small class="form-text text-danger"><?php echo form_error('name');?></small>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address">
                            <small class="form-text text-danger"><?php echo form_error('address');?></small>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber">Phone Number</label>
                            <input type="number" class="form-control" name="phoneNumber" id="phoneNumber">
                            <small class="form-text text-danger"><?php echo form_error('phoneNumber');?></small>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="<?php echo base_url(); ?>customer" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>