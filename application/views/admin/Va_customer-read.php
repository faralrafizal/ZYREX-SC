<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('admin/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <center><h1 class="page-header">Halaman Data Customer</h1></center>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <a href="<?php echo site_url('admin/C_Admin/create_customer');?>" class="btn btn-primary">
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
                            Data Customer
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="width: 10%;">No.</th>
                                        <th>Nama</th>
                                        <th>No. WhatsApp</th>
                                        <th>Email</th>
                                        <th>Alamat lengkap</th>
                                        <th style="text-align: center;">Total Servis</th>
                                        <th style="text-align: center;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($read_customer AS $customer){ ?>
                                    <tr>
                                        <td><?="$no.";?></td>
                                        <td><?=$customer->customer_nama; ?></td>
                                        <td><?= $customer->customer_wa; ?></td>
                                        <td><?=$customer->customer_email; ?></td>
                                        <td>"<?=$customer->customer_alamat;?>"<?$customer->provinsi; ?></td>
                                        
                                        <td style="text-align: center;">
                                            <?php  
                                                $wa = $customer->customer_wa;
                                            ?>
                                            <?php 
                                                $this->db->like('tlpn', ''.$wa.'');
                                                $this->db->from('dataservis');
                                                echo $this->db->count_all_results()." x";
                                            ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <a href="<?=site_url('admin/C_Admin/zoom_customer/'.$customer->customer_id);?>"><i class="fa fa-search fa-fw" style="color: black;"></i></a>
                                            &nbsp;|&nbsp;
                                            <a href="<?=site_url('admin/C_Admin/edit_customer/'.$customer->customer_id);?>"><i class="fa fa-edit fa-fw" style="color: blue;"></i></a>
                                            &nbsp;|&nbsp;
                                            <?php  
                                                $noHp = substr_replace($customer->customer_wa,'62',0,1);

                                                $isiWa = "https://api.whatsapp.com/send?phone=".$noHp."&text=Hallo ".$customer->customer_nama."  ";
                                            ?>
                                            <a href="<?= $isiWa; ?>" target="_blank"><i class="fa fa-whatsapp fa-fw" style="color: green;"></i></a>
                                            &nbsp;|&nbsp;
                                            <a href="<?=site_url('admin/C_Admin/delete_customer/'.$customer->customer_id);?>" onClick="return doconfirm();"><i class="fa fa-trash fa-fw" style="color: red;"></i></a>
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