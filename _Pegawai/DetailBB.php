
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
include "../Class/ClassBahanBaku.php";

$bahanBaku = new bahanBaku;
 
$kode_bahan_baku=$_GET['kode_bahan_baku'];
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
                            <li><a href="#">Detail</a></li>
                            <li class="active">Detail Bahan Baku</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
					
						</div>
					<div class="panel-body">
					<br>
					
                      <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered" id="example">
						<thead>
                              <tr> 
                              	<td colspan="4" align="center"> <h6><b>Detail Penggunaan Bahan Baku </b></h6></td>
                              </tr>
                              <tr>
							  <td align="center" width="300px"> <b>Tanggal</b> </td>
							  	<td align="center" width="300px"> <b>Jumlah </b></td>
							  	<td align="center" width="300px"><b> Status</b> </td>
							  </tr>
                        </thead>
                        <tbody>
                              <tr>
								<?php
								$i=0; 
								$data=$bahanBaku->TampilPenggunaan($kode_bahan_baku);
								if($data!=0){
								foreach($data as $m){
									$i++;  
								?>	
							  </tr>
							  <tr>
									<td align="center"><?php print $m['tgl_penggunaan']; ?></td>
								<td align="center"><?php print $m['jumlah_penggunaan']; ?></td>
								<td align="center"><?php print $m['status_penggunaan']; ?></td>
								<?php }} ?>
							 </tr>
                        </tbody>
                    </table>
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

