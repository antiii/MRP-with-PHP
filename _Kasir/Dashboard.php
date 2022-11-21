<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<?php include "../menu2.php";
include "../Controller/koneksi.php";
include "../Class/ClassPeramalan.php";
include "../Class/ClassProduk.php";

$Produk = new Produk;
$peramalan = new Peramalan; 
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ayam Geprek Family</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    




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
			<h4>SISTEM KASIR</h4>	  
		  <?php echo date('l');?> , <?php echo date('M d, Y');?>
		  <br>
		  
		  <?php date_default_timezone_set('Asia/Jakarta'); echo date("H:i:s");?>
		  </button>
				
				<br><br>
			
			
<div class="col-sm-12 mb-7">
        <div class="card-group">

            <div class="card col-lg-6 col-md-8 no-padding no-shadow">
                <div class="card-body bg-flat-color-3">
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
            <div class="card col-lg-6 col-md-8 no-padding no-shadow">
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
				
	
<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                  <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
							<?php
								$tahun_ini = date ('Y');
								$peramalan = $tahun_ini ?>
							<strong class="card-title">Peramalan <?php echo $peramalan;?></strong>
                            </div>
							<div class="card-body">
								<?php		
								$tahun_ini = date ('Y');
								$peramalan = $tahun_ini;
								
								
								$sql2 = mysqli_query($con, "SELECT DISTINCT kode_produk from peramalan_penjualan where tahun='$peramalan'");
									while($b = mysqli_fetch_array($sql2))
									{ 
										$kode_produk = $b['kode_produk'];
													
										
									?>
										<div class="col-md-4">
										
												<table>
													<thead>
														<tr>
															<th ><strong>Produk</th>
															<th>:</th>
															<?php
													
															$i=0; 
															$data=$Produk->TampilSemuaData($kode_produk);
															if($data!=0){
															foreach($data as $l){
															$i++;  
								
																$nama_produk = $l['nama_produk'];
															?>
															<th><?php echo $nama_produk;?></th>
															<?php }} ?>
														</tr>
														
													</thead>
												</table>
											<br>
										</div>
										<div class="col-md-12">
											
												<table border="1">
													<thead>
														<tr>
															<th width="20px"><center>#</center></th>
														
															<?php
															$sql3 = mysqli_query($con, "SELECT bulan from peramalan_penjualan WHERE kode_produk = '$kode_produk' and tahun='$tahun_ini'");
															while($c = mysqli_fetch_array($sql3))
															{ 
																$bulan = $c['bulan'];
															?>
															<th width="100px"><center><?php echo $bulan;?></center></th>
															<?php } ?>
														</tr>
													</thead>
													<tbody>
														<tr>
														<tr>
															<td><center>History</center></td>
															
															<?php
															$sql7 = mysqli_query($con, "SELECT jumlah from peramalan_penjualan WHERE kode_produk = '$kode_produk' and tahun='$tahun_ini'");
															while($k = mysqli_fetch_array($sql7))
															{ 
																$jumlah = $k['jumlah'];
															?>
															<td><center><?php echo round (ceil($jumlah));?></center></td>
															<?php } ?>
														</tr>
															<td><center>Peramalan</center></td>
															
															<?php
															$sql5 = mysqli_query($con, "SELECT peramalan from peramalan_penjualan WHERE kode_produk = '$kode_produk' and tahun='$tahun_ini'");
															while($e = mysqli_fetch_array($sql5))
															{ 
																$peramalan = $e['peramalan'];
															?>
															<td><center><?php echo round (ceil($peramalan));?></center></td>
															<?php } ?>
														</tr>
														
													</tbody>
												</table>
												<br>
											
										</div>
										<?php
										}
										?>
									</div> 
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
 