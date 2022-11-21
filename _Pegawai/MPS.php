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
                            <li class="active">MPS</li>
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
	
			<strong class="card-title">Tabel Rencana Produksi Ayam Geprek Bulan  <?php print $nama;?></strong>
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
				height:130px;
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
						<?php
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
						for ($i = 1; $i <= $akhir ; $i++) {
							if ($i == 15) {
								continue;
							}
						?>	
						<th width="40px"><center><?php echo $i;?></center></th>
						<?php } ?>
					</tr>
						<tr>
						<td><center>Produksi</center></td>
						<?php
							$tanggal = date('d');
											
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
												
					for($i = 1; $i <= $akhir; $i++)
					{
					if ($i == 15) {
						continue;
						}
					?>
						<td><center><?php echo  round(ceil($ambil/$akhir));}?></center></td>
						</tr>
						</tbody>
					</table>
									<br>
									</div><?php	}?>
									
									
									
									
					<?php
				$sql2 = mysqli_query($con, "SELECT DISTINCT kode_bahan_baku from bom");
				while($b = mysqli_fetch_array($sql2)){ 
				$kode_bahan_baku = $b['kode_bahan_baku'];
				?>
				<div class="col-md-4">
				<style>
				#myScrollTable tbody{
				clear:both;
				border:0px solid 3FF6600;
				height:130px;
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
							<tbody>
							</table>
							<br>
				</div>
				<div class="col-md-9">
				<table id="myScrollTable" class="table table-striped table-bordered" border="0" cellpadding="4" cellspacing="1">
						<tbody>
						<tr>
						<th width="10px"><center>#</center></th>
						<?php
						$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
						for ($i = 1; $i <= $akhir ; $i++) {
							if ($i == 15) {
								continue;
							}
						?>	
						<th width="40px"><center><?php echo $i;?></center></th>
						<?php } ?>
					</tr>
						<tr>
						<td><center>Penggunaan</center></td>
			
		<?php
										$tanggal = date('d');
											
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
											
												
					for($i = 1; $i <= $akhir; $i++)
					{
					if ($i == 15) {
						
						continue;
						}
					?>
		<td><center><?php echo  $gr;}?></center></td>
						</tr>
						
						</tbody>
						
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


    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="../assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>
 