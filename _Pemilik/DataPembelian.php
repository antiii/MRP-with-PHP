<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<body>
<?php 
include "../menu1.php" ;
include "../Controller/koneksi.php";
include "../Class/ClassPembelian.php";
include "../Class/ClassSupplier.php";

$Pembelian = new Pembelian;
$supplier = new supplier;
 
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
                            <li><a href="#">Master Data</a></li>
                            <li class="active">Data Pembelian</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
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
       <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                               <strong class="card-title"><button type="button" class="btn btn-outline-secondary btn-md btn-block">Data Pembelian Bahan Baku bulan <b><?php print $nama;?> <?php print date('Y');?></b> </button>
							</strong>
                            </div>
                            <div class="card-body">
                 <small><table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                        <tr>                                  
                           <th><center>Faktur</center></th>
                            <th><center>Supplier</center></th>
							<th><center>Tanggal Pesan</center></th>
                            <th><center>Detail</center></th>
                         </tr>
                         </thead>
                         <tbody>
						<?php $bulan_ini = date('m');
							  $i=0;
							  $data=$Pembelian->TampilSemua();
								if($data!=0){
								foreach($data as $m){
									$kode_supplier = $m['kode_supplier'];
							  $data1=$supplier->TampilSemuaData($kode_supplier);	
								if($data1!=0){
								foreach($data1 as $n){
									$i++; 
						?>
                         <tr>
							<td><center><?php print $m['kode_faktur']; ?></center></td> 
							<td><center><?php print $n['nama_supplier']; ?></center></td>
							<td><center><?php print $m['pb_date']; ?></center></td>
							<td><center><a href="DetailPembelian.php?kode_faktur=<?php print $m['kode_faktur'];?>"><button class="btn btn-info btn-sm"><i class="fa fa-search"></i></button></a></td>
                             </tr>
						<?php 
									}
								}
							}
						}
						?>
                        </tbody>
                    </table></small>
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
