<div class="container">
    <div class="row mt-3">
        <div class="col-md-8">
            <h2 mt-4>Product</h2>
            <?php if($this->session->flashdata('flash')): ?>
                <div class="row mt-3">
                    <div class="col-md-8">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Product<strong>Was Succesfully</strong> <?php echo $this->session->flashdata('flash'); ?>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <div class="row mt-3">
                <div class="">
                    <a href="product/add.php" class="btn btn-primary">Add Product</a>
                </div>
                <div class="col-md-5">
                    <form action="" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Data" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if(empty($product)): ?>
                <div class="alert alert-danger" role="alert">Data Not Found</div>
            <?php endif ?>
            <div class="mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; 
                            foreach($product as $product) : ?>
                        <tr>
                            <td><?php echo $i++; ?></td> <td><?php echo $product['productID']; ?></td> 
                            <td><?php echo $product['productName']; ?></td>
                            <td><?php echo $product['price']; ?></td>
                            <td><?php echo $product['category']; ?></td>
                            <td><?php echo $product['stock']; ?></td>
                            <td class="">
                                <a href="<?php echo base_url(); ?>product/detail/<?php echo $product['productID']; ?>" class="badge badge-warning mr-2">Detail</a>
                                <a href="<?php echo base_url(); ?>product/edit/<?php echo $product['productID']; ?>" class="badge badge-success mr-2">Edit</a>
                                <a href="<?php echo base_url(); ?>product/delete/<?php echo $product['productID']; ?>" class="badge badge-danger" onclick="return confirm('Delete this Data?');">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>