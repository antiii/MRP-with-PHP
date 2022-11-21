<?php
class Supplier{
	public $kode_supplier;
	public $nama_supplier;
	public $alamat_supplier;
	public $telp_supplier;
	
	
	function __construct(){	
		$con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $con; 
	}
	
	function TampilSemua(){
		$query = mysqli_query($this->con, "SELECT * from supplier ");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_supplier'] = $m['kode_supplier'];
			$data[$i]['nama_supplier'] = $m['nama_supplier'];
			$data[$i]['alamat_supplier'] = $m['alamat_supplier'];
			$data[$i]['telp_supplier'] = $m['telp_supplier'];
		
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function TampilSemuaData($kode_supplier){
		$query = mysqli_query($this->con, "SELECT * from supplier where kode_supplier='$kode_supplier'");
		$i = 0;
		while($n = mysqli_fetch_array($query)){
			$data[$i]['kode_supplier'] = $n['kode_supplier'];
			$data[$i]['nama_supplier'] = $n['nama_supplier'];
			$data[$i]['alamat_supplier'] = $n['alamat_supplier'];
			$data[$i]['telp_supplier'] = $n['telp_supplier'];
		
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
		function TampilSatuData($kode_supplier){
		$query = mysqli_query($this->con, "SELECT * FROM supplier WHERE kode_supplier = '$kode_supplier'");
		$m = mysqli_fetch_object($query);
		$this->kode_supplier = $m->kode_supplier;
		$this->nama_supplier= $m->nama_supplier;
		$this->alamat_supplier = $m->alamat_supplier;
		$this->telp_supplier= $m->telp_supplier;
		
	}
	
	function TampilSupplierLeft(){
		$query = mysqli_query($this->con, "SELECT * from supplier LEFT OUTER JOIN bahanbaku ON supplier.kode_supplier = bahanbaku.kode_supplier WHERE bahanbaku.kode_supplier IS NULL'");
		$m = mysqli_fetch_object($query);
		$this->kode_supplier = $m->kode_supplier;
		$this->nama_supplier= $m->nama_supplier;
		
		
	}
	
	
	
	function tambahSupplier($kode_supplier,$nama_supplier,$alamat_supplier,$telp_supplier){
		
		$result = mysqli_query($this->con, "SELECT * FROM supplier");
	while($m = mysqli_fetch_array($result)){
		
		if(($nama_supplier) == ($m['nama_supplier'])){
			?>
			<script type="text/javascript">
				alert("Supplier sudah ada dalam daftar!");		
				window.location = "../_Pegawai/DataSupplier.php";				
			</script>
			<?php
			exit;
		}
		
	}
		

		if(!empty($kode_supplier) && 
			!empty($nama_supplier) && 
			!empty($alamat_supplier)&&
			!empty($telp_supplier))
			{
				$query = mysqli_query($this->con, "INSERT INTO supplier(
															kode_supplier,
															nama_supplier,
															alamat_supplier,
															telp_supplier) 
											 VALUES('$kode_supplier',
											 				'$nama_supplier',
											 				'$alamat_supplier',
															'$telp_supplier')");
											 				 } 
		
	}
	
	
	function tambahSupplierPembelian($kode_supplier,$nama_supplier,$alamat_supplier,$telp_supplier){

		$nama_bahan_baku = $_POST['nama_bahan_baku'];
		
		$result = mysqli_query($this->con, "SELECT * FROM supplier");
		while($m = mysqli_fetch_array($result)){
		
		if(($nama_supplier) == ($m['nama_supplier'])){
			?>
			<script type="text/javascript">
				alert("Supplier sudah ada dalam daftar!");		
				window.location = "../_Pegawai/TambahPembelianForm.php?nama_bahan_baku=<?php echo $nama_bahan_baku; ?>";
			</script>
			<?php
			exit;
		}
		
	}
		

		if(!empty($kode_supplier) && 
			!empty($nama_supplier) && 
			!empty($alamat_supplier)&&
			!empty($telp_supplier))
			{
				$query = mysqli_query($this->con, "INSERT INTO supplier(
															kode_supplier,
															nama_supplier,
															alamat_supplier,
															telp_supplier) 
											 VALUES('$kode_supplier',
											 				'$nama_supplier',
											 				'$alamat_supplier',
															'$telp_supplier')");
											 				 } 
		
	}
	

	function updateSupplier($kode_supplier,$nama_supplier,$alamat_supplier,$telp_supplier){
	 	$query = mysqli_query($this->con, "Update Supplier SET nama_supplier='$nama_supplier',
	 													  alamat_supplier='$alamat_supplier',
														  telp_supplier='$telp_supplier'
	 												  WHERE
	 												  	  kode_supplier='$kode_supplier'");
	
	}	
		
	}
	//Supplier
	?>