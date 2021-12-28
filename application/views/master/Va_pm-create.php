<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('master/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Pramuniaga</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <font color="red"><?php echo validation_errors();?></font>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Form add New Pramuniaga
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                    <?php echo form_open("master/C_Master/create_pm_process"); ?>
                                        <div class="form-group">
                                            <label class="control-label" for="fullname">Full Name <span class="red">*</span></label>
                                            <input type="text" name="fullname" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="username">Username <span class="red">*</span></label>
                                            <input type="text" name="username" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label" for="address">Alamat <span class="red">*</span></label>
                                            <textarea type="text" name="address" id="input" class="form-control" required="required"></textarea>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label" for="tlpn">No.Tlpn / WhatsApp <span class="red">*</span></label>
                                            <input type="text" name="tlpn" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="password">Password <span class="red">*</span></label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="passconf">Confirm Password <span class="red">*</span></label>
                                            <input type="password" name="passconf" class="form-control" required>
                                        </div>
                                        <input type="reset" values="reset" class="btn btn-danger">
                                        <button type="submit" name="submit" class="btn btn-success">Simpan
                                        </button> 
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