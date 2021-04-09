<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Customer
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $customer['customerName']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $customer['address']; ?></h6>
                    <p class="card-text"><?php echo $customer['phoneNumber']; ?></p>
                    <a href="<?php echo base_url(); ?>customer" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>