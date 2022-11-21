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
include "../Class/ClassPembelian.php";
include "../Class/ClassSupplier.php";
include "../Class/ClassBahanBaku.php";

$bahanBaku = new bahanBaku;
$Pembelian = new Pembelian;
$Supplier = new Supplier;
 
 	$bd_sup = "";
	$bd_tgl = ""; 
	$bd_bb  = "";
	
	$tgl_awal = "";
	$tgl_akhir = "";
	$bahanbaku = "";
	$supplier = "";
 ?>
<body>

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
                            <li><a href="#">Laporan</a></li>
                            <li class="active">Laporan Pembelian</li>
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
                                <strong class="card-title">Laporan Pembelian Bahan Baku</strong>

								
							
								
                            </div>
							 <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-5">
								<form method="get">
								<div class="card-body">
									<small> Tanggal Awal: </small>
									<input type="date" name="awal" class="form-control"><br>
									<small> Tanggal Akhir: </small>
									<input type="date" name="akhir" class="form-control">
									<br>
									<button class="btn-sm btn-md btn-warning">Tampilkan Data Penjualan</button>
								</div>
								</div>
								
					     <div class="col-md-5">
								<form method="get">
								<div class="card-body">
									<small>Pilih berdasarkan supplier:</small>
													<select name="supplier" class="form-control">
													<option value=""> --Pilih Supplier-- </option>
														<?php
													$i=0; 
													$data=$Supplier->TampilSemua();
													if($data!=0){
													foreach($data as $m){
													$i++;  
        										?>	
													<option value="<?php print $m['kode_supplier']; ?>"> <?php print $m['nama_supplier']; }} ?></option>
													</select><br>
													
									<small>Pilih berdasarkan bahanbaku:</small>
													<select name="bahanbaku" class="form-control">
													<option value=""> --Pilih Bahan Baku-- </option>
														<?php
                          
													$i=0; 
													$data=$bahanBaku->TampilSemua();
													if($data!=0){
													foreach($data as $m){
													$i++; 
						?>
						<option value="<?php print $m['kode_bahan_baku']; ?>"> <?php print $m['nama_bahan_baku']; } }?></option>
													</select>
									<br>
								</div>
								</div>					
								</div>
						</form>
						
									
					
									
                            <div class="card-body">
                        <small>        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                              <tr>   
<th><center><small><b>No</small></center></th>							  
								    <th><center><small><b>Faktur</small></center></th>
                                            <th><center><small><b>Supplier</small></center></th>
                                            <th><center><small><b>Bahan Baku</small></center></th>
                                            <th><center><small><b>Tanggal</small></center></th>
                                            <th><center><small><b>Jumlah Dibeli</small></center></th>
											<th><center><small><b>Total</small></center></th>
                                            <th><center><small><b>Status</small></center></th>
                        
                              </tr>
                      </thead>
                              <tbody>
		  
               <?php
				if (isset($_GET['awal']) and isset($_GET['akhir'])and isset($_GET['supplier'])and isset($_GET['bahanbaku'])){
				$tgl_awal = $_GET['awal'];
				$tgl_akhir = $_GET['akhir'];
				
				$supplier = $_GET['supplier'];
				$bahanbaku = $_GET['bahanbaku'];
				
				$bd_sup='';
				if($supplier!=''){
						$bd_sup= "AND pembelian.kode_supplier='".$supplier."'";
					}
					
				$bd_bb='';
					if($bahanbaku!=''){
						$bd_bb = "AND pembelian.kode_bahan_baku='".$bahanbaku."'";
					}
					
				$bd_tgl = '';
				if($tgl_akhir!=null && $tgl_akhir!=null){
						$bd_tgl = "AND pembelian.pb_laporan BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'";
				}
				
			
				
			$query = mysqli_query($con, "SELECT * FROM pembelian INNER JOIN supplier ON pembelian.kode_supplier = supplier.kode_supplier INNER JOIN bahanbaku ON pembelian.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE pembelian.kode_faktur = pembelian.kode_faktur ".$bd_sup." ".$bd_bb." ".$bd_tgl."");
				
			}
			else{
				$query= mysqli_query($con,"SELECT * FROM pembelian INNER JOIN supplier ON pembelian.kode_supplier = supplier.kode_supplier INNER JOIN bahanbaku ON pembelian.kode_bahan_baku = bahanbaku.kode_bahan_baku");
			}
								
											$i=0;
											$temp="";
											while($m = mysqli_fetch_array($query))
											{
												$kode_faktur = $m['kode_faktur'];
												$kode_bahan_baku = $m['kode_bahan_baku'];
												$result1 = mysqli_query($con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");	
														while($n = mysqli_fetch_array($result1))
														{
															$nama_bahan_baku = $n['nama_bahan_baku'];
															$harga_bahan_baku = $n['harga_bahan_baku'];
														}
													$i++;	
										  ?>
                                        <tr>
												<td ><?php print $i; ?> </td>
											<td><center><?php if($kode_faktur != $temp){ print $kode_faktur; $temp = $kode_faktur;}else{ ?><font color="#f2f2f2"><?php print $kode_faktur;}?></font></center></td>
												
											<td><center><?php print $m['nama_supplier']; ?></center></td> 
											<td><center><?php print $m['nama_bahan_baku']; ?></center></td> 
											<td><center><?php print $m['pb_date']; ?></center></td>
											<td><center><?php print $m['pb_jumlah']." ".$m['satuan'];?></center></td>
											<td width="20%">Rp. <?php print number_format($harga_bahan_baku*$m['pb_jumlah']);?></td>
											<td><center><?php print $m['pb_status']; ?></center></td>
                                        </tr>
									 <?php } ?>
                        </tbody>
						<p align="right">
		<?php				
	if (isset($_GET['awal']) and isset($_GET['akhir'])and isset($_GET['supplier'])and isset($_GET['bahanbaku'])){?>
				<button type="button" class="btn-sm btn-md btn-danger"><a href="LapPembelian.php?kode=<?php print $tgl_awal.$tgl_akhir.$bd_sup.$bd_bb;?>" style="color:white">Cetak Pembelian</a> <i class="fa fa-print"></i></button>
				<?php
			}else{?>
				<button type="button" class="btn-sm btn-md btn-danger"><a href="LapPembelian.php" style="color:white">Cetak Pembelian</a> <i class="fa fa-print"></i></button>
				<?php
			}				
				
?>				
                    </table></small>
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