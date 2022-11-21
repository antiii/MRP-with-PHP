<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
 <?php 
include "../menu2.php" ;
include "../Controller/koneksi.php";
include "../Class/ClassProduk.php";
include "../Class/ClassPeramalan.php";

$Produk = new Produk;
$peramalan = new Peramalan;
?>
<body>
  </header><!-- /header -->
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
                            <li><a href="#">Peramalan</a></li>
                            <li class="active">Hasil Peramalan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    	<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
							 <strong class="card-title">Tampilkan Peramalan Berdasarkan</strong>
							 </div>
                            <div class="card-body">	
           <form method="POST" action="DetailPeramalann.php">
					<table> 
							<tr> 
								<td><select name="kode_produk" class="form-control">
									<option> Pilih Produk </option>
									<?php
									$i=0; 
									$data=$Produk->TampilSemua();
									if($data!=0){
									foreach($data as $m){
									$i++;  
									?>	
									<option value="<?php echo $m['kode_produk']; ?>"> <?php print $m['kode_produk']."  ".$m['nama_produk']; ?>
									<?php }} ?>
									</option>
									</select>
								</td>
							</tr>
								<td></td>
							<tr>
								<td><select name="tahun" class="form-control">
									<option> Pilih Tahun </option>
									<?php
									$i=0; 
									$data=$peramalan->TampilTahun();
									if($data!=0){
									foreach($data as $m){
									$i++;  
									?>	
  									<option value="<?php echo $m['tahun']; ?>"> <?php print $m['tahun']; ?>
  									<?php }} ?>
									</option>
									</select>
								</td>	
							</tr>
							<tr>
							<td><select name="bulan" class="form-control">
								<option> Pilih Bulan </option>
								<?php
									$i=0; 
									$data=$peramalan->TampilBulan();
									if($data!=0){
									foreach($data as $m){
									$i++;  
									?>		
  								<option value="<?php echo $m['bulan']; ?>"> <?php print $m['bulan'];?>
									<?php }} ?>
								</option>
								</select>
							</td>
							</tr>
								<td width="70px" align="center"><button class="btn-sm btn-warning">Tampilkan</button></center></td> 
							</tr>
						</table>
					</form>
					</div>
				</div>
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
								$tahun_ini = date ('Y');
								$peramalan = $tahun_ini ?>
							<strong class="card-title">Peramalan <?php echo $peramalan;?></strong>
                            </div>
							<div class="card-body">
								<?php		
								$tahun_ini = date ('Y');
								$peramalan = $tahun_ini;
								
								
								$sql2 = mysqli_query($con, "SELECT DISTINCT kode_produk from peramalan_penjualan where tahun='$peramalan'");
									while($b = mysqli_fetch_array($sql2))
									{ 
										$kode_produk = $b['kode_produk'];
													
										
									?>
										<div class="col-md-4">
										
												<table>
													<thead>
														<tr>
															<th ><strong>Produk</th>
															<th>:</th>
															<?php
													
															$i=0; 
															$data=$Produk->TampilSemuaData($kode_produk);
															if($data!=0){
															foreach($data as $l){
															$i++;  
								
																$nama_produk = $l['nama_produk'];
															?>
															<th><?php echo $nama_produk;?></th>
															<?php }} ?>
														</tr>
														
													</thead>
												</table>
											<br>
										</div>
										<div class="col-md-12">
											
												<table border="1">
													<thead>
														<tr>
															<th width="20px"><center>#</center></th>
														
															<?php
															$sql3 = mysqli_query($con, "SELECT bulan from peramalan_penjualan WHERE kode_produk = '$kode_produk' and tahun='$tahun_ini'");
															while($c = mysqli_fetch_array($sql3))
															{ 
																$bulan = $c['bulan'];
															?>
															<th width="100px"><center><?php echo $bulan;?></center></th>
															<?php } ?>
														</tr>
													</thead>
													<tbody>
														<tr>
														<tr>
															<td><center>History</center></td>
															
															<?php
															$sql7 = mysqli_query($con, "SELECT jumlah from peramalan_penjualan WHERE kode_produk = '$kode_produk' and tahun='$tahun_ini'");
															while($k = mysqli_fetch_array($sql7))
															{ 
																$jumlah = $k['jumlah'];
															?>
															<td><center><?php echo round (ceil($jumlah));?></center></td>
															<?php } ?>
														</tr>
															<td><center>Peramalan</center></td>
															
															<?php
															$sql5 = mysqli_query($con, "SELECT peramalan from peramalan_penjualan WHERE kode_produk = '$kode_produk' and tahun='$tahun_ini'");
															while($e = mysqli_fetch_array($sql5))
															{ 
																$peramalan = $e['peramalan'];
															?>
															<td><center><?php echo round (ceil($peramalan));?></center></td>
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
 