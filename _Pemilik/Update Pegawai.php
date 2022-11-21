
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
                            <li><a href="#">Master Data</a></li>
                            <li class="active">Edit Pegawai</li>
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
					<center>	<font size="6pt" color="black">Form Update Pegawai</font> </center>
						</div>
					<div class="panel-body">
						<form action="../Controller/ProsesPegawai.php?aksi=update" method="POST">
						<fieldset>
							<div class="form-group"> 
								<?php 
								include "../Controller/koneksi.php";
								$kode_user = $_GET['kode_user'];
								$query = mysqli_query($con, "SELECT * FROM user WHERE kode_user= '$kode_user'");
								$m = mysqli_fetch_object($query);
								?>
								Kode user
									<input class="form-control" name="kode_user" readonly="" type="text" value="<?php echo $m->kode_user; ?>">
								Nama 
									<input class="form-control" name="nama_user" type="text" value="<?php echo $m->nama_user; ?>" required oninvalid="this.setCustomValidity('nama supplier tidak boleh kosong')" oninput="setCustomValidity('')">
								Username 
									<input class="form-control" name="username" type="text" value="<?php echo $m->username; ?>" required oninvalid="this.setCustomValidity('nama supplier tidak boleh kosong')" oninput="setCustomValidity('')">
								
								Alamat
									<input class="form-control" name="alamat" type="text" value="<?php echo $m->alamat; ?>" required oninvalid="this.setCustomValidity('alamat supplier tidak boleh kosong')" oninput="setCustomValidity('')">
									
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



















