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
include "../Class/ClassProduk.php";

$Produk = new Produk;
 
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
                            <li><a href="#">Peramalan</a></li>
                            <li class="active">Pilih Peramalan</li>
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
                                <strong class="card-title">Peramalan Produk</strong>
                            </div>
                            <div class="card-body">
                        <small>   <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                              <tr>                                  
                                  <th><center> No 			</center></th>
                                  <th><center> Kode</center></th>
								  <th><center>Produk	</center></th>
                                  <th><center> Aksi	 	</center></th>
                              </tr>
                              </thead>
                              <tbody>
						<?php
        				$i=0; 
                        $data=$Produk->TampilSemua();
                        if($data!=0){
                          foreach($data as $m){
                            $i++;  
        				?>	
                              <tr>
                                  <td><?php print $i; ?> </td>
                                  <td><?php print $m['kode_produk']; ?></td>
								  <td><?php echo $m['nama_produk']?></td>
								  <td> <button onclick="location.href='InputPeramalan.php?kode_produk=<?php print $m['kode_produk']; ?>'" class="btn-sm btn-info"><i class="fa fa-search-plus">Ramal</i></button>
                                  </td>
                              </tr> 
						<?php }} ?>
						 </tbody>
                    </table> </small>

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
