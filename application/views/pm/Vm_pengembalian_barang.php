<?php $this->load->view('main/V_Head');?>

<?php
    $level = $this->session->userdata('level');
    if ( $level == 2 ) {
        $this->load->view('pm/Vm_Navbar');
        $linkPage = site_url('pm/C_Pm/penerimaan_barang');
    } else {
        $this->load->view('admin/Va_Navbar');
        $linkPage = site_url('admin/C_Admin/penerimaan_barang');
    }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <center><h1 class="page-header">Transaksi Pengembalian Barang</h1></center>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Servis
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                     <tr>
                                <th>NO.</th>
                                <th>NOTA</th>
                                <th>Barang</th> 
                                <th>Tgl.Trima</th>
                                <th>Penerima</th>
                                <th>Kondisi</th>
                                <th>Biaya</th>
                                <th>Tgl.Ambil</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; 
                                        foreach($data_servis AS $servis) { ?>
                                    <tr>
                                        <td><?="$no.";?></td>
                                        <td><?=$servis->nota;?></td>
                                        <td><?=$servis->nmbarang;?></td>
                                        <td><?=$servis->tglditerima;?></td>
                                        <td><?=$servis->pm_nama;?></td>
                                        <td><?=$servis->kondisibrg;?></td>
                                        <td>Rp. <?=$servis->biaya;?></td>
                                        <td><?=$servis->tglambil;?></td>
                                        <td style="text-align: center;"> 
                                            <?php  
                                                $status= $servis->status_servis;

                                                if ( $status === "PROSES" ) {
                                                    echo'
                                                        <button class="btn-success">Proses Servis</button>
                                                    ';
                                                } elseif ( $status === "MENUNGGU SPAREPART" ) {
                                                    echo'
                                                        <button class="btn-warning">Menunggu Sparepart</button>
                                                    ';
                                                } elseif ( $status === "SPAREPART DATANG" ) {
                                                    echo'
                                                        <button class="btn-warning">Sparepart Datang</button>
                                                    ';
                                                } elseif ( $status === "BISA DIAMBIL" ) {
                                                    echo'
                                                        <button class="btn-primary">Bisa Diambil</button>
                                                    ';
                                                } elseif ( $status === "SUDAH DIAMBIL" ) {
                                                    echo'
                                                        <button class="btn-default">Sudah Diambil</button>
                                                    ';
                                                } else {
                                                    echo'
                                                        <button class="btn-danger">Cancel</button>
                                                    ';
                                                }  
                                            ?>  
                                        </td>
                                        <td style="text-align: center;">
                                            <?php  
                                                if ( $level == 2 ) {
                                                    $url = site_url('pm/C_Pm/update_pengembalian/'.$servis->nota);
                                                } else {
                                                    $url = site_url('admin/C_Admin/update_pengembalian_karyawan/'.$servis->nota);
                                                }

                                                if  ( $status === "BISA DIAMBIL" ) {
                                                    echo' 
                                                        <a href=" '.$url.' ">
                                                            <i class="glyphicon glyphicon-print"  title="print"></i>
                                                        </a> 
                                                    ';
                                                } elseif  ( $status === "CANCEL" ) {
                                                    echo' 
                                                        <a href=" '.$url.' ">
                                                            <i class="glyphicon glyphicon-print"  title="print"></i>
                                                        </a> 
                                                    ';
                                                } else {
                                                     echo'
                                                        <a href="#!" style="cursor: no-drop; color: #999;">
                                                            <i class="glyphicon glyphicon-print" title="Print"></i>
                                                        </a>
                                                    ';
                                                }
                                            ?>
                                            
                                            

                                            <!-- <a href="<?=site_url('pm/C_Pm/update_pengembalian/'.$servis->nota); ?>" target="_blank">
                                                <i class="glyphicon glyphicon-print"  title="Print"></i>
                                            </a> -->
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