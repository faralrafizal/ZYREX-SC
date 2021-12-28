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

<body>
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

	<!-- Nota Printer Biasa -->
	<?php if ( $_POST['tipe_nota'] < 1 ) : ?>
	<section class="nota-besar">
		<div class="container">
			<center><h3><em>TANDA PENGEMBALIAN SERVIS</em></h3></center>
		</div>

		<div class="inputan">
			<div class="container">
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<div class="nama-perusahaan text-center">
						<h3><b><?= $_POST["namaPerusahaan"]; ?></b></h3>

						<h4>KONTAK KAMI<h4>
						<div class="no-hp">
							<span><?= $_POST["no_1"]; ?></span>
							<span><?= $_POST["no_2"]; ?></span>
						</div>
					</div>
				</div>

				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<table width="329">
					  <tr>
					    <td width="90"><font size="4"><B>Nama</B></td>
					    <td width="194"> <font size="4"><?php echo $_POST["nmpemilik"]; ?></td>
					  </tr>
					  <tr>
					    <td><font size="4"><B>Telp.</B></td>
					    <td> <font size="4"><?php echo $_POST["tlpn"]; ?></td>
					  </tr>
					  <tr>
					    <td><font size="4"><B>Alamat</B></td>
					    <td> <font size="4">
					    	<?php echo $_POST["alamat"]; ?>
					    </td>
					    </br>
					  </tr>
					</table>
				</div>

				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<table width="329">
					   <tr>
					    <td width="90"><font size="4"><B>NOTA</B></td>
					    <td width="180"> <font size="4"><?php echo $_POST["nota"]; ?></td> 
					  </tr>
					  <tr>
					    <td><font size="4"><B>Tgl. Masuk</B></td>
					    <td> <font size="4"><?php echo tanggal_indo($_POST["tglditerima"]); ?></td>
					  </tr>
					   <tr>
					    <td><font size="4"><B>Tgl. Ambil</B></td>
					    <td> <font size="4"><?php echo tanggal_indo(date("Y-m-d")); ?></td><br>
					  </tr>
					</table>
				</div>
			</div>
		</div>

		<div class="tabel">
			<div class="container">
				<br><table width="100%" border="4">
				  <tr>
				    <th><center>
				      <strong>NAMA BARANG</strong>
				    </center></th>
				    <th><center>
				      <strong>KERUSAKAN</strong>
				    </center></th>
				    <th><center>
				      <strong>KELENGKAPAN</strong>
				    </center></th>
				  </tr>

				 <tr>
				    <td height="100" valign="top"> <font size="4">
				    	<?php echo $_POST["nmbarang"]; ?>
				    </td>
				    <td valign="top"> <font size="4">
				    	<?php echo $_POST["kerusakan"]; ?>
				    </td>
				    <td valign="top"> <font size="4">
				    	<?php echo $_POST["kelengkapan"]; ?>
				    </td>
				  </tr>
				</table>
			</div>
		</div>

		<div class="aturan-toko">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<br>
						<div class="aturan-toko-parent">
							<table width="500">
							  	<tr>
								    <td width="108" ><font size="4"><B>Kodisi Barang</B></td>
								    <td width="194"> <font size="4"><?php echo $_POST["kondisibrg"]; ?></td>
							  	</tr>
							 
							   	<tr>
								    <td ><font size="4"><B>Biaya</B></td>
								    <td> <font size="4"><B>Rp. <?php echo $_POST["biaya"]; ?></B></td>
							  	</tr>

								<tr>
								    <td ><font size="4"><B>Nama Teknisi</B></td>
								    <td><font size="4"><?php echo $_POST["teknisi_nama"]; ?></td>
								</tr>  
							</table>
						</div>
					</div>

					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="keterangan-detail">
							<h3><b>Keterangan</b></h3>
							<p class="no-hp">
								<?php echo $_POST["keterangan"]; ?>
							</p>
						</div>
						<?php if ( $_POST["perusahaan_akun_login_customer"] < 1 ) { ?>
						<div class="keterangan-login">
							<div class="keterangan-login-detail">
								<p><b>Akses Login Untuk Cek Servis</b></p>
								<ul>
									<li>
										<b>Link Cek Servis:</b> <?=  $_POST["perusahaan_link"]; ?>
									</li>
								    <li>
								    	<b>Username:</b> <?php echo $_POST["tlpn"]; ?>
								    </li>
								    <li>
								    	<b>Password:</b> <?php echo $_POST["nota"]; ?>
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
						    			<h3><strong>PENYERAH</strong></h3>
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

	<?php else : ?>
	<!-- Nota Printer Thermal -->
	<section class="nota" style="width: <?= $_POST['ukuran_nota']; ?>cm">
		<div class="title-nota text-center">
			<em><b>TANDA PENGEMBALIAN SERVIS</b></em>
		</div>

		<div class="nota-header">
			<div class="nota-header-nama">
				<?= $_POST["namaPerusahaan"]; ?>
			</div>
			<!-- <div class="nota-header-alamat">
				<?= $alamat; ?>
			</div> -->
			<div class="nota-header-kontak">
				<?= $_POST["no_1"]; ?> <?= $_POST["no_2"]; ?>
			</div>
		</div>

		<div class="nota-name">
			<div class="nota-name-teks">
				<b>Nota: <?php echo $_POST["nota"]; ?></b>
			</div>
			<div class="nota-name-teks">
				<b>Nama</b>: <?php echo $_POST["nmpemilik"]; ?>
			</div>
			<div class="nota-name-teks">
				<b>Tgl. Diterima</b>: <?php echo tanggal_indo($_POST["tglditerima"]); ?>
			</div>
			<div class="nota-name-teks">
				<b>Tgl. Diambil</b>: <?php echo tanggal_indo(date("Y-m-d")); ?>
			</div>
			<div class="nota-name-teks">
				<b>Tlpn</b>: <?php echo $_POST["tlpn"]; ?>
			</div>
			<div class="nota-name-teks">
				<b>Alamat</b>: <?php echo $_POST["alamat"]; ?>
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
							<td><?php echo $_POST["nmbarang"]; ?></td>
							<td><?php echo $_POST["kerusakan"]; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="nota-table-kelengkapan">
				<b>Kelengkapan</b>: <?php echo $_POST["kelengkapan"]; ?>
			</div>
		</div>

		<div class="nota-penerima">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="nota-name">
						<div class="nota-name-teks">
							<b>Kodisi Barang: <?php echo $_POST["kondisibrg"]; ?></b>
						</div>
						<div class="nota-name-teks" style="font-size: 22px;">
							<b>Biaya: Rp <?php echo number_format($_POST["biaya"], 0, ',', '.'); ?></b>
						</div>
						<div class="nota-name-teks">
							<b>Teknisi</b>: <?php echo $_POST["teknisi_nama"]; ?>
						</div>

						<hr>

						<div class="nota-name-teks">
							<b>Keterangan</b>: <?php echo $_POST["keterangan"]; ?>
						</div>

						<?php if ( $_POST["perusahaan_akun_login_customer"] < 1 ) { ?>
						<div class="nota-name-teks">
							<b>Akses Login untuk cek servis</b><br>
							<ul>
								<li>
							    	Link Cek Servis: <?php echo $_POST["perusahaan_link"]; ?>
							    </li>
							    <li>
							    	Username: <?php echo $_POST["tlpn"]; ?>
							    </li>
							    <li>
							    	Password: <?php echo $_POST["nota"]; ?>
							    </li>
							</ul>
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<!-- <div class="nota-penerima-teks">
						<b>PENYERAH</b>
					</div><br><br><br>
					<div class="nota-penerima-teks">
						<b><?php echo $this->session->userdata('pm_nama') ?></b>
					</div> -->
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
									<b>PENYERAH</b>
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


