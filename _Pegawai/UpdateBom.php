
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->
<?php include "../menu.php" ?>
<?php include "../Controller/koneksi.php"?>

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
                            <li><a href="#">Bahan Baku</a></li>
                            <li class="active">Data Bahan Baku</li>
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
					<center>	<font size="6pt" color="black">Form UpdateBom</font> </center>
						</div>
					<div class="panel-body">
						<form action="../Controller/ProsesBom.php?aksi=update" method="POST">
						<fieldset>
							<div class="form-group"> 
								<?php 
							include "../Controller/koneksi.php";
								$no= $_GET['no'];
								$query = mysqli_query($con, "SELECT * FROM bom WHERE no = '$no'");
								$m = mysqli_fetch_object($query);
								?>
								Kode Produk
									<input class="form-control" name="kode_produk" readonly="" type="text" value="<?php echo $m->kode_produk; ?>">
								Kode Bahan Baku
									<input class="form-control" name="kode_bahan_baku" readonly="" type="text" value="<?php echo $m->kode_bahan_baku; ?>">
								Jumlah Penggunaan
									<input class="form-control" name="jumlah_penggunaan"  type="text" value="<?php echo $m->jumlah_penggunaan; ?>" required oninvalid="this.setCustomValidity('jumlah penggunaan tidak boleh kosong')" oninput="setCustomValidity('')"> </td>
									</div>
                     				<br>
                              		<center><button class="btn btn-primary btn-s">UpdateBom</i></button></center>
								</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->


	
	
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



















