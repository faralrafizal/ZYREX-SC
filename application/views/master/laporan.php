<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('master/Va_Navbar');?>

<div id="page-wrapper">

                    <div class="col-md-12">
                        <center><h1 class="page-header">LAPORAN PERIODE</h1></center>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('master/laporan/laporan', array('class'=>'form-inline')); ?>
                                    <div class="form-group">
                                        <label for="exampleInputName2">Tanggal</label>
                                        <input type="date" name="tanggal1" class="form-control" placeholder="Tanggal Awal">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail2"> - </label>
                                        <input type="date" name="tanggal2" class="form-control" placeholder="Tanggal Akhir">
                                    </div>
                                    <button class="btn btn-primary btn-sm" type="submit" name="submit" target="_blank">Tampilkan</button>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>

                            </div>
                        </div>
                    </div> 
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


<?php $this->load->view('main/V_Script');?>
