<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Edit Product
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="productName" value="<?php echo $product['productName'];?>">
                        <div class="form-group">
                            <label for="productName">Product Name</label>
                            <input type="text" class="form-control" name="productName" id="productName" value="<?php echo $product['productName']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('productName');?></small>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" name="price" id="price" value="<?php echo $product['price']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('price');?></small>
                        </div>
                            <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" name="category" id="category" value="<?php echo $product['category']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('category');?></small>
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="text" class="form-control" name="stock" id="stock" value="<?php echo $product['stock']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('stock');?></small>
                        </div>
                        <button type="submit" name="Edit" class="btn btn-primary">Submit</button>
                        <a href="<?php echo base_url(); ?>product" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>