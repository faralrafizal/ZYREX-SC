<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('admin/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Edit Customer</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <font color="red"><?php echo validation_errors();?></font>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Form Edit Customer
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                    <?php echo form_open("admin/C_Admin/update_customer_process"); ?>
                                        <input type="hidden" name="customer_id" value="<?=$data_customer->customer_id;?>">
                                        <div class="form-group">
                                            <label class="control-label" for="fullname">Full Name <span class="red">*</span></label>
                                            <input type="text" name="fullname" class="form-control"  value="<?=$data_customer->customer_nama;?>"  required >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="whatsapp">No. WhatsApp <span class="red">*</span></label>
                                            <input type="number" name="whatsapp" class="form-control" value="<?=$data_customer->customer_wa;?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="email">Email <span class="red">*</span></label>
                                            <input type="email" name="email" class="form-control" value="<?=$data_customer->customer_email;?>" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label" for="address">Alamat <span class="red">*</span></label>
                                            <textarea type="text" name="address" id="input" class="form-control" required="required"><?=$data_customer->customer_alamat;?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="tgl_lahir">Tanggal Lahir <span class="red">*</span></label>
                                            <input type="date" name="tgl_lahir" class="form-control" value="<?=$data_customer->customer_tgl_lahir;?>" required>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-success">Edit
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