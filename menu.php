<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<?php 
	session_start();
	$_SESSION['nama_user'];
	$_SESSION['id'];
	$_SESSION['role'];
	include "Controller/koneksi.php";
	include "_cek.php";

	?>
	

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ayam Geprek Family</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">

	
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

	
	
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel bg-info">
        <nav class="navbar navbar-expand-sm navbar-dark bg-info">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><font color='white'>Ayam Geprek Family</font></a>
                <a class="navbar-brand hidden" href="./"><img src="images/login.png"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="Dashboard.php"> <i class="menu-icon fa fa-dashboard"></i><font color='white'>Dashboard</font></a>
                    </li>
					   <!-- Master Data -->
                    <li class="menu-item-has-children dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true" id="#"> <i class="menu-icon fa fa-book"></i><font color='white'>Master Data</font></a>
                        <ul class="sub-menu children dropdown-menu bg-info" id="#">
                            <li><i class="fa fa-list-alt"></i><a href="DataBahanBaku.php">Data Bahan Baku</a></li>
							<li><i class="fa fa-list-alt"></i><a href="DataProduk.php">Data Produk</a></li>
                            <li><i class="fa fa-list-alt"></i><a href="DataSupplier.php">Data Supplier</a></li>
							<li><i class="fa fa-list-alt"></i><a href="DataToko.php">Data Toko</a></li>
							<li><i class="fa fa-list-alt"></i><a href="DataProduksi.php">Data Produksi</a></li>
							<li><i class="fa fa-list-alt"></i><a href="DataPembelian.php">Data Pembelian</a></li> 
                        </ul>
                  
					   <!-- Peramalan -->
					<li class="menu-item-has-children dropdown active">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart-o"></i><font color='white'>Peramalan</font></a>
                        <ul class="sub-menu children dropdown-menu bg-info">
                           <li><i class="fa fa-pencil"></i><a href="DataPeramalan.php">Input Peramalan</a></li>
						   <li><i class="fa fa-id-badge"></i><a href="DetailPeramalan.php">Hasil Peramalan</a></li>
                        </ul>
                    </li>
						     <!-- MRP -->
					<li class="menu-item-has-children dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i><font color='white'>Perencanaan</font></a>
                        <ul class="sub-menu children dropdown-menu bg-info">	        
							<li><i class="fa fa-id-badge"></i><a href="Schedule_input.php">Pre Order</a></li>
							<li><i class="fa fa-id-badge"></i><a href="Produksi.php">Produksi</a></li>
							<li><i class="fa fa-id-badge"></i><a href="MRP.php">Jadwal Pemesanan</a></li>
						</ul>
                    </li>
					
					 <!-- Supplier -->
					 <li class="menu-item-has-children dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-truck"></i><font color='white'>Pengadaan</font></a>
                        <ul class="sub-menu children dropdown-menu bg-info">
						 <li><i class="fa fa-shopping-cart"></i><a href="TambahPembelian.php">Pembelian Bahan Baku</a></li>
				
                         <li><i class="fa fa-check-circle-o"></i><a href="KonfirmasiPesanBB.php">Konfirmasi Pembelian</a></li>
                        </ul>
                    </li>
					
					 <!-- Laporan -->
					 <li class="menu-item-has-children dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-list"></i><font color='white'>Laporan</font></a>
                        <ul class="sub-menu children dropdown-menu bg-info">
                            <li><i class="fa fa-puzzle-piece"></i><a href="LaporanProduksi.php">Laporan Produksi</a></li>
                         <li><i class="fa fa-puzzle-piece"></i><a href="LaporanPenjualan.php">Laporan Penjualan</a></li>
						 <li><i class="fa fa-puzzle-piece"></i><a href="LaporanPembelian.php">Laporan Pembelian</a></li>
						 
                        </ul>
                    </li>
				
					
            </div><!-- /.navbar-collapse -->

        </nav>
    </aside><!-- /#left-panel -->
	<div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header bg-info">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class=""></a>
                    <div class="header-left">
                        <div class="form-inline">    
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" id="pesan_sedia" href="#" data-toggle="modal" data-target="#modalpesan"type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger"></span>
                            </button>
                         
                        </div>
						
						<!-- modal input -->
	<div id="modalpesan" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				
				<h6 align="left">Notifikasi Pemesanan</h6>
				<align="right"> <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> </align>
			</div>
				<div class="modal-body">
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

								<div class='col-sm-12' class='alert alert-warning'>
						 <div class='sufee-alert alert with-close alert-danger alert-dismissible fade show' role='alert'>
					
							<span class='badge badge-pill badge-warning'>Pemberitahuan Jadwal pemesanan bahan baku</span>
								<small>&nbsp; <b><?php print $m['nama_bahan_baku'];?></b> harus dilakukan 
								
								<?php
													$skrg = date('d');
													$porel_tgl = substr($porel, 0, 2);
													
													if($porel_tgl < $skrg){
														print 'Hari Pemesanan Sudah Lewat';
													}
													else if($porel_tgl == $skrg){
														print 'Pemesanan hari ini';
													}
													else{
														print $diff->d;
													}
												?>
							</small>
						
								
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div> </div>
							<?php
						}
					}
				}
			?>

		</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>						
				</div>
				
			</div>
		</div>
	</div>
				<div class="dropdown for-message">
                        <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#" ><font color='black'><b>Logout, </b> <?php echo $_SESSION['nama_user']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></font></a>
                            <img class="user-avatar rounded-circle" src="images/login.png" alt="">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../_logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
	</html>
