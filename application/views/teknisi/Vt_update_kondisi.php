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
                    <center>
                        <h2 class="page-header">
                            Update Kondisi Barang Servis No. Nota <?=$data_servis->nota;?> 
                        </h2>
                    </center>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">No. Nota</label>
                                       <input type="text" name="fullname" value="<?=$data_servis->nota;?>" class="form-control" readonly >
                                    </div>
                                </div>
                                <div class="col-lg-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Nama Pemilik</label>
                                        <input type="text" name="nmpemilik" class="form-control" readonly value="<?=$data_servis->nmpemilik;?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">No. Tlpn / WhatsApp</label>
                                        <input type="number" name="tlpn"  class="form-control" readonly value="<?=$data_servis->tlpn;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Alamat</label>
                                <textarea name="alamat" id="input" class="form-control" rows="3" readonly="readonly" ><?=$data_servis->alamat;?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Nama Barang</label>
                                        <input type="text" name="nmbarang"  class="form-control" readonly value="<?=$data_servis->nmbarang;?>">
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Merk / Seri</label>
                                        <input type="text" name="merk_seri" value="<?=$data_servis->merk_seri;?>" class="form-control" readonly >
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Proc / vga</label>
                                        <input type="text" name="proc_vga" value="<?=$data_servis->proc_vga;?>" class="form-control" readonly >
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">S / N</label>
                                        <input type="text" name="s_n" value="<?=$data_servis->s_n;?>" class="form-control" readonly >
                                    </div>
                                        
                                    <div class="form-group">
                                        <label class="control-label">Pass / Warna</label>
                                        <input type="text" name="pass_warna" value="<?=$data_servis->pass_warna;?>" class="form-control" readonly >
                                    </div>    
                                        
                                    <div class="form-group">
                                        <label class="control-label">Hardisk</label>
                                        <input type="text" name="hardisk" value="<?=$data_servis->hardisk;?>" class="form-control" readonly >
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label">Memory</label>
                                        <input type="text" name="memory" value="<?=$data_servis->memory;?>" class="form-control" readonly >
                                    </div> 

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
                <div class="col-lg-6">
                    <div class="panel panel-default"> 
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="control-label">Ex service / urgent</label>
                                        <input type="text" name="ex_service_urgent" value="<?=$data_servis->ex_service_urgent;?>" class="form-control" readonly >
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label">Kelengkapan</label>
                                        <input type="text" name="kelengkapan" value="<?=$data_servis->kelengkapan;?>" class="form-control" readonly >
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Kerusakan</label>
                                        <textarea name="kerusakan" id="input" class="form-control" rows="3" readonly="readonly"><?=$data_servis->kerusakan;?></textarea>
                                    </div>

                                    <div class="form-group">
                                            <label class="control-label">Tanggal Diterima</label>
                                            <input type="text" name="fullname" value="<?=$data_servis->tglditerima;?>" class="form-control"  readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Penerima</label>
                                            <input type="text" name="username" value="<?=$data_servis->pm_nama; ?>" class="form-control" readonly>
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div> 
            </div>

            <?php
                if ( $level == 3 ) {
                    echo form_open("teknisi/C_Teknisi/pengembalian_servis_proses"); 
                } else {
                    echo form_open("admin/C_Admin/pengembalian_servis_proses"); 
                }
            ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Status Servis</label>
                                            <?php  
                                                $statusServis = $data_servis->status_servis; 

                                                if ( $statusServis === "PROSES" ) {
                                                    $servis = "Proses Servis";

                                                } elseif ( $statusServis === "MENUNGGU SPAREPART" ) {
                                                    $servis = "Menunggu Sparepart";

                                                } elseif ( $statusServis === "SPAREPART DATANG" ) {
                                                    $servis = "Sparepart Datang";

                                                } elseif ( $statusServis === "BISA DIAMBIL" ) {
                                                    $servis = "Bisa Diambil";

                                                } elseif ( $statusServis === "SUDAH DIAMBIL" ) {
                                                    $servis = "Sudah Diambil";

                                                } else {
                                                    $servis = "Cancel";
                                                }  
                                            ?>

                                            <div class="">
                                                <select name="status_servis" required="" class="form-control ">
                                                    <option value="<?= $statusServis; ?>">
                                                        <?= $servis; ?> 
                                                    </option>

                                                <?php if ( $statusServis === "PROSES" ) { ?>
                                                    <option value="MENUNGGU SPAREPART">Menunggu Sparepart</option>
                                                    <option value="SPAREPART DATANG">Sparepart Datang</option>
                                                    <option value="BISA DIAMBIL">Bisa Diambil</option>
                                                    <option value="CANCEL">Cancel</option>
                                                <?php } ?>

                                                <?php if ( $statusServis === "MENUNGGU SPAREPART" ) { ?>
                                                    <option value="SPAREPART DATANG">Sparepart Datang</option>
                                                    <option value="BISA DIAMBIL">Bisa Diambil</option>
                                                    <option value="CANCEL">Cancel</option>
                                                <?php } ?>

                                                <?php if ( $statusServis === "SPAREPART DATANG" ) { ?>
                                                    <option value="BISA DIAMBIL">Bisa Diambil</option>
                                                    <option value="CANCEL">Cancel</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Biaya</label>
                                        <input type="number" name="biaya" value="<?=$data_servis->biaya;?>" class="form-control" required="" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="control-label">Kondisi Barang</label>
                                        <input type="text" name="kondisibrg" value="<?=$data_servis->kondisibrg;?>" class="form-control"  >
                                    </div>
                                </div>

                                <input type="hidden" name="nota" value="<?=$data_servis->nota;?>" required> 


                            <?php if ( $level == 3 ) : ?>
                                <input type="hidden" name="teknisi_nama" value=" <?php echo $this->session->userdata('teknisi_nama') ?>" class="form-control"  readonly>
                                <input type="hidden" name="teknisi_id" value=" <?php echo $this->session->userdata('teknisi_id') ?>" class="form-control"  readonly>
                            <?php else : ?>
                                <input type="hidden" name="teknisi_nama" value=" <?php echo $this->session->userdata('admin_user') ?>" class="form-control"  readonly>
                                <input type="hidden" name="teknisi_id" value=" <?php echo $this->session->userdata('admin_id') ?>" class="form-control"  readonly>
                            <?php endif; ?>
                                        
                                <div class="form-group" align="right">
                                    <button type="submit" name="submit" class="width-35  btn btn-sm btn-success">
                                        <i class="glyphicon glyphicon-save"></i>
                                        <span class="bigger-110">Simpan</span>
                                    </button>&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


<?php $this->load->view('main/V_Script');?>