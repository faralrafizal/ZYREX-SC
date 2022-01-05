        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('admin/C_Admin');?>">Service Center | PT. Zyrexindo Mandiri Buana, Tbk</a>
            </div>
            <!-- /.navbar-header -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo site_url('admin/C_Admin');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/C_Admin/data_perusahaan/2'); ?>"><i class="fa fa-university"></i> Profil Usaha</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url('admin/C_Admin/read_pm');?>">Ticketing</a>
                                </li>
                                
                                <li>
                                    <a href="<?php echo site_url('admin/C_Admin/read_teknisi');?>">Teknisi</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/C_Admin/read_servis');?>"><i class="glyphicon glyphicon-list-alt"></i> Data Servis</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/C_Admin/read_customer');?>"><i class="fa fa-users"></i> Data Customer</a>
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-transfer"></i> Transaksi Servis<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo site_url('admin/C_Admin/penerimaan_barang');?>">Penerimaan Barang</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('admin/C_Admin/pengembalian_barang_karyawan');?>">Pengembalian Barang</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/C_Admin/pengembalian_barang');?>"><i class="glyphicon glyphicon-share"></i> Tindakan Servis</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('admin/C_Admin/read_komplain');?>"><i class="glyphicon glyphicon-envelope"></i> Komplain</a>
                        </li>
                         <li>
                            <a href="<?php echo site_url('admin/laporan/laporan');?>"><i class="glyphicon glyphicon-file"></i> Laporan Periode</a>
                            
                                <!-- <li>
                                    <a href="<?php echo site_url('admin/report');?>" target="_blank">Laporan Keseluruhan</a>
                                </li>  -->
                                <!-- <li>
                                    <a href="<?php echo site_url('admin/laporan/laporan');?>" >Laporan Periode</a>
                                </li> -->
                            
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <li>
                            <a href="<?php echo site_url('C_Main/logout');?>" onclick="return confirm('Apakah anda yakin keluar aplikasi ?')"><i class="glyphicon glyphicon-log-out"></i> Logout</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav><br>