<div class="container">
    <div class="row mt-3">
        <div class="col-md-8">
            <h2 mt-4>Customer</h2>
            <?php if($this->session->flashdata('flash')): ?>
                <div class="row mt-3">
                    <div class="col-md-8">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Customer<strong>Was Succesfully</strong> <?php echo $this->session->flashdata('flash'); ?>.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <div class="row mt-3">
                <div class="">
                    <a href="customer/add" class="btn btn-primary">Add Customer</a>
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
            <?php if(empty($customer)): ?>
                <div class="alert alert-danger" role="alert">Data Not Found</div>
            <?php endif ?>
            <div class="mt-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; 
                            foreach($customer as $cust) : ?>
                        <tr>
                            <th><?php echo $i++; ?></th>  
                            <td><?php echo $cust['customerName']; ?></td>
                            <td><?php echo $cust['address']; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>customer/detail/<?php echo $cust['customerID']; ?>" class="badge badge-warning mr-2">Detail</a>
                                <a href="<?php echo base_url(); ?>customer/update/<?php echo $cust['customerID']; ?>" class="badge badge-success mr-2">Update</a>
                                <a href="<?php echo base_url(); ?>customer/delete/<?php echo $cust['customerID']; ?>" class="badge badge-danger" onclick="return confirm('Delete this Data?');">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>