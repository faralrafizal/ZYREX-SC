<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('user/Vm_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <br><h3 class="page-header">Welcome <?php echo $this->session->userdata('nmpemilik') ?></i> Dengan Nota <?php echo $this->session->userdata('nota') ?> </h3> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <h3></i></h3>
            <div class="row" id="panel-cta">
                <!-- </div> -->
                  <div class="col-lg-3 col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-open-file fa-5x green"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                    <div class="huge"></div>
                                    
                                    <div class="panel-heading-text">Cek Servis</div>
                                </div>
                            </div>
                        </div>
                     <a href="<?php echo base_url ('index.php/user/C_User/nota_user/'.md5($this->session->userdata ['nota']).'') ;?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> 
                 <!-- <div class="col-lg-3 col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-send fa-5x orange"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                    <div class="huge"></div>
                                    
                                    <div class="panel-heading-text">Komplain Servis</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo base_url ('index.php/user/C_User/komplain/'.md5($this->session->userdata ['nota']).'') ;?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>  -->
                 <div class="col-lg-3 col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-log-out fa-5x red"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"></div>
                                    <div class="panel-heading-text">Logout</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('C_Main/logout');?>" onclick="return confirm('Apakah anda yakin keluar aplikasi ?')">
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> 
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php $this->load->view('main/V_Script');?>