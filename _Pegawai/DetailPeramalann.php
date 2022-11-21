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
include "../Class/ClassPeramalan.php";

$Produk = new Produk;
 $peramalan = new Peramalan;
?>
<head>

	<link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
	   <style>
			#weatherWidget .currentDesc {
			color: #ffffff!important;
			}
			.traffic-chart {
				min-height: 335px;
			}
			#flotPie1  {
				height: 150px;
			}
			#flotPie1 td {
				padding:3px;
			}
			#flotPie1 table {
				top: 20px!important;
				right: -10px!important;
			}
			.chart-container {
				display: table;
				min-width: 270px ;
				text-align: left;
				padding-top: 10px;
				padding-bottom: 10px;
			}
			#flotLine5  {
				 height: 105px;
			}

			#flotBarChart {
				height: 150px;
			}
			#cellPaiChart{
				height: 160px;
			}
		</style>
</head>
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
                            <li class="active">Hasil Peramalan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    	 <div class="content mt-3">

<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
					<div class="col-md-5">
						<div class="card">
                            <div class="card-header">
							 <strong class="card-title">Tampilkan Peramalan Berdasarkan</strong>
						 </div>
							<div class="card-body">
							<form method="POST" action="DetailPeramalann.php">
							<table> 
							<tr> 
								<td><select name="kode_produk" class="form-control">
									<option> Pilih Produk </option>
									<?php
									$i=0; 
									$data=$Produk->TampilSemua();
									if($data!=0){
									foreach($data as $m){
									$i++;  
									?>	
									<option value="<?php echo $m['kode_produk']; ?>"> <?php print $m['kode_produk']."  ".$m['nama_produk']; ?>
									<?php }} ?>
									</option>
									</select>
								</td>
							</tr>
								<td></td>
							<tr>
								<td><select name="tahun" class="form-control">
									<option> Pilih Tahun </option>
									<?php
									$i=0; 
									$data=$peramalan->TampilTahun();
									if($data!=0){
									foreach($data as $m){
									$i++;  
									?>	
  									<option value="<?php echo $m['tahun']; ?>"> <?php print $m['tahun']; ?>
  									<?php }} ?>
									</option>
									</select>
								</td>	
							</tr>
							<tr>
							<td><select name="bulan" class="form-control">
								<option> Pilih Bulan </option>
								<?php
									$i=0; 
									$data=$peramalan->TampilBulan();
									if($data!=0){
									foreach($data as $m){
									$i++;  
									?>		
  								<option value="<?php echo $m['bulan']; ?>"> <?php print $m['bulan'];?>
									<?php }} ?>
								</option>
								</select>
							</td>
							</tr>
								<td width="70px" align="center"><button class="btn-sm btn-warning">Tampilkan</button></center></td> 
							</tr>
						</table>
					</form>
				</div>    
              </div>  
           </div>
               <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <?php
							
							$kode_produk = $_REQUEST['kode_produk'];
							$tahun = $_REQUEST['tahun'];
							$tahun_depan = $tahun + 1;
							$bulan = $_POST['bulan'];
							
									$i=0; 
									$data=$Produk->TampilSemuaData($kode_produk);
									if($data!=0){
									foreach($data as $m){
									$i++;  
								
        						$nama_produk = $m['nama_produk'];	
  							?>
                        </div>
					 <center>	
					 <div class="card-header">
                        <strong class="card-title"><small><b>Grafik Perbandingan Produk <?php print $nama_produk;?> <?php print $bulan;?> <?php print $tahun;?></b></small></strong>
                     </div>
						<?php } ?>
                     <div class="chart-wrapper mt-4">
                         <canvas id="team-chart"></canvas>
                     </div>
					</center>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
		<div class="col-md-12">
            <div class="card">
                <div class="card-header">
                     <strong class="card-title">Detail Peramalan</strong>
				</div>
                     <div class="card-body">
					 <small><table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                     <thead>
                            <tr>                                  
                                <th class="serial"><center>&nbsp;</center></th>
                                <th><center><small>Produk</small></center></th>
								<!-- Print Header Tabel -->
								<?php
									include '../Controller//koneksi.php';
									$kode_produk = $_REQUEST['kode_produk'];
									$tahun = $_REQUEST['tahun'];
									$bulan = $_REQUEST['bulan'];
									$tahunperamalan = 0;
									
									$data=$peramalan->TampilHasil($kode_produk,$tahun,$bulan);
									if($data!=0){
									foreach($data as $m){
									$i++;  
									
									$tahunperamalan = (int) $m['tahun'];
									$tahunperamalan++;
								?>
								<th><center><small><?php print $m['bulan'];?> <br> <?php print $tahunperamalan; }?>
                            </tr>
						<tbody>
                            <tr>
								<?php
									$kode_produk = $_REQUEST['kode_produk'];
                              		$i=0;
                             		 
									$data=$Produk->TampilSemuaData($kode_produk);
									if($data!=0){
									foreach($data as $m){
									$i++; 
                              	?>
									<td><center><small></small></center></td>
                                    <td><center><small><?php print $m['kode_produk'];?> <?php print $m['nama_produk'];?> </small></center></td>
											<!-- Print Hasil Peramalan Produk -->										
									<?php }}?>
								<?php
									$data=$peramalan->TampilHasil($kode_produk,$tahun,$bulan);
									if($data!=0){
									foreach($data as $m){
									$i++; 
										$peramalan= $m['peramalan'];
										$jumlah = $m['jumlah'];
								?>
									<td><center><small><?php print $m['peramalan'] . "<small>pcs</small>";}}?></small></center></td>
                            </tr>
							<!-- Print Daftar Bahan Baku -->	
								<?php
									$i=0;
                             		 
									$data=$Produk->TampilSemuaData($kode_produk);
									if($data!=0){
									foreach($data as $m){
									$banyak_produksi= $m['banyak_produksi'];
									?>
								<?php
								
									$i = 0;
									$final = 0;
									$unit ="";
									$kode = "";
									$tampil = "";
									$data=$Produk->TampilSemuaBB($kode_produk);
									if($data!=0){
									foreach($data as $m){
									
											$i++;
											$jumlah_penggunaan = $m['jumlah_penggunaan'];
														
								?>
								<tr>
											
										<td><center><small><?php print $i;?></small></center></td>
										<td><center><small><?php print $m['nama_bahan_baku'];?></small></center></td>
											<?php
												$query1 = mysqli_query($con, "SELECT * FROM peramalan_penjualan WHERE tahun='$tahun' and kode_produk='$kode_produk' and bulan='$bulan';");
												while($m1 = mysqli_fetch_array($query1)){
												$peramalan = $m1['peramalan'];
												$final = round (($jumlah_penggunaan * $peramalan / $banyak_produksi),1);
											?>
												<td><center><small><?php print $final;?>&nbsp;<?php print $m['satuan'];?></small></center></td>
											<?php
														}
													}}}}
												}
									}	?>
                                 </tr>
							</tbody>
                       </thead>
                     </tbody>
                    </table> </small>
					</div>
				</div>
	
	<div class="clearfix"></div>
	
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
   


<!--  Chart js -->
		<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>
		<!--Chartist Chart-->
		<script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
		<script src="assets/js/init/weather-init.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
		<script src="assets/js/init/fullcalendar-init.js"></script>
		
		<script>
      ( function ( $ ) {
    "use strict";

    //Team chart
    var ctx = document.getElementById( "team-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
              labels: ['#', <?php print "'".$bulan."'";?>, '#'],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                label: "Hasil Peramalan",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [0,<?php print $peramalan;?>,0]
                    },
                    {
                data: [0,<?php print $jumlah;?>,0],
                label: "Jumlah Penjualan",
             backgroundColor: 'rgba(0,194,146,.25)',
                borderColor: 'rgba(0,194,146,0.5)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
         pointBackgroundColor: 'rgba(0,194,146,0.5)',
                    }, ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
           hover: {
                            mode: 'nearest',
                            intersect: true

            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Jumlah'
                    }
                        } ]
            },
            title: {
                display: false,
            }
        }
    } );


 



} )( jQuery );
		</script>
</body>

</html>
 