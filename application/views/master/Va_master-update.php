<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('master/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Master</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form update Master
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                    <?php echo form_open("master/C_Master/update_master_process"); ?>

                                        <input type="hidden" name="master_id" value="<?=$data_master->master_id;?>" required>
                                        <div class="form-group">
                                            <label class="control-label" for="username">Username <span class="red">*</span></label>
                                            <input type="text" name="username" value="<?=$data_master->master_user;?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="password">Password <span class="red">*</span></label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="passconf">Confirm Password <span class="red">*</span></label>
                                            <input type="password" name="passconf" class="form-control" required>
                                        </div>
                                        <input type="reset" value="Reset" class="btn btn-danger">
                                        <input type="submit" value="Edit" class="btn btn-success">
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