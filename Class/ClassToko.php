<?php
class Toko{
	public $kode_toko;
	public $nama_toko;
	public $alamat_toko;
	public $telp_toko;
	
	
	function __construct(){	
		$con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $con; 
	}
	
	function TampilSemua(){
		$query = mysqli_query($this->con, "SELECT * from toko ");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_toko'] = $m['kode_toko'];
			$data[$i]['nama_toko'] = $m['nama_toko'];
			$data[$i]['alamat_toko'] = $m['alamat_toko'];
			$data[$i]['telp_toko'] = $m['telp_toko'];
		
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function TampilSemuaData($kode_toko){
		$query = mysqli_query($this->con, "SELECT * from toko where kode_toko='$kode_toko'");
		$i = 0;
		while($n = mysqli_fetch_array($query)){
			$data[$i]['kode_toko'] = $n['kode_toko'];
			$data[$i]['nama_toko'] = $n['nama_toko'];
			$data[$i]['alamat_toko'] = $n['alamat_toko'];
			$data[$i]['telp_toko'] = $n['telp_toko'];
		
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
		function TampilSatuData($kode_toko){
		$query = mysqli_query($this->con, "SELECT * FROM toko WHERE kode_toko = '$kode_toko'");
		$m = mysqli_fetch_object($query);
		$this->kode_toko = $m->kode_toko;
		$this->nama_toko= $m->nama_toko;
		$this->alamat_toko = $m->alamat_toko;
		$this->telp_toko= $m->telp_toko;
		
	}
	
	function tambahToko($kode_toko,$nama_toko,$alamat_toko,$telp_toko){
	$result = mysqli_query($this->con, "SELECT * FROM toko");
	while($m = mysqli_fetch_array($result)){
		
		if(($nama_toko) == ($m['nama_toko'])){
			?>
			<script type="text/javascript">
				alert("Toko sudah ada dalam daftar!");		
				window.location = "../_Pegawai/DataToko.php";				
			</script>
			<?php
			exit;
		}
		
	}
		
		if(!empty($kode_toko) && 
			!empty($nama_toko) && 
			!empty($alamat_toko)&&
			!empty($telp_toko))
			{
				$query = mysqli_query($this->con, "INSERT INTO toko(
															kode_toko,
															nama_toko,
															alamat_toko,
															telp_toko) 
											 VALUES('$kode_toko',
											 				'$nama_toko',
											 				'$alamat_toko',
															'$telp_toko')");
				 } 
	
	}
	
	function hapusToko($kode_toko){
	$kode_toko = $_GET['kode_toko'];
	$kode_toko1 = mysqli_query($this->con, "SELECT toko FROM toko WHERE kode_toko = '$kode_toko'");
	while($m = mysqli_fetch_array($kode_toko1))
				  $kode_toko=$m['kode_toko'];

			$x = mysqli_query($this->con, "DELETE FROM toko WHERE  kode_toko= '$kode_toko'");
			
	}
	
	

	function updateToko($kode_toko,$nama_toko,$alamat_toko,$telp_toko){
	$query = mysqli_query($this->con, "Update Toko SET nama_toko='$nama_toko',
	 													  alamat_toko='$alamat_toko',
														  telp_toko='$telp_toko'
	 												  WHERE
	 												  	  kode_toko='$kode_toko'");
	?> 
				<script type="text/javascript">
						alert("Update Berhasil!");
						window.location = "../_Pegawai/DataToko.php";						
				</script>	
				<?php
	}	
	}
	//Toko
	?>