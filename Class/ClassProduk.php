
<?php
class Produk{
	public $kode_produk;
	public $nama_produk;
	public $banyak_produksi;
	public $harga_produksi;
	
	
	function __construct(){	
		$con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $con; 
	}
	
	function TampilSemua(){
		$query = mysqli_query($this->con, "SELECT * from produk ");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_produk'] = $m['kode_produk'];
			$data[$i]['nama_produk'] = $m['nama_produk'];
			$data[$i]['banyak_produksi'] = $m['banyak_produksi'];
			$data[$i]['harga_produk'] = $m['harga_produk'];
		
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
		function TampilSemuaBB($kode_produk){
		$query = mysqli_query($this->con, "SELECT * from bom JOIN bahanbaku ON bom.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE kode_produk='$kode_produk'");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_bahan_baku'] = $m['kode_bahan_baku'];
			$data[$i]['nama_bahan_baku'] = $m['nama_bahan_baku'];
			$data[$i]['jumlah_penggunaan'] = $m['jumlah_penggunaan'];
			$data[$i]['no'] = $m['no'];
			$data[$i]['satuan'] = $m['satuan'];
		
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
		function TampilSemuaData($kode_produk){
		
		$query = mysqli_query($this->con, "SELECT * FROM produk where kode_produk='$kode_produk'");
		$i = 0;
		while($n = mysqli_fetch_array($query)){
			$data[$i]['kode_produk'] = $n['kode_produk'];
			$data[$i]['nama_produk'] = $n['nama_produk'];
			$data[$i]['banyak_produksi'] = $n['banyak_produksi'];
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
		
		function TampilKeranjangBB(){
		$kode_produk = $_GET['kode_produk'];
		$query = mysqli_query($this->con, "SELECT * from keranjang_bom 
												JOIN 
													bahanbaku ON keranjang_bom.kode_bahan_baku=bahanbaku.kode_bahan_baku
												WHERE kode_produk='$kode_produk'");
		$i = 0;
		while($n = mysqli_fetch_array($query)){
			$data[$i]['kode_produk'] = $n['kode_produk'];
			$data[$i]['nama_bahan_baku'] = $n['nama_bahan_baku'];
			$data[$i]['jumlah_penggunaan'] = $n['jumlah_penggunaan'];
			$data[$i]['no'] = $n['no'];	
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
		function TampilSatuData($kode_produk){
		$query = mysqli_query($this->con, "SELECT * FROM produk WHERE kode_produk = '$kode_produk'");
		$m = mysqli_fetch_object($query);
		$this->kode_produk = $m->kode_produk;
		$this->nama_produk= $m->nama_produk;
		$this->banyak_produksi = $m->banyak_produksi;
		$this->harga_produk= $m->harga_produk;
		
	}
	
	
	function tambahProduk($kode_produk,$nama_produk,$banyak_produksi,$harga_produk){
	$result = mysqli_query($this->con, "SELECT * FROM produk");
					while($m = mysqli_fetch_array($result)){
					
					
					if(($nama_produk) == ($m['nama_produk'])){
			?>
			<script type="text/javascript">
				alert("Produk sudah ada dalam daftar!");		
				window.location = "../_Pegawai/DataProduk.php";				
			</script>
			<?php
			exit;
		}
		
	}
		if(!empty($kode_produk) && 
		!empty($nama_produk) && 
		!empty($banyak_produksi) &&
		!empty($harga_produk)){
		
		$query = mysqli_query($this->con, "INSERT INTO produk(
															kode_produk,
															nama_produk,
															banyak_produksi,
															harga_produk) 
											 VALUES('$kode_produk',
											 				'$nama_produk',
															 '$banyak_produksi',
															 '$harga_produk')");
										 } 
		
}

	function updateProduk($kode_produk,$nama_produk,$harga_produk,$banyak_produksi){
	 	$query = mysqli_query($this->con, "UPDATE produk SET nama_produk='$nama_produk',
														  
														  banyak_produksi='$banyak_produksi',
														  harga_produk='$harga_produk'
	 												  WHERE
	 												  	  kode_produk='$kode_produk'");
		
	}

	function hapusProduk($kode_produk){
	$kode_produk = $_GET['kode_produk'];

			$ambilData = mysqli_query($this->con, "SELECT * FROM produk WHERE kode_produk = '$kode_produk'");
			while($m = mysqli_fetch_array($ambilData))
				  $nama_produk=$m['nama_produk'];

			
				$x = mysqli_query($this->con, "DELETE FROM produk WHERE kode_produk = '$kode_produk'");
				$x = mysqli_query($this->con, "DELETE FROM bom WHERE kode_produk = '$kode_produk'");
	}
		

	function tambahBom ($kode_produk,$kode_bahan_baku,$jumlah_penggunaan){
	
	$result = mysqli_query($this->con, "SELECT * FROM keranjang_bom where kode_produk='$kode_produk'");

	while($m = mysqli_fetch_array($result)){
		
		
		if(($kode_bahan_baku) == ($m['kode_bahan_baku'])){

				?>
					<script type="text/javascript">
						alert("Bahan Baku Sudah Terdaftar!");
						window.location = "../_Pegawai/DetailBom.php?kode_produk=<?php echo $kode_produk; ?>";						
					</script>	<?php
			
			exit;
			
	
		}
		
	}
	
	$result = mysqli_query($this->con, "SELECT * FROM bom where kode_produk='$kode_produk'");

	while($m = mysqli_fetch_array($result)){
		
		if(($kode_bahan_baku) == ($m['kode_bahan_baku'])){
					?>
					<script type="text/javascript">
						alert("Bahan Baku Sudah Terdaftar!");
						window.location = "../_Pegawai/DetailBom.php?kode_produk=<?php echo $kode_produk; ?>";			
					</script>
					<?php
			exit;
		}
		
	}
		if(
			!empty($kode_bahan_baku) && 
			!empty($kode_produk) && 
			!empty($jumlah_penggunaan))
			
			{
				$query = mysqli_query($this->con, "INSERT INTO keranjang_bom(
															kode_produk,
															kode_bahan_baku,
															jumlah_penggunaan) 
											 VALUES('$kode_produk',
											 		'$kode_bahan_baku',
											 		'$jumlah_penggunaan')");
		
			header("Location:../_Pegawai/TambahBom.php?kode_produk=$kode_produk");
		}
	}
	
	function hapusBom($no){
		
			$kode_produk1 = mysqli_query($this->con, "SELECT kode_produk FROM bom WHERE no = '$no'");
			while($m = mysqli_fetch_array($kode_produk1))
				  $kode_produk=$m['kode_produk'];

			$x = mysqli_query($this->con, "DELETE FROM bom WHERE no = '$no'");
				
				header("Location:../_Pegawai/DetailBom.php?kode_produk=$kode_produk");
				
			
	}
	
	function SimpanBom($no){

	$query = "SELECT * FROM keranjang_bom where no='$no'";
	$sql = mysqli_query($this->con, $query); // Eksekusi/Jalankan query dari variabel $query
	while($m = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql

	$kode_bahan_baku = $m['kode_bahan_baku'];
	$kode_produk = $m['kode_produk'];

	$jumlah_penggunaan = $m['jumlah_penggunaan'];
	
	if(!empty($kode_bahan_baku)&&
		!empty($kode_produk)&&
		!empty($jumlah_penggunaan)){
				$query = mysqli_query($this->con, "INSERT INTO bom(
															kode_bahan_baku,
															kode_produk,
														
															jumlah_penggunaan) 
													VALUES('$kode_bahan_baku',
															'$kode_produk',
											 				'$jumlah_penggunaan')");
											 		
	mysqli_query($this->con, "DELETE FROM keranjang_bom where no='$no'");
		header("Location:../_Pegawai/DetailBom.php?kode_produk=$kode_produk");
}else{
	echo "Maaf, data tidak lengkap tidak bisa dikonfirmasi.";
 		header("Location:../_Pegawai/DetailBom.php?kode_produk=$kode_produk");
}

}
	}
	
	
	function hapusTampungBom($no){
	$kode_produk1 = mysqli_query($this->con, "SELECT kode_produk FROM keranjang_bom WHERE no = '$no'");
			while($m = mysqli_fetch_array($kode_produk1))
				  $kode_produk=$m['kode_produk'];

			$x = mysqli_query($this->con, "DELETE FROM keranjang_bom WHERE no = '$no'");
				header("Location:../_Pegawai/TambahBom.php?kode_produk=$kode_produk");		
	}
	
	function tambahManageProduk($kode_bahan_baku,$kode_produk,$jumlah_penggunaan){

	$query = "SELECT * FROM keranjang_bom";
	$sql = mysqli_query($this->con, $query); // Eksekusi/Jalankan query dari variabel $query
	while($m = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
	$kode_bahan_baku = $m['kode_bahan_baku'];
	$kode_produk = $m['kode_produk'];
	$jumlah_penggunaan = $m['jumlah_penggunaan'];
	
	if(!empty($kode_bahan_baku)&&
		!empty($kode_produk)&&
			!empty($jumlah_penggunaan))
			{
				$query = mysqli_query($this->con, "INSERT INTO bom(
															kode_bahan_baku,
															kode_produk,
														
															jumlah_penggunaan) 
											 VALUES('$kode_bahan_baku',
											 '$kode_produk',
											 			
											 				'$jumlah_penggunaan')");										 		
	
	mysqli_query($this->con, "DELETE FROM keranjang_bom");
		header("Location:../_Pegawai/DetailBom.php?kode_produk=$kode_produk");	
	}else{
	echo "Maaf, data tidak lengkap tidak bisa dikonfirmasi.";
 		header("Location:../_Pegawai/DetailBom.php?kode_produk=$kode_produk");
			}

		}

	}
		
	function hapusManageProduk($kode_produk){
	$kode_produk1 = mysqli_query($this->con, "SELECT kode_produk FROM keranjang_bom");
		while($m = mysqli_fetch_array($kode_produk1))
		$kode_produk=$m['kode_produk'];

			$x = mysqli_query($this->con, "DELETE from keranjang_bom");
				header("Location:../_Pegawai/DetailBom.php?kode_produk=$kode_produk");		
	}
		
	function updateBom($kode_produk,$kode_bahan_baku,$jumlah_penggunaan){	
 	$query = mysqli_query($this->con, "Update Bom SET 
										kode_produk='$kode_produk',
	 									kode_bahan_baku='$kode_bahan_baku',
										jumlah_penggunaan='$jumlah_penggunaan'
	 									WHERE
	 									kode_bahan_baku='$kode_bahan_baku' and kode_produk='$kode_produk'");
											
	header("Location:../_Pegawai/DetailBom.php?kode_produk=$kode_produk");
	}
}
	//END OF CLASS PRODUK 
	?>
