<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('master/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Add Customer</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <font color="red"><?php echo validation_errors();?></font>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Form add New Customer
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                    <?php echo form_open("pm/C_Pm/update_customer_process"); ?>
                                        <div class="form-group">
                                            <label class="control-label" for="fullname">Full Name</label>
                                            <input type="text" name="fullname" class="form-control"  value="<?=$data_customer->customer_nama;?>"  readonly >
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="whatsapp">No. WhatsApp</label>
                                            <input type="number" name="whatsapp" class="form-control" value="<?=$data_customer->customer_wa;?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="email">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?=$data_customer->customer_email;?>" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label" for="address">Alamat</label>
                                            <textarea type="text" name="address" id="input" class="form-control" readonly="readonly"><?=$data_customer->customer_alamat;?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control" value="<?=$data_customer->customer_tgl_lahir;?>" readonly>
                                        </div>

                                        <?php  
                                            $wa = $data_customer->customer_wa;
                                        ?>
                                        <?php 
                                            $this->db->like('tlpn', ''.$wa.'');
                                            $this->db->from('dataservis');
                                            $totalServis = $this->db->count_all_results();
                                        ?>
                                        <div class="form-group">
                                            <label class="control-label" for="">Total Servis</label>
                                            <input type="text" name="" class="form-control" value="<?= $totalServis; ?>" readonly>
                                        </div>
                                        <a href="<?php echo site_url('master/C_Master/read_customer');?>" class="btn btn-success">Back</a>
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