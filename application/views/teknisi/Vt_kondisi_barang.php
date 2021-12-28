<?php $this->load->view('main/V_Head');?>


<?php
    $level = $this->session->userdata('level');
    if ( $level == 3 ) {
        $this->load->view('teknisi/Vt_Navbar');
    } else {
        $this->load->view('admin/Va_Navbar');
    }
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <center><h2 class="page-header">Transaksi Pemberitahuan Servis Teknisi</h2></center>
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
                                <th>Kerusakan</th>
                                <th>Tgl.Trima</th>
                                <th>Penerima</th>
                                <th>Kondisi</th>
                                <th>Biaya</th>
                                <th>Status</th>
                                <th>Action</th>
                              </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($data_servis AS $servis){ ?>
                                    <tr>
                                        <td><?="$no.";?></td>
                                        <td><?=$servis->nota;?></td>
                                        <td><?=$servis->nmbarang;?></td>
                                        <td><?=$servis->kerusakan;?></td>
                                        <td><?=$servis->tglditerima;?></td>
                                        <td><?=$servis->pm_nama;?></td>
                                        <td><?=$servis->kondisibrg;?></td>
                                        <td>Rp. <?=$servis->biaya;?></td>
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
                                                
                                                if ( $level == 3 ) {
                                                    $url = site_url('teknisi/C_Teknisi/update_pengembalian/'.$servis->nota);
                                                } else {
                                                    $url = site_url('admin/C_Admin/update_pengembalian/'.$servis->nota);
                                                }

                                                $noHp = substr_replace($servis->tlpn,'62',0,1);

                                                if ( $status === "PROSES" ) {
                                                    $isiWa = "https://api.whatsapp.com/send?phone=".$noHp."&text=NOTA ".$servis->nota." dengan Nama Barang ".$servis->nmbarang." masih dalam Proses Teknisi ";
                                                    echo '
                                                        <a href="'.$url.'"><i class="fa fa-pencil-square fa-fw"  title="Edit"></i></a> | 
                                                        <a href="'.$isiWa.'" style="color: green;" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    ';

                                                } elseif ( $status === "MENUNGGU SPAREPART" ) {
                                                    $isiWa = "https://api.whatsapp.com/send?phone=".$noHp."&text=NOTA ".$servis->nota." dengan Nama Barang ".$servis->nmbarang." dalam Proses Menunggu Sparepart ";
                                                    echo '
                                                        <a href="'.$url.'"><i class="fa fa-pencil-square fa-fw"  title="Edit"></i></a> | 
                                                        <a href="'.$isiWa.'" style="color: green;" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    ';

                                                } elseif ( $status === "SPAREPART DATANG" ) {
                                                    $isiWa = "https://api.whatsapp.com/send?phone=".$noHp."&text=NOTA ".$servis->nota." dengan Nama Barang ".$servis->nmbarang." dalam Proses Pengerjaan karena Sparepart Datang";
                                                    echo '
                                                        <a href="'.$url.'"><i class="fa fa-pencil-square fa-fw"  title="Edit"></i></a> | 
                                                        <a href="'.$isiWa.'" style="color: green;" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    ';

                                                } elseif ( $status === "BISA DIAMBIL" ) {
                                                    $isiWa = "https://api.whatsapp.com/send?phone=".$noHp."&text=NOTA ".$servis->nota." dengan Nama Barang ".$servis->nmbarang." Setelah Proses Servis Teknisi Sekarang Status ".$status." dengan Biaya Rp. ".$servis->biaya." ";
                                                    echo '
                                                        <a href="'.$url.'"><i class="fa fa-pencil-square fa-fw"  title="Edit"></i></a> | 
                                                        <a href="'.$isiWa.'" style="color: green;" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    ';

                                                } elseif ( $status === "SUDAH DIAMBIL" ) {
                                                    $isiWa = "https://api.whatsapp.com/send?phone=".$noHp."&text=NOTA ".$servis->nota." dengan Nama Barang ".$servis->nmbarang." status Sudah Diambil dan trimakasih telah mempercayakan jasa kami ";
                                                    echo'
                                                        <a href="#!" style="color: #999; cursor: no-drop"><i class="fa fa-pencil-square fa-fw"  title="Edit"></i></a> | 
                                                        <a href="'.$isiWa.'" style="color: green;" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    ';

                                                } else {
                                                    $isiWa = "https://api.whatsapp.com/send?phone=".$noHp."&text=NOTA ".$servis->nota." dengan Nama Barang ".$servis->nmbarang." dalam status Cancel ";
                                                    echo'
                                                        <a href="#!" style="color: #999; cursor: no-drop"><i class="fa fa-pencil-square fa-fw"  title="Edit"></i></a> | 
                                                        <a href="'.$isiWa.'" style="color: green;" target="_blank"><i class="fa fa-whatsapp"></i></a>
                                                    ';
                                                }  
                                                
                                            ?>
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