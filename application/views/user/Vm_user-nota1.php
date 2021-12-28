<?php $this->load->view('main/V_Head');?>

<?php $this->load->view('user/Vm_Navbar');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Update Profile</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
           <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form update User
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <!-- /.col-lg-6 (nested) -->                                
                                <div class="col-lg-12">
                                    
                                        <input type="text" name="nota" value="<?=$data_user->nota;?>" required>
                                        <div class="form-group">
                                            <label class="control-label">Full Name</label>
                                            <input type="text" name="nmpemilik" value="<?=$data_user->nmpemilik;?>" class="form-control" required>
                                        </div>
                                        <div class="form-group" align="right">
                                        <input type="submit" value="SUBMIT" class="btn btn-success">
                                        </div> -->
                                   
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <table  class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                            <th>Nota</th>
                                            <th>Nama Pemilik</th>
                                            <th>Nama Barang</th>
                                            <th>Kondisi</th>
                                            <th>Biaya</th>       
                                    </tr>
                                    </thead>

                                     <tbody>
                                        
                                        
                                        <tr>
                                            <td><?=$data_user->nota;?></td>
                                            <td><input type="text" name="nota" value="<?=$data_user->nota;?>" required></td>
                                            
                                        </tr>
                                       
                                    </tbody>
                                    
                                </table>

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