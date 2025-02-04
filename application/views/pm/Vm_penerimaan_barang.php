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

<?php  
    // Membuat Format tanggal Indonesia
    function tanggal_indo($tanggal){
        $bulan = array (1 =>   'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    );
    $split = explode('-', $tanggal);
    return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
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
            $perusahaan_link= $row->perusahaan_link;
            $ukuran_nota    = $row->perusahaan_ukuran;
        ?>
    <?php } ?>
<?php endforeach; ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <center><h1 class="page-header">Transaksi Penerimaan Barang</h1></center>
                </div>
            </div>

            <div class="cta-customer-ps">
                <a href="<?= $linkPage; ?>" class="btn btn-default">Customer Umum</a>
                <a href='#modal-id' class="btn btn-primary" data-toggle="modal" >Data Customer</a>
            </div>

            <?php
                if ( $level == 2 ) {
                    echo form_open("pm/C_Pm/create_transaksi"); 
                } else {
                    echo form_open("admin/C_Admin/create_transaksi"); 
                }
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">Nama Pemilik <span class="red">*</span></label>
                                        <input type="text" name="nmpemilik" va class="form-control" required >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="control-label">No. Tlpn / WhatsApp <span class="red">*</span></label>
                                        <input type="number" name="tlpn"  class="form-control" required >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Alamat <span class="red">*</span></label>
                                <textarea name="alamat" id="input" class="form-control" rows="3" required="required"></textarea>
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
                                        <label class="control-label">Jenis Barang <span class="red">*</span></label>
                                        <select class="form-control" aria-label="Default select example" name="nmbarang"  class="form-control" required >
                                            <option selected>--Pilih Jenis Barang--</option>
                                            <option value="1">Laptop</option>
                                            <option value="2">Desktop</option>
                                            <option value="3">Server</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Tipe Produk</label>
                                            <select class="form-control" aria-label="Default select example" name="merk_seri"  class="form-control" required >
                                            <option selected>--Pilih Tipe Produk--</option>
                                            <option value="1">Sky</option>
                                            <option value="2">Tactical</option>
                                            <option value="3">Chromebook</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">S / N</label>
                                        <input type="text" name="s_n"  class="form-control"  >
                                    </div>
                                        
                                    <div class="form-group">
                                        <label class="control-label">Kelengkapan <span class="red">*</span></label>
                                        <input type="text" name="kelengkapan"  class="form-control" required >
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Kerusakan <span class="red">*</span></label>
                                        <!-- <textarea name="kerusakan" id="input" class="form-control" rows="6" required="required"></textarea> -->
                                        <select class="form-control"  id="input" aria-label="Default select example" name="kerusakan"  class="form-control" required >
                                            <option selected>--Pilih Kerusakan--</option>
                                            <option value="1">Hardware</option>
                                            <option value="2">Software</option>
                                        </select>
                                    </div>

                                    <!-- Input Type Hidden -->
                                    <input type="hidden" name="nota" type="text" value="<?php echo $nota; ?>" readonly>
                                       <input type="hidden" name="status_servis" type="text" value="PROSES" readonly>
                                       <input type="hidden" name="status_expired" type="text" value="2090-07-12" readonly>
                                       <input type="hidden" name="tglditerima" type="text" value="<?php echo "",date("m/d/Y"); ?>" readonly>

                                       <?php if ( $level == 2 ) : ?>
                                        <input type="hidden" name="pm_id" value=" <?php echo $this->session->userdata('pm_id') ?>" class="form-control">
                                        <input type="hidden" name="pm_nama" value=" <?php echo $this->session->userdata('pm_nama') ?>" class="form-control">

                                        <?php else : ?>
                                        <input type="hidden" name="pm_id" value=" <?php echo $this->session->userdata('admin_id') ?>" class="form-control">
                                        <input type="hidden" name="pm_nama" value=" <?php echo $this->session->userdata('admin_user') ?>" class="form-control">
                                        
                                        <?php endif; ?>
                                    <!-- End Input Type Hidden -->    

                                    <div class="form-group" align="right">
                                        <button type="reset" values="reset" class="width-35  btn btn-sm btn-danger">
                                            <i class="glyphicon glyphicon-refresh"></i>
                                            <span class="bigger-110">reset</span>
                                        </button>

                                          <button type="submit" name="submit" class="width-35  btn btn-sm btn-success">
                                            <i class="glyphicon glyphicon-save"></i>
                                            <span class="bigger-110">Simpan</span>
                                        </button> 
                                    </div>                
                                    <!-- <div class="form-group">
                                        <label class="control-label">Pass / Warna</label>
                                        <input type="text" name="pass_warna"  class="form-control"  >
                                    </div>    
                                    
                                    <div class="form-group">
                                        <label class="control-label">Memory</label>
                                        <input type="text" name="memory"  class="form-control"  >
                                    </div>

                                    <input type="hidden" name="proc_vga"  class="form-control" value="">
                                    <input type="hidden" name="hardisk"  class="form-control" value="">

                                    <div class="form-group">
                                        <label class="control-label">Proc / vga</label>
                                        <input type="text" name="proc_vga"  class="form-control"  >
                                    </div> -->
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                </div>
<!-- 
                <div class="col-lg-6">
                    <div class="panel panel-default">    
                        <div class="panel-body"> -->
                            <!-- <div class="row">                                -->
                                <!-- <div class="col-lg-12">  -->
                                    <!-- <div class="form-group">
                                        <label class="control-label">Hardisk</label>
                                        <input type="text" name="hardisk"  class="form-control"  >
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label class="control-label">Ex service / urgent</label>
                                        <input type="text" name="ex_service_urgent"  class="form-control"  >
                                    </div> 

                                    <div class="form-group">
                                        <label class="control-label">Kelengkapan <span class="red">*</span></label>
                                        <input type="text" name="kelengkapan"  class="form-control" required >
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Kerusakan <span class="red">*</span></label>
                                        <textarea name="kerusakan" id="input" class="form-control" rows="6" required="required"></textarea>
                                    </div> -->

                                    

                                    
                                <!-- </div> -->
                                <!-- /.col-lg-6 (nested) -->
                            <!-- </div> -->
                            <!-- /.row (nested) -->
                        <!-- </div> -->
                        <!-- /.panel-body -->
                    <!-- </div> -->
                    <!-- /.panel -->
                <!-- </div>        -->
            </div>

            <?php echo form_close(); ?> 


           <!--  <a href="<?php echo site_url('pm/C_Pm/penerimaan_servis');?>" target="_blank">Penerimaan Servis</a> -->
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
                                    <th>No.</th>
                                    <th>NOTA</th>
                                    <th>Barang</th>
                                    <th>Pemilik</th>
                                    <th>Alamat</th>
                                    <th>No.Tlpn</th>
                                    <th>Kerusakan</th>
                                    <th>Kelengkapan</th>
                                    <th>Tgl.Trima</th>
                                    <th>Status</th>
                                    <th style="width: 10%; text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    <?php foreach($data_servis AS $servis){ ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?=$servis->nota; ?></td>
                                        <td><?=$servis->nmbarang; ?></td>
                                        <td><?=$servis->nmpemilik; ?></td>
                                        <td>
                                            <?php
                                                $alamat = $servis->alamat;
                                                $alamat1 = substr($servis->alamat,0,18) . '...';
                                                if ( str_word_count($alamat) > 1 ) {
                                                    echo($alamat1);
                                                } else {
                                                    echo($alamat);
                                                }
                                            ?>            
                                        </td>
                                        <td><?=$servis->tlpn; ?></td>
                                        <td><?=$servis->kerusakan; ?></td>
                                        <td><?=$servis->kelengkapan; ?></td>
                                        <td><?=$servis->tglditerima; ?></td>
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
                                                    $linkNota = site_url('pm/C_Pm/print_servis/'.$servis->nota);
                                                } else {
                                                    $linkNota = site_url('admin/C_Admin/print_servis/'.$servis->nota);
                                                }
                                            ?>
                                            <a href="<?= $linkNota; ?>" target="_blank">
                                                <i class="glyphicon glyphicon-print" style="color: blue;" title="Print">
                                                </i>
                                            </a> | 
                                            <?php 
                                                $noHp  = substr_replace($servis->tlpn,'62',0,1);
                                                $namaKonter = $namaPerusahaan;
                                                $koma  = '%2C'; 
                                                $spasi = '%0A';
                                                $garis = '------------------------------------------------------';
                                                if ( $perusahaan_akun_login_customer < 1 ) {
                                                    $aksesLogin = "Akses Login untuk cek servis".$spasi."Link Login: ".$perusahaan_link.$spasi."username: ".$servis->tlpn.$spasi."password: ".$servis->nota.$spasi.$spasi;
                                                } else {
                                                    $aksesLogin = $spasi.$spasi;
                                                }

                                                $isiWa = "*TANDA TERIMA SERVIS*".$spasi.$namaKonter.$spasi.$spasi.$garis.$spasi.$spasi."Nota: ".$servis->nota.$spasi."Nama: ".$servis->nmpemilik.$spasi."Tgl. Diterima: ".tanggal_indo($servis->tglditerima).$spasi."Tlpn: ".$servis->tlpn.$spasi."Alamat: ".$servis->alamat.$spasi.$spasi.$garis.$spasi.$spasi."Nama Barang: ".$servis->nmbarang.$spasi."Kerusakan: ".$servis->kerusakan.$spasi."Kelengkapan: ".$servis->kelengkapan.$spasi.$spasi.$garis.$spasi.$spasi."Keterangan: ".$keterangan.$spasi.$spasi.$aksesLogin;
                                            ?>
                                            <a href="https://api.whatsapp.com/send?phone=<?= $noHp; ?>&text=<?= $isiWa; ?>" target="_blank">
                                                <i class="fa fa-whatsapp" style="color: green;" title="Kirim WhatsApp">
                                                </i>
                                            </a> | 

                                            <?php if ( $status === 'PROSES' ) { ?>
                                            <a href="<?=site_url('pm/C_Pm/delete_servis/'.$servis->nota);?>" onClick="return doconfirm();"><i class="fa fa-trash fa-fw" style="color: red;" title="Delete"></i></a>
                                            <?php } ?>

                                            <?php if ( $status !== 'PROSES' ) { ?>
                                            <a href="#!" disabled ><i class="fa fa-trash fa-fw" style="color: black;" title="Delete"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                    <?php } ?>
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

    <div class="modal fade" id="modal-id">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title">Data Customer</h4>
                </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Data Customer
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example-1">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%;">No.</th>
                                            <th>Nama</th>
                                            <th>No. WhatsApp</th>
                                            <th>Email</th>
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
                                            <td style="text-align: center;">
                                                <?php  
                                                    $wa = $customer->customer_wa;
                                                ?>
                                                <?php 
                                                    $this->db->like('tlpn', ''.$wa.'');
                                                    $this->db->from('dataservis');
                                                    echo $this->db->count_all_results().' x';
                                                ?>
                                            </td>

                                            <td style="text-align: center;">
                                                <?php 
                                                    if ( $level == 2 ) {
                                                        $url = site_url('pm/C_Pm/penerimaan_servis_customer/'.$customer->customer_id);
                                                    } else {
                                                        $url = site_url('admin/C_Admin/penerimaan_servis_customer/'.$customer->customer_id);
                                                    }
                                                ?>

                                                <a href="<?= $url;?>" class="btn btn-primary">
                                                    <i class="fa fa-plus"></i>&nbsp; Add data
                                                </a>
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
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<?php $this->load->view('main/V_Script');?>