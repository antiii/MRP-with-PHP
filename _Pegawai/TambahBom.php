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
include "../Class/ClassProduk.php";
include "../Class/ClassBahanBaku.php";

$bahanBaku = new bahanBaku;
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
                            <li><a href="#">Resep</a></li>
                            <li class="active">Tambah Resep</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    	

       <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

      <div class="col-md-6">
					<div class="panel-body">
					<form role="form" action="../Controller/ProsesBom.php?aksi=tambah" method="POST">
					<?php
						 $kode_produk = $_GET['kode_produk'];
        				$i=0; 
                        $data=$Produk->TampilSemuaData($kode_produk);
                        if($data!=0){
                          foreach($data as $n){
                            $i++;  
        			?>	
						<fieldset>
							<div class="form-group">
								<Table>
								<tr height="40px">
									<td>
								<b>Kode Produk</b>
									</td>
									<td>
									<input class="form-control" name="kode_produk" readonly="" type="text" value="<?php echo $n['kode_produk']; ?>">
									</td>
								</tr>
								<tr height="60px">
									<td>
								<b>Nama Produk</b>
									</td>
									<td>
									<input class="form-control" name="nama_produk" readonly="" type="text" value="<?php echo $n['nama_produk']; ?>">
									</td>
								</tr>
								<tr height="40px">
									<td width="200px">
								<b>Bahan Baku</b>
									</td>
									<td>
										<select name="kode_bahan_baku" class="form-control">
										<?php
                          
													$i=0; 
													$data=$bahanBaku->TampilSemua();
													if($data!=0){
													foreach($data as $m){
													$i++; 
											?>
  											<option value="<?php print $m['kode_bahan_baku']; ?>"> 
													<?php print $m['nama_bahan_baku']; ?> - <?php print $m['satuan']; } }?></option></select>
  									</td>
  								</tr>
  								
  								<tr height="40px">
  									<td width="20px">
								<b>Penggunaan</b>
									</td>
									<td>
										<input class="form-control" name="jumlah_penggunaan" type="number" placeholder="0.000" required min="0" value="<?php echo $m->bom;?>" step="0.1" title="Currency" pattern="^\d+(?:\.\d{1,1})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,3})?$/.test(this.value)?'inherit':'white'">
									</td>
									<td>&ensp;</td>
									<td>
										<button class="btn-sm btn-primary"><span class="fa fa-plus"></span></button>
									</td>
								</tr>
							
						</div><?php }} ?>
							
								<tr>
									<td colspan="2">
										
									</td>
								</tr>
							</fieldset>
							</Table>
					</form>
					</div>
				</div>
		</div><!--/.row-->	
		
			<div class="col-md-6">
					<div class="panel-body">
					Tabel Bahan Baku produk
						<table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="example">
							<tr>
							<td ><b>Produk</b></td>
								<td ><b>Bahan Baku</b></td>
								<td ><b>Jumlah</b></td>
								<td ><b>Aksi</b></td>
							</tr>

							   <?php
								$i=0;
								$data=$Produk->TampilKeranjangBB();
								if($data!=0){
									foreach($data as $n){
										$i++; 
								?>
                              	
							 </tr>
							 <tr>
									<td ><?php print $n['kode_produk']; ?></td>
									<td ><?php print $n['nama_bahan_baku']; ?></td>
									<td ><?php print $n['jumlah_penggunaan']; ?></td>
									<td > 
									<a href="../Controller/ProsesBom.php?aksi=hapus&no=<?php print $n['no']?>"><button class="btn-sm btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a> 
									
									<a href="../Controller/ProsesBom.php?aksi=simpan&no=<?php print $n['no']?>"><button class="btn-sm btn-success btn-xs"><i class="fa fa-check"></i></button></a> 
									</td>
							</tr><?php } }?>
								<tr>
								<td colspan="6" align="center"><a href="../Controller/ProsesBom.php?aksi=manage&kode_produk=<?php print $kode_produk;?>"><button class="btn-sm btn-info btn-s">Simpan</button></a>
								
							<a href="../Controller/ProsesBom.php?aksi=batal&kode_produk=<?php print $kode_produk;?>"><button class="btn-sm btn-danger btn-s">Batal</button></a></td>
							</tr>

						</table>
					</div>
				</div>
		</div><!--/.row-->
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
