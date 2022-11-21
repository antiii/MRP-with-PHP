<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
   
	<script>  
	$(document).ready(function(){  
		var i=1;  
			$('#add').click(function(){  
				i++;  
				$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="number" name="name[]" placeholder="Tanggal" class="form-control name_list" min="1" max="31"/></td><td><input type="number" name="jmlh[]" placeholder="Jumlah" class="form-control jmlh_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn-sm btn-warning btn_remove">X</button></td></tr>');  
			});  
			$(document).on('click', '.btn_remove', function(){  
				var button_id = $(this).attr("id");   
				$('#row'+button_id+'').remove();  
			});  
	});  
		</script>
</head>

<body>

<?php 
include "../menu.php" ;
include "../Controller/koneksi.php";
include "../Class/ClassProduk.php";
include "../Class/ClassPreOrder.php";

$Produk = new Produk;
$preorder = new PreOrder;
?>


        </header><!-- /header -->
        <!-- Header-->

       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Plan Produksi</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Perencanaan</a></li>
                            <li class="active">Pre Order</li>
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
                                <strong class="card-title">Pre Order</strong>
					
                            </div>
                            <div class="card-body">
    
			
					<form action="../Controller/ProsesOrder.php?aksi=tambah" method="post" class="form-horizontal">
								<div class="card-body">
									<div class="col col-sm-12">
										<?php
											$hari_ini = date("d-m-Y");
											$akhir = substr(date('t-m-Y', strtotime($hari_ini)),0,2);
										?>
										<div class="form-group">  
											 <form name="add_name" id="add_name">  
												  <div class="table-responsive">
													   <table class="table table-bordered" id="dynamic_field">  
															<tr>  
																

								 <td width="40%"><small>Produk</small><select name="kode_produk" class="form-control">
							<option> Pilih Produk </option>
										<?php
										$i=0; 
										$data=$Produk->TampilSemua();
										if($data!=0){
										foreach($data as $m){
										$i++;  
        					?>		
  											<option value="<?php echo $m['kode_produk']; ?>"> <?php print $m['kode_produk']."  ".$m['nama_produk']; 
  											?>
										<?php }} ?></option></select></td>
																 
																 
											 <td width="30%"> <small>Tanggal</small>	<input name="name" type="date" class="form-control"  placeholder="Tanggal"  required oninvalid="this.setCustomValidity('tanggal tidak boleh kosong')" oninput="setCustomValidity('')" /></td>
																 
											<td width="30%"><small>Jumlah</small><input type="number" name="jmlh" placeholder="Jumlah" class="form-control jmlh_list" required oninvalid="this.setCustomValidity('jumlah tidak boleh kosong')" oninput="setCustomValidity('')" min=1"/></td>
																  
						
															</tr>  
													   </table>
												  </div>  
											 </form>  
					</div>

										<a href="" onClick="return confirm('Apakah Anda benar-benar mau menambahkan pre order ini?')"><button type="submit" class="btn btn-info btn-md btn-block">Simpan</button></a>
										</div>
									</div>
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
                                <strong class="card-title">Data Pre Order</strong>
					
                            </div>
                            <div class="card-body">
								
								
									<button type="button" class="btn btn-outline-secondary btn-md">Data Pre Order</button><br><br>
											
							
                          <small>      <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                       <thead>
											<tr>
												<th><center><small><b>Produk</small></center></th>	
												<th><center><small><b>Tanggal</small></center></th>
												<th><center><small><b>Bulan</small></center></th>
												<th><center><small><b>Jumlah</small></center></th>
												<th><center><small><b>Aksi</small></center></th>
											</tr>
										</thead>
										<tbody>
										<?php
										$i=0; 
										$data=$preorder->TampilSemua();
										if($data!=0){
										foreach($data as $m){
										$i++;  
												
											$kode= $m['kode'];
											$kode_produk = $m['kode_produk'];
											$tgl = $m['tgl'];
											$bulan_angka = $m['bln'];
											$jumlah = $m['jumlah'];
												
												
										
										$i=0; 
										$data=$Produk->TampilSemuaData($kode_produk);
										if($data!=0){
										foreach($data as $z){
										$i++;  
											
												  $nama_produk= $z['nama_produk'];
										
												
												if ($bulan_angka == 1){
													$bulan = "Januari";
												}if ($bulan_angka == 2){
													$bulan = "Februari";
												}if ($bulan_angka == 3){
													$bulan = "Maret";
												}if ($bulan_angka == 4){
													$bulan = "April";
												}if ($bulan_angka == 5){
													$bulan = "Mei";
												}if ($bulan_angka == 6){
													$bulan = "Juni";
												}if ($bulan_angka == 7){
													$bulan = "Juli";
												}if ($bulan_angka == 8){
													$bulan = "Agustus";
												}if ($bulan_angka == 9){
													$bulan = "September";
												}if ($bulan_angka == 10){
													$bulan = "Oktober";
												}if ($bulan_angka == 11){
													$bulan = "November";
												}if ($bulan_angka == 12){
													$bulan = "Desember";
												}if ($bulan_angka == null){
													$bulan = "-";
												}
												
										}}	
												
												$i++;
										  ?>
											<tr>
											
												<td><center><?php print $nama_produk; ?></center></td>
												<td><center><?php print $tgl; ?></center></td>
												<td><center><?php print $bulan; ?></center></td>
												<td><center><?php print $jumlah; ?> <small> pcs</small></center></td>
												<td><center>
													<a href="Schedule_Edit.php?kode=<?php print $kode;?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
													<a href="../Controller/ProsesOrder.php?aksi=hapus&kode=<?php print $kode;?>" onClick="return confirm('Apakah Anda benar-benar mau menghapus ini?')"><button class="btn btn-warning btn-sm"><i class="fa fa-trash-o "></i></button></a>
												</td>
											</tr>
										<?php } }?>
										</tbody>
                       
                    </table> </small>

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
 