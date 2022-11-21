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
include "../Class/ClassBahanbaku.php";
include "../Class/ClassPorel.php";
include "../Class/ClassSupplier.php";
$nama_bahan_baku = $_GET['nama_bahan_baku'];
$bahanbaku = new bahanbaku;
$supplier = new supplier;
$porel = new porel;
 
 ?>


<body>       
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
                            <li><a href="#">Supplier</a></li>
                            <li class="active">Form Pembelian</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    	

                <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
						
                            </div>
            <div class="card-body">
							<div class="panel-body">
										<?php
										$nama_bahan_baku = $_GET['nama_bahan_baku'];
										
											$data=$bahanbaku->TampilSemuaBB($nama_bahan_baku);
											if($data!=0){
											foreach($data as $m){
												$kode_bahan_baku = $m['kode_bahan_baku'];
												$satuan = $m['satuan'];
													 $data1=$porel->TampilSemuaData($kode_bahan_baku);	
													if($data1!=0){
													foreach($data1 as $n){
													$ID_mrp = $n['ID_mrp'];
													}
														
	if($ID_mrp != null){
						?>
					
	<form action="../Controller/ProsesPembelian.php?aksi=tambahkeranjang" method="post" class="form-horizontal">	
			<div class="col-md-6">
			 <label>Tanggal Pesan</label>
			  <input name="pb_date" type="text" class="form-control" readonly="" value="<?php print date('d-m-Y')?>"> 
            <label>Supplier</label>
               <input name="nama_supplier" type="text" class="form-control" value="<?php print $m['nama_supplier']?>">
              </div>	
			</div>
            <div class="col-md-6">
            <div class="form-group">
            <label>Bahan Baku</label>
                <input class="form-control" name="nama_bahan_baku"  type="text" value="<?php print $m['nama_bahan_baku']?>">
            </div>
            <label>Jumlah Pemesanan</label>
              <div class="input-group">
               <input class="form-control" name="lotsize"  type="text" value="<?php print $m['lotsize']  ?>">
                <div class="input-group-addon">
                  <?php print $m['satuan']; ?>                  
                </div>
              </div>

              <div class="input-group">
               <input name="hari_sampai" type="hidden" class="form-control">

              </div>
			  
              <br>
              
					<br>
              <div>	
              </div>
			  </div>   
				<a href=""><button type="submit" class="btn btn-info btn-md btn-block">Pesan</button></a>
				<a href="TambahPembelian.php"><button type="button" class="btn btn-danger btn-md btn-block">Batal</button></a>   
   </form>   	
						<?php
	}}
						else{
						?>
	<form action="../Controller/ProsesPembelian.php?aksi=tambahkeranjang" method="post" class="form-horizontal">	
			<div class="form-group">
			<span class="badge badge-info">#Pembelian Schedule Receipt Bahan Baku#</span>
			</div>
			<div class="col-md-6">
			 <label>Tanggal Pesan</label>
			  <input name="pb_date" type="text" class="form-control" readonly="" value="<?php print date('d-m-Y')?>"> 
			    
				<label>Supplier</label>
						<select name="nama_supplier" class="form-control">
		   
														<?php
														
															//Ambil supplier INNER JOIN bahan baku
															$i=0;
															$data=$bahanbaku->TampilBB($kode_bahan_baku);
															if($data!=0){
															foreach($data as $m){
																$kode_supplier = $m['kode_supplier'];
															$data1=$supplier->TampilSemuaData($kode_supplier);	
															if($data1!=0){
															foreach($data1 as $n){
																$nama_supplier = $n['nama_supplier'];
															}}
															?>	
															<option value="<?php print $nama_supplier;?>"> <?php print $nama_supplier; }} ?></option>
															<?php
															//Ambil OUTER JOIN 
															
															$query4 = mysqli_query($con, "SELECT * from supplier LEFT OUTER JOIN bahanbaku ON supplier.kode_supplier = bahanbaku.kode_supplier WHERE bahanbaku.kode_supplier IS NULL");
															while($q = mysqli_fetch_array($query4))
															{
																echo $kode_supplier = $q['kode_supplier'];
																$nama_supplier = $q['nama_supplier'];
															?>	
															<option value="<?php print $nama_supplier;?>"> <?php print $nama_supplier; } ?></option>
					</select>						
              <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-link">Tambah supplier<i class="fa fa-plus"></i></button>  
			  </div>
			</div>
            <div class="col-md-6">
            <div class="form-group">
            <label>Bahan Baku</label>
                <input class="form-control" name="nama_bahan_baku" readonly="" type="text" value="<?php print $m['nama_bahan_baku']?>">
            </div>
            <label>Jumlah Pemesanan</label>
              <div class="input-group">
               <input name="lotsize"  type="number" min="1" class="form-control" placeholder="lot size" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 30" maxlength="6" required oninvalid="this.setCustomValidity('waktu tunggu pemesanan tidak boleh kosong')" oninput="setCustomValidity('')">
                <div class="input-group-addon">
                  <?php print $m['satuan']; ?>                  
                </div>
              </div>
			 <label>Bahan Baku Tiba Dalam</label>
              <div class="input-group">
               <input name="hari_sampai" type="number" min="0" class="form-control" placeholder="Waktu bahan baku sampai" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 30" maxlength="6" required oninvalid="this.setCustomValidity('waktu tunggu pemesanan tidak boleh kosong')" oninput="setCustomValidity('')">
                <div class="input-group-addon">
                  Hari Lagi            
                </div>
              </div>
              <br>
              
				
              <div>	
              </div>
			  </div>   
				<a href=""><button type="submit" class="btn btn-info btn-md btn-block">Pesan</button></a>
				<a href="TambahPembelian.php"><button type="button" class="btn btn-danger btn-md btn-block">Batal</button></a>   
   </form>   	
					<?php
									}
									?>
							<?php
											}}
							?>						
										
						</div>
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

				<form action="../Controller/ProsesSupplier.php?aksi=tambahsup&kode_supplier" method="post">
					<div class="form-group">
						
						<input name="kode_supplier" type="text" class="form-control" placeholder="Kode Supplier" readonly="" type="text" value="<?php echo $kode_supplier; ?>">
					</div>
					<div class="form-group">
					
						<input name="nama_supplier" type="text" class="form-control" placeholder="Nama Supplier"  required oninvalid="this.setCustomValidity('nama tidak boleh kosong')" oninput="setCustomValidity('')">
					</div>
					<div class="form-group">
						
						<input name="alamat_supplier" type="text" class="form-control" placeholder="Alamat Supplier" required oninvalid="this.setCustomValidity('alamat tidak boleh kosong')" oninput="setCustomValidity('')">
					</div>
					<div class="form-group">
						
						<input name="telp_supplier" type="text" class="form-control" placeholder="Telp Supplier" onkeypress="return event.charCode >= 48 && event.charCode <=57" title="Cth : 081243211234" maxlength="12" required oninvalid="this.setCustomValidity('telp supplier tidak boleh kosong')" oninput="setCustomValidity('')">
					</div>
					<div class="form-group">
					<input name="nama_bahan_baku" value="<?php print $nama_bahan_baku;?>" type="hidden" class="form-control">
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
 