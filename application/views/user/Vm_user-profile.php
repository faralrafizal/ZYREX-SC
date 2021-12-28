<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('user/Vm_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Profile</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form update User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                    <?php echo form_open("user/C_User/update_user_process"); ?>
                                        <input type="hidden" name="user_id" value="<?=$data_user->user_id;?>" required>
                                        <div class="form-group">
                                            <label class="control-label">Full Name</label>
                                            <input type="text" name="fullname" value="<?=$data_user->user_nama;?>" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Username</label>
                                            <input type="text" name="username" value="<?=$data_user->user_username;?>" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label">Address</label>
                                            <input type="text" name="address" value="<?=$data_user->user_almt;?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">No.Tlpn</label>
                                            <input type="text" name="tlpn" value="<?=$data_user->user_tlpn;?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Password</label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="form-group" align="right">
                                        <input type="submit" value="SUBMIT" class="btn btn-success">
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


<?php $this->load->view('main/V_Script');?>