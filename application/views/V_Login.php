<?php $this->load->view('main/V_Head');?>
<body>
    <?php foreach ($data_perusahaan as $row) : ?>
    <?php if ($row->perusahaan_id === '2' ) { ?>
        <?php
            $namaPerusahaan = $row->perusahaan_nama; 
        ?>
    <?php } ?>
    <?php endforeach; ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-text">
                    <div class="login-text-title">
                        Aplikasi Pelayanan Servis
                    </div>
                    <!-- <div class="login-text-desc">
                        Hp & Komputer
                    </div> -->
                    <div class="login-nama-usaha">
                        <?= $namaPerusahaan; ?>
                    </div>
                </div>
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title" align="center">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open("C_Main/login"); ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" autocomplete="on" required>
                                </div>
                                <div class="checkbox">
                                   <br>
                                </div>
                                
                                 <button type="submit" name="submit" class="width-35 pull-right btn btn-sm btn-primary">
                                   <i class="ace-icon fa fa-key"></i>
                                   <span class="bigger-110">Login</span>
                                </button>
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                    <!-- <div class="panel-footer">
                        <h4 class="panel-title" align="right"><?php echo anchor('C_Main/register','or Register here'); ?> </h4>
                    </div> -->
                </div>
            </div>
        </div>
    </div>


<?php $this->load->view('main/V_Script');?>
</body>

</html>