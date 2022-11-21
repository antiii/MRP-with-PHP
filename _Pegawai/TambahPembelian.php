<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->


<body>
<?php 
include "../menu.php" ;
include "../Controller/koneksi.php";
include "../Class/ClassBahanbaku.php";
include "../Class/ClassPorel.php";
include "../Class/ClassSupplier.php";
$bahanbaku = new bahanbaku;
$supplier = new supplier;
$porel = new porel;
?>

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
                            <li><a href="#">Supplier</a></li>
                            <li class="active">Pembelian</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		
	<?php 
	$query = mysqli_query($con, "SELECT * from bahanbaku WHERE jumlah_bahan_baku <= rop");
	while($m=mysqli_fetch_array($query)){	
	if($m['jumlah_bahan_baku']<=['rop']){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "
		
		<div class='col-sm-12' class='alert alert-warning'>
		<div class='alert  alert-success alert-dismissible fade show' role='alert'>
		<small><span class='glyphicon glyphicon-info-sign'></span> 
		Stok  <a style='color:red'>". $m['nama_bahan_baku']."</a> yang tersisa kurang dari <a style='color:red'>". $m['rop']."</a> <a style='color:red'>". $m['satuan']." </a></small>
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
		
		</div>
		</div>";	
	}
}
?>
				<?php
				$data1=$porel->TampilSemuaPorel();	
													if($data1!=0){
													foreach($data1 as $m){
					$bulan = $m['bulan'];
					$porel = $m['tanggal'];
					$ambilPorel = substr($porel, 3, 2);
					$status = $m['status'];
											
					if($ambilPorel == $bulan){
						$tanggal = $m['tanggal'];
						$tgl = new DateTime(date("Y-m-d", strtotime($tanggal)));
						$today =  new DateTime(date("Y-m-d"));
						$diff = $today->diff($tgl);
						$diff->d;
												
						if ((($diff->d) <= 1) AND ($status ==0)){
						?>
						<br>

						<div class='col-sm-12' class='alert alert-warning'>
						 <div class='sufee-alert alert with-close alert-danger alert-dismissible fade show' role='alert'>
					
							<span class='badge badge-pill badge-warning'>Pemberitahuan Jadwal pemesanan bahan baku</span>
								<small>&nbsp; <b><?php print $m['nama_bahan_baku'];?></b> harus dilakukan 
								
								<?php
													$skrg = date('d');
													$porel_tgl = substr($porel, 0, 2);
													
													if($porel_tgl < $skrg){
														print 'Hari Pemesanan Sudah Lewat';
													}
													else if($porel_tgl == $skrg){
														print 'Pemesanan hari ini';
													}
													else{
														print $diff->d;  
														print ' Hari lagi';
													}
												?>
								
								
								</small>
								
								
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div> </div>
							<?php
						}
					}
				}
			}
			?>
       <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
						
                            </div>
                            <div class="card-body">
							
                             <small>   <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                              <tr>                                  
                                  <th><center> No 			</center></th>
                                  <th><center> Bahan Baku 	</center></th>
								  <th><center> Opsi	</center></th>   
                              </tr>
                        </thead>
                              <tbody>
							<?php
										include "../Controller/koneksi.php";
										$temp="";
										$i = 0;
										$query = mysqli_query($con, "SELECT * from porel INNER JOIN bahanbaku ON porel.kode_bahan_baku=bahanbaku.kode_bahan_baku");
									
										while($m = mysqli_fetch_array($query))
										{ 
											$bulan = $m['bulan'];
											$porel = $m['tanggal'];
											$ambilPorel = substr($porel, 3, 2);
											
											if($ambilPorel == $bulan){
												$tanggal = $m['tanggal'];
												$tgl = new DateTime($tanggal);
												$today = new DateTime();
												$diff = $today->diff($tgl);
												$diff->d;
												
											$query = mysqli_query($con, "SELECT nama_bahan_baku from bahanbaku");
											while($m = mysqli_fetch_array($query))
											{
												$i++;
                              ?>
                              <tr>
                                  <td><?php print $i; ?> </td>
                                  <td ><?php print $m['nama_bahan_baku'];?></td>
                                  <td >
					<center>  
					<div class="btn-group"> 
					<a href="TambahPembelianForm.php?nama_bahan_baku=<?php print $m['nama_bahan_baku']?>">   
					<small> <button class="btn-sm btn-success btn-xs"  ><i class="fa fa-shopping-cart "></i></button></small></a>  
                    </div>   	
					</center> 
                                  </td>  
                              </tr> 	  
                        </tbody>
						<?php
										}}}
									?> 
                    </table> </small>
	</div>
					</div>
				</div>
		<!--/.row-->
    <!-- Right Panel -->
	 <!-- timeline time label -->
     
   

                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Keranjang Pembelian Bahan Baku <i class="fa fa-shopping-cart"></i></strong>
                            </div>
                            <div class="card-body"> 
							<?php
								$query = mysqli_query($con, "SELECT DISTINCT kode_supplier FROM keranjang");
								while($m = mysqli_fetch_array($query))
								{ 
									$kode_supplier =  $m['kode_supplier'];
									
									
									$i=0; 
									$data=$supplier->TampilSemuaData($kode_supplier);
									if($data!=0){
									foreach($data as $n){
									$i++;  
									
										$nama_supplier = $n['nama_supplier'];
								}}
							?>
								<table id="myTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="30%"><center><?php print $nama_supplier?></center></th>
                                        </tr>
                                    </thead>
									
									<?php
									$query2 = mysqli_query($con, "SELECT * FROM keranjang WHERE kode_supplier = '$kode_supplier'");
									while($o = mysqli_fetch_array($query2))
									{
										$kode_bahan_baku = $o['kode_bahan_baku'];
										$jumlah = $o['jumlah'];
										$kode_keranjang = $o['kode_keranjang'];
										
											$i=0; 
											$data=$bahanbaku->TampilBB($kode_bahan_baku);
											if($data!=0){
											foreach($data as $p){
											$i++;  
												$nama_bahan_baku = $p['nama_bahan_baku'];
												$satuan = $p['satuan'];
												$harga_bahan_baku = $p['harga_bahan_baku'];
									}}
									
									?>
                                    <tbody>
											<td width="30%"><center><small><?php print $nama_bahan_baku;?></small></center></td>
                                            <td width="10%"><center><small><?php print $jumlah;?></small></center></td>
                                            <td width="10%"><center><small><?php print $satuan;?></small></center></td>
											<td width="10%"><center>
											<a href="../Controller/ProsesPembelian.php?aksi=hapus&kode_keranjang=<?php print $kode_keranjang;?>" onClick="return confirm('Apakah Anda benar-benar mau membatalkan pembelian ini?')"><button class="btn btn-warning btn-sm"><i class="fa fa-trash-o "></i></button></a>
											</center></td>
                                        </tr>
									<tr>
									<td width="10%"><center><small>Total</td>
									<td  width="10%" colspan="3"><center><small>Rp. <?php echo number_format ($jumlah*$harga_bahan_baku)?></small></center></td>
									
									</tr>
                                    </tbody>
									
								<?php 
								}
								?>
									
									<thead>
                                        <tr>
                                            <th><center><small><a href="../Controller/ProsesPembelian.php?aksi=tambah&kode_supplier=<?php print $kode_supplier;?>" onClick="return confirm('Apakah Anda benar-benar mau memesan  ini?')"><button class="btn btn-info btn-sm btn-block">Pesan</button></a></center></th>
                                        </tr>
                                    </thead>
                                </table>
								<br><br>
								<?php 
								}
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
		
	

 
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
