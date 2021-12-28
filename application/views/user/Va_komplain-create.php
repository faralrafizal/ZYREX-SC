<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('user/Vm_Navbar');?>

<?php
$tgl_now=date("Y-m-d");
$tgl_exp=$data_user->status_expired;//tanggal expired
    if ($tgl_now >=$tgl_exp )
    {
     echo"<br><br><br><br><br><br><br><br><br><br><center><h1>Halaman expired</h1>
     <h3>Komplain Servis Hanya bisa dilakukan setelah pengambilan barang servis<h3></center>";
    }
    else
    {
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <br><h2 class="page-header">Komplain Servis</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <font color="red"><?php echo validation_errors();?></font>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Input Komplain Servis
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                    <?php echo form_open("user/C_User/create_komplain_process"); ?>
                                        <div class="form-group">
                                            <label class="control-label" for="fullname">Nota Lama</label>
                                            <input type="text" name="nota_lama" value="<?=$data_user->nota;?>" class="form-control" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="address">Nama Pemilik</label>
                                            <input type="text" name="nama_pemilik" value="<?=$data_user->nmpemilik;?>" class="form-control" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label" for="username">Nama Barang</label>
                                            <input type="text" name="namabrg" value="<?=$data_user->nmbarang;?>" class="form-control" required readonly>
                                        </div>
                                         
                                        <div class="form-group">
                                            <label class="control-label" for="address">No. Tlpn</label>
                                            <input type="text" name="no_tlpn" value="<?=$data_user->tlpn;?>" class="form-control" required readonly>
                                        </div>

                                        <input type="hidden" name="user_id" value="<?=$data_user->nota;?>" required> 
                                        <input type="hidden" name="teknisi_nama" value="<?=$data_user->teknisi_nama;?>" required>
                                         <input type="hidden" name="teknisi_id" value="<?=$data_user->teknisi_id;?>" required>
                                        
                                        <div class="form-group">
                                            <label class="control-label" for="password">Isi Komplain</label>
                                            <textarea type="text" name="isikomplain" class="form-control" required></textarea>
                                        </div>
                                        
                                        
                                        
                                        <button type="submit" name="submit" class="width-35  btn btn-sm btn-primary"><b>Kirim Pesan Komplain</b>
                                        </button> 
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

<?php } ?>