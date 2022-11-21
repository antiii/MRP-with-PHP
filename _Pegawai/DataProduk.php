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
                            <li class="active">Data Produk</li>
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
				<h6 align="center">Tambah Produk</h6>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
			<?php
							include "../Controller/koneksi.php";

							$ambilKode1 = mysqli_query($con, "SELECT max(kode_produk) as maxKode FROM produk");
							$ambilKode = mysqli_fetch_array($ambilKode1);
							$kode_produk1 = $ambilKode['maxKode']; 

							$nomor = (int) substr($kode_produk1, 7, 3);
							$nomor++;
							$char = "PRODUK-";
							$kode_produk = $char.sprintf("%03s", $nomor);
							?>

			<form action="../Controller/ProsesProduk.php?aksi=tambah&kode_produk" method="post">
				<div class="form-group">
					<input name="kode_produk" type="text" class="form-control" placeholder="Kode Produk" readonly="" type="text" value="<?php echo $kode_produk; ?>">
				</div>
				<div class="form-group">
					<input name="nama_produk" type="text" class="form-control" placeholder="Nama Produk" required oninvalid="this.setCustomValidity('nama produk tidak boleh kosong')" oninput="setCustomValidity('')">
				</div>
				<div class="form-group">
					<input name="banyak_produksi" type="text" class="form-control" placeholder="Jumlah 1x Produksi" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 1000" maxlength="3" required oninvalid="this.setCustomValidity('banyak produksi tidak boleh kosong')" oninput="setCustomValidity('')">
				</div>
				<div class="form-group">
					<input name="harga_produk" type="text" class="form-control" placeholder="Harga Produk" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 1000000" maxlength="10" required oninvalid="this.setCustomValidity('harga produk tidak boleh kosong')" oninput="setCustomValidity('')">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn-sm btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn-sm btn-primary" value="Simpan">
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
                                <strong class="card-title">Data Produk</strong>
								<p align="right"><button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn-sm btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Produk</button></p>
                            </div>
                            <div class="card-body">
						<small>	
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                              <tr>                                  
                                  <th><center> No 			</center></th>
                                  <th><center> Kode 		</center></th>
                                  <th><center> Nama 		</center></th>
						
								  <th><center> Harga		</center></th>
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
                                  <td><?php print $m['nama_produk'];  ?></td>
								
                                  <td><?php print $m['harga_produk']; ?></td>
                                  <td>
                                    <button onclick="location.href='DetailBom.php?kode_produk=<?php print $m['kode_produk']; ?>'" class="btn-sm btn-info">Bom<i class="fa fa-search-plus"></i></button>
                                  	<a href="../Controller/ProsesProduk.php?aksi=hapus&kode_produk=<?php print $m['kode_produk']?>" onClick="return confirm('Apakah Anda benar-benar mengapus produk ini?')"><button class="btn-sm btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                              </tr> 
						<?php }} ?>
							</tbody>
                    </table>
					</small>
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
