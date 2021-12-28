<!-- silakan desain dengan menggunakan CSS -->
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8>
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Aplikasi Pelayanan Servis</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tambah/css/tipe.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tambah/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>tambah/css/bootstrap-theme.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald" rel="stylesheet"> -->
</head>
<body>

<div class="container">
<div id="HTMLtoPDF">
    <center><h3><B>LAPORAN DATA SERVIS PERIODE</B></h3></center><br><br>
    <!-- <a href="#" onclick="HTMLtoPDF()">Export PDF</a> -->
                                   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>NOTA</th>
                                                <th>Tanggal Diterima</th>
                                                <th>Tanggal Diambil</th>
                                                <th>Total Transaksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; $biaya=0; foreach ($record->result() as $r){ ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nota ?></td>
                                                <td><?php echo $r->tglditerima ?></td>
                                                <td><?php echo $r->tglambil ?></td>
                                                <td><?php echo $r->biaya ?></td>
                                            </tr>
                                        <?php $no++; $biaya=$biaya+$r->biaya; } ?>
                                            <tr>
                                                <td colspan="4">Total</td>
                                                <td><?php echo $biaya;?></td>
                                            </tr>
                                        </tbody>
                                  </table>

</div>


</table>
</div>

<script src="<?php echo base_url();?>tambah/js/jspdf.js"></script>

<script src="<?php echo base_url();?>tambah/js/pdfFromHTML.js"></script>
<script src="<?php echo base_url();?>tambah/js/jquery.js"></script>
<script src="<?php echo base_url();?>tambah/js/bootstrap.min.js"></script>

<script>window.print();</script>
