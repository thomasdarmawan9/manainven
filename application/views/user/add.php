<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Add Account
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Account Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                            <small class="form-text text-danger"><?php echo form_error('name');?></small>
                        </div>
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" name="username" id="username">
                            <small class="form-text text-danger"><?php echo form_error('username');?></small>
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                            <small class="form-text text-danger"><?php echo form_error('password');?></small>
                        </div>
                        <div class="form-group">
                            <label for="name">Password Confirmation</label>
                            <input type="password" class="form-control" name="pass" id="pass">
                            <small class="form-text text-danger"><?php echo form_error('pass');?></small>
                        </div>
                        <div class="form-group">
                            <label for="Roles">Roles</label>
                            <select class="form-control" name="roles" id="roles">
                                <option selected disabled>Select Roles ...</option>
                                <option value="Owner">Owner</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Create Date</label>
                            <input type="date" class="form-control datepicker" name="createDate" id="createDate">
                            <small class="form-text text-danger"><?php echo form_error('createDate');?></small>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Submit</button>
                        <a href="<?php echo base_url(); ?>user" class="btn btn-secondary">Cancel</a>
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