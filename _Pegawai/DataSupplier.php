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
include "../Class/ClassSupplier.php";

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
                            <li class="active">DataSupplier</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<!-- modal input Produk -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h6 align="center">Tambah Supplier</h6>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
						<?php
							include "../Controller/koneksi.php";

							$ambilKode1 = mysqli_query($con, "SELECT max(kode_supplier) as maxKode FROM supplier");
							$ambilKode = mysqli_fetch_array($ambilKode1);
							$kode_supplier1 = $ambilKode['maxKode']; 

							$nomor = (int) substr($kode_supplier1, 4, 3);
							$nomor++;
							$char = "SUP-";
							$kode_supplier = $char.sprintf("%03s", $nomor);
						?>
			<form action="../Controller/ProsesSupplier.php?aksi=tambah&kode_supplier" method="post" >
				<div class="form-group">
					<input name="kode_supplier" type="text" class="form-control" placeholder="Kode Supplier" readonly="" type="text" value="<?php echo $kode_supplier; ?>">
				</div>
				<div class="form-group">
					<input name="nama_supplier" type="text" class="form-control" placeholder="Nama Supplier" required oninvalid="this.setCustomValidity('nama supplier tidak boleh kosong')" oninput="setCustomValidity('')">
				</div>
				<div class="form-group">
					<input name="alamat_supplier" type="text" class="form-control" placeholder="Alamat Supplier" required oninvalid="this.setCustomValidity('alamat supplier tidak boleh kosong')" oninput="setCustomValidity('')">
				</div>
				<div class="form-group">
					<input name="telp_supplier" type="text" class="form-control" placeholder="Telp Supplier" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 081243211234" maxlength="12" required oninvalid="this.setCustomValidity('telp supplier tidak boleh kosong')" oninput="setCustomValidity('')">
				</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>
		
       <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">DataSupplier</strong>
								<p align="right"><button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn-sm btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Supplier</button></p>
                            </div>
								<div class="card-body">
									<small><table id="bootstrap-data-table-export" class="table table-striped table-bordered">
								<thead>
								<tr>                                  
									<th><center> No 			</center></th>
									<th><center> Kode 		</center></th>
									<th><center> Nama 		</center></th>
									<th><center> Alamat 		</center></th>
									<th><center> Telp 	</center></th>
									<th><center> Aksi	 	</center></th>
								</tr>
								</thead>
								<tbody>
								<?php
								$i=0; 
								$data=$supplier->TampilSemua();
								if($data!=0){
								foreach($data as $m){
								$i++;  
        						?>	
								<tr>
									<td><?php print $i; ?> </td>
									<td><?php print $m['kode_supplier']; ?></td>
									<td><?php print $m['nama_supplier']; ?></td>
									<td><?php print $m['alamat_supplier'];?></td>
									<td><?php print $m['telp_supplier'];  ?></td>
									<td>
                                  	<a href="UpdateSupplier.php?kode_supplier=<?php print $m['kode_supplier']?>"><button class="btn-sm btn-success btn-xs"><i class="fa fa-pencil"></i></button></a>
                                  	<a href="DetailSupplier.php?kode_supplier=<?php print $m['kode_supplier']?>"><button class="btn-sm btn-danger btn-xs"><i class="fa fa-list "></i></button></a>
                                  </td>
								</tr> 
								<?php }
									} ?>
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