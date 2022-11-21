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
include "../Class/ClassBahanBaku.php";
include "../Class/ClassSupplier.php";

$bahanBaku = new bahanBaku;
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
                            <li class="active">Data Bahan Baku</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		
	<?php 
	$query = mysqli_query($con, "SELECT * from bahanbaku WHERE jumlah_bahan_baku <= rop");
	while($m=mysqli_fetch_array($query)){	
	if($m['jumlah_bahan_baku']<=['rop']){	
	?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
	<?php
	echo "<div class='col-sm-12' class='alert alert-warning'>
			<div class='alert  alert-success alert-dismissible fade show' role='alert'>
				<small><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $m['nama_bahan_baku']."</a> yang tersisa kurang dari <a style='color:red'>". $m['rop']."</a> <a style='color:red'>". $m['satuan']." </a></small>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
			</div>
			</div>";	
			}
		}
	?>

		<!-- modal input Produk -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h6 align="left">Tambah Bahan Baku</h6>
				<align="right"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> </align>
			</div>
			<div class="modal-body">
				<?php
							include "../Controller/koneksi.php";

							$ambilKode1 = mysqli_query($con, "SELECT max(kode_bahan_baku) as maxKode FROM bahanbaku");
							$ambilKode = mysqli_fetch_array($ambilKode1);
							$kode_bahan_baku1 = $ambilKode['maxKode']; 

							$nomor = (int) substr($kode_bahan_baku1, 5, 3);
							$nomor++;
							$char = "BAKU-";
							$kode_bahan_baku = $char.sprintf("%03s", $nomor);
							?>

				<form action="../Controller/ProsesBahanBaku.php?aksi=tambah" method="post">
					<div class="form-group">
						<input name="kode_bahan_baku" type="text" class="form-control" placeholder="Kode Bahan Baku" readonly="" type="text" value="<?php echo $kode_bahan_baku; ?>">
					</div>
					<div class="form-group">
						<input name="nama_bahan_baku" type="text" class="form-control" placeholder="Bahan Baku" required oninvalid="this.setCustomValidity('nama bahan baku tidak boleh kosong')" oninput="setCustomValidity('')">
					</div>
					
					<div class="form-group">
					<select class="form-control"  name="satuan" required oninvalid="this.setCustomValidity('Satuan tidak boleh kosong')" oninput="setCustomValidity('')">
						<option value="Kg">Sak</option>
						<option value="Kg">Kg</option>
						<option value="Butir">Butir</option>
						<option value="Bungkus">Bungkus</option>
					</select>
					</div>
					<div class="form-group">
						<input name="harga_bahan_baku" type="number" class="form-control" placeholder="Harga" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 100000" maxlength="10" required oninvalid="this.setCustomValidity('harga tidak boleh kosong')" oninput="setCustomValidity('')">
					</div>
					<div class="form-group">
						<input name="jumlah_bahan_baku" type="number" class="form-control" placeholder="Jumlah" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 123456" maxlength="6" required oninvalid="this.setCustomValidity('jumlah bahan baku tidak boleh kosong')" oninput="setCustomValidity('')">
					</div>
					<div class="form-group">
						<input name="lead_time" type="number" min="1" class="form-control" placeholder="Lead Time" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 30" maxlength="6" required oninvalid="this.setCustomValidity('waktu tunggu pemesanan tidak boleh kosong')" oninput="setCustomValidity('')">
					</div>	
					<div class="form-group">
						<input name="lotsize" type="number" class="form-control" placeholder="Jumlah 1x Pesan" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 123456" maxlength="6" required oninvalid="this.setCustomValidity('Jumlah Pemesanan tidak boleh kosong')" oninput="setCustomValidity('')">
					</div>		
					<div class="form-group">
						<input name="safety_stock" type="number" class="form-control" placeholder="Stok Minimal" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 123456" maxlength="6" required oninvalid="this.setCustomValidity('batas stok tidak boleh kosong')" oninput="setCustomValidity('')">
					</div>
						<div class="form-group">
						<select name="kode_supplier" class="form-control" required oninvalid="this.setCustomValidity('supplier tidak boleh kosong')" oninput="setCustomValidity('')">
						
						<?php
        				$i=0; 
                        $data=$supplier->TampilSemua();
                        if($data!=0){
                          foreach($data as $m){
                            $i++;  
        				?>	
  						<option value="<?php print $m['kode_supplier']; ?>"> <?php print $m['nama_supplier']; }} ?></option></select>
					</div>															
				</div>
				<div class="modal-footer">
					<button type="button" class="btn-sm btn-danger" data-dismiss="modal">Batal</button>
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
                                <strong class="card-title">Data Persediaan Bahan Baku</strong>
							<p align="right"><button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn-sm btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Bahan Baku</button></p>
							<p align="right">
							<button type="button" class="btn-sm btn-md btn-danger"><a href="LapPersediaan.php" style="color:white">Cetak Laporan Persediaan</a> <i class="fa fa-print"></i></button>
							</p>
                            </div>
                            <div class="card-body">
                        <small><table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                        <tr>                                  
                                  <th><center> No 			</center></th>
                          
                                  <th><center> Bahan Baku 	</center></th>     
								  <th><center> Persediaan 	</center></th>
								  <th><center> Satuan  		</center></th>
								  <th><center> ROP  		</center></th>
								  <th><center> Harga 		</center></th>
								  <th><center> Waktu Tunggu		</center></th>
								   <th><center> Jumlah Pesan		</center></th>
								  <th><center> Supplier		</center></th>
								  <th><center> Aksi	 		</center></th>
                                 
                         </tr>
                         </thead>
                              <tbody>
							  	 <?php
								$i=0; 
								$data=$bahanBaku->TampilSemua();
								if($data!=0){
								foreach($data as $m){
								$i++; 
								?>
                              <tr>
                                  <td><?php print $i; ?> </td>
                               
                                  <td ><?php print $m['nama_bahan_baku']; 
								  
								  if($m['jumlah_bahan_baku']<=$m['rop']){
										echo "<em class='fa fa-sm fa-exclamation-triangle color-red'></em>"; 
									}
									else{
										echo "";
									}
                                  ?>
								  </td>
								
                                  <td><?php print $m['jumlah_bahan_baku'];?></td>
								  <td><?php print $m['satuan']; ?></td>
								  <td><?php print $m['rop']; ?></td>
								  <td>Rp. <?php print number_format( $m['harga_bahan_baku']);?></td>
                                  <td><?php print $m['lead_time'];  print ' hari'?></td>
								     <td><?php print $m['lotsize']; ?></td>
                                  <td><?php print $m['nama_supplier']; ?></td>
								  <td>
								  
								  <a href="UpdateBahanBaku.php?kode_bahan_baku=<?php print $m['kode_bahan_baku']?>"><button class="btn-sm btn-success btn-xs"><i class="fa fa-pencil"></i></button></a>
								<a href="../Controller/ProsesBahanBaku.php?aksi=hapus&kode_bahan_baku=<?php print $m['kode_bahan_baku']?>" onClick="return confirm('Apakah Anda benar-benar mau menghapus bahan baku ini?')"><button class="btn-sm btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                                 
                              </tr> 
								<?php }} ?>
							</tbody>
						</table> </small>
					</div>
				</div>
			</div>
		</div>
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
