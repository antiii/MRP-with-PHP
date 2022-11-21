<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<?php 
include "../menu.php" ;
include "../Controller/koneksi.php";
include "../Class/ClassProduksi.php";
include "../Class/ClassProduk.php"; 

$Produksi = new Produksi;
$Produk = new Produk;

?>
<head>

	
	<script>
function math() {
	var a = parseInt(document.getElementById("produksi_ramal").value);
	var b = parseInt(document.getElementById("produksi_tambahan").value);
	var c = parseInt(document.getElementById("produksi_sr").value);
	if(document.getElementById("p3").checked){
		document.getElementById("produksi_total").value = a+b+c;
	}
	else{
		
		document.getElementById("produksi_total").value = b+c;
	}
}
</script>
<script>  
	$(document).ready(function(){  
		var i=1;  
			$('#add').click(function(){  
				i++;  
				$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="number" name="name[]" placeholder="Tanggal" class="form-control name_list" min="1" max="31"/></td><td><input type="number" name="jmlh[]" placeholder="Jumlah" class="form-control jmlh_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn-sm btn-warning btn_remove">X</button></td></tr>');  
			});  
			$(document).on('click', '.btn_remove', function(){  
				var button_id = $(this).attr("id");   
				$('#row'+button_id+'').remove();  
			});  
	});  
		</script>
	
</head>
<body>
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Plan Produksi</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Perencanaan</a></li>
                            <li class="active">Produksi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		
		<div class="content mt-3">
	<strong class="card-title"></strong>
			<p align="right"><a href="MPS.php"> <button style="margin-bottom:20px" class="btn-sm btn-warning col-md-3"><span class="glyphicon glyphicon-plus"></span>Lihat Rencana Produksi</button> </a></p>
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Rencana Produksi</strong>
                            </div>
							<div class="card-body">  
								<form method="get">
									<table> 
										<tr> 
											<td><select name="kode_produk1" class="form-control">
												<option> Produk </option>
												<?php
												
												$i=0; 
												$data=$Produk->TampilSemua();
												if($data!=0){
												foreach($data as $m){
												$i++;  
        										?>	
												<option value="<?php echo $m['kode_produk']; ?>"> <?php print $m['kode_produk']."  ".$m['nama_produk']; 
												?>
												<?php }} ?></option></select>
											</td>
											<td width="120px" align="center"><button class="btn-sm btn-primary">Pilih Produk</button></center></td> 
										</tr>
									</table>
								</form>
			<form action="../Controller/ProsesProduksi.php?aksi=tambahkeranjang" method="post">
			<?php
			include "../Controller/Koneksi.php";
										
			if (isset($_GET['kode_produk1'])){
				$kode_produk = $_GET['kode_produk1'];
			
					$tgl = date('d-m-Y');
					$bulan = substr($tgl, 3, 2);
					

					$tanggal = date('Y')."-".date('m')."-".date('d')."-".$kode_produk; 
						
					$hari_ini = date ("d-".$bulan."-Y");
					$akhir = substr(date('t-m-Y', strtotime($hari_ini)),0,2);
					
					$tahun_ini = date('Y');
					$tahun_peramalan = $tahun_ini;
					
					$peramalan = 0;
					$result = mysqli_query($con, "select * from peramalan_penjualan where tahun='$tahun_peramalan' AND bulan_angka = '$bulan' and kode_produk='$kode_produk' ");
					while ($m = mysqli_fetch_array($result)){
						
						if ($m['peramalan'] == null){
										$peramalan = 0;
												}
												else{
													$peramalan = ceil($m['peramalan'] / $akhir);
												}
					}
					$schedule = 0;
											$result1 = mysqli_query($con, "SELECT * FROM pre_order WHERE faktur='$tanggal' and kode_produk='$kode_produk'");
											while($n = mysqli_fetch_array($result1)){
												if ($n['jumlah'] == null){
													$schedule = 0;
												}
												else{
													$schedule = $n['jumlah'];
												}
											}
				
			}else{
				$kode_produk = "";
				$tgl = date('d-m-Y');
				 $bulan = substr($tgl, 3, 2);
					
					
					$tanggal = date('Y')."-".date('m')."-".date('d')."-".$kode_produk; 
						
					$hari_ini = date ("d-".$bulan."-Y");
					$akhir = substr(date('t-m-Y', strtotime($hari_ini)),0,2);
					
					$tahun_ini = date('Y');
					$tahun_peramalan = $tahun_ini;
					
					$peramalan = 0;
					$result = mysqli_query($con, "select * from peramalan_penjualan where tahun='$tahun_peramalan' AND bulan_angka = '$bulan' and kode_produk='$kode_produk' ");
					while ($m = mysqli_fetch_array($result)){
						
						if ($m['peramalan'] == null){
										$peramalan = 0;
												}
												else{
													$peramalan = ceil($m['peramalan'] / $akhir);
												}
					}
					$schedule = 0;
											$result1 = mysqli_query($con, "SELECT * FROM pre_order WHERE faktur='$tanggal' and kode_produk='$kode_produk'");
											while($n = mysqli_fetch_array($result1)){
												if ($n['jumlah'] == null){
													$schedule = 0;
												}
												else{
													$schedule = $n['jumlah'];
												}
											}
				
										}
											?>
											<div class="form-group">
												<label>Kode Produk</label>
												<input name="kode_produk" type="text" class="form-control" placeholder="Kode produk" readonly="" type="text" value="<?php echo $kode_produk; ?>">
											</div>
											<div class="form-group">
												<label>Tanggal</label>
												<input name="produksi_tgl" type="text" value="<?php print date('d-m-Y');?>" readonly="" placeholder="Hari" class="form-control">
											</div>
											<div class="form-group">
											<label>Produksi peramalan</label>
											<input name="produksi_ramal" id="produksi_ramal" type="text" onchange="math()" value="<?php if ($peramalan== null){ print 0; }else{ print $peramalan;}?>" readonly="" class="form-control">
												<input type="checkbox" id="p3" name="p3" value="<?php print $peramalan;?>" onchange="math()"/>
												<small>Gunakan hasil peramalan </small>		
											</div>
											<div class="form-group">
												<label>Pre Order</label>
												<input name="produksi_sr" id="produksi_sr" type="text" onchange="math()" value="<?php if ($schedule == null){ print 0; }else{ print $schedule;}?>" readonly="" class="form-control">				
											</div>
											<div class="form-group">
												<label>Tambahan Produksi</label>
												<input name="produksi_tambahan" id="produksi_tambahan" onchange="math()" type="number" min=0 class="form-control">
											</div>
											<div class="form-group">
												<label>Total Produksi</label>											
												<input name="produksi_total" id="produksi_total" type="number" readonly="" class="form-control">
												<br>
													<?php
																$result = mysqli_query($con, "SELECT * FROM produksi WHERE produksi_tgl = '$tgl' and kode_produk='$kode_produk'");
																while($m = mysqli_fetch_array($result)){
																	$produksi_total = $m['produksi_total'];
																}
																	// harusnya ==
																	if ($m['produksi_total '] == null){?>
																			<a href="" onClick="return confirm('Apakah Anda benar-benar mau menambah produk ini untuk produksi?')"><button type="submit"  class="btn btn-info btn-md btn-block">Simpan</button></a>
																		<small><small>catatan: produksi produk yang sama hanya dilakukan sekali dalam sehari</small></small>
																		<?php
																	}
																	else {?>
																			<a href="" onClick="return confirm('Apakah Anda benar-benar mau menambah produk ini untuk produksi?')"><button type="submit" disabled="" class="btn btn-info btn-md btn-block">Simpan</button></a>
																		<small><small>catatan: produksi produk yang sama hanya dilakukan sekali dalam sehari</small></small>
																		<?php
																	}
																?>
																<br>
									</div>
								</form>
							</div>     
						</div>
					</div>
					
					<div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Proses Produksi <i class="fa fa-shopping-cart"></i></strong>
                            </div>
                            <div class="card-body"> 
							<?php
								$query = mysqli_query($con, "SELECT DISTINCT produksi_tgl FROM produksi_temp");
								while($m = mysqli_fetch_array($query))
								{ 
									$produksi_tgl =  $m['produksi_tgl'];
								
									
							?>
								<table id="myTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="30%"><center><?php print $produksi_tgl;?></center></th>
                                        </tr>
                                    </thead>
									
									<?php
									$query2 = mysqli_query($con, "SELECT * FROM produksi_temp WHERE produksi_tgl = '$produksi_tgl'");
									while($o = mysqli_fetch_array($query2))
									{
										$kode_produk = $o['kode_produk'];
										$produksi_total = $o['produksi_total'];
									
									$query3 = mysqli_query($con, "SELECT * FROM produk where kode_produk='$kode_produk'");
									while($z = mysqli_fetch_array($query3))
									{
										$nama_produk = $z['nama_produk'];
									
									?>
                                    <tbody>
											<td width="30%"><center><small><?php print $nama_produk;?></small></center></td>
                                            <td width="10%"><center><small><?php print $produksi_total;?></small></center></td>
											<td width="10%"><center>
											<a href="../Controller/ProsesProduksi.php?aksi=hapus&produksi_tgl=<?php print $produksi_tgl;?>"   onClick="return confirm('Apakah Anda benar-benar mau batalkan produksi produk ini?')"><button class="btn btn-warning btn-sm"><i class="fa fa-trash-o "></i></button></a>
											</center></td>
                                        </tr>
                                    </tbody>
								<?php 
									}}
								?>
									
									<thead>
                                        <tr>
                                           <th><center><small>
										   <a href="../Controller/ProsesProduksi.php?aksi=tambah&produksi_tgl=<?php print $produksi_tgl;?>"  onClick="return confirm('Apakah Anda benar-benar mau Produksi?')"><button class="btn btn-info btn-sm btn-block">Produksi</button></a></center></th>
                                        </tr>
                                    </thead>
                                </table>
								<?php 
								}
								?>
                            </div>
                        </div>
                    </div>
					 <!-- /.Tabel Yang akan diproduksi -->
					<div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Catatan Produksi</strong>
                            </div>
                           
							<div class="row">
								<div class="col-md-12">
									<div class="panel-body">
										<div class="modal-body">  
										<?php
										$total_produk = 0;
										$result = mysqli_query($con, "SELECT * FROM produksi inner join produk on
										produksi.kode_produk = produk.kode_produk WHERE produksi_tgl = '$tgl'");
										while($m = mysqli_fetch_array($result)){
											$produksi_tgl = $m['produksi_tgl'];
											$kode_produksi = $m['kode_produksi'];
											$total_produk = $m['produksi_total'];
											$nama_produk = $m['nama_produk'];
											
											if($total_produk == null){
											$total_produk  = "-";
											}
											else{
												$total_produk = $m['produksi_total'];
											}
										
										?>
										
										<small>Jumlah produksi <?php print $nama_produk;?> <?php print $tgl;?>
										</small>
										<input name="produksi_tgl" type="text" value="<?php print $total_produk;?>" readonly="" placeholder="Hari" class="form-control">
										<br>
											   <?php
										if ($total_produk != null){?>
												<a href="../_Pegawai/ProduksiDetail.php?kode_produk=<?php print $m['kode_produk']?>" class="btn btn-info btn-sm btn-block">Detail Kebutuhan <?php print $m['nama_produk']?>&nbsp; <i class="fa fa-search"></i></a>
												<?php
											}
											else {?>
												<button type="button" disabled="disabled" class="btn btn-info btn-sm btn-block">-</button>
												<small><small>Produksi belum dilakukan</small></small>
												<?php
											}
										?>
											     <?php } ?>
												 <?php
										if ($total_produk != null){?>
												<a href="../_Pegawai/ProduksiTotal.php" class="btn btn-danger btn-sm btn-block">Total Kebutuhan Produksi&nbsp; <i class="fa fa-search"></i></a>
												<?php
											}
											else {?>
												<button type="button" disabled="disabled" class="btn btn-info btn-sm btn-block">-</button>
												<small><small>Produksi belum dilakukan</small></small>
												<?php
											}
										?>
								</div>             
							</div>
						</div>
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
 