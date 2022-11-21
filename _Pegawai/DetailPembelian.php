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
include "../Class/ClassPembelian.php";
include "../Class/ClassBahanBaku.php";

$Pembelian = new Pembelian;
$bahanbaku = new bahanbaku;
 
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
                            <li class="active">Detail Pembelian</li>
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
                                <strong class="card-title">Aktivitas Pembelian Bahan Baku</strong>
					
                            </div>
                            <div class="card-body">
							
                           <small>     <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                              <tr>                                  
                                  <th><center>No.</center></th>
													<th><center>Bahan Baku</center></th>
													<th><center>Jumlah Pesan</center></th>
													<th><center>Harga per unit</center></th>
													<th><center>Harga Total</center></th>
													<th><center>Status</center></th>
                                 
                              </tr>
                              </thead>
                              <tbody>
							  
							  
												<?php
													$i = 0;
													
													$kode_faktur = $_GET['kode_faktur'];
													$data=$Pembelian->TampilDataPembelian($kode_faktur);
													if($data!=0){
													foreach($data as $m){
														$kode_bahan_baku = $m['kode_bahan_baku'];
														
													 $data1=$bahanbaku->TampilBB($kode_bahan_baku);	
													if($data1!=0){
													foreach($data1 as $n){
													$i++; 
													
							
												?>
												<tr>
													<td width="20%"><?php print $i; ?></td>
													<td width="20%"><?php print $n['nama_bahan_baku'];?></td>
													<td width="20%"><?php print $m['pb_jumlah'];?></td>
													<td width="20%">Rp. <?php print number_format($n['harga_bahan_baku']);?></td>
													<td width="20%">Rp. <?php print number_format($n['harga_bahan_baku']*$m['pb_jumlah']);?></td>
													<td width="20%">
									<?php   $pb_status= $m['pb_status'];

                                  	if($pb_status=="Ditolak"){
                                  		?>
                                  			<button type="button" class="btn-sm btn-danger"><?php print $pb_status;  ?>
        									</button> 
                                  	<?php } 
                                  	elseif($pb_status=="Menunggu"){
                                  		?>
                                  			<button type="button" class="btn-sm btn-warning"><?php print $pb_status;  ?>
        									</button> 
                                  	<?php } 
                                  	else{
                                  		?>  <button type="berhasil" class="btn-sm btn-primary"><?php print $pb_status;  ?>
        									</button> 
                                 <?php 	} ?>
													
											</td>		
													
												</tr>
												<?php
													}}}}
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
