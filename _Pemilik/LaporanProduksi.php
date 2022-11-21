<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<?php include "../menu1.php" ?>
<?php include "../Controller/koneksi.php"?>

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
                            <li class="active">Laporan Produksi</li>
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
                                <strong class="card-title">Laporan Produksi</strong>	
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
									<button class="btn-sm btn-md btn-warning" value="filter">Tampilkan Data Penjualan</button>
								</div>
							</form>
							</div>
                            <div class="card-body">
                        <small>        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
										<tr>                                  
											<th><center><small><b>Kode Produksi</small></center></th>
											<th><center><small><b>Produk</small></center></th>
                                            <th><center><small><b>Tanggal</small></center></th>
											<th><center><small><b>Jumlah Produksi</small></center></th>
											<th><center><small><b>Terjual</small></center></th>
											<th><center><small><b>Tidak Terjual</small></center></th>
										</tr>
                      </thead>
                       <tbody>
			<?php
			include "../Controller/koneksi.php";
			$i=0;
										
			if (isset($_GET['awal']) and isset($_GET['akhir'])){
				$awal1 = $_GET['awal'];
				$akhir2 = $_GET['akhir'];
			
				$sql = mysqli_query($con,"SELECT * FROM produksi where produksi_laporan BETWEEN '".$awal1."' AND '".$akhir2."' ORDER BY `produksi_tgl` DESC");
				
			}else{
				$sql = mysqli_query($con,"select * from produksi");
			}
				while ($m=mysqli_fetch_array($sql))
				{
					$kode_produk= $m['kode_produk'];
					$query1 = mysqli_query($con,"SELECT * FROM produk where kode_produk='$kode_produk'");
						while ($z=mysqli_fetch_array($query1))
										  {
											$nama_produk = $z['nama_produk'];
											$i++;
		?>
                                        <tr>
											<td><center><?php print $m['kode_faktur_produksi']; ?></center></td> 
											<td><center><?php print $z['nama_produk']; ?></center></td> 
											<td><center><?php print $m['produksi_tgl']; ?></center></td> 
                                            <td><center><?php print $m['produksi_total']; ?></center></td> 
											<td><center><?php print abs($m['produksi_jual']); ?>
											<td><center><font color="red"><?php print $sisa = $m['produksi_total'] + $m['produksi_jual']; ?></center></td>
                                </font></center></td>
                                        </tr>
										  <?php }} ?>
                        </tbody>
						<p align="right">
		<?php				
		if (isset($_GET['awal']) AND isset($_GET['akhir'])){?>
				<button type="button" class="btn-sm btn-md btn-danger"><a href="LapProduksi.php?tanggal=<?php print $awal1.$akhir2;?>" style="color:white">Cetak Produksi</a> <i class="fa fa-print"></i></button>
				<?php
			}else{?>
				<button type="button" class="btn-sm btn-md btn-danger"><a href="LapProduksi.php" style="color:white">Cetak Produksi </a> <i class="fa fa-print"></i></button>
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