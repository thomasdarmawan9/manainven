<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Add Product
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('Add Product/save'); ?>" method="post">
                        <div class="form-group">
                            <label class="col-form-label col-3 text-lg-right text-left">No.</label>
                         <div class="card-body">
                            <div class="form-group">
                            <label for="productID">No.</label>
                            <input type="text" class="form-control" name="productID" id="productID">
                            <small class="form-text text-danger"><?php echo form_error('productID');?></small>
                        </div>
                         <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input type="text" class="form-control" name="productName" id="productName">
                            <small class="form-text text-danger"><?php echo form_error('price');?></small>
                        </div>
                         <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price">
                            <small class="form-text text-danger"><?php echo form_error('price');?></small>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" name="category" id="category">
                            <small class="form-text text-danger"><?php echo form_error('category');?></small>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" name="stock" id="stock">
                            <small class="form-text text-danger"><?php echo form_error('stock');?></small>
                        </div>
                        <input type="submit" name="add" class="btn btn-primary">
                        <a href="<?php echo base_url(); ?>purchase" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
