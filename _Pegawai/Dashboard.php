<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<?php include "../menu.php";
include "../Controller/koneksi.php";
include "../Class/ClassPeramalan.php";
include "../Class/ClassProduk.php";
include "../Class/ClassPorel.php";

$Porel = new Porel;
$Produk = new Produk;
$peramalan = new Peramalan;
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ayam Geprek Family</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/Chart.js"></script>

    




    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->


   
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
                 
                         
                        </ol>
                    </div>
                </div>
            </div>
        </div>

		<div class='col-sm-12'>
		  <button type="button" class="btn btn-outline-secondary btn-lg btn-block bg-flat-color-2"> 
		  <h4>SISTEM MANUFAKTUR</h4>	
		  <?php echo date('l');?> , <?php echo date('M d, Y');?>
		  <br>
		  
		  <?php date_default_timezone_set('Asia/Jakarta'); echo date("H:i:s");?>
		  </button>
				
				<br><br>
			
			
<div class="col-sm-12 mb-7">
        <div class="card-group">
            <div class="card col-lg-4 col-md-9 no-padding bg-flat-color-1">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="ti-package text-light"></i>
                    </div>
					 <?php include "../Controller/koneksi.php";  
								$jumlahProduk1 = mysqli_query($con, "SELECT COUNT(kode_produk) as kode_produk FROM produk");
								$jumlahProduk= mysqli_fetch_array($jumlahProduk1);
								$jumlahProduk2 = $jumlahProduk['kode_produk']; 
								
							?>
                    <div class="h4 mb-0 text-light">
                        <span class="count"><?php echo $jumlahProduk2; ?></span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Jumlah Produk</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-4 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-3">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="ti-tag text-light"></i>
                    </div>
					 <?php include "../Controller/koneksi.php";  
								$jumlahSupplier1 = mysqli_query($con, "SELECT COUNT(kode_bahan_baku) as kode_bahan_baku FROM bahanbaku");
								$jumlahSupplier= mysqli_fetch_array($jumlahSupplier1);
								$jumlahSupplier2 = $jumlahSupplier['kode_bahan_baku']; 
							
							?>
                    <div class="h4 mb-0 text-light">
                          <span class="count"><?php echo $jumlahSupplier2; ?></span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Bahan Baku</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-4 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-4">
                    <div class="h1 text-right mb-4">
                        <i class="fa fa-cart-plus text-light"></i>
                    </div>
						<?php
						$bulan_ini = date('m');
						switch ($bulan_ini){
						case 1:
							$nama = "Januari";
							break;
						case 2:
							$nama = "Februari";
							break;
						case 3:
							$nama = "Maret";
							break;
						case 4:
							$nama = "April";
							break;
						case 5:
							$nama = "Mei";
							break;
						case 6:
							$nama = "Juni";
							break;
						case 7:
							$nama = "Juli";
							break;
						case 8:
							$nama = "Agustus";
							break;
						case 9:
							$nama = "September";
							break;
						case 10:
							$nama = "Oktober";
							break;
						case 11:
							$nama = "November";
							break;
						case 12:
							$nama = "Desember";
							break;
						default:
							$nama = "";
							break;
						}
					?>
	
					<?php include "../Controller/koneksi.php";  
											$tahun = date('Y') ;
								
								
								$jumlahSupplier1 = mysqli_query($con, "SELECT SUM(jumlah_penjualan) as total FROM penjualan where bulan='$bulan_ini' and tahun='$tahun'");
								$jumlahSupplier= mysqli_fetch_array($jumlahSupplier1);
								$jumlahSupplier2 = $jumlahSupplier['total']; 
							
							?>
                    <div class="h4 mb-0 text-light">
					
                         <span class="count"><?php echo $jumlahSupplier2; ?></span>
                    </div>
                    <small class="text-light text-uppercase font-weight-bold">Terjual</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
            <div class="card col-lg-4 col-md-6 no-padding no-shadow">
                <div class="card-body bg-flat-color-5">
                    <div class="h1 text-right text-light mb-4">
                        <i class="ti-wallet"></i>
						<?php
						$bulan_ini = date('m');
						switch ($bulan_ini){
						case 1:
							$nama = "Januari";
							break;
						case 2:
							$nama = "Februari";
							break;
						case 3:
							$nama = "Maret";
							break;
						case 4:
							$nama = "April";
							break;
						case 5:
							$nama = "Mei";
							break;
						case 6:
							$nama = "Juni";
							break;
						case 7:
							$nama = "Juli";
							break;
						case 8:
							$nama = "Agustus";
							break;
						case 9:
							$nama = "September";
							break;
						case 10:
							$nama = "Oktober";
							break;
						case 11:
							$nama = "November";
							break;
						case 12:
							$nama = "Desember";
							break;
						default:
							$nama = "";
							break;
						}
					?>
	
					<?php include "../Controller/koneksi.php";  
											$tahun = date('Y') ;
								
								
								$jumlahSupplier1 = mysqli_query($con, "SELECT SUM(total_penjualan) as total FROM penjualan where bulan='$bulan_ini' and tahun='$tahun'");
								$jumlahSupplier= mysqli_fetch_array($jumlahSupplier1);
								$jumlahSupplier2 = $jumlahSupplier['total']; 
							
							?>
						
                    </div>
                    <div class="h4 mb-0 text-light">
                      <span class="count">Rp. <?php echo number_format($jumlahSupplier2); ?></span>
                    </div>
                    <small class="text-uppercase font-weight-bold text-light">Pendapatan</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                </div>
            </div>
           

    </div>
	   </div>
				
	


	<?php
				include "../Controller/koneksi.php";
				$query1 = mysqli_query($con, "SELECT * from porel INNER JOIN bahanbaku ON porel.kode_bahan_baku=bahanbaku.kode_bahan_baku");
				while($m = mysqli_fetch_array($query1))
				{ 
					$bulan = $m['bulan'];
					$porel = $m['tanggal'];
					$ambilPorel = substr($porel, 3, 2);
					$status = $m['status'];
											
					if($ambilPorel == $bulan){
						$tanggal = $m['tanggal'];
						$tgl = new DateTime(date("Y-m-d", strtotime($tanggal)));
						$today =  new DateTime(date("Y-m-d"));
						$diff = $today->diff($tgl);
						$diff->d;
												
						if ((($diff->d) <= 1) AND ($status ==0)){
						?>
						<br>

								
							<?php
						}
						
						

					}
				}
			?>
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">	
							<strong class="card-title">Grafik Persediaa Bahan Baku</strong>
                            </div>
							<div class="card-body">
							<canvas id="myChart"></canvas>
							<?php include "../Controller/koneksi.php"; 
							$nama_bahan_baku  = mysqli_query($con, "SELECT nama_bahan_baku FROM bahanbaku order by kode_bahan_baku asc");
							$jumlah_bahan_baku  = mysqli_query($con, "SELECT jumlah_bahan_baku FROM bahanbaku order by kode_bahan_baku asc");
							?>
							<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: [<?php while ($p = mysqli_fetch_array($nama_bahan_baku)) { echo '"' . $p['nama_bahan_baku'] . '",';}?>],
            datasets: [{
                label:'Data Bahan Baku ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)','rgb(370, 130, 130)','rgb(75, 138, 113)','rgb(113, 70, 0.87)','rgb(165, 138, 39)','rgb(238, 117, 0.87)','rgb(275, 113, 130)','rgb(130, 80, 0.85)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php while ($p = mysqli_fetch_array($jumlah_bahan_baku)) { echo '"' . $p['jumlah_bahan_baku'] . '",';}?>]
            }]
        },

        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>				
							</div>
						</div>
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
                                <strong class="card-title"></strong>
							
										<?php
        				$i=0; 
                        $data=$Porel->TampilSemuaPorel();
                        if($data!=0){
                          foreach($data as $m){
                            $i++;  
        				
										$bulan = "";
										$bulan_angka = $m['bulan'];
											if ($bulan_angka == 01){
												$bulan = "Januari";
											}if ($bulan_angka == 02){
												$bulan = "Februari";
											}if ($bulan_angka == 03){
												$bulan = "Maret";
											}if ($bulan_angka == 04){
												$bulan = "April";
											}if ($bulan_angka == 05){
												$bulan = "Mei";
											}if ($bulan_angka == 06){
												$bulan = "Juni";
											}if ($bulan_angka == 07){
												$bulan = "Juli";
											}if ($bulan_angka == 08){
												$bulan = "Agustus";
											}if ($bulan_angka == 09){
												$bulan = "September";
											}if ($bulan_angka == 10){
												$bulan = "Oktober";
											}if ($bulan_angka == 11){
												$bulan = "November";
											}if ($bulan_angka == 12){
												$bulan = "Desember";
											}
											
											$hari_ini = date('Y');
									
						}}
								?>	
								
                   <strong class="card-title">Jadwal Pemesanan Bahan Baku</strong>
                            </div>
							
                            <div class="card-body">
                               <small>        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="serial"><center>Bahan Baku</center></th>
                                            <th><center>Jadwal pemesanan</center></th>
											<th><center>hari lagi</center></th>
                                            <th><center>Jumlah Pemesanan</center></th>
											
											   <th><center>Satuan</center></th>
											     <th><center>Status</center></th>
                                        </tr>
                                    </thead>
                                   <?php
        				$i=0; 
						$temp="";
                        $data=$Porel->TampilSemuaPorel();
                        if($data!=0){
                          foreach($data as $m){
                            $i++;  
											$satuan = $m['satuan'];
											$bahanbaku = $m['nama_bahan_baku'];
											$bulan = $m['bulan'];
											$lotsize = $m['lotsize'];
											$status = $m['status'];
											
											$porel = $m['tanggal'];
											$ambilPorel = substr($porel, 3, 2);
											
											if($ambilPorel == $bulan){
												$tanggal = $m['tanggal'];
												$tgl = new DateTime(date("Y-m-d", strtotime($tanggal)));
												$today =  new DateTime(date("Y-m-d"));
												$diff = $today->diff($tgl);
												$diff->d;
										
									
												
									?>
									
                                    <tbody>
                                        <tr>
											<td><center><?php if($bahanbaku != $temp){ print $bahanbaku; ; $temp = $bahanbaku;}else{ ?><font color="#f2f2f2"><?php print $bahanbaku;}?></font></center></td>
											<td><center><span class="badge badge-danger"><?php print $porel;?> </span></center></td>
											<td><center>
												<?php
													$skrg = date('d');
													$porel_tgl = substr($porel, 0, 2);
													
													if($porel_tgl < $skrg){
														print 'Hari Pemesanan Sudah Lewat';
													}
													else if($porel_tgl == $skrg){
														print 'Pesan hari ini';
													}
													else{
														print $diff->d;
													}
												?>
											</center></td>
											
											
											<td><center><?php print $lotsize; ?></center></td>
											<td><center><?php print $satuan; ?></center></td>
											<td><center><span class="badge badge-danger">
												<?php 
													if($status == 0){
														print  'Pemesanan Belum Dilakukan';
													}
													else{
														print  'Pemesanan Sudah dilakukan';
													}
												?>
											</center></td> </span>
                                        </tr>
									<?php 	
											} 
						}}
									?>
                                      
									
                                    </tbody>
                                </table></small>

					</div>
				</div>

			
			
			
			
			
						
	
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
	<script src="js/Chart.js"></script>


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
		
		<script src="https://cdnjs.com/libraries/Chart.js"></script>
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
		<script src="../assets/js/init/fullcalendar-init.js"></script>
	

		<script>
     ( function ( $ ) {
    "use strict";

     //Team chart
    var ctx = document.getElementById( "team-chart" );
    ctx.height = 150;
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
            type: 'line',
            defaultFontFamily: 'Montserrat',
            datasets: [ {
                 label: "Hasil Peramalan",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ <?php print $f_jan;?>, <?php print $f_feb;?>, <?php print $f_mar;?>, <?php print $f_apr;?>, <?php print $f_mei;?>, <?php print $f_jun;?>, <?php print $f_jul;?>, <?php print $f_agt;?>,  <?php print $f_sep;?>, <?php print $f_okt;?>, <?php print $november_f;?>, <?php print $f_des;?>,  ]
                    },
                    {
                data: [ <?php print $d_jan;?>,<?php print $d_feb;?>,<?php print $d_mar;?>,<?php print $d_apr;?>,<?php print $d_mei;?>,<?php print $d_jun;?>,<?php print $d_jul?> ,<?php print $d_agt;?> ,<?php print $d_sep;?>, <?php print $d_okt;?>,
				<?php print $november_d;?>,<?php print $d_des;?>  ],
                label: "Data Penjualan",
                backgroundColor: 'rgba(0,194,146,.25)',
                borderColor: 'rgba(0,194,146,0.5)',
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
            
            
                    },

				{
                data: [ <?php print $data_jan;?>, <?php print $data_feb;?>, <?php print $data_mar;?>, <?php print $data_apr;?>, <?php print $data_mei;?>, <?php print $data_jun;?>, <?php print $data_jul;?> , <?php print $data_agt;?>, <?php print $data_sep;?>,<?php print $data_okt;?>,<?php print $data_nov;?>,<?php print $data_des;?>],
                label: "Data Aktual",
                borderColor: "rgba(40, 169, 46, 0.9)",
                backgroundColor: "rgba(40, 169, 46, .5)",  
                borderWidth: 3.5,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: 'transparent',
             
                    },
					]
        },
        options: {
            responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
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
                        labelString: 'Value'
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
	
	
	
	
	
	
	

</body>

</html>
 