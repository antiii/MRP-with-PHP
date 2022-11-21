
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
include "../Class/ClassBahanBaku.php";
include "../Class/ClassSupplier.php";

$bahanBaku = new bahanBaku;
$supplier = new supplier;

$kode_bahan_baku=$_GET['kode_bahan_baku'];
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
                            <li class="active">Edit Bahan Baku</li>
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
					<center>	<font size="6pt" color="black">Form UpdateBahanBaku</font> </center>
						</div>
					<div class="panel-body">
						<form action="../Controller/ProsesBahanBaku.php?aksi=update&kode_bahan_baku" method="POST">
						<fieldset>
							<div class="form-group"> 
						<?php 
						 $bahanBaku->TampilSatuData($kode_bahan_baku);
						?>
								
								Kode Bahan Baku
									<input class="form-control" name="kode_bahan_baku" readonly="" type="text" value="<?php echo $bahanBaku->kode_bahan_baku; ?>">
								Nama Bahan Baku
									<input class="form-control" name="nama_bahan_baku" type="text" value="<?php echo $bahanBaku->nama_bahan_baku; ?>" required oninvalid="this.setCustomValidity('nama bahan baku tidak boleh kosong')" oninput="setCustomValidity('')">
								
								Harga Bahan Baku
									<input class="form-control" name="harga_bahan_baku"  type="text" value="<?php echo $bahanBaku->harga_bahan_baku; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 100000" maxlength="10" required oninvalid="this.setCustomValidity('harga tidak boleh kosong')" oninput="setCustomValidity('')">
								Satuan
								<input class="form-control" name="satuan" type="text" value="<?php echo $bahanBaku->satuan; ?>" required oninvalid="this.setCustomValidity('Satuan tidak boleh kosong')" oninput="setCustomValidity('')">
								Safety Stok
									<input class="form-control" name="safety_stock"  type="text" value="<?php echo $bahanBaku->safety_stock; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 123456" maxlength="6" required oninvalid="this.setCustomValidity('batas stok tidak boleh kosong')" oninput="setCustomValidity('')">
								Lot Size
									<input class="form-control" name="lotsize"  type="text" value="<?php echo $bahanBaku->lotsize; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 123456" maxlength="6" required oninvalid="this.setCustomValidity('Jumlah Pemesanan tidak boleh kosong')" oninput="setCustomValidity('')">	
								Supplier
								<input class="form-control" name="kode_supplier" type="text" value="<?php echo $bahanBaku->kode_supplier; ?>">	
                     				<br>
                              		<center><button class="btn btn-primary btn-s">Update</i></button></center>
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



















