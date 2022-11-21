
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
include "../Class/ClassToko.php";

$Toko= new Toko;
$kode_toko= $_GET['kode_toko'];
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
                            <li><a href="#">Master Data</a></li>
                            <li class="active">Data Toko</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		
        <div class="content mt-3">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
					<center>	<h6><b>Form UpdateToko</b></h6> </center>
						</div>
					<div class="panel-body">
						<form action="../Controller/ProsesToko.php?aksi=update" method="POST">
						<fieldset>
							<div class="form-group"> 
								<?php 
						 $Toko->TampilSatuData($kode_toko);
						?>
								Kode Toko
									<input class="form-control" name="kode_toko" readonly="" type="text" value="<?php echo $Toko->kode_toko; ?>">
								Nama Toko
									<input class="form-control" name="nama_toko" type="text" value="<?php echo $Toko->nama_toko; ?>" required oninvalid="this.setCustomValidity('nama toko tidak boleh kosong')" oninput="setCustomValidity('')">
								Alamat Toko
									<input class="form-control" name="alamat_toko" type="text" value="<?php echo $Toko->alamat_toko; ?>" required oninvalid="this.setCustomValidity('alamat toko tidak boleh kosong')" oninput="setCustomValidity('')">
								Telp Toko
									<input class="form-control" name="telp_toko" type="text" value="<?php echo $Toko->telp_toko; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 081243211234" maxlength="12" required oninvalid="this.setCustomValidity('telp toko tidak boleh kosong')" oninput="setCustomValidity('')">
									</div>
                     				<br>
                              		<center><button class="btn btn-primary btn-s">Update</i></button></center>
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



















