<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<?php include "../menu.php" ?>
<?php include "../Controller/koneksi.php"?>

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
                            <li><a href="#">Peramalan</a></li>
                            <li class="active">Input Peramalan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    	 <div class="content mt-3">
<div class="row">
			<div class="col-md-12">
					<div class="panel-body">
						<form action="../Controller/ProsesPeramalan.php" method="post" class="form-horizontal">
													<div class="row form-group">
														<div class="col col-sm-2">
															<center></center>
														</div>
														<div class="col col-sm-2">
														
													<?php include "../Controller/koneksi.php";
															$min = "2022";
															$kode_produk= $_GET['kode_produk'];
															$ambilMin = mysqli_query($con, "SELECT substr((max(ID)), 1, 4) as maxKode FROM peramalan_penjualan where kode_produk='$kode_produk'");
															$ambilMin1 = mysqli_fetch_array($ambilMin);
															$ambil = $ambilMin1['maxKode'];
															$tambahambil = (int) $ambil + 1;
														
													?>
												
													<?php include "../Controller/koneksi.php";
										
													$query = mysqli_query($con, "SELECT * from produk where kode_produk='$kode_produk'");
													while($m = mysqli_fetch_array($query))
													{
														$nama_produk = $m['nama_produk'];
													}														
														?>
                              
														<input name="kode_produk" type="text" class="form-control" placeholder="Kode Produk" readonly="" type="text" value="<?php echo $kode_produk; ?>">
														<input name="nama_produk" type="text" class="form-control" placeholder="Kode Produk" readonly="" type="text" value="<?php echo $nama_produk; ?>">														
														<input name="tahun" type="text" value="<?php if($ambil == null){print $min;}else{print $tambahambil;} ?>" readonly="" placeholder="Tahun" class="form-control">
															
															
															
														</div>
													</div>
													<!-- Januari -->
										
													<?php
													$tahun_ini = date('Y') ;
													
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '01' and tahun='$tahun_ini' and nama_produk='$nama_produk'");
													$temp = mysqli_fetch_array($query);
													$jan = $temp['Jumlah'];
													
													if($jan == null){ $jan = 0; } else { $jan = $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="jan" type="text" placeholder="Januari" value="Januari" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah1" value="<?php print $jan;?>" readonly="" type="number" class="form-control">
														</div>
													</div>
													
												<!-- Maret-->
													<?php
													$tahun_ini = date('Y') ;
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '02' and tahun='$tahun_ini' and nama_produk='$nama_produk'");
													$temp = mysqli_fetch_array($query);
													$feb= $temp['Jumlah'];
													
													if($feb== null){ $feb = 0; } else { $feb= $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="feb" type="text" placeholder="Februari" value="Februari" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah2" value="<?php print $feb;?>" readonly="" type="number" placeholder="Jumlah Produk Terjual" class="form-control">
														</div>
													</div>
													
													
													<!-- Maret-->
													<?php
													$tahun_ini = date('Y') ;
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '03' and tahun='$tahun_ini' and nama_produk='$nama_produk'");
													$temp = mysqli_fetch_array($query);
													$mar= $temp['Jumlah'];
													
													if($mar== null){ $mar = 0; } else { $mar= $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="mar" type="text" placeholder="Maret" value="Maret" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah3" value="<?php print $mar;?>" readonly="" type="number" placeholder="Jumlah Produk Terjual" class="form-control">
														</div>
													</div>
													
													<!-- April-->
													<?php
													$tahun_ini = date('Y') ;
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '04' and tahun='$tahun_ini' and nama_produk='$nama_produk'");
													$temp = mysqli_fetch_array($query);
													$apr = $temp['Jumlah'];
													
													if($apr== null){ $apr= 0; } else { $apr = $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="apr" type="text" placeholder="April" value="April" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah4" value="<?php print $apr;?>"  readonly="" type="number" placeholder="Jumlah Produk Terjual" class="form-control">
														</div>
													</div>
													
													<!-- Mei -->
													<?php
													$tahun_ini = date('Y') ;
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '05' and tahun='$tahun_ini' and nama_produk='$nama_produk'");
													$temp = mysqli_fetch_array($query);
													$mei = $temp['Jumlah'];
													
													if($mei== null){ $mei = 0; } else { $mei = $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="mei" type="text" placeholder="Mei" value="Mei" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah5" value="<?php print $mei;?>" readonly="" type="number" placeholder="Jumlah Produk Terjual" class="form-control">
														</div>
													</div>
													
													<!-- Juni -->
													<?php
													$tahun_ini = date('Y') ;
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '06' and tahun='$tahun_ini'  and nama_produk='$nama_produk'");
													$temp = mysqli_fetch_array($query);
													$jun = $temp['Jumlah'];
													
													if($jun== null){ $jun = 0; } else { $jun = $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="jun" type="text" placeholder="Juni" value="Juni" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah6" value="<?php print $jun;?>" readonly="" type="number" placeholder="Jumlah Produk Terjual" class="form-control">
														</div>
													</div>
													
													<!-- Juli -->
													<?php
													$tahun_ini = date('Y') ;
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '07' and tahun='$tahun_ini'  and nama_produk='$nama_produk'");
													$temp = mysqli_fetch_array($query);
													$jul = $temp['Jumlah'];
													
													if($jul == null){ $jul = 0; } else { $jul = $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="jul" type="text" placeholder="Juli" value="Juli" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah7" value="<?php print $jul;?>" readonly="" type="number" placeholder="Jumlah Produk Terjual" class="form-control">
														</div>
													</div>
													
													<!-- Agustus-->
													<?php
													$tahun_ini = date('Y') ;
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '08' and tahun='$tahun_ini' and nama_produk='$nama_produk' ");
													$temp = mysqli_fetch_array($query);
													$agst = $temp['Jumlah'];
													
													if($agst == null){ $agst = 0; } else { $agst = $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="agt" type="text" placeholder="Agustus" value="Agustus" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah8" value="<?php print $agst;?>" readonly="" type="number" placeholder="Jumlah Produk Terjual" class="form-control">
														</div>
													</div>
													
													<!-- September -->
													<?php
													$tahun_ini = date('Y') ;
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '09' and tahun='$tahun_ini'  and nama_produk='$nama_produk' ");
													$temp = mysqli_fetch_array($query);
													$sep = $temp['Jumlah'];
													
													if($sep == null){ $sep = 0; } else { $sep= $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="sep" type="text" placeholder="September" value="September" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah9" value="<?php print $sep;?>" readonly="" type="number" placeholder="Jumlah Produk Terjual" class="form-control">
														</div>
													</div>
													
													<!-- Oktober -->
													<?php
													$tahun_ini = date('Y') ;
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '10' and tahun='$tahun_ini' and nama_produk='$nama_produk'");
													$temp = mysqli_fetch_array($query);
													$okt = $temp['Jumlah'];
													
													if($okt == null){ $okt = 0; } else { $okt= $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="okt" type="text" placeholder="Oktober" value="Oktober" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah10" value="<?php print $okt;?>" readonly="" type="number" placeholder="Jumlah Produk Terjual" class="form-control">
														</div>
													</div>
													
													<!-- November -->
													<?php
													$tahun_ini = date('Y') ;
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '11' and tahun='$tahun_ini' and nama_produk='$nama_produk'");
													$temp = mysqli_fetch_array($query);
													$nov = $temp['Jumlah'];
													
													if($nov == null){ $nov = 0; } else { $nov = $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="nov" type="text" placeholder="November" value="November	" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah11" value="<?php print $nov;?>" readonly="" type="number" placeholder="Jumlah Produk Terjual" class="form-control">
														</div>
													</div>
													
													<!-- Desember -->
													<?php
													$tahun_ini = date('Y') ;
													$query= mysqli_query($con, "SELECT SUM(jumlah_penjualan) as Jumlah FROM penjualan WHERE bulan = '12' and tahun='$tahun_ini' and nama_produk='$nama_produk'");
													$temp = mysqli_fetch_array($query);
													$des = $temp['Jumlah'];
													
													if($des == null){ $des = 0; } else { $des = $temp['Jumlah']; };
													?>
													<div class="row form-group">
														<div class="col col-sm-2">
															<input name="des" type="text" placeholder="Desember" value="Desember" readonly="" class="form-control">
														</div>
														<div class="col col-sm-4">
															<input name="jumlah12" value="<?php print $des;?>" readonly="" type="number" placeholder="Jumlah Produk Terjual" class="form-control">
														</div>
													</div>
													<div class="row form-group">
														
														<div class="col col-sm-6">
														
																<?php
																$hari_ini = date('d-m-Y');
																$tahun_ini = date('Y');
																$akhir_tahun = '31-12-'.$tahun_ini;
																if ($hari_ini == $akhir_tahun)
																{
																?>
																<a href=""  onClick="return confirm('Apakah Anda benar-benar melakukan peramalan produk ini?')"><button type="submit" class="btn btn-info btn-md btn-block">Ramal</button></a>
																		<small><small>catatan: peramalan hanya dilakukan sekali di akhir tahun</small></small>
																<?php
																}
																else{
																?>
																<a href=""  onClick="return confirm('Apakah Anda benar-benar melakukan peramalan produk ini?')"><button type="submit" disabled="" class="btn btn-info btn-md btn-block">Ramal</button></a>
																		<small><small>catatan: peramalan hanya dilakukan sekali di akhir tahun</small></small>
																<?php
																}
																?>
																
															</div>
														</div>
													</div>
												</form>
					</div>
				</div>
			</div>
		</div><!--/.row-->
			
	
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
 