<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<body>

<?php include "../menu.php" ?>
<?php include "koneksi.php"?>


        <!-- Header-->

       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Perencanaan</a></li>
                            <li class="active">Perhitungan MRP</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    	 			<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">			
						<?php
						$bulan_ini = date('m');
						switch ($bulan_ini){
						case 1:
							$nama = "Januari";
							break;
						case 2:
							$nama = "Februari";
							break;
						case 3:
							$nama = "Maret";
							break;
						case 4:
							$nama = "April";
							break;
						case 5:
							$nama = "Mei";
							break;
						case 6:
							$nama = "Juni";
							break;
						case 7:
							$nama = "Juli";
							break;
						case 8:
							$nama = "Agustus";
							break;
						case 9:
							$nama = "September";
							break;
						case 10:
							$nama = "Oktober";
							break;
						case 11:
							$nama = "November";
							break;
						case 12:
							$nama = "Desember";
							break;
						default:
							$nama = "";
							break;
						}
					?>
	
			<strong class="card-title">Tabel Perhitungan MRP <?php print $nama;?></strong>
           </div>
				<div class="card-body">
				<?php
				$sql2 = mysqli_query($con, "SELECT DISTINCT kode_produk from bom");
				while($b = mysqli_fetch_array($sql2)){ 
				$kode_produk = $b['kode_produk'];
				?>
				<div class="col-md-4">
				<style>
				#myScrollTable tbody{
				clear:both;
				border:0px solid 3FF6600;
				height:400px;
				overflow:auto;
				float:left;
				width:890px;
				background:#E2E6E7;
				}
				</style>
						<table>
							<tbody>
							<tr>
							<th ><strong>Produk</th>
							<th>:</th>
									<?php
									$sql12 = mysqli_query($con, "SELECT * FROM produk WHERE kode_produk= '$kode_produk'");
									while($l = mysqli_fetch_array($sql12))
									{ 
										$nama_produk = $l['nama_produk'];
									?>
									<th><?php echo $nama_produk;?></th>
									<?php } ?>
							</tr>
							
							<tbody>
							</table>
							<br>
				</div>
				<div class="col-md-9">
				<table id="myScrollTable" class="table table-striped table-bordered" border="0" cellpadding="4" cellspacing="1">
						<tbody>
					<tr>
						<th width="10px"><center>#</center></th>
						<th width="10px"><center>PD</center></th>
						<?php
						$tanggal = date('d');
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
						
						
						for($i = $tanggal+1; $i <= $akhir; $i++){
						if ($i < 10){
						$char = "0";
						$kode= $char.$i;
						}
						else{
						$char = "";
						$kode = $char.$i;
						}	
						
						?>	
						
						<th width="40px"><center><?php echo $kode;?></center></th>
						<?php } ?>
						</tr>							
					<tr>
						<td><center>GR</center></td>
						<td><center></center></td>
						<?php
						$tanggal = date('d');
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);					
						$bulan = date ('m');
					
						$tahun = date('Y');
						$peramalan = $tahun;
						$query = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' and kode_produk='$kode_produk'");
						
						while($m = mysqli_fetch_array($query))
						{ 
						$kode_produk = $m['kode_produk'];
						$ambil = $m['peramalan'];
							}
							$ambil =0;
						$query3 = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
						while($p = mysqli_fetch_array($query3))
						{ 
							if ($p['peramalan'] == null){
													$ambil = 0;
												}
												else{
													$ambil = $p['peramalan'];
												}
							$ambil = $p['peramalan'];
							}
												
					for($i = $tanggal+1; $i <= $akhir; $i++){
						if ($i < 10){
						$char = "0";
						$kode= $char.$i;
						}
						else{
						$char = "";
						$kode = $char.$i;
						}	
					?>
						<td><center><?php echo  round(ceil($ambil/$akhir));}?></center></td>
					</tr>
						
					<tr>
						<td><center>SR</center></td>
						<td><center></center></td>
						<?php
						$tanggal = date('d');
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);					
						
						for($i = $tanggal+1; $i <= $akhir; $i++){
						if ($i < 10){
						$char = "0";
						$kode= $char.$i;
						}
						else{
						$char = "";
						$kode = $char.$i;
						}	
						
						$tgl_sr = $char.$i;
				
				
				
				$bln_sr= date('m');
				$sr_p = 0;
				$sr_b = 0;
					
				
				//Cek jumlah Schedule Receipt PRODUK
				$sql5 = mysqli_query($con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr' and kode_produk='$kode_produk'");
				while($e = mysqli_fetch_array($sql5))
				{
					$sr_p  = $e['jumlah'];
				}
				?>
						<td><center><?php echo  $sr_p;}?></center></td>
					</tr>
				
				<tr>
						<td><center>POH</center></td>
						<td><center>0</center></td>
						<?php
						$tanggal = date('d');
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);					
						
						for($i = $tanggal+1; $i <= $akhir; $i++){
						if ($i < 10){
						$char = "0";
						$kode= $char.$i;
						}
						else{
						$char = "";
						$kode = $char.$i;
						}	
						
						$ph =0;
				
				?>
						<td><center><?php echo  $ph;}?></center></td>
					</tr>
						
						
					<tr>
						<td><center>NET</center></td>
					<td><center></center></td>
						<?php
						$tanggal = date('d');
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);					
						
						for($i = $tanggal+1; $i <= $akhir; $i++){
						if ($i < 10){
						$char = "0";
						$kode= $char.$i;
						}
						else{
						$char = "";
						$kode = $char.$i;
						}	
						
						
						$tahun = date('Y');
						$peramalan = $tahun;
						$query = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' and kode_produk='$kode_produk'");
						
						while($m = mysqli_fetch_array($query))
						{ 
						$kode_produk = $m['kode_produk'];
						$ambil = $m['peramalan'];
							}
							$ambil =0;
						$query3 = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
						while($p = mysqli_fetch_array($query3))
						{ 
							if ($p['peramalan'] == null){
													$ambil = 0;
												}
												else{
													$ambil = $p['peramalan'];
												}
							$ambil = $p['peramalan'];
						}
						
						
						$gr = ceil($ambil/$akhir);
						
						$tgl_sr = $char.$i;
				
				
				
					$bln_sr= date('m');
					$sr_p = 0;
					$sr_b = 0;
					
				
				//Cek jumlah Schedule Receipt PRODUK
				$sql5 = mysqli_query($con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr' and kode_produk='$kode_produk'");
				while($e = mysqli_fetch_array($sql5))
				{
					$sr_p  = $e['jumlah'];
				}
						
				
				
				?>
						<td><center><?php echo  $gr+$sr_p;}?></center></td>
					</tr>		
						
					<tr>
						<td><center>Porec</center></td>
					<td><center></center></td>
						<?php
						$tanggal = date('d');
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);					
						
						for($i = $tanggal+1; $i <= $akhir; $i++){
						if ($i < 10){
						$char = "0";
						$kode= $char.$i;
						}
						else{
						$char = "";
						$kode = $char.$i;
						}	
						
						
						$tahun = date('Y');
						$peramalan = $tahun;
						$query = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' and kode_produk='$kode_produk'");
						
						while($m = mysqli_fetch_array($query))
						{ 
						$kode_produk = $m['kode_produk'];
						$ambil = $m['peramalan'];
							}
							$ambil =0;
						$query3 = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
						while($p = mysqli_fetch_array($query3))
						{ 
							if ($p['peramalan'] == null){
													$ambil = 0;
												}
												else{
													$ambil = $p['peramalan'];
												}
							$ambil = $p['peramalan'];
						}
						
						
						$gr = ceil($ambil/$akhir);
						
						$tgl_sr = $char.$i;
				
				
				
					$bln_sr= date('m');
					$sr_p = 0;
					$sr_b = 0;
					
				
				//Cek jumlah Schedule Receipt PRODUK
				$sql5 = mysqli_query($con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr' and kode_produk='$kode_produk'");
				while($e = mysqli_fetch_array($sql5))
				{
					$sr_p  = $e['jumlah'];
				}
						
				
				
				?>
						<td><center><?php echo  $gr+$sr_p;}?></center></td>
					</tr>			
						
						
					<tr>
						<td><center>Porel</center></td>
						<td><center></center></td>
						<?php
						$tanggal = date('d');
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);					
						
						for($i = $tanggal+1; $i <= $akhir; $i++){
						if ($i < 10){
						$char = "0";
						$kode= $char.$i;
						}
						else{
						$char = "";
						$kode = $char.$i;
						}	
						
						
						$tahun = date('Y');
						$peramalan = $tahun;
						$query = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' and kode_produk='$kode_produk'");
						
						while($m = mysqli_fetch_array($query))
						{ 
						$kode_produk = $m['kode_produk'];
						$ambil = $m['peramalan'];
							}
							$ambil =0;
						$query3 = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
						while($p = mysqli_fetch_array($query3))
						{ 
							if ($p['peramalan'] == null){
													$ambil = 0;
												}
												else{
													$ambil = $p['peramalan'];
												}
							$ambil = $p['peramalan'];
						}
						
						
						$gr = ceil($ambil/$akhir);
						
						$tgl_sr = $char.$i;
				
				
				
					$bln_sr= date('m');
					$sr_p = 0;
					$sr_b = 0;
					
				
				//Cek jumlah Schedule Receipt PRODUK
				$sql5 = mysqli_query($con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr' and kode_produk='$kode_produk'");
				while($e = mysqli_fetch_array($sql5))
				{
					$sr_p  = $e['jumlah'];
				}
						
				
				
				?>
						<td><center><?php echo  $gr+$sr_p;}?></center></td>
					</tr>			
							
						
						</tbody>
					</table>
									
									
									
						
					
					<table>
							<tbody>
							<tr>
							<th ><strong>Keterangan</th>
							<th>:</th>
									
							</tr>
							<tr>
							<td ><strong>GR </td>
							<th>:</th>
							<td>Permintaan kotor dari suatu item yang didapat dari perencanaan produksi ataupun peramalan.</td>		
							</tr>
							<tr>
							<br>
							<td ><strong>SR</td>
							<th>:</th>
							<td>Produk yang dipesan pada periode tertentu.</td>		
							</tr>
							<tr>
							<td ><strong>POH</td>
							<th>:</th>
							<td>Catatan jumlah barang yang ada pada periode awal yang didapat dari catatan persediaan.</td>		
							</tr>
							<tr>
							<tr>
							<td ><strong>NET</td>
							<th>:</th>
							<td>Kebutuhan bersih yang dibutuhkan pada periode .</td>		
							</tr>
							<tr>
							<td ><strong>POREC </td>
							<th>:</th>
							<td>Kuantitas pesanan yang direncanakan diterima pada periode tersebut</td>		
							</tr>
							<tr>
							<td ><strong>POREL </td>
							<th>:</th>
							<td>Kuantitas rencana pesanan yang ditempatkan atau dikeluarkan dalam periode tertentu agar item yang dipesan itu akan tersedia pada saat dibutuhkan. </td>		
							</tr>
							<tbody>
							</table>
							<br>
					
									
									</div><?php	}?>
									
									
		<!--<![Bahanbakuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu]-->				
									
					<?php
				$sql88 = mysqli_query($con, "SELECT DISTINCT kode_bahan_baku from bom");
				while($b = mysqli_fetch_array($sql88)){ 
				$kode_bahan_baku = $b['kode_bahan_baku'];
				?>
				<div class="col-md-4">
				<style>
				#myScrollTable tbody{
				clear:both;
				border:0px solid 3FF6600;
				height:400px;
				overflow:auto;
				float:left;
				width:890px;
				background:#E2E6E7;
				}
				</style>
						<table>
							<tbody>
							<tr>
							<th ><strong>Bahan Baku</th>
							<th>:</th>
									<?php
									$sql12 = mysqli_query($con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku= '$kode_bahan_baku'");
									while($l = mysqli_fetch_array($sql12))
									{ 
										$nama_bahan_baku = $l['nama_bahan_baku'];
									?>
									<th><?php echo $nama_bahan_baku;?></th>
									<?php } ?>
							</tr>
							<tr>
							<th ><strong>Satuan</th>
							<th>:</th>
									<?php
									$sql12 = mysqli_query($con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku= '$kode_bahan_baku'");
									while($l = mysqli_fetch_array($sql12))
									{ 
										$satuan = $l['satuan'];
									?>
									<th><?php echo $satuan;?></th>
									<?php } ?>
							</tr>
							<tr>
							<th ><strong>Lead Time</th>
							<th>:</th>
									<?php
									$sql12 = mysqli_query($con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku= '$kode_bahan_baku'");
									while($l = mysqli_fetch_array($sql12))
									{ 
										$lead_time= $l['lead_time'];
									?>
									<th><?php echo $lead_time;?></th>
									<?php } ?>
							</tr>
							<tr>
							<th ><strong>Lot Size</th>
							<th>:</th>
									<?php
									$sql12 = mysqli_query($con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku= '$kode_bahan_baku'");
									while($l = mysqli_fetch_array($sql12))
									{ 
										$lotsize= $l['lotsize'];
									?>
									<th><?php echo $lotsize;?></th>
									<?php } ?>
							</tr>
							<tbody>
							</table>
							<br>
				</div>
				<div class="col-md-9">
				<table id="myScrollTable" class="table table-striped table-bordered" border="0" cellpadding="4" cellspacing="1">
						<tbody>
						<tr>
						<th width="10px"><center>#</center></th>
						<th width="10px"><center>PD</center></th>
						<?php
						$tanggal = date('d');
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
						
						
						for($i = $tanggal+1; $i <= $akhir; $i++){
						if ($i < 10){
						$char = "0";
						$kode= $char.$i;
						}
						else{
						$char = "";
						$kode = $char.$i;
						}	
						
						?>	
						
						<th width="40px"><center><?php echo $kode;?></center></th>
						<?php } ?>
					</tr>
					
							<tr>
			<td><center>GR</center></td>
			<td><center></center></td>
			<?php
				$tanggal = date('d');
				$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);

				for($i = $tanggal+1; $i <= $akhir; $i++){
						if ($i < 10){
						$char = "0";
						$kode= $char.$i;
						}
						else{
						$char = "";
						$kode = $char.$i;
						}	
						
				$bulan = date ('m');
				$tahun = date('Y');
				$peramalan = $tahun;
						
				$query = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan'");
				
				while($m = mysqli_fetch_array($query))
			{ 
			$kode_produk = $m['kode_produk'];
			$ambil = $m['peramalan'];
			}
		
			//GROSS REQUIREMENT per bahan baku
	
			$gr = 0;
			$query1 = mysqli_query($con, "SELECT * from produk");
			while($n = mysqli_fetch_array($query1))
			{ 
				$kode_produk = $n['kode_produk'];
				$banyak_produksi = $n['banyak_produksi'];
				
				$ambil =0;
				$query3 = mysqli_query($con, "SELECT * from peramalan_penjualan  WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
				while($p = mysqli_fetch_array($query3))
				{ 
					if ($p['peramalan'] == null){
													$ambil = 0;
												}
												else{
													$ambil = $p['peramalan'];
												}
					$ambil = $p['peramalan'];
				}
				
				$temp = 0;
				$jumlah_penggunaan = 0;
				$query2 = mysqli_query($con, "SELECT * from bom INNER JOIN bahanbaku ON bom.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE bom.kode_bahan_baku = '$kode_bahan_baku' AND bom.kode_produk = '$kode_produk'");
				while($o = mysqli_fetch_array($query2))
				{
					$jumlah_penggunaan = $o['jumlah_penggunaan'];
					$ph = $o['jumlah_bahan_baku'];
					$lotsize = $o['lotsize'];
					
				}
					$jumlah_penggunaan; "<br>";
			
					$coba = round(((ceil($ambil/$akhir))*$jumlah_penggunaan/$banyak_produksi), 1);
					$temp = $coba;
					$gr += $temp;	
			}
				$tgl_sr = $char.$i;
				$bln_sr= date('m');
				$sr_p = 0;
				$sr_b = 0;
					
				$temp1 = 0;
				$temp2 = 0;
				
				//Cek jumlah Schedule Receipt Produk
				$sql2 = mysqli_query($con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr'");
				while($w = mysqli_fetch_array($sql2))
				{
					//Schedule Receipt
			
					$kode_produk = $w['kode_produk'];
					
					$query1 = mysqli_query($con, "SELECT * from produk WHERE kode_produk = '$kode_produk'");
					while($x = mysqli_fetch_array($query1))
					{
						$banyak_produksi = $x['banyak_produksi'];
					}
					
					$jumlah_penggunaan = 0;
					$query11 = mysqli_query($con, "SELECT * from bom WHERE kode_produk = '$kode_produk' AND kode_bahan_baku = '$kode_bahan_baku'");
					while($y = mysqli_fetch_array($query11))
					{
						 $jumlah_penggunaan = $y['jumlah_penggunaan']; 
					}
				 $jumlah_penggunaan; 
					$schedule = $w['jumlah'];
				 $n = round(($w['jumlah']*$jumlah_penggunaan/$banyak_produksi), 1); 
					$temp1 = $n;
					$sr_p += $temp1;
				}
				
					?>
					<td><center><?php echo  $gr+$sr_p;}?></center></td>
					</tr>
						
			<tr>
						<td><center>SR</center></td>
						<td><center></center></td>
						<?php
						$tanggal = date('d');
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);					
						
						for($i = $tanggal+1; $i <= $akhir; $i++){
						if ($i < 10){
						$char = "0";
						$kode= $char.$i;
						}
						else{
						$char = "";
						$kode = $char.$i;
						}	
						
						$tgl_sr = $char.$i;
				
				$sr_p = 0;
				$sr_b = 0;
					
				$temp1 = 0;
				$temp2 = 0;
					
				
				//Cek jumlah Schedule Bahan Baku
				$sql3 = mysqli_query($con, "SELECT * FROM pre_order_bb WHERE tanggal = '$tgl_sr' AND bln = '$bln_sr' and status='0' and kode_bahan_baku = '$kode_bahan_baku'");
				while($g = mysqli_fetch_array($sql3))
				{
					//Schedule Receipt
					$sr_b = $g['jumlah'];
					$sr_b += $temp2; 
				}
				
				?>
				<td><center><?php echo  $sr_b;}?></center></td>
				</tr>
				<tr>
				<td><center>POH</center></td>
				<?php
					$sql4 = mysqli_query($con, "SELECT jumlah_bahan_baku from bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");
					while($d = mysqli_fetch_array($sql4))
					{ 
					$jumlah_bahan_baku = $d['jumlah_bahan_baku'];
					?>
					<td><center><?php echo $jumlah_bahan_baku;?></center></td>
					<?php } ?>
					<?php
			
			$tanggal = date('d');
			$bulan = date('m');
			$tahun = date('Y');

			$tahun = date ('Y');											
			$peramalan = $tahun;
			$ID_peramalan = $peramalan . $kode_produk. "-" . $bulan; 

			$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
	
			$query = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan'");
			while($m = mysqli_fetch_array($query))
			{ 
			$kode_produk = $m['kode_produk'];
			$ambil = $m['peramalan'];
			
			}

			$gr = 0;
			$query1 = mysqli_query($con, "SELECT * from produk");
			while($n = mysqli_fetch_array($query1))
			{ 
				$kode_produk = $n['kode_produk'];
				$banyak_produksi = $n['banyak_produksi'];
				
				$ambil =0;
				$query3 = mysqli_query($con, "SELECT * from peramalan_penjualan  WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
				while($p = mysqli_fetch_array($query3))
				{ 
					if ($p['peramalan'] == null){
													$ambil = 0;
												}
												else{
													$ambil = $p['peramalan'];
												}
					$ambil = $p['peramalan'];
				}
				
				$temp = 0;
				$jumlah_penggunaan = 0;
				$query2 = mysqli_query($con, "SELECT * from bom INNER JOIN bahanbaku ON bom.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE bom.kode_bahan_baku = '$kode_bahan_baku' AND bom.kode_produk = '$kode_produk'");
				while($o = mysqli_fetch_array($query2))
				{
					$jumlah_penggunaan = $o['jumlah_penggunaan'];
					$ph = $o['jumlah_bahan_baku'];
					$lotsize = $o['lotsize'];
					
				}
			 $jumlah_penggunaan; "<br>";
			
					$coba = round(((ceil($ambil/$akhir))*$jumlah_penggunaan/$banyak_produksi), 1);
					$temp = $coba;
					$gr += $temp;
			}
			
			//Ambil tanggal
			for($i = $tanggal+1; $i <= $akhir; $i++)
			{
				
				if ($i < 10){
					$char = "0";
					$kode= $char.$i;
				}
				else{
					$char = "";
					$kode = $char.$i;
				}
				
				$tgl_sr = $char.$i;
				$bln_sr= date('m');
				$sr_p = 0;
				$sr_b = 0;
					
				$temp1 = 0;
				$temp2 = 0;
				
				
				
				//Cek jumlah Schedule Receipt Produk
				$sql2 = mysqli_query($con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr'");
				while($w = mysqli_fetch_array($sql2))
				{
					//Schedule Receipt
			
					$kode_produk = $w['kode_produk'];
					
					$query1 = mysqli_query($con, "SELECT * from produk WHERE kode_produk = '$kode_produk'");
					while($x = mysqli_fetch_array($query1))
					{
						$banyak_produksi = $x['banyak_produksi'];
					}
					
					$jumlah_penggunaan = 0;
					$query11 = mysqli_query($con, "SELECT * from bom WHERE kode_produk = '$kode_produk' AND kode_bahan_baku = '$kode_bahan_baku'");
					while($y = mysqli_fetch_array($query11))
					{
						 $jumlah_penggunaan = $y['jumlah_penggunaan']; 
					}
				 $jumlah_penggunaan; 
					$schedule = $w['jumlah'];
				 $n = round(($w['jumlah']*$jumlah_penggunaan/$banyak_produksi), 1); 
					$temp1 = $n;
					$sr_p += $temp1;
				}
				
				
				//Cek jumlah Schedule Bahan Baku
				$sql3 = mysqli_query($con, "SELECT * FROM pre_order_bb WHERE tanggal = '$tgl_sr' AND bln = '$bln_sr' and status='0' and kode_bahan_baku = '$kode_bahan_baku'");
				while($g = mysqli_fetch_array($sql3))
				{
					//Schedule Receipt
					$sr_b = $g['jumlah'];
					$sr_b += $temp2; 
				}

				//Proses Pengurangan
				$sr = abs($sr_b - $sr_p);
				
			
				if ($ph >= $gr+$sr_p){
					$ph = round(($ph - $gr + $sr_b - $sr_p), 1);
					
				}
				else {
					$ph = $ph + $lotsize - $gr - $sr_p;
				}
				
				?>
			
				<td><center>
				
				<?php 
				
					
				echo  $ph;}?>
				
				</center></td>
				</tr>
				
					<tr>
				<td><center>NET</center></td>
				<td><center></center></td>
				<?php
			
			$tanggal = date('d');
			$bulan = date('m');
			$tahun = date('Y');

			$tahun = date ('Y');											
			$peramalan = $tahun;
			$ID_peramalan = $peramalan . $kode_produk. "-" . $bulan; 

			$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
	
			$query = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan'");
			while($m = mysqli_fetch_array($query))
			{ 
			$kode_produk = $m['kode_produk'];
			$ambil = $m['peramalan'];
			
			}

			$gr = 0;
			$query1 = mysqli_query($con, "SELECT * from produk");
			while($n = mysqli_fetch_array($query1))
			{ 
				$kode_produk = $n['kode_produk'];
				$banyak_produksi = $n['banyak_produksi'];
				
				$ambil =0;
				$query3 = mysqli_query($con, "SELECT * from peramalan_penjualan  WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
				while($p = mysqli_fetch_array($query3))
				{ 
					if ($p['peramalan'] == null){
													$ambil = 0;
												}
												else{
													$ambil = $p['peramalan'];
												}
					$ambil = $p['peramalan'];
				}
				
				$temp = 0;
				$jumlah_penggunaan = 0;
				$query2 = mysqli_query($con, "SELECT * from bom INNER JOIN bahanbaku ON bom.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE bom.kode_bahan_baku = '$kode_bahan_baku' AND bom.kode_produk = '$kode_produk'");
				while($o = mysqli_fetch_array($query2))
				{
					$jumlah_penggunaan = $o['jumlah_penggunaan'];
					$ph = $o['jumlah_bahan_baku'];
					$lotsize = $o['lotsize'];
					
				}
			 $jumlah_penggunaan; "<br>";
			
					$coba = round(((ceil($ambil/$akhir))*$jumlah_penggunaan/$banyak_produksi), 1);
					$temp = $coba;
					$gr += $temp;
			}
			
			//Ambil tanggal
			
				
				if ($i < 10){
					$char = "0";
					$kode= $char.$i;
				}
				else{
					$char = "";
					$kode = $char.$i;
				}
				
				$tgl_sr = $char.$i;
				$bln_sr= date('m');
				$sr_p = 0;
				$sr_b = 0;
					
				$temp1 = 0;
				$temp2 = 0;
				
				
				
				//Cek jumlah Schedule Receipt Produk
				$sql2 = mysqli_query($con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr'");
				while($w = mysqli_fetch_array($sql2))
				{
					//Schedule Receipt
			
					$kode_produk = $w['kode_produk'];
					
					$query1 = mysqli_query($con, "SELECT * from produk WHERE kode_produk = '$kode_produk'");
					while($x = mysqli_fetch_array($query1))
					{
						$banyak_produksi = $x['banyak_produksi'];
					}
					
					$jumlah_penggunaan = 0;
					$query11 = mysqli_query($con, "SELECT * from bom WHERE kode_produk = '$kode_produk' AND kode_bahan_baku = '$kode_bahan_baku'");
					while($y = mysqli_fetch_array($query11))
					{
						 $jumlah_penggunaan = $y['jumlah_penggunaan']; 
					}
				 $jumlah_penggunaan; 
					$schedule = $w['jumlah'];
				 $n = round(($w['jumlah']*$jumlah_penggunaan/$banyak_produksi), 1); 
					$temp1 = $n;
					$sr_p += $temp1;
				}
				
				
				//Cek jumlah Schedule Bahan Baku
				$sql3 = mysqli_query($con, "SELECT * FROM pre_order_bb WHERE tanggal = '$tgl_sr' AND bln = '$bln_sr' and status='0' and kode_bahan_baku = '$kode_bahan_baku'");
				while($g = mysqli_fetch_array($sql3))
				{
					//Schedule Receipt
					$sr_b = $g['jumlah'];
					$sr_b += $temp2; 
				}

				//Proses Pengurangan
				$sr = abs($sr_b - $sr_p);
				
			
				
				if ($ph >= $gr){
				
					$net1= "";
					
				}
				else {
					$net1 = $gr - $ph;
				}
				
				
				
				?>
			
				<td><center>
				
				<?php 
					
				echo  $net1;?>
				
				</center></td>
				
					
				
			<?php
			
			$tanggal = date('d');
			$bulan = date('m');
			$tahun = date('Y');

			$tahun = date ('Y');											
			$peramalan = $tahun;
			$ID_peramalan = $peramalan . $kode_produk. "-" . $bulan; 

			$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
	
			$query = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan'");
			while($m = mysqli_fetch_array($query))
			{ 
			$kode_produk = $m['kode_produk'];
			$ambil = $m['peramalan'];
			
			}

			$gr = 0;
			$query1 = mysqli_query($con, "SELECT * from produk");
			while($n = mysqli_fetch_array($query1))
			{ 
				$kode_produk = $n['kode_produk'];
				$banyak_produksi = $n['banyak_produksi'];
				
				$ambil =0;
				$query3 = mysqli_query($con, "SELECT * from peramalan_penjualan  WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
				while($p = mysqli_fetch_array($query3))
				{ 
					if ($p['peramalan'] == null){
													$ambil = 0;
												}
												else{
													$ambil = $p['peramalan'];
												}
					$ambil = $p['peramalan'];
				}
				
				$temp = 0;
				$jumlah_penggunaan = 0;
				$query2 = mysqli_query($con, "SELECT * from bom INNER JOIN bahanbaku ON bom.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE bom.kode_bahan_baku = '$kode_bahan_baku' AND bom.kode_produk = '$kode_produk'");
				while($o = mysqli_fetch_array($query2))
				{
					$jumlah_penggunaan = $o['jumlah_penggunaan'];
					$ph = $o['jumlah_bahan_baku'];
					$lotsize = $o['lotsize'];
					
				}
			 $jumlah_penggunaan; "<br>";
			
					$coba = round(((ceil($ambil/$akhir))*$jumlah_penggunaan/$banyak_produksi), 1);
					$temp = $coba;
					$gr += $temp;
			}
			
			//Ambil tanggal
			for($i = $tanggal+2; $i <= $akhir; $i++)
			{
				
				if ($i < 10){
					$char = "0";
					$kode= $char.$i;
				}
				else{
					$char = "";
					$kode = $char.$i;
				}
				
				$tgl_sr = $char.$i;
				$bln_sr= date('m');
				$sr_p = 0;
				$sr_b = 0;
					
				$temp1 = 0;
				$temp2 = 0;
				
				
				
				//Cek jumlah Schedule Receipt Produk
				$sql2 = mysqli_query($con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr'");
				while($w = mysqli_fetch_array($sql2))
				{
					//Schedule Receipt
			
					$kode_produk = $w['kode_produk'];
					
					$query1 = mysqli_query($con, "SELECT * from produk WHERE kode_produk = '$kode_produk'");
					while($x = mysqli_fetch_array($query1))
					{
						$banyak_produksi = $x['banyak_produksi'];
					}
					
					$jumlah_penggunaan = 0;
					$query11 = mysqli_query($con, "SELECT * from bom WHERE kode_produk = '$kode_produk' AND kode_bahan_baku = '$kode_bahan_baku'");
					while($y = mysqli_fetch_array($query11))
					{
						 $jumlah_penggunaan = $y['jumlah_penggunaan']; 
					}
				 $jumlah_penggunaan; 
					$schedule = $w['jumlah'];
				 $n = round(($w['jumlah']*$jumlah_penggunaan/$banyak_produksi), 1); 
					$temp1 = $n;
					$sr_p += $temp1;
				}
				 
				
				//Cek jumlah Schedule Bahan Baku
				$sql3 = mysqli_query($con, "SELECT * FROM pre_order_bb WHERE tanggal = '$tgl_sr' AND bln = '$bln_sr' and status='0' and kode_bahan_baku = '$kode_bahan_baku'");
				while($g = mysqli_fetch_array($sql3))
				{
					//Schedule Receipt
					$sr_b = $g['jumlah'];
					$sr_b += $temp2; 
				}

				//Proses Pengurangan
				$sr = abs($sr_b - $sr_p);
				
				
				if ($ph >= $gr){
					$ambilTgl = $i+1;
					$ph = round(($ph - $gr + $sr_b - $sr_p), 1);
					
				}
				else {
					$ph = $ph + $lotsize - $gr;
				}
				
				
				if ($ph < $gr){
					$net =  $gr - $ph  ;
				}
				else {
					$net =  ""  ;
				}
				?>
			
				<td><center>
				
				<?php 
					
				echo  $net;}?>
				
				</center></td>
				
				</tr>
				
				
				<tr>
				<td><center>POREC</center></td>
				<td><center></center></td>
					<?php
			
			$tanggal = date('d');
			$bulan = date('m');
			$tahun = date('Y');

			$tahun = date ('Y');											
			$peramalan = $tahun;
			$ID_peramalan = $peramalan . $kode_produk. "-" . $bulan; 

			$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
	
			$query = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan'");
			while($m = mysqli_fetch_array($query))
			{ 
			$kode_produk = $m['kode_produk'];
			$ambil = $m['peramalan'];
			
			}

			$gr = 0;
			$query1 = mysqli_query($con, "SELECT * from produk");
			while($n = mysqli_fetch_array($query1))
			{ 
				$kode_produk = $n['kode_produk'];
				$banyak_produksi = $n['banyak_produksi'];
				
				$ambil =0;
				$query3 = mysqli_query($con, "SELECT * from peramalan_penjualan  WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
				while($p = mysqli_fetch_array($query3))
				{ 
					if ($p['peramalan'] == null){
													$ambil = 0;
												}
												else{
													$ambil = $p['peramalan'];
												}
					$ambil = $p['peramalan'];
				}
				
				$temp = 0;
				$jumlah_penggunaan = 0;
				$query2 = mysqli_query($con, "SELECT * from bom INNER JOIN bahanbaku ON bom.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE bom.kode_bahan_baku = '$kode_bahan_baku' AND bom.kode_produk = '$kode_produk'");
				while($o = mysqli_fetch_array($query2))
				{
					$jumlah_penggunaan = $o['jumlah_penggunaan'];
					$ph = $o['jumlah_bahan_baku'];
					$lotsize = $o['lotsize'];
					
				}
			 $jumlah_penggunaan; "<br>";
			
					$coba = round(((ceil($ambil/$akhir))*$jumlah_penggunaan/$banyak_produksi), 1);
					$temp = $coba;
					$gr += $temp;
			}
			
			//Ambil tanggal
			
				
				if ($i < 10){
					$char = "0";
					$kode= $char.$i;
				}
				else{
					$char = "";
					$kode = $char.$i;
				}
				
				$tgl_sr = $char.$i;
				$bln_sr= date('m');
				$sr_p = 0;
				$sr_b = 0;
					
				$temp1 = 0;
				$temp2 = 0;
				
				
				
				//Cek jumlah Schedule Receipt Produk
				$sql2 = mysqli_query($con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr'");
				while($w = mysqli_fetch_array($sql2))
				{
					//Schedule Receipt
			
					$kode_produk = $w['kode_produk'];
					
					$query1 = mysqli_query($con, "SELECT * from produk WHERE kode_produk = '$kode_produk'");
					while($x = mysqli_fetch_array($query1))
					{
						$banyak_produksi = $x['banyak_produksi'];
					}
					
					$jumlah_penggunaan = 0;
					$query11 = mysqli_query($con, "SELECT * from bom WHERE kode_produk = '$kode_produk' AND kode_bahan_baku = '$kode_bahan_baku'");
					while($y = mysqli_fetch_array($query11))
					{
						 $jumlah_penggunaan = $y['jumlah_penggunaan']; 
					}
				 $jumlah_penggunaan; 
					$schedule = $w['jumlah'];
				 $n = round(($w['jumlah']*$jumlah_penggunaan/$banyak_produksi), 1); 
					$temp1 = $n;
					$sr_p += $temp1;
				}
				
				
				//Cek jumlah Schedule Bahan Baku
				$sql3 = mysqli_query($con, "SELECT * FROM pre_order_bb WHERE tanggal = '$tgl_sr' AND bln = '$bln_sr' and status='0' and kode_bahan_baku = '$kode_bahan_baku'");
				while($g = mysqli_fetch_array($sql3))
				{
					//Schedule Receipt
					$sr_b = $g['jumlah'];
					$sr_b += $temp2; 
				}

				//Proses Pengurangan
				$sr = abs($sr_b - $sr_p);
				
				
				if ($ph >= $gr){
				
					$lotsize2= "";
					
				}
				else {
					$lotsize2 = $lotsize;
				}
				
				
				
				?>
			
				<td><center>
				
				<?php 
					
				echo  $lotsize2;?>
				
				</center></td>
					
				
			<?php
			
			$tanggal = date('d');
			$bulan = date('m');
			$tahun = date('Y');

			$tahun = date ('Y');											
			$peramalan = $tahun;
			$ID_peramalan = $peramalan . $kode_produk. "-" . $bulan; 

			$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
	
			$query = mysqli_query($con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan'");
			while($m = mysqli_fetch_array($query))
			{ 
			$kode_produk = $m['kode_produk'];
			$ambil = $m['peramalan'];
			
			}

			$gr = 0;
			$query1 = mysqli_query($con, "SELECT * from produk");
			while($n = mysqli_fetch_array($query1))
			{ 
				$kode_produk = $n['kode_produk'];
				$banyak_produksi = $n['banyak_produksi'];
				
				$ambil =0;
				$query3 = mysqli_query($con, "SELECT * from peramalan_penjualan  WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
				while($p = mysqli_fetch_array($query3))
				{ 
					if ($p['peramalan'] == null){
													$ambil = 0;
												}
												else{
													$ambil = $p['peramalan'];
												}
					$ambil = $p['peramalan'];
				}
				
				$temp = 0;
				$jumlah_penggunaan = 0;
				$query2 = mysqli_query($con, "SELECT * from bom INNER JOIN bahanbaku ON bom.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE bom.kode_bahan_baku = '$kode_bahan_baku' AND bom.kode_produk = '$kode_produk'");
				while($o = mysqli_fetch_array($query2))
				{
					$jumlah_penggunaan = $o['jumlah_penggunaan'];
					$ph = $o['jumlah_bahan_baku'];
					$lotsize = $o['lotsize'];
					
				}
			 $jumlah_penggunaan; "<br>";
			
					$coba = round(((ceil($ambil/$akhir))*$jumlah_penggunaan/$banyak_produksi), 1);
					$temp = $coba;
					$gr += $temp;
			}
			
			//Ambil tanggal
			for($i = $tanggal+2; $i <= $akhir; $i++)
			{
				
				if ($i < 10){
					$char = "0";
					$kode= $char.$i;
				}
				else{
					$char = "";
					$kode = $char.$i;
				}
				
				$tgl_sr = $char.$i;
				$bln_sr= date('m');
				$sr_p = 0;
				$sr_b = 0;
					
				$temp1 = 0;
				$temp2 = 0;
				
				
				
				//Cek jumlah Schedule Receipt Produk
				$sql2 = mysqli_query($con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr'");
				while($w = mysqli_fetch_array($sql2))
				{
					//Schedule Receipt
			
					$kode_produk = $w['kode_produk'];
					
					$query1 = mysqli_query($con, "SELECT * from produk WHERE kode_produk = '$kode_produk'");
					while($x = mysqli_fetch_array($query1))
					{
						$banyak_produksi = $x['banyak_produksi'];
					}
					
					$jumlah_penggunaan = 0;
					$query11 = mysqli_query($con, "SELECT * from bom WHERE kode_produk = '$kode_produk' AND kode_bahan_baku = '$kode_bahan_baku'");
					while($y = mysqli_fetch_array($query11))
					{
						 $jumlah_penggunaan = $y['jumlah_penggunaan']; 
					}
				 $jumlah_penggunaan; 
					$schedule = $w['jumlah'];
				 $n = round(($w['jumlah']*$jumlah_penggunaan/$banyak_produksi), 1); 
					$temp1 = $n;
					$sr_p += $temp1;
				}
				
				
				//Cek jumlah Schedule Bahan Baku
				$sql3 = mysqli_query($con, "SELECT * FROM pre_order_bb WHERE tanggal = '$tgl_sr' AND bln = '$bln_sr' and status='0' and kode_bahan_baku = '$kode_bahan_baku'");
				while($g = mysqli_fetch_array($sql3))
				{
					//Schedule Receipt
					$sr_b = $g['jumlah'];
					$sr_b += $temp2; 
				}

				//Proses Pengurangan
				$sr = abs($sr_b - $sr_p);
				
				
				
				if ($ph >= $gr){
					$ambilTgl = $i+1;
					$ph = round(($ph - $gr + $sr_b - $sr_p), 1);
					
				}
				else {
					$ph = $ph + $lotsize - $gr;
				}
				
				
				if ($ph < $gr){
					$lotsize1 = $lotsize ;
				}
				else {
					$lotsize1 =  ""  ;
				}
				?>
			
				<td><center>
				
				<?php 
					
				echo  $lotsize1;}?>
				
				</center></td>
				</tr>
				
				<tr>
					<td><center>POREL</center></td>
				
					<td><center></center></td>
					<?php
					
							$tanggal = date('d');
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);					
						
						for($i = $tanggal+1; $i <= $akhir; $i++){
						if ($i < 10){
						$char = "0";
						$kode= $char.$i;
						}
						else{
						$char = "";
						$kode = $char.$i;
						}	
						
						$tgl_sr = $char.$i;
				
						$bln_sr= date('m');
			
														$final = "";
														$sql3 = mysqli_query($con, "SELECT tgl from porel WHERE kode_bahan_baku = '$kode_bahan_baku'");
														while($c = mysqli_fetch_array($sql3))
														{ 
															$tgl = $c['tgl'];
															$net = 0;
															
															$sql8 = mysqli_query($con, "SELECT kode_bahan_baku from porel WHERE kode_bahan_baku = '$kode_bahan_baku' AND tgl = '$tgl_sr'");
															while($h = mysqli_fetch_array($sql8))
															{ 
																$kode_bahan_baku = $h['kode_bahan_baku'];
															
															$sql9 = mysqli_query($con, "SELECT lotsize from bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");
															while($h = mysqli_fetch_array($sql9))
															{ 
																$lotsize= $h['lotsize'];
															}
															
														if($lotsize == NULL){
															$final = "";
														}
														else{
															$final = $lotsize;
															}}
														}
														?>
													<td><center><?php echo $final;?></center></td>
														<?php } ?>
				</tr>
									
					</tbody>
					</table>
					<table>
							<tbody>
							<tr>
							<th ><strong>Keterangan</th>
							<th>:</th>
									
							</tr>
							<tr>
							<td ><strong>GR </td>
							<th>:</th>
							<td>Permintaan kotor dari suatu item yang didapat dari perencanaan produksi ataupun peramalan.</td>		
							</tr>
							<tr>
							<br>
							<td ><strong>SR</td>
							<th>:</th>
							<td>Jadwal kedatangan barang yang dipesan pada periode tertentu.</td>		
							</tr>
							<tr>
							<td ><strong>POH</td>
							<th>:</th>
							<td>Catatan jumlah barang yang ada pada periode awal yang didapat dari catatan persediaan.</td>		
							</tr>
							<tr>
							<tr>
							<td ><strong>NET</td>
							<th>:</th>
							<td>Kebutuhan bersih yang dibutuhkan pada periode .</td>		
							</tr>
							<tr>
							<td ><strong>POREC </td>
							<th>:</th>
							<td>Kuantitas pesanan yang direncanakan diterima pada periode tersebut</td>		
							</tr>
							<tr>
							<td ><strong>POREL </td>
							<th>:</th>
							<td>Kuantitas rencana pesanan yang ditempatkan atau dikeluarkan dalam periode tertentu agar item yang dipesan itu akan tersedia pada saat dibutuhkan. </td>		
							</tr>
							<tbody>
							</table>
							<br>
					
					
					</div><?php	}?>
					
					
					
									</div> 
								</div>
							</div>
						</div>
					</div>
				</div>
	
			
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


    
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="../assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>
 