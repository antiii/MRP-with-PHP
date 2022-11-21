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
	include "_cek.php"
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
        <nav class="navbar navbar-expand-sm navbar-light bg-info">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><font color='white'>Ayam Geprek Family</font></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logoagf.png" alt=""></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="Dashboard.php"> <i class="menu-icon fa fa-dashboard"></i><font color='white'>Dashboard</font></a>
                    </li>
					   <!-- Bahan baku -->
                    <li class="menu-item-has-children dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="false" aria-expanded="true" id="#"> <i class="menu-icon fa fa-book"></i><font color='white'>Master Data</font></a>
                        <ul class="sub-menu children dropdown-menu bg-info" id="#">
                            <li><i class="fa fa-list-alt"></i><a href="DataPenjualan.php">Data Penjualan</a></li>
                            <li><i class="fa fa-list-alt"></i><a href="DataPembelian.php">Data Pembelian</a></li>
						    <li><i class="fa fa-list-alt"></i><a href="DataPegawai.php">Data Pegawai</a></li>
                            <li><i class="fa fa-list-alt"></i><a href="DataSupplier.php">Data Pemasok</a></li>
                            <li><i class="fa fa-list-alt"></i><a href="DataPersediaan.php">Data Persediaan</a></li>
                            <li><i class="fa fa-list-alt"></i><a href="MRP.php">Jadwal Pemesanan</a></li>
					</ul>
					
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
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
					  <span class="count bg-primary"></span>
					</button>

					<h4 class="modal-title">Notifikasi Pemesanan</h4>
				</div>
				<div class="modal-body">
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
		echo "
		
		<div class='col-sm-12' class='alert alert-warning' style='padding:5px' >
	 <div class='alert  alert-success alert-dismissible fade show' role='alert'>
		<span class='glyphicon glyphicon-info-sign'></span> 
		Stok  <a style='color:red'>". $m['nama_bahan_baku']."</a> yang tersisa sudah kurang dari <a style='color:red'>". $m['rop']."</a> <a style='color:red'>". $m['satuan']." silahkan pesan lagi !!
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
		
		</div>
		</div>";	
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
						<a class="dropdown-toggle" data-toggle="dropdown" role="button" href="#"><font color='black'><b>Logout, </b> <?php echo $_SESSION['nama_user']  ?>&nbsp&nbsp<span class="glyphicon glyphicon-user"></span></font></a>
                            <img class="user-avatar rounded-circle" src="" alt="">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="../_logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
	</html>
