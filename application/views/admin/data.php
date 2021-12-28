<!-- silahkan desain dengan menggunakan CSS -->
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Laporan Keseluruhan</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tambah/css/tipe.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tambah/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tambah/css/bootstrap-theme.min.css">
</head>
<body>

<div class="container">
<div id="HTMLtoPDF">
    <center><h3>DATA SERVIS KESELURUHAN</h3></center><br>
    <a href="#" onclick="HTMLtoPDF()">Export PDF</a>
    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>NOTA</th>
                                        <th>Barang</th>
                                        <th>Tgl.Trima</th>
                                        <th>Kondisi</th>
                                        <th>Tgl.Ambil</th>
                                        <th>Biaya</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; $biaya=0; foreach($data->result() as $row){ ?>
                                    <tr>
                                        <td><?="$no.";?></td>
                                        <td><?=$row->nota;?></td>
                                        <td><?=$row->nmbarang;?></td>
                                        <td><?=$row->tglditerima;?></td>
                                        <td><?=$row->kondisibrg;?></td>
                                        <td><?=$row->tglambil;?></td>
                                        <td><?=$row->biaya;?></td>
                                        
                                    </tr>
                                     <?php 
                                        $no++; 
                                        $biaya=$biaya+$row->biaya; 
                                    } ?>
                                </tbody>
                                <tfoot>
                                     <tr>
                                         <th></th>
                                         <th></th>
                                         <th></th>
                                         <th></th>
                                         <th></th>
                                         <th><b>Total</b></th>
                                         <th>Rp <?= $biaya; ?></th>
                                     </tr>
                                </tfoot>
 </table>

</div>


</table>
</div>

<script src="<?php echo base_url();?>tambah/js/jspdf.js"></script>

<script src="<?php echo base_url();?>tambah/js/pdfFromHTML.js"></script>
<script src="<?php echo base_url();?>tambah/js/jquery.js"></script>
<script src="<?php echo base_url();?>tambah/js/bootstrap.min.js"></script>
