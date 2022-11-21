<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->

<html class="no-js" lang="en">
<!--<![endif]-->

<?php 
include "../menu1.php" ;
include "../Controller/koneksi.php";
include "../Class/ClassPorel.php";

$Porel = new Porel;
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
                            <li><a href="#">Perencanaan</a></li>
                            <li class="active">MRP</li>
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
                                <strong class="card-title"></strong>
									
								
                   <strong class="card-title">Jadwal Pemesanan Bahan Baku</strong>
                            </div>
							
                            <div class="card-body">
                               <small>        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="serial"><center>Bahan Baku</center></th>
                                            <th><center>Jadwal pemesanan</center></th>
											<th><center>hari lagi</center></th>
                                            <th><center>Jumlah Pemesanan</center></th>
											
											   <th><center>Satuan</center></th>
											     <th><center>Status</center></th>
                                        </tr>
                                    </thead>
                                   <?php
        				$i=0; 
						$temp="";
                        $data=$Porel->TampilSemuaPorel();
                        if($data!=0){
                          foreach($data as $m){
                            $i++;  
											$satuan = $m['satuan'];
											$bahanbaku = $m['nama_bahan_baku'];
											$bulan = $m['bulan'];
											$lotsize = $m['lotsize'];
											$status = $m['status'];
											
											$porel = $m['tanggal'];
											$ambilPorel = substr($porel, 3, 2);
											
											if($ambilPorel == $bulan){
												$tanggal = $m['tanggal'];
												$tgl = new DateTime(date("Y-m-d", strtotime($tanggal)));
												$today =  new DateTime(date("Y-m-d"));
												$diff = $today->diff($tgl);
												$diff->d;
										
									
												
									?>
									
                                    <tbody>
                                        <tr>
											<td><center><?php if($bahanbaku != $temp){ print $bahanbaku; ; $temp = $bahanbaku;}else{ ?><font color="#f2f2f2"><?php print $bahanbaku;}?></font></center></td>
											<td><center><span class="badge badge-danger"><?php print $porel;?> </span></center></td>
											<td><center>
												<?php
													$skrg = date('d');
													$porel_tgl = substr($porel, 0, 2);
													
													if($porel_tgl < $skrg){
														print 'Hari Pemesanan Sudah Lewat';
													}
													else if($porel_tgl == $skrg){
														print 'Pesan hari ini';
													}
													else{
														print $diff->d;
													}
												?>
											</center></td>
											
											
											<td><center><?php print $lotsize; ?></center></td>
											<td><center><?php print $satuan; ?></center></td>
											<td><center><span class="badge badge-danger">
												<?php 
													if($status == 0){
														print  'Pemesanan Belum Dilakukan';
													}
													else{
														print  'Pemesanan Sudah dilakukan';
													}
												?>
											</center></td> </span>
                                        </tr>
									<?php 	
											} 
						}}
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