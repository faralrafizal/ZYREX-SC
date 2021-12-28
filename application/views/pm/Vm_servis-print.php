<?php 
	$this->load->view('main/V_Head');
	$level = $this->session->userdata('level');
?>


<style>
	body {
		background: #fff !important;
	}
	.footer {
		display: none;
	}
	.no-hp {
		font-size: 18px;
	}

	/* Nota CSS */
	.nota {
		color: #000 !important;
		padding: 5px;
	}
	.title-nota {
		padding-top: 20px;
		padding-bottom: 10px;
	}
	.nota-header {
		padding-bottom: 10px;
		border-bottom: dotted;
		border-color: #000;
		margin-bottom: 10px;
	}
	.nota-header-nama {
		text-align: center;
		font-size: 20px;
		font-weight: 600;
		padding-bottom: 5px;
	}
	.nota-header-alamat {
		text-align: center;
		font-size: 14px;
		padding-bottom: 5px;
	}
	.nota-header-kontak {
		text-align: center;
	}
	.nota-name {
		padding-bottom: 10px;
		padding-left: 5px;
	}
	.nota-table {
		border-bottom: dotted;
		border-color: #000;
		padding-bottom: 10px;
	}
	.nota-table .table-bordered>thead>tr>th, 
	.table-bordered>tbody>tr>th, 
	.table-bordered>tfoot>tr>th, 
	.table-bordered>thead>tr>td, 
	.table-bordered>tbody>tr>td, 
	.table-bordered>tfoot>tr>td {
		border: 1px solid #000 !important;
	}
	.nota-penerima {
		padding-top: 10px;
	}
	.nota-aturan-toko ul {
		margin-left: -20px;
	}
	.nota-aturan-toko ul li {
		list-style-type: decimal;
	}
/* End Nota CSS */
</style>

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

	    // Mencari data berdasrkan Nota
	    $nota = $_POST["nota"];
	}
	?>
<body>
	<!-- Nota Printer Biasa -->
	<?php if ( $tipe_nota < 1 ) : ?>
	<section class="nota-besar">
		<div class="container">
			<center><h3><em>TANDA TERIMA SERVIS</em></h3></center>
		</div>

		<div class="inputan">
			<div class="container">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<!-- <img src="<?php echo base_url();?>tambah/img/logo3.jpg" alt=""> -->
					<div class="nama-perusahaan text-center">
						<h3><b><?= $namaPerusahaan; ?></b></h3>

						<h4>KONTAK KAMI<h4>
						<div class="no-hp">
							<span><?= $no_1; ?></span>
							<span><?= $no_2; ?></span>
						</div>
					</div>
				</div>

				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<table width="329">
					  <tr>
					    <td width="90" ><font size="4"><B>Nama</B></td>
					    <td width="194"> <font size="4"><?=$data_servis->nmpemilik;?></td>
					  </tr>
					  <tr>
					    <td ><font size="4"><B>Telp.</B></td>
					    <td > <font size="4"><?=$data_servis->tlpn;?></td>
					  </tr>
					  <tr>
					    <td><font size="4"><B>Alamat</B></td>
					    <td> <font size="4"><?=$data_servis->alamat;?></td><br>
					  </tr>
					</table>
				</div>

				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<table width="329">
					  <tr>
					    <td width="90"><font size="4"><B>NOTA</B></td>
					    <td width="194"> <font size="4"><?=$data_servis->nota;?></td>
					  </tr>
					  <tr>
					    <td><font size="4"><B>Tgl. Masuk</B></td>
					    <td> <font size="4"><?= tanggal_indo($data_servis->tglditerima); ?></td><br>
					  </tr>
					  
					</table>
				</div>
			</div>
		</div>

		<div class="tabel">
			<div class="container">
				<br>
				<table width="100%" border="4">
				  <tr>
				    <th>
				    	<center>
				      		<strong>NAMA BARANG</strong>
				    	</center>
				    </th>
				    <th>
				    	<center>
				      		<strong>KERUSAKAN</strong>
				    	</center>
				    </th>
				    <th>
				    	<center>
				      		<strong>KELENGKAPAN</strong>
				    	</center>
				    </th>
				  </tr>

				  <tr>
				    <td height="100" valign="top"> <font size="4">
				    	<?=$data_servis->nmbarang;?>
				    </td>
				    <td valign="top"> <font size="4">
				    	<?=$data_servis->kerusakan;?>
				    </td>
				    <td valign="top"> <font size="4">
				    	<?= $data_servis->kelengkapan; ?>
				    </td>
				  </tr>
				</table>
			</div>
		</div>

		<div class="aturan-toko">
			<div class="container">
				<div class="row">

					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="keterangan-detail">
							<h3><b>Keterangan</b></h3>
							<p class="no-hp">
								<?= $keterangan; ?>
							</p>
						</div>
						<?php if ( $perusahaan_akun_login_customer < 1 ) { ?>
						<div class="keterangan-login">
							<div class="keterangan-login-detail">
								<p><b>Akses Login Untuk Cek Servis</b></p>
								<ul>
									<li>
										<b>Link Cek Servis:</b> <?=  $perusahaan_link; ?>
									</li>
								    <li>
								    	<b>Username:</b> <?= $data_servis->tlpn; ?>
								    </li>
								    <li>
								    	<b>Password:</b> <?= $data_servis->nota; ?>
								    </li>
								</ul>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

		<div class="bawah">
			<div class="container">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<center>
						<table width="120" >
						  	<tr>
						    	<td width="101" height="35">
						    		<center>
						    			<h3><strong>CUSTOMER</strong></h3>
						    		</center>
						    	</td>
						  	</tr>
						  	<tr>
						    	<td width="101" height="35"></td>
						  	</tr>
						  	<tr>
						    	<td width="101" height="35">
						    		<h3><strong>______________</strong></h3>
						    	</td>
						  </tr>	
						</table>
					</center>
				</div>

				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>

				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<center>
						<table width="120" >
						  	<tr>
						    	<td width="101" height="35">
						    		<center>
						    			<h3><strong>PENERIMA</strong></h3>
						    		</center>
						    	</td>
						  	</tr>
						  	<tr>
						    	<td width="101" height="35"></td>
						  	</tr>
						  	<tr>
						    	<td width="101" height="35">
						    		<h3><strong>______________</strong></h3>
						    	</td>
						  </tr>
						  <tr>
						  	<?php if ( $level == 2 ) { ?>
						  	<td>
						    	<strong style="text-transform: capitalize;">
						    		<?php echo $this->session->userdata('pm_nama'); ?>
						    	</strong>
						    </td>
						  	<?php } ?>
						  	<?php if ( $level == 1 ) { ?>
						  	<td>
						    	<strong style="text-transform: capitalize;">
						    		<?php echo $this->session->userdata('admin_user'); ?>
						    	</strong>
						    </td>
						  	<?php } ?>
						  </tr>
						</table>
					</center>
				</div>
			</div>
		</div>
	</section>

	<!-- Nota Printer Thermal -->
	<?php else : ?>
	<section class="nota" style="width: <?= $ukuran_nota; ?>cm;">
		<div class="title-nota text-center">
			<em><b>TANDA TERIMA SERVIS</b></em>
		</div>

		<div class="nota-header">
			<div class="nota-header-nama">
				<?= $namaPerusahaan; ?>
			</div>
			<!-- <div class="nota-header-alamat">
				<?= $alamat; ?>
			</div> -->
			<div class="nota-header-kontak">
				<?= $no_1; ?> <?= $no_2; ?>
			</div>
		</div>

		<div class="nota-name">
			<div class="nota-name-teks">
				<b>Nota: <?=$data_servis->nota;?></b>
			</div>
			<div class="nota-name-teks">
				<b>Nama</b>: <?=$data_servis->nmpemilik;?>
			</div>
			<div class="nota-name-teks">
				<b>Tgl. Diterima</b>: <?= tanggal_indo($data_servis->tglditerima); ?>
			</div>
			<div class="nota-name-teks">
				<b>Tlpn</b>: <?=$data_servis->tlpn;?>
			</div>
			<div class="nota-name-teks">
				<b>Alamat</b>: <?=$data_servis->alamat;?>
			</div>
		</div>

		<div class="nota-table">
			<div class="">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Nama Barang</th>
							<th>Kerusakan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?=$data_servis->nmbarang;?></td>
							<td><?=$data_servis->kerusakan;?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="nota-table-kelengkapan">
				<b>Kelengkapan</b>: <?= $data_servis->kelengkapan; ?>
			</div>
		</div>


		<div class="nota-penerima">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="nota-name">
						<div class="nota-name-teks">
							<b>Keterangan</b>: <?= $keterangan; ?>
						</div>
						<?php if ( $perusahaan_akun_login_customer < 1 ) { ?>
						<div class="nota-name-teks">
							<b>Akses Login untuk cek servis</b><br>
							<ul>
								<li>
									Link Cek Servis : <?=  $perusahaan_link; ?>
								</li>
							    <li>
							    	Username : <?=$data_servis->tlpn;?>
							    </li>
							    <li>
							    	Password : <?=$data_servis->nota;?>
							    </li>
							</ul>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<div class="nota-penerima-teks-parent text-center">
								<div class="nota-penerima-teks">
									<b>CUSTOMER</b>
								</div><br><br><br><br>
								<div class="nota-penerima-teks">
									_______________
								</div>
							</div>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<div class="nota-penerima-teks-parent text-center">
								<div class="nota-penerima-teks">
									<b>PENERIMA</b>
								</div><br><br><br><br>
								<div class="nota-penerima-teks">
									_______________
									
									<?php if ( $level == 2 ) { ?>
									<b style="text-transform: capitalize;"><?php echo $this->session->userdata('pm_nama') ?></b>
								  	<?php } ?>
								  	<?php if ( $level == 1 ) { ?>
								  	<b style="text-transform: capitalize;"><?php echo $this->session->userdata('admin_user') ?></b>
								  	<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>

</body>
</html>

<?php $this->load->view('main/V_Script');?>

<script>window.print();</script>



