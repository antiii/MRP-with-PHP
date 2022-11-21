<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<?php 
include "../menu1.php";
include "../Controller/koneksi.php";
include "../Class/ClassToko.php";

$Toko= new Toko;
	$bd_daerah= "";
	$bd_tgl = ""; 
	
	$tgl_awal = "";
	$tgl_akhir = "";
	$daerah= "";
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
                            <li class="active">Laporan Penjualan</li>
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
                                <strong class="card-title">Laporan Penjualan</strong>

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
									<small>Pilih berdasarkan daerah</small>
											<select name="daerah" class="form-control">
											<option value=""> --Pilih Daerah-- </option>
											<?php
											$i=0; 
											$data=$Toko->TampilSemua();
										if($data!=0){
											foreach($data as $m){
												$i++;  
        										?>	
													<option value="<?php print $m['nama_toko']; ?>"> <?php print $m['nama_toko']; }} ?></option>
													</select><br>
								</div>
								</div>					
								</div>
								</div>
						</form>
                            <div class="card-body">
                        <small>        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                              <tr>                                  
                                  <th><center> No 		</center></th>
								  <th><center> Kode 	</center></th>
								  <th><center> Produk 	</center></th>
								  <th><center> Pegawai 	</center></th>
								  <th><center> Toko 	</center></th>
								  <th><center> Tanggal	</center></th>
                                  <th><center> Terjual	</center></th>
								  <th><center> Total	</center></th>
                         
                              </tr>
							   
                      </thead>
                              <tbody>
								<?php
								include "../Controller/koneksi.php";		
								$i=0;
										
			if (isset($_GET['awal']) and isset($_GET['akhir']) and isset($_GET['daerah'])){
				$tgl_awal = $_GET['awal'];
				$tgl_akhir = $_GET['akhir'];
				$daerah = $_GET['daerah'];
				
				
				$bd_daerah='';
					if($daerah!=''){
						$bd_daerah = "AND penjualan.nama_toko='".$daerah."'";
					}
					
				$bd_tgl = '';
				if($tgl_akhir!=null && $tgl_akhir!=null){
						$bd_tgl = "AND penjualan.date BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."'";
				}
				
				$query = mysqli_query($con, "SELECT penjualan.kode_penjualan, penjualan.nama_produk, penjualan.nama_user, penjualan.nama_toko, penjualan.jumlah_penjualan, penjualan.date, penjualan.total_penjualan, produk.harga_produk FROM  penjualan, produk 
				where penjualan.nama_produk=produk.nama_produk ".$bd_daerah." ".$bd_tgl."");
				
				
			}else{
				
				$query = mysqli_query($con,"SELECT * from penjualan ORDER BY `date` DESC ");
							
			}
			while($fetch = mysqli_fetch_array($query)){
			$i++ 
		?>							
		<tr>
		    <td ><?php print $i; ?> </td>
			<td><?php echo $fetch['kode_penjualan']?></td>
			<td><?php echo $fetch['nama_produk']?></td>
			<td><?php echo $fetch['nama_user']?></td>
			<td><?php echo $fetch['nama_toko']?></td>
			<td><?php echo $fetch['date']?></td>
			<td><?php echo $fetch['jumlah_penjualan']?></td>
			<td>Rp. <?php echo number_format ($fetch['total_penjualan'])?></td>			
		</tr>
		
		<?php }?>
	
	             </tbody>
						<p align="right">
		<?php				
		if (isset($_GET['awal']) and isset($_GET['akhir']) and isset($_GET['daerah'])){?>
				<button type="button" class="btn-sm btn-md btn-danger"><a href="LapPenjualan.php?tanggal=<?php print $tgl_awal.$tgl_akhir.$bd_daerah;?>" style="color:white">Cetak Penjualan</a> <i class="fa fa-print"></i></button>
				<?php
			}else{?>
				<button type="button" class="btn-sm btn-md btn-danger"><a href="LapPenjualan.php" style="color:white">Cetak Penjualan </a> <i class="fa fa-print"></i></button>
				<?php
			}		

?>

</p>			
                    </table></small>
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