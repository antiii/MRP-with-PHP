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
include "../Class/ClassPembelian.php";
include "../Class/ClassBahanBaku.php";
include "../Class/ClassPorel.php";

$bahanBaku = new bahanBaku;
$porel = new porel;
$Pembelian = new Pembelian;

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
                            <li><a href="#">Bahan Baku</a></li>
                            <li class="active">Data Bahan Baku</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

		
		<?php 
		$tanggal = date ('d-m-Y');
		
	$query = mysqli_query($con, "SELECT * from pembelian WHERE pb_date_tiba='$tanggal' and pb_status='Menunggu'");
	
	while($m=mysqli_fetch_array($query)){	
		$kode_bahan_baku = $m['kode_bahan_baku'];
		$query1 = mysqli_query($con,"SELECT * FROM bahanbaku where kode_bahan_baku='$kode_bahan_baku'");
						while ($z=mysqli_fetch_array($query1))
										  {
											$nama_bahan_baku = $z['nama_bahan_baku'];
										  
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "
		
		<div class='col-sm-12' class='alert alert-warning'>
		<div class='alert  alert-success alert-dismissible fade show' role='alert'>
		<small><span class='glyphicon glyphicon-info-sign'></span> 
		Bahan Baku  <a style='color:red'>". $z['nama_bahan_baku']."</a> Tiba Hari ini <a style='color:red'>"."</a> <a style='color:red'>"." </a></small>
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
		
		</div>
		</div>";	
	}}

?>
       <div class="content mt-3">
		
       <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Aktivitas Pembelian Bahan Baku</strong>
					
                            </div>
                            <div class="card-body">
							
                 <small>     <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                      <thead>
						<tr>                                  
								<th>No.</th>
								<th>Kode</th>
								<th>Bahan Baku</th>
								<th>Tanggal Pesan</th>
								<th>Tanggal Tiba</th>
								<th>Jumlah Pesan</th>
								<th>Harga Total</th>
								<th>Status</th>
								<th>Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
							  <?php	
							$i=0; 
							$data=$Pembelian->TampilSemuaStatus();
							if($data!=0){
								foreach($data as $m){
								$kode_bahan_baku = $m['kode_bahan_baku'];
								$pb_date = $m['pb_date'];
								$pb_date_tiba = $m['pb_date_tiba'];
								$pb_jumlah= $m['pb_jumlah'];
								$kode_pembelian = $m['kode_pembelian'];	
								$i++;
							 
                        $data1=$bahanBaku->TampilBB($kode_bahan_baku);
                        if($data1!=0){
                          foreach($data1 as $n){
							  $nama_bahan_baku = $n['nama_bahan_baku'];
								$harga_bahan_baku = $n['harga_bahan_baku'];
						}}
        				?>				
												<tr>
													<td ><?php print $i; ?></td>
													<td ><?php print $kode_pembelian;?></td>
													<td ><?php print $nama_bahan_baku;?></td>
													<td ><?php print $pb_date;?></td>
													<td ><?php print $pb_date_tiba;?></td>
													<td ><?php print $m['pb_jumlah'];?></td>
	
													<td >Rp. <?php print number_format($harga_bahan_baku*$m['pb_jumlah']);?></td>
										<td >
											<?php   $pb_status= $m['pb_status'];
											if($pb_status=="Ditolak"){
											?>
											<button type="button" class="btn-sm btn-danger"><?php print $pb_status;  ?></button> 
											<?php } 
											elseif($pb_status=="Menunggu"){
											?>
                                  			<button type="button" class="btn-sm btn-warning"><?php print $pb_status;  ?></button> 
											<?php } 
											else{
											?>  <button type="berhasil" class="btn-sm btn-primary"><?php print $pb_status; ?></button> 
											<?php 	} ?>
											</td>
												<td>
												<a href="../Controller/ProsesPembelian.php?aksi=konfirmasi&kode_pembelian=<?php print $m['kode_pembelian']?>" onClick="return confirm('Apakah Anda benar-benar mau konfirmasi pemesanan ini?')"><button class="btn-sm btn-success btn-xs"><i class="fa fa-check"></i></button></a>
                                  	</td></tr><?php }}?>
											
								  
                        </tbody>
                    </table></small>

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
