<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('master/Va_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Data Servis No. Nota <?=$data_servis->nota;?></h2>
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
                                            <label class="control-label">Tanggal Diterima</label>
                                            <input type="text" name="fullname" value="<?=$data_servis->tglditerima;?>" class="form-control" readonly readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Penerima</label>
                                            <input type="text" name="username" value="<?=$data_servis->pm_nama; ?>" class="form-control" readonly readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label">Teknisi</label>
                                            <input type="text" name="address" value="<?=$data_servis->teknisi_nama; ?>" class="form-control" readonly readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Status Servis</label>
                                            <input type="text" name="address" value="<?=$data_servis->status_servis; ?>" class="form-control" readonly readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Kondisi Barang</label>
                                            <input type="text" name="tlpn" value="<?=$data_servis->kondisibrg;?>" class="form-control" readonly readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Ambil</label>
                                            <input type="text" name="username" value="<?=$data_servis->tglambil;?>" class="form-control" readonly readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label">Penyerah</label>
                                            <input type="text" name="tlpn" value="<?=$data_servis->penyerah;?>" class="form-control" readonly readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Biaya</label>
                                            <input type="text" name="username" value="<?=$data_servis->biaya;?>" class="form-control" readonly readonly>
                                        </div>
                                      


                                   <?php echo form_open(""); ?>
                                        <div class="form-group" align="right">
                                            <a href="<?php echo site_url('master/C_Master/read_servis');?>" class="btn btn-primary"><i class="glyphicon glyphicon-circle-arrow-left"></i> Back</a>
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
   
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


<?php $this->load->view('main/V_Script');?>