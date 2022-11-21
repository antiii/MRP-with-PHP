<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->


<body>
<?php include "../menu1.php" ?>
<?php include "../Controller/koneksi.php"?>
     
     
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
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Form Tambah Pegawai</strong>
					<form method="post" action="../Controller/ProsesPegawai.php?aksi=tambah" enctype="multipart/form-data">
				
					<?php
							include "../Controller/koneksi.php";

							$ambilKode1 = mysqli_query($con, "SELECT max(kode_user) as maxKode FROM user");
							$ambilKode = mysqli_fetch_array($ambilKode1);
							$kode_user1 = $ambilKode['maxKode']; 

							$nomor = (int) substr($kode_user1, 5, 3);
							$nomor++;
							$char = "PGW-";
							$kode_user = $char.sprintf("%04s", $nomor);
							?>
					
						</div>	
						<div class="content mt-3">
            <div class="animated fadeIn">
			<div class="form-group">
				<input name="kode_user" type="text" class="form-control" placeholder="Kode Supplier" readonly="" type="text" value="<?php echo $kode_user; ?>">
			</div>	
				<div class="form-group">
				<input name="nama_user" type="text" class="form-control" placeholder="Nama Pegawai" required oninvalid="this.setCustomValidity('nama pegawai tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>
			<div class="form-group">
				<input name="alamat" type="text" class="form-control" placeholder="Alamat" required oninvalid="this.setCustomValidity('alamat pegawai tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>
			<div class="form-group">
				<input name="no_hp" type="text" class="form-control" placeholder="No HP" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 081243211234" maxlength="12" required oninvalid="this.setCustomValidity('telp tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>	
			<div class="form-group">
				<select class="form-control"  name="jabatan">
					<option value="Manufaktur">Manufaktur</option>
					<option value="Admin">Admin</option>
					<option value="Admin">Kasir</option>
				</select>
			</div>
			<div class="form-group">
				<input name="username" type="text" class="form-control" placeholder="username" required oninvalid="this.setCustomValidity('username  tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>
			<div class="form-group">		
			<input name="password" type="password" class="form-control" placeholder="password" required oninvalid="this.setCustomValidity('password tidak boleh kosong')" oninput="setCustomValidity('')">
			</div>
			<div class="form-group">
				<label>Foto</label>
				<input type="file" class="form-control" name="foto" placeholder="Foto Diri">
			</div>	
			<div class="form-actions form-group"><button type="submit" class="btn btn-info btn-sm">Simpan</button></div>
			</div>	
			</div>
			</div>	
			</form>
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
