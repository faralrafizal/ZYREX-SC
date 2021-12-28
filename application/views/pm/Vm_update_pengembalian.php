<?php $this->load->view('main/V_Head'); ?>

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
    
    <?php foreach ($data_perusahaan as $row) : ?>
    <?php if ($row->perusahaan_id === '2' ) { ?>
        <?php
            $namaPerusahaan = $row->perusahaan_nama; 
            $no_1           = $row->perusahaan_no_1; 
            $no_2           = $row->perusahaan_no_2;
            $keterangan     = $row->perusahaan_text_nota; 
            $tipe_nota      = $row->perusahaan_tipe_nota;
            $perusahaan_akun_login_customer = $row->perusahaan_akun_login_customer;
            $ukuran_nota    = $row->perusahaan_ukuran;
            $perusahaan_link= $row->perusahaan_link;
        ?>
    <?php } ?>
    <?php endforeach; ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Proses Pengembalian Barang Servis</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                        <?php  
                                            if ( $level == 2 ) {
                                                echo form_open("pm/C_Pm/pengembalian_servis_proses");
                                                $namaPenyerah = $this->session->userdata('pm_nama');
                                                $linkBack = site_url('pm/C_Pm/pengembalian_barang');
                                            } else {
                                                echo form_open("admin/C_Admin/pengembalian_servis_proses_karyawan");
                                                $namaPenyerah = $this->session->userdata('admin_user');
                                                $linkBack = site_url('admin/C_Admin/pengembalian_barang_karyawan');
                                            }
                                        ?>

                                        <input type="hidden" name="penyerah" value="<?= $namaPenyerah; ?>" class="form-control">
                                        <input type="hidden" name="namaPerusahaan" value="<?= $namaPerusahaan; ?>">
                                        <input type="hidden" name="no_1" value="<?= $no_1; ?>">
                                        <input type="hidden" name="no_2" value="<?= $no_2; ?>">
                                        <input type="hidden" name="keterangan" value="<?= $keterangan; ?>">
                                        <input type="hidden" name="tipe_nota" value="<?= $tipe_nota; ?>">
                                        <input type="hidden" name="perusahaan_akun_login_customer" value="<?= $perusahaan_akun_login_customer; ?>">
                                        <input type="hidden" name="ukuran_nota" value="<?= $ukuran_nota; ?>">
                                        <input type="hidden" name="perusahaan_link" value="<?= $perusahaan_link; ?>">

                                        <div class="form-group">
                                            <label class="control-label">Nota</label>
                                            <input type="text" name="nota" value="<?=$data_servis->nota;?>" class="form-control" required readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Nama Barang</label>
                                            <input type="text" name="nmbarang" value="<?=$data_servis->nmbarang;?>" class="form-control" required readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label">Nama Pemilik</label>
                                            <input type="text" name="nmpemilik" value="<?=$data_servis->nmpemilik;?>" class="form-control" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Alamat</label>
                                            <input type="text" name="alamat" value="<?=$data_servis->alamat;?>" class="form-control" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">No. Tlpn</label>
                                            <input type="text" name="tlpn" value="<?=$data_servis->tlpn;?>" class="form-control" required readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label">Kerusakan</label>
                                            <input type="text" name="kerusakan" value="<?=$data_servis->kerusakan;?>" class="form-control" required readonly>
                                        </div>
                                        
                                         <div class="form-group">
                                            <label class="control-label">Kelengkapan</label>
                                            <input type="text" name="kelengkapan" value="<?=$data_servis->kelengkapan;?>" class="form-control" required readonly>
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
                                       
                                        
                                        <input type="hidden" name="nota" value="<?=$data_servis->nota;?>" required> 
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Diterima</label>
                                            <input type="text" name="tglditerima" value="<?=$data_servis->tglditerima;?>" class="form-control"  readonly>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Penerima</label>
                                            <input type="text" name="pm_id" value="<?=$data_servis->pm_nama; ?>" class="form-control"  readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="control-label">Teknisi</label>
                                            <input type="text" name="teknisi_nama" value="<?=$data_servis->teknisi_nama; ?>" class="form-control"  readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Kondisi Barang</label>
                                            <input type="text" name="kondisibrg" value="<?=$data_servis->kondisibrg;?>" class="form-control"  readonly>
                                        </div>
                                       <div class="form-group">
                                            <label class="control-label">Biaya</label>
                                            <input type="text" name="biaya" value="<?=$data_servis->biaya;?>" class="form-control"  readonly>
                                        </div>

                                        
                                        <?php  
                                            $status= $data_servis->status_servis;
                                        ?>
                                        <?php if ( $status !== "CANCEL" ) { ?>
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Expired Komplain (Garansi Servis)</label>
                                            <input type="date" name="status_expired"  class="form-control" required value="<?=$data_servis->status_expired; ?>">
                                        </div>
                                        <?php } ?>

                                        <?php if ( $status === "CANCEL" ) { ?>
                                        <div class="form-group">
                                            <label class="control-label">Tanggal Expired Komplain (Garansi Servis)</label>
                                            <input type="text" name="status_expired"  class="form-control" required value="0000-00-00" readonly>
                                        </div>
                                        <?php } ?>
                                        
                                        <?php if ( $status !== "BISA DIAMBIL" ) { ?>
                                        <input type="hidden" name="status_servis" type="text" value="<?= $status; ?>" readonly>
                                        <?php } ?>

                                        <?php if ( $status === "BISA DIAMBIL" ) { ?>
                                        <input type="hidden" name="status_servis" type="text" value="SUDAH DIAMBIL" readonly>
                                        <?php } ?>

                                        

                                        <a href="<?= $linkBack;?>" class="btn btn-default width-35" style="float: right; border: none;">
                                            <i class="glyphicon glyphicon-circle-arrow-left"></i> Back
                                        </a>

                                        <button type="submit" name="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                            <i class="glyphicon glyphicon-print"></i>
                                            <span class="bigger-110">Print</span>
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

            
                    
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


<?php $this->load->view('main/V_Script');?>
