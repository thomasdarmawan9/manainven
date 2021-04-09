<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Account
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $user['name']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $user['username']; ?></h6>
                    <p class="card-text"><?php echo $user['roles']; ?></p>
                    <p class="card-text"><?php echo $user['createDate']; ?></p>
                    <a href="<?php echo base_url(); ?>user" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>