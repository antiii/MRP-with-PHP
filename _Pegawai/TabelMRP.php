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
	
			<strong class="card-title">Tabel MRP <?php print $nama;?></strong>
           </div>
				<div class="card-body">
				<?php
				$sql2 = mysqli_query($con, "SELECT DISTINCT kode_produk from peramalan_penjualan");
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
						<th width="10px"><center></center></th>
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
						<td><center>PD</center></td>
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
						
						$porel =0;
				
				
				
				?>
						<td><center><?php echo  $porel;}?></center></td>
					</tr>		
						
					<tr>
						<td><center>POREC</center></td>
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
						
						$porec =0;
				
				
				
				?>
						<td><center><?php echo  $porec;}?></center></td>
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
									
									
									
									
									<br>
									</div><?php	}?>
									
									
		<!--<![Bahanbakuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu]-->				
					
								<?php
								$sql2 = mysqli_query($con, "SELECT DISTINCT kode_bahan_baku from mrp_perhitungan");
									while($b = mysqli_fetch_array($sql2))
									{ 
										$kode_bahan_baku = $b['kode_bahan_baku'];
													
										$sql11 = mysqli_query($con, "SELECT rop from bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");
										while($k = mysqli_fetch_array($sql11))
										{ 
											$ROP = $k['rop'];
										}
									?>
										<div class="col-md-4">
										
												<table>
													<thead>
														<tr>
															<th ><strong>Bahan Baku</th>
															<th>:</th>
															<?php
															$sql12 = mysqli_query($con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");
															while($l = mysqli_fetch_array($sql12))
															{ 
																$nama_bahan_baku = $l['nama_bahan_baku'];
															?>
															<th><?php echo $nama_bahan_baku;?></th>
															<?php } ?>
														</tr>
														<tr>
															<th>Leadtime</th>
															<th> :</th>
															<?php
															$sql13 = mysqli_query($con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");
															while($m = mysqli_fetch_array($sql13))
															{ 
																$lead_time = $m['lead_time'];
															?>
															<th ><?php echo $lead_time;?> hari</th>
															<?php } ?>
														</tr>
														<tr>
															<th >Lot Size</th>
															<th >:</th>
															<?php
															$sql13 = mysqli_query($con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");
															while($n = mysqli_fetch_array($sql13))
															{ 
																$lotsize = $n['lotsize'];
																$satuan = $n['satuan'];
															?>
															<th ><?php echo $lotsize;?> <?php echo $satuan;?></th>
															<?php } ?>
														</tr>
														</tr>
													</thead>
												</table>
											<br>
										</div>
										<div class="col-md-12">
											
												<table id="myScrollTable" class="table table-striped table-bordered" border="0" cellpadding="4" cellspacing="1">
													<tbody>
														<tr>
															<th width="20px"><center>#</center></th>
															<th width="40px"><center>PD</center></th>
															<?php
															$sql3 = mysqli_query($con, "SELECT tanggal from mrp_perhitungan WHERE kode_bahan_baku = '$kode_bahan_baku'");
															while($c = mysqli_fetch_array($sql3))
															{ 
																$tanggal = $c['tanggal'];
															?>
															<th width="40px"><center><?php echo $tanggal;?></center></th>
															<?php } ?>
													
														</tr>
												
													
														<tr>
															<td><center>GR</center></td>
															<td><center>&nbsp;</center></td>
															<?php
															$sql5 = mysqli_query($con, "SELECT gr from mrp_perhitungan WHERE kode_bahan_baku = '$kode_bahan_baku'");
															while($e = mysqli_fetch_array($sql5))
															{ 
																$gr = $e['gr'];
															?>
															<td><center><?php echo $gr;?></center></td>
															<?php } ?>
															
														</tr>
														<tr>
															<td><center>SR</center></td>
															<td><center>&nbsp;</center></td>
															<?php
															$sql6 = mysqli_query($con, "SELECT sr from mrp_perhitungan WHERE kode_bahan_baku = '$kode_bahan_baku'");
															while($f = mysqli_fetch_array($sql6))
															{ 
																$sr = $f['sr'];
															?>
															<td><center><?php echo $sr;?></center></td>
															<?php } ?>
															
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
															$sql7 = mysqli_query($con, "SELECT ph from mrp_perhitungan WHERE kode_bahan_baku = '$kode_bahan_baku'");
															while($g = mysqli_fetch_array($sql7))
															{ 
																$ph = $g['ph'];
															?>
															<td><center><?php echo $ph;?></center></td>
															<?php } ?>
																
														</tr>
														<tr>
														<td><center>NR</center></td>
														<td><center>&nbsp;</center></td>
														<?php
														$final = 0;
														$sql3 = mysqli_query($con, "SELECT tanggal from mrp_perhitungan WHERE kode_bahan_baku = '$kode_bahan_baku'");
														while($c = mysqli_fetch_array($sql3))
														{ 
															$tgl = $c['tanggal'];
															$net = 0;
															$sql8 = mysqli_query($con, "SELECT net from porec WHERE kode_bahan_baku = '$kode_bahan_baku' AND tgl = '$tgl'");
															while($h = mysqli_fetch_array($sql8))
															{ 
																$net = $h['net'];
															}
														if($net == NULL){
															$final = " ";
														}
														else{
															$final = $net;
														}
														?>
													<td><center><?php echo $final;?></center></td>
														<?php } ?>
														</tr>
														<tr>
															<td><center>POREC</center></td>
														<td><center>&nbsp;</center></td>
														<?php
														$final = 0;
														$sql3 = mysqli_query($con, "SELECT tanggal from mrp_perhitungan WHERE kode_bahan_baku = '$kode_bahan_baku'");
														while($c = mysqli_fetch_array($sql3))
														{ 
															$tgl = $c['tanggal'];
															$porec = 0;
															$sql8 = mysqli_query($con, "SELECT porec from porec WHERE kode_bahan_baku = '$kode_bahan_baku' AND tgl = '$tgl'");
															while($h = mysqli_fetch_array($sql8))
															{ 
																$porec = $h['porec'];
															}
														if($porec == NULL){
															$final = " ";
														}
														else{
															$final = $porec;
														}
														?>
													<td><center><?php echo $final;?></center></td>
														<?php } ?>
														</tr>
														<tr>
															<td><center>POREL</center></td>
															<td><center>&nbsp;</center></td>
															
															<?php
															$sql10 = mysqli_query($con, "SELECT porel from mrp_perhitungan WHERE kode_bahan_baku = '$kode_bahan_baku'");
															while($j = mysqli_fetch_array($sql10))
															{ 
																$porel = $j['porel'];
															?>
															<td><center><?php echo $porel;?></center></td>
															<?php } ?>
														
														</tr>
													</tbody>
												</table>
												<br>
										</div>
										<?php
										}
										?>
														
									
									
									
									
									
									
									
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
 