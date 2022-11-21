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

include "../Class/ClassPreOrder.php";

$preorder = new PreOrder;
?>

<head>


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script>  
	$(document).ready(function(){  
		var i=1;  
			$('#add').click(function(){  
				i++;  
				$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="number" name="name[]" placeholder="Tanggal" class="form-control name_list" min="1" max="31"/></td><td><input type="number" name="jmlh[]" placeholder="Jumlah" class="form-control jmlh_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn-sm btn-warning btn_remove">X</button></td></tr>');  
			});  
			$(document).on('click', '.btn_remove', function(){  
				var button_id = $(this).attr("id");   
				$('#row'+button_id+'').remove();  
			});  
	});  
		</script>
</head>

<body>
       <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Plan Produksi</h1>
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
                                <i class="fa fa-edit"></i><strong>&nbsp;Ubah Data Pre Order</strong>
					
                            </div>
                            <div class="card-body">
                          
						<div id="right-panel" class="right-panel">
                            </div>
							<form action="../Controller/ProsesOrder.php?aksi=update" method="post" class="form-horizontal">
								<div class="card-body">
								<?php 
							
						$kode=$_GET['kode'];
						 $preorder->TampilSatuData($kode);
						?>	
									<div class="form-group">
									
											<label>Kode</label>
											<input name="kode" type="text" class="form-control" readonly="" value="<?php echo $preorder->kode;?>">
										</div>
									<div class="form-group">
									
											<label>Produk</label>
											<input name="kode_produk" type="text" class="form-control" readonly="" value="<?php echo $preorder->kode_produk;?>">
										</div>
										<div class="form-group">
											<label>Tanggal</label>
											<input name="tgl" type="text" class="form-control" readonly="" value="<?php echo $preorder->tgl;?>">
										</div>
										<div class="form-group">
											<label>Jumlah (pcs)</label>
											<input name="jumlah" type="number" class="form-control" value="<?php echo $preorder->jumlah;?>" required oninvalid="this.setCustomValidity('jumlah tidak boleh kosong')" oninput="setCustomValidity('')" min=1"/>
										</div>
										<button type="submit" class="btn btn-info btn-sm btn-block">Ubah Pre Order</button>
										<br>
										<a href="Schedule_input.php"><button type="button" class="btn btn-outline-link btn-md btn-block">Batal</button></a>
									</div>
									<hr>
								</div>
							</form>
                        </div>
                    </div>
                </div><!-- .row -->
            </div><!-- .animated -->
			
			
        </div><!-- .content -->
        <div class="clearfix"></div>

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
 