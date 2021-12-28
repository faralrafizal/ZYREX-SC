<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('admin/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Teknisi</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form update Teknisi
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                    <?php echo form_open("admin/C_Admin/update_teknisi_process"); ?>
                                        <input type="hidden" name="teknisi_id" value="<?=$data_teknisi->teknisi_id;?>" required>
                                        <div class="form-group">
                                            <label class="control-label">Full Name <span class="red">*</span></label>
                                            <input type="text" name="fullname" value="<?=$data_teknisi->teknisi_nama;?>" class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Username <span class="red">*</span></label>
                                            <input type="text" name="username" value="<?=$data_teknisi->teknisi_user;?>" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label">Address <span class="red">*</span></label>
                                            <input type="text" name="address" value="<?=$data_teknisi->teknisi_almt;?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">No.Tlpn / WhatsApp <span class="red">*</span></label>
                                            <input type="text" name="tlpn" value="<?=$data_teknisi->teknisi_tlpn;?>" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Password <span class="red">*</span></label>
                                            <input type="password" name="password" class="form-control" required>
                                        </div>
                                        <div class="form-group" align="right">
                                        <input type="submit" value="Edit" class="btn btn-success">
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