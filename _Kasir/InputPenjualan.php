<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<?php 
include "../menu2.php" ;
include "../Controller/koneksi.php";
include "../Class/ClassToko.php";

$Toko= new Toko;
  
?>
<head>
    
<script>
function math() {
	var a = parseInt(document.getElementById("prd_name").value);
	var b = parseInt(document.getElementById("jumlah_penjualan").value);

	
		document.getElementById("total_penjualan").value = a*b;
	
}
</script>	
</head>

<body>
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Penjualan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Penjualan</a></li>
                            <li class="active">Input Penjualan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    		<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                               <button type="button" class="btn btn-outline-secondary btn-md">Penjualan <?php print $tanggal = date('M d, Y');?></button>
                            </div>
							<div class="card-body">
							<div class="panel-body">
							
							<?php
							include "../Controller/koneksi.php";

							$ambilKode1 = mysqli_query($con, "SELECT max(kode_penjualan) as maxKode FROM penjualan");
							$ambilKode = mysqli_fetch_array($ambilKode1);
							$kode_penjualan1 = $ambilKode['maxKode']; 

							$nomor = (int) substr($kode_penjualan1, 5, 5);
							$nomor++;
							$char = "PJL-";
							$kode_penjualan = $char.sprintf("%05s", $nomor);
							?>

		<form action="../Controller/ProsesPenjualan.php?aksi=tambahkeranjang" method="post">
			<div class="col-md-6">
				<label>Kode</label>
					<input name="kode_penjualan" type="text" class="form-control" placeholder="Kode Penjualan" readonly="" type="text" value="<?php echo $kode_penjualan; ?>">
				<label>Pegawai</label>
					<input class="form-control" name="nama_user" readonly="" type="text"  value="<?php echo $_SESSION['nama_user']  ?>">
			</div>
			</div>
			<div class="col-md-6">
            <div class="form-group">
                <label>Tanggal</label>
					<input name="date" type="date" class="form-control"  placeholder="Tanggal"  required oninvalid="this.setCustomValidity('tanggal tidak boleh kosong')" oninput="setCustomValidity('')">
              </div>
              <!-- /.form-group -->
			<div class="form-group">
			</div>
			<div class="form-group">
			</div>
			<div class="form-group">
				<label>Toko</label>
					<select name="nama_toko" class="form-control">
					 <?php
        				$i=0; 
                        $data=$Toko->TampilSemua();
                        if($data!=0){
                          foreach($data as $m){
                            $i++;  
        			?>
					<option value="<?php print $m['nama_toko']; ?>"> <?php print $m['nama_toko']; }} ?></option></select>
					</div>
					<div class="form-group">
				<label>Produk</label>
					<?php
                  //koding php
					include "../Controller/koneksi.php";
                    $query = mysqli_query($con, "SELECT * FROM produk");
                    $jsArray = "var prdName = new Array();";
                    echo'
                      <select class="form-control" name="nama_produk" onchange="document.getElementById(\'prd_name\').value = prdName[this.value]">
                        <option value="">Pilih Produk</option>';
                    while ($row = mysqli_fetch_assoc($query)){
                      echo '
                        <option value="' . $row['nama_produk'] . '">' . $row['nama_produk'] . '</option>';  
                        $jsArray .= "prdName['" . $row['nama_produk'] . "'] = '" . addslashes($row['harga_produk']) . "';";
                    }
					?>
				     </select>
					</div>
				<div class="form-group">
				 <label>Harga</label>
					<input name="harga_jual" id="prd_name" type="number"  min="0" class="form-control" placeholder="Jumlah terjual"  onchange="math()" readonly>
				<script type="text/javascript">  
                <?php echo $jsArray; ?>  
                </script>
				</div>	
				<div class="form-group">
				 <label>Terjual</label>
					  <input class="form-control" name="jumlah_penjualan" id="jumlah_penjualan" type="number" aria-describedby="nameHelp" placeholder="*cth:3" onchange="math()">
				</div>	
				<div class="form-group">
				 <label>Total</label>
					<input class="form-control" name="total_penjualan" id="total_penjualan" type="number" aria-describedby="emailHelp" onchange="math()"  readonly>
				</div>
			    </div>   
					<a href=""><button type="submit" class="btn btn-info btn-md btn-block">Tambah</button></a>
					<br>
					<a href=""><button type="submit" class="btn btn-danger btn-md btn-block">Batal</button></a>
			</form>   					
					</div>
				</div>           
            </div>

             <div class="col-md-5">
                 <div class="card">
                    <div class="card-header">
                         <strong class="card-title">Penjualan<i class="fa fa-shopping-cart"></i></strong>
                    </div>
                     <div class="card-body"> 
							<?php
								$query = mysqli_query($con, "SELECT DISTINCT date from keranjang_penjualan");
								while($m = mysqli_fetch_array($query))
								{ 
									$date=  $m['date']		
							?>
								<table id="myTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="30%"><center><?php print $date;?></center></th>
                                        </tr>
                                    </thead>
									
									<?php
									$query2 = mysqli_query($con, "SELECT * FROM keranjang_penjualan where date='$date'");
									while($o = mysqli_fetch_array($query2))
									{
										$nama_produk = $o['nama_produk'];
										$jumlah_penjualan = $o['jumlah_penjualan'];
										$nama_toko = $o['nama_toko'];	
									?>
                                    <tbody>
									<td width="30%"><center><small><?php print $o['nama_toko'];?></small></center></td>
											<td width="30%"><center><small><?php print $o['nama_produk'];?></small></center></td>
                                            <td width="10%"><center><small><?php print $o['jumlah_penjualan'];?></small></center></td>
                                            <td width="10%"><center>
											<a href="../Controller/ProsesPenjualan.php?aksi=hapus&date=<?php print $date;?>"   onClick="return confirm('Apakah Anda benar-benar mau hapus penjualan ini?')"><button class="btn btn-warning btn-sm"><i class="fa fa-trash-o "></i></button></a>
											</center></td>
                                    </tr>
                                    </tbody>
									<?php }?>	
									<thead>
                                        <tr>
                                            <th><center><small><a href="../Controller/ProsesPenjualan.php?aksi=tambah&date=<?php print $date;?>"><button class="btn btn-info btn-sm btn-block">Tambah Penjualan</button></a></center></th>
											
                                        </tr>
										
                                    </thead>
                                </table>
											<?php }?>
								<br><br>
								
                            </div>
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
 