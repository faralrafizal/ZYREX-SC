    <div class="footer">
        <div class="footer-text">
            Development By <a href="https://zyrex.com/v3/" target="_blank">www.zyrex.com</a>
        </div>
    </div>

    <!-- jQuery -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>
    
    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
            
            $('#dataTables-example-1').DataTable({
                responsive: true
            });
        });
       

    
        function doconfirm()
        {
            job=confirm("Apakah anda yakin akan menghapus data ini ?");
            if(job!=true)
            {
                return false;
            }
        };
        

    
        // function dataProvinsi(){
        //     $('#provinsi').select2({

        //         minimumInputLength: 3,
        //         allowClear :true,
        //         placeholder : 'Cari Provinsi',
        //         ajax: {
        //             dataType : 'json';
        //             url: "<?= site_url('admin/C_Admin/tb_provinsi')?>",
        //             delay: 500,
        //             data :function(params){
        //                 return {
        //                     search:params.term
        //                 }
        //             },
        //             processResults : function (data, page) {
        //                 return {
        //                     results
        //                 }
        //               }
        //         }
                
        //     }
        //     ) {
        //         var id = $(this).val();
        //         $.ajax({
        //             type: "POST",
        //             url: "<?= base_url('admin/C_Admin/getKabupaten') ?>",
        //             data: {
        //                 id: id
        //             },
        //             dataType: "JSON",
        //             success: function(response) {
        //                 console.log(response);
        //             }
        //         });
        //     });
        // }
         $(document).ready(function() {
            $('#provinsi').change(function() {
                var id = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/C_Admin/getKabupaten') ?>",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(response) {
                        console.log(response);
                    }
                });
            });
        });

        </script>
        
     <div> 
        <script src="<?php echo base_url() ?>/assets/js/morris/raphael-2.1.0.min.js"></script>
        <script src="<?php echo base_url() ?>/assets/js/morris/morris.js"></script>
     </div>

     <!-- select2 -->
     <script src="<?= base_url() ?>assets/js/select2.min.js"></script>
    <!-- Custom Js -->
    <script src="<?php echo base_url() ?>/assets/js/custom-scripts.js"></script>