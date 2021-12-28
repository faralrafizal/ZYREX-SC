<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('master/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <center><h1 class="page-header">Halaman Data Servis Master</h1></center>
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
                                <th style="text-align: center;">NO.</th>
                                <th>NOTA</th>
                                <th>Barang</th>
                                <th>Pemilik</th>
                                <th>Tgl.Trima</th>
                                <th>Tgl.Ambil</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Actions</th>
                              </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($data_servis AS $servis){ ?>
                                    <tr>
                                        <td style="text-align: center;"><?="$no.";?></td>
                                        <td><?=$servis->nota;?></td>
                                        <td><?=$servis->nmbarang;?></td>
                                        <td><?=$servis->nmpemilik;?></td>
                                        <td><?=$servis->tglditerima;?></td>
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
                                                        <button class="btn-warning">Sparepart dATANG</button>
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
                                            <a href="<?=site_url('master/C_Master/zoom_servis/'.$servis->nota);?>"><i class="glyphicon glyphicon-zoom-in" style="color: green;" title="Zoom"></i></a>
                                            &nbsp;|&nbsp;
                                            <a href="<?=site_url('master/C_Master/delete_servis/'.$servis->nota);?>" onClick="return doconfirm();"><i class="fa fa-trash fa-fw" style="color: red;" title="Delete"></i></a>
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