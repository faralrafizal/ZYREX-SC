<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('admin/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Teknisi</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <font color="red"><?php echo validation_errors();?></font>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Form add New Teknisi
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                <div class="form-group">
                                            <label class="control-label" for="fullname">Full Name <span class="red">*</span></label>
                                            <input type="text" name="fullname" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="username">Username <span class="red">*</span></label>
                                            <input type="text" name="username" class="form-control" required>
                                        </div>
                                                                          
                                        <div class="form-group">        
                                        <label class="control-label" for="username">Cabang <span class="red">*</span></label>    
                                        <select class="form-control" aria-label="Default select example">
                                            <option selected>--Pilih Cabang--</option>
                                            <option value="1">Bandung</option>
                                            <option value="2">Medan</option>
                                            <option value="3">Surabaya</option>
                                        </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label" for="tlpn">No.Tlpn / WhatsApp <span class="red">*</span></label>
                                            <input type="text" name="tlpn" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                        <form>
                                            <label class="control-label" for="password">Password <span class="red">*</span> </label>
                                            <input type="password" name="password" class="form-control" autocomplete="on" required>
                                            </form>
                                        </div>

                                        <div class="form-group">
                                        <form>
                                            <label class="control-label" for="passconf">Confirm Password <span class="red">*</span></label>
                                            <input type="password" name="passconf" class="form-control" autocomplete="on"  required>
                                        </form>
                                        </div>
                                        <input type="reset" values="reset" class="btn btn-danger">
                                        <button type="submit" name="submit" class="btn btn-success">Simpan
                                        </button> 
                                        <div class="col-lg-4" id="editPwdIpt" style="display: none;">
                                           
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