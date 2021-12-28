<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('admin/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <center><h1 class="page-header">Halaman Teknisi</h1></center>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo site_url('admin/C_Admin/create_teknisi');?>" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add data
                    </a>
                </div>
            </div>
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Teknisi List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">No.</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Tlpn</th>
                                        <th>Alamat</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($data_teknisi AS $teknisi){ ?>
                                    <tr>
                                        <td><?="$no.";?></td>
                                        <td><?=$teknisi->teknisi_nama;?></td>
                                        <td><?=$teknisi->teknisi_user;?></td>
                                        <td><?=$teknisi->teknisi_tlpn;?></td>
                                        <td><?=$teknisi->teknisi_almt;?></td>
                                        <td>
                                            <a href="<?=site_url('admin/C_Admin/update_teknisi/'.$teknisi->teknisi_id);?>"><i class="fa fa-edit fa-fw" style="color: green;"></i></a>
                                            &nbsp;|&nbsp;
                                            <a href="<?=site_url('admin/C_Admin/delete_teknisi/'.$teknisi->teknisi_id);?>" onClick="return doconfirm();"><i class="fa fa-trash fa-fw" style="color: red;"></i></a>
                                        </td>
                                    </tr>
                                    <?php $no++; } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
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

    </div>
    <!-- /#wrapper -->


<?php $this->load->view('main/V_Script');?>