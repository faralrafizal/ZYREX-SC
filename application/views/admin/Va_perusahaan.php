<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('admin/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Profile Usaha</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form update Data
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-6">
                                    <?php echo form_open("admin/C_Admin/update_perusahaan"); ?>
                                        <input type="hidden" name="perusahaan_id" value="<?=$data_perusahaan->perusahaan_id; ?>">
                                        <div class="form-group">
                                            <label class="control-label">Nama Usaha <span class="red">*</span></label>
                                            <input type="text" name="perusahaan_nama" value="<?=$data_perusahaan->perusahaan_nama; ?>" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">No Kontak 1 <span class="red">*</span></label>
                                            <input type="text" name="perusahaan_no_1" value="<?=$data_perusahaan->perusahaan_no_1; ?>" class="form-control" readonly> 
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">No Kontak 2 <span class="red">*</span></label>
                                            <input type="text" name="perusahaan_no_2" value="<?=$data_perusahaan->perusahaan_no_2; ?>" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Alamat <span class="red">*</span></label>
                                            <textarea name="perusahaan_alamat" id="input" class="form-control"  readonly rows="3" required="required"><?=$data_perusahaan->perusahaan_alamat; ?></textarea>
                                        </div>
                                </div>
                                <div class="col-lg-6">
                                        <div class="form-group" >
                                            <label class="control-label" >Akun Login Customer di Nota <span class="red">*</span></label>
                                            <?php  
                                                $akunLogin = $data_perusahaan->perusahaan_akun_login_customer;

                                                if ( $akunLogin < 1 ) {
                                                    $akun = "Tampil";
                                                } else {
                                                    $akun = "Tidak Tampil";
                                                }
                                            ?>

                                            <select name="perusahaan_akun_login_customer" required="" class="form-control ">
                                                <option value="<?= $akunLogin; ?>">
                                                    <?= $akun; ?>
                                                </option>

                                                <?php if ( $akunLogin < 1 ) : ?>
                                                <option value="1">Tidak Tampil</option>
                                                <?php else : ?>
                                                <option value="0">Tampil</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Link Login </label>
                                            <input type="text" name="perusahaan_link" value="<?=$data_perusahaan->perusahaan_link; ?>" class="form-control" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Text Tambahan di NOTA <span class="red">*</span></label>
                                            <textarea name="perusahaan_text_nota" id="input" class="form-control" rows="3" required="required"><?=$data_perusahaan->perusahaan_text_nota; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tipe Nota Printer <span class="red">*</span></label>
                                            <?php  
                                                $notaType = $data_perusahaan->perusahaan_tipe_nota;

                                                if ( $notaType < 1 ) {
                                                    $option = "Printer Biasa";
                                                } else {
                                                    $option = "Printer Thermal";
                                                }
                                            ?>

                                            <select name="perusahaan_tipe_nota" required="" class="form-control " >
                                                <option value="<?= $notaType; ?>">
                                                    <?= $option; ?>
                                                </option>

                                                <?php if ( $notaType < 1 ) : ?>
                                                <option value="1">Printer Thermal</option>
                                                <?php else : ?>
                                                <option value="0">Printer Biasa</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Lebar Nota cm (Berlaku Jika Tipe Nota Printer Thermal) <span class="red">*</span></label>
                                            <input type="text" name="perusahaan_ukuran" value="<?=$data_perusahaan->perusahaan_ukuran; ?>" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" value="Edit Data" class="btn btn-success" style="float: right;">
                                        </div>
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