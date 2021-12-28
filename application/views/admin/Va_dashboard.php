<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('admin/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <br><h2 class="page-header">Welcome <b><?php echo $this->session->userdata('admin_user') ?></b></h2> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           
            <div class="row" id="panel-cta">
                <div class="col-lg-3 col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x  blue"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                  
                                    <div class="huge"></div>
                                 
                                    <div class="panel-heading-text">Manager Registered</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('admin/C_Admin/read_admin');?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
               <div class="col-lg-3 col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-list-alt fa-5x green"></i>
                                </div>
                                <div class="col-xs-9 text-right ">
                                   
                                    <div class="huge"></div>
                                    
                                    <div class="panel-heading-text">Data Servis</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('admin/C_Admin/read_servis');?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> 

               <div class="col-lg-3 col-md-6">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="glyphicon glyphicon-envelope fa-5x orange"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                   
                                    <div class="huge"></div>
                                    
                                    <div class="panel-heading-text">Komplain Servis</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo site_url('admin/C_Admin/read_komplain');?>">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div> 

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