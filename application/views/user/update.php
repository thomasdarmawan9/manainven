<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Update Account
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $user['userID'];?>">
                        <div class="form-group">
                            <label for="name">Account Name</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo $user['username']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('username');?></small>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?php echo $user['username']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('username');?></small>
                        </div>
                        <div class="form-group">
                            <label for="username">Password</label>
                            <input type="password" class="form-control" name="password" id="password" value="<?php echo $user['password']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('password');?></small>
                        </div>
                        <div class="form-group">
                            <label for="username">Password Confirmation</label>
                            <input type="password" class="form-control" name="pass" id="pass" value="<?php echo $user['password']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('pass');?></small>
                        </div>
                        <div class="form-group">
                            <label for="username">Roles</label>
                            <input type="roles" class="form-control" name="roles" id="roles" value="<?php echo $user['roles']; ?>">
                            <small class="form-text text-danger"><?php echo form_error('roles');?></small>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Submit</button>
                        <a href="<?php echo base_url(); ?>user" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>