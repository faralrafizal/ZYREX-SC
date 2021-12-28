<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('user/Vm_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <br><center><h1 class="page-header">Data Servis No. Nota <?php echo $this->session->userdata('nota') ?></h1></center>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User List
                        </div>

       

       </form>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <table  class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nota</th>
                                    <th>Nama Pemilik</th>
                                    <th>Nama Barang</th>
                                    <th>Kondisi</th>
                                    <th>Biaya</th>
                                    <th style="text-align: center;">Status</th>       
                                </tr>
                            </thead>

                            <tbody>  
                                <tr>
                                    <td><?=$data_user->nota;?></td>
                                    <td><?=$data_user->nmpemilik;?></td>
                                    <td><?=$data_user->nmbarang;?></td>
                                    <td><?=$data_user->kondisibrg;?></td>
                                    <td>Rp. <?=$data_user->biaya;?></td> 
                                    <td style="text-align: center; width: 15%;">   
                                            <?php  
                                                $status= $data_user->status_servis;

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
                                </tr>
                               
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