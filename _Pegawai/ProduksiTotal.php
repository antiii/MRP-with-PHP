<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->



<body>

   <?php include "../menu.php" ?>
<?php include "../Controller/koneksi.php"?>


 
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
                            <li><a href="#">Master Data</a></li>
                            <li class="active">Detail Produksi</li>
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
						<?php
						
							include '../Controller/koneksi.php';
							
						?>
                            <div class="card-header">
                                	<strong class="card-title">Detail Kebutuhan Produksi Tanggal <?php print date('d-m-Y');?></strong>
                            </div>
                            <div class="card-body">
							
								<?php
								
										$tgl = date('d-m-Y');
										$result = mysqli_query($con, "SELECT * FROM produksi inner join produk on
										produksi.kode_produk = produk.kode_produk WHERE produksi_tgl = '$tgl'");
										while($m = mysqli_fetch_array($result)){
											$produksi_tgl = $m['produksi_tgl'];
											$kode_produksi = $m['kode_produksi'];
											$produksi_total = $m['produksi_total'];
											$nama_produk = $m['nama_produk'];
										
										?>
										
									 </small>
										<button type="button" class="btn btn-outline-secondary btn-md" width="100px"> <?php print $nama_produk;?> : <?php echo $produksi_total;?> Pcs</button>
										
										
											     <?php } ?>
						
							
							<?php
							$tanggal = date('d-m-Y'); 
							$result = mysqli_query($con, "SELECT SUM(produksi_total) as Total FROM produksi WHERE produksi_tgl='$tanggal'");
									$ambilKode1 = mysqli_fetch_array($result);
									$total = $ambilKode1['Total'];
									$produksi_total = $m['produksi_total'];
										$produksi_tgl = $m['produksi_tgl'];
							
							?>
							
							<div class="col-md-6">
									<button type="button" class="btn btn-outline-secondary btn-md" width="200px">Jumlah Total produksi hari ini: <?php echo $total;?> Pcs</button>
							
									
								
									
								</div><br><br><br>
								
                          <small>      <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
												<tr>
												
													<th><center>#</center></th>
													
													<?php
													
													$hari_ini = date('d-m-Y');
													$result9 = mysqli_query($con, "SELECT DISTINCT kode_bahan_baku FROM bom");	
													while($z = mysqli_fetch_array($result9))
													{
														$kode_bahan_baku = $z['kode_bahan_baku'];
														
														
														$result8 = mysqli_query($con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");	
														while($v = mysqli_fetch_array($result8))
														{
															$nama_bahan_baku = $v['nama_bahan_baku'];
														}
																
												?>
													<th><center><small><?php print $nama_bahan_baku; }?>	

											</tr>
										
														
												<tr>
												
												<td> Penggunaan </td>
												
												<?php
											
													$tgl = date('d-m-Y');
	
														$result8 = mysqli_query($con, "SELECT * FROM produksi");	
														while($v = mysqli_fetch_array($result8))
														{
															$produksi_tgl= $v['produksi_tgl'];
														}
												
		$query = mysqli_query($con, "SELECT DISTINCT kode_bahan_baku from bom");
		while($m = mysqli_fetch_array($query))
		{ 
		$kode_bahan_baku = $m['kode_bahan_baku'];
			
			$gr = 0;
			$query1 = mysqli_query($con, "SELECT * from produk");
			while($n = mysqli_fetch_array($query1))
			{ 
				$kode_produk = $n['kode_produk'];
				$banyak_produksi = $n['banyak_produksi'];
				
				$ambil =0;
				
				$query3 = mysqli_query($con, "SELECT * from produksi WHERE kode_produk='$kode_produk' and produksi_tgl='$tgl'") ;
				while($p = mysqli_fetch_array($query3))
				{ 
					if ($p['produksi_total'] == null){
												$ambil = 0;
												}
												else{
													$ambil = $p['produksi_total'];
												}
				
													$ambil = $p['produksi_total'];
												}
					
				
				$temp = 0;
				$jumlah_penggunaan = 0;
				$query2 = mysqli_query($con, "SELECT * from bom INNER JOIN bahanbaku ON bom.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE bom.kode_bahan_baku = '$kode_bahan_baku' AND bom.kode_produk = '$kode_produk'");
				while($o = mysqli_fetch_array($query2))
				{
					$jumlah_penggunaan = $o['jumlah_penggunaan'];
					$ph = $o['jumlah_bahan_baku'];
					$lotsize = $o['lotsize'];
					$satuan = $o['satuan'];
					
				}
			 $jumlah_penggunaan; "<br>";
			
					$coba = round(((ceil($ambil))*$jumlah_penggunaan/$banyak_produksi), 1);
					$temp = $coba;
					$gr += $temp;
			}		
												
												?>
													
													<td width="20%"><?php print $gr; ?> <?php print $satuan; }?>  </td>
											
											
											</tr>
											<tbody>
											<tr>
												</tr>
										
												
                        </tbody>
							</thead>
                   
					</div>
				</div>
				
				
				
		<!--/.row-->
    <!-- Right Panel -->


   
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