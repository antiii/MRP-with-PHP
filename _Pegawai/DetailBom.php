
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
 
$kode_produk=$_GET['kode_produk'];
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
                            <li><a href="#">Detail</a></li>
                            <li class="active">Detail Produk</li>
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
						<center><h6><b>Detail Bahan Baku</b></h6> </center>
						</div>
					<div class="panel-body">
					<br>
					<form action="../Controller/ProsesProduk.php?aksi=update" method="POST">
						<table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="example"> 
                        <thead>
                            <tr>                                  
                                  <th><center> Kode 				</center></th>
                                  <th><center> Nama 				</center></th>
								  <th><center> Jumlah	1x Produksi	</center></th>
								  <th><center> harga				</center></th>
                             </tr>
                        </thead>
                            <tbody>
                              <tr>
								<?php 
								$Produk->TampilSatuData($kode_produk);
								?>
                                  <td align="center"><input type ="text" readonly="" name ="kode_produk" value = "<?php echo $Produk->kode_produk; ?>" width = "100%" required /> </td>
                                  <td align="center"><input type ="text" name ="nama_produk" value = "<?php echo $Produk->nama_produk; ?>" width = "100%" required oninvalid="this.setCustomValidity('nama produk tidak boleh kosong')" oninput="setCustomValidity('')"> </td>
								  <td align="center"><input type ="text" name ="banyak_produksi" value = "<?php echo $Produk->banyak_produksi; ?>" width = "100%"onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 1000" maxlength="3" required oninvalid="this.setCustomValidity('banyak produksi tidak boleh kosong')" oninput="setCustomValidity('')"> </td>
								  <td align="center"><input type ="text" name ="harga_produk" value = "<?php echo $Produk->harga_produk; ?>" width = "100%" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 1000000" maxlength="10" required oninvalid="this.setCustomValidity('harga produk tidak boleh kosong')" oninput="setCustomValidity('')"> </td>
								</tr>
								<tr>
                                  <td colspan="6" align="center">
                              		<button class="btn-sm btn-primary btn-s">Update</i></button>
                              	  </td>
                                </tr>
                          </tbody>
                      </table>
					</form>
                      <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="example">
						<thead>
                              <tr> 
                              	<td colspan="4" align="center"> <h6><b>Jumlah penggunaan Bahan Baku 1X Produksi</b></h6></td>
                              </tr>
                              <tr>
                              	<td align="center" width="300px"> <b>Bahan Baku</b> </td>
							  	<td align="center" width="300px"> <b>Jumlah Penggunaan </b></td>
							  	<td align="center" width="300px"><b> Aksi</b> </td>
							  </tr>
                        </thead>
                        <tbody>
                              <tr>
								<?php
								$i=0; 
								$data=$Produk->TampilSemuaBB($kode_produk);
								if($data!=0){
								foreach($data as $m){
									$i++;  
								?>	
							  </tr>
							  <tr>
								<td align="center"><?php print $m['kode_bahan_baku']; ?> -
													<?php print $m['nama_bahan_baku']; ?></td>
								<td align="center"><?php print $m['jumlah_penggunaan']; ?></td>
								<td align="center"> 
								<a href="UpdateBom.php?no=<?php print $m['no']?>"><button class="btn-sm btn-success btn-xs"><i class="fa fa-pencil"></i></button></a>
                                </td>
							  </tr>
								<?php }} ?>
							  <tr>
								<td colspan="4" align="center"><a href="TambahBom.php?kode_produk=<?php print $kode_produk;?>"><button class="btn-sm btn-info btn-s">Tambah Resep</button></a></td>
							  </tr>
                        </tbody>
                    </table>
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

