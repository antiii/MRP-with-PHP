<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<body>
<?php 
include "../menu1.php";
include "../Controller/koneksi.php";
include "../Class/ClassPegawai.php";

$Pegawai= new Pegawai;

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

       <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
							<a href="TambahPegawai.php"> <p align="right"><button style="margin-bottom:20px" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Pegawai</button></p></a>
                            </div>
                            <div class="card-body">
							<small>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                        <thead>
                              <tr>                                  
                             
								    <th><center> Kode Pegawai</center></th>
								    <th><center> Nama 		</center></th>
									<th><center> Alamat </center></th>
									<th><center> No Hp </center></th>
									<th><center> Foto </center></th>
									<th><center> Aksi	 	</center></th>
                              </tr>
                              </thead>
                              <tbody>
							 
								<?php
								$i=0; 
								$data=$Pegawai->TampilSemua();
								if($data!=0){
								foreach($data as $m){
									$i++;  
        						?>	
                              <tr>
                                 <td><?php print $m['kode_user'];?></td>
                                 <td><?php print $m['nama_user']; ?></td>
								 <td><?php print $m['alamat'];?></td>
								 <td><?php print $m['no_hp'];?></td>
								 <td><?php echo "<img src='../images/".$m['foto']."' width='50' height='50'>";?>
								&nbsp;&nbsp;<a href='http://localhost/htdocs/ProyekAkhir/images/<?php print $m->foto;?>' target="_blank" rel="nofollow" class="btn btn-default btn-xs">Lihat Foto</a></td>
								<td >
                                  	<a href="Update Pegawai.php?kode_user=<?php print $m['kode_user']?>"><button class="btn btn-success btn-xs"><i class="fa fa-pencil"></i></button></a>  
                                  	<a href="../Controller/ProsesPegawai.php?aksi=hapus&kode_user=<?php print $m['kode_user']?>"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                  </td>
                              </tr> 
						<?php }} ?>
								  
                        </tbody>
                    </table>
					</small>

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
