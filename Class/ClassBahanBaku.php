<?php

class bahanbaku{

	public $kode_bahan_baku;
	public $kode_supplier;
	public $nama_bahan_baku;
	public $harga_bahan_baku;
	public $jumlah_bahan_baku;
	public $satuan;
	public $lead_time;
	public $lotsize;
	public $rop;
	public $safety_stock;
	
	
	function __construct(){	
		$con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $con; 
	}
	
	function TampilSemua(){
		$query = mysqli_query($this->con, "SELECT * from supplier INNER JOIN bahanbaku WHERE supplier.kode_supplier=bahanbaku.kode_supplier ORDER BY kode_bahan_baku ASC");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_bahan_baku'] = $m['kode_bahan_baku'];
			$data[$i]['nama_bahan_baku'] = $m['nama_bahan_baku'];
			$data[$i]['lead_time'] = $m['lead_time'];
			$data[$i]['lotsize'] = $m['lotsize'];
			$data[$i]['jumlah_bahan_baku'] = $m['jumlah_bahan_baku'];
			$data[$i]['satuan'] = $m['satuan'];
			$data[$i]['harga_bahan_baku'] = $m['harga_bahan_baku'];
			$data[$i]['rop'] = $m['rop'];
			$data[$i]['nama_supplier'] = $m['nama_supplier'];
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
		function TampilBB($kode_bahan_baku){
		$query = mysqli_query($this->con, "SELECT * from bahanbaku WHERE kode_bahan_baku='$kode_bahan_baku'");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_bahan_baku'] = $m['kode_bahan_baku'];
			$data[$i]['nama_bahan_baku'] = $m['nama_bahan_baku'];

			$data[$i]['jumlah_bahan_baku'] = $m['jumlah_bahan_baku'];
			$data[$i]['satuan'] = $m['satuan'];
			$data[$i]['harga_bahan_baku'] = $m['harga_bahan_baku'];
			$data[$i]['rop'] = $m['rop'];
			$data[$i]['kode_supplier'] = $m['kode_supplier'];
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function TampilPenggunaan($kode_bahan_baku){
		$kode_bahan_baku = $_GET['kode_bahan_baku'];
		$query = mysqli_query($this->con, "SELECT * from penggunaan WHERE kode_bahan_baku='$kode_bahan_baku'");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['tgl_penggunaan'] = $m['tgl_penggunaan'];
			$data[$i]['jumlah_penggunaan'] = $m['jumlah_penggunaan'];
			$data[$i]['status_penggunaan'] = $m['status_penggunaan'];
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	
	function TampilBB1($nama_bahan_baku){
			$nama_bahan_baku = $_GET['nama_bahan_baku'];	
		$query = mysqli_query($this->con, "SELECT * from bahanbaku WHERE nama_bahan_baku='$nama_bahan_baku'");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_bahan_baku'] = $m['kode_bahan_baku'];
			$data[$i]['nama_bahan_baku'] = $m['nama_bahan_baku'];
	
			$data[$i]['jumlah_bahan_baku'] = $m['jumlah_bahan_baku'];
			$data[$i]['satuan'] = $m['satuan'];
			$data[$i]['harga_bahan_baku'] = $m['harga_bahan_baku'];
			$data[$i]['rop'] = $m['rop'];
			
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
		function TampilSemuaBB($nama_bahan_baku){
		$query = mysqli_query($this->con, "SELECT * from supplier INNER JOIN bahanbaku ON supplier.kode_supplier=bahanbaku.kode_supplier WHERE bahanbaku.nama_bahan_baku='$nama_bahan_baku'");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_bahan_baku'] = $m['kode_bahan_baku'];
			$data[$i]['nama_bahan_baku'] = $m['nama_bahan_baku'];

			$data[$i]['jumlah_bahan_baku'] = $m['jumlah_bahan_baku'];
			$data[$i]['satuan'] = $m['satuan'];
			$data[$i]['harga_bahan_baku'] = $m['harga_bahan_baku'];
			$data[$i]['rop'] = $m['rop'];
			$data[$i]['lotsize'] = $m['lotsize'];
			$data[$i]['nama_supplier'] = $m['nama_supplier'];
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
		function TampilSatuData($kode_bahan_baku){
		$query = mysqli_query($this->con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");
		$m = mysqli_fetch_object($query);
		$this->kode_bahan_baku = $m->kode_bahan_baku;
		$this->nama_bahan_baku = $m->nama_bahan_baku;

		$this->harga_bahan_baku = $m->harga_bahan_baku;
		$this->satuan= $m->satuan;
		$this->safety_stock = $m->safety_stock;
		$this->lotsize = $m->lotsize;
		$this->kode_supplier = $m->kode_supplier;
	}
	

	
	function TampilDetailSupplier(){
			$kode_supplier=mysql_real_escape_string($_GET['kode_supplier']);
		$i=0;
		$query = mysqli_query($this->con, "select * from bahanbaku where kode_supplier='$kode_supplier'")or die(mysql_error());
		while($m = mysqli_fetch_array($query)){
			
			$data[$i]['nama_bahan_baku'] = $m['nama_bahan_baku'];
			
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function updatebahanbaku($kode_bahan_baku,$nama_bahan_baku,$harga_bahan_baku,$satuan,$safety_stock,$lotsize,$kode_supplier){
		

	 	$query = mysqli_query($this->con, "UPDATE bahanbaku SET kode_bahan_baku = '$kode_bahan_baku',
	 														  nama_bahan_baku = '$nama_bahan_baku',
															
	 														  harga_bahan_baku = '$harga_bahan_baku',
															  satuan = '$satuan',
															safety_stock = '$safety_stock',
																	  lotsize = '$lotsize',
															  kode_supplier = '$kode_supplier'
	 													
	 												  WHERE
	 												  	  	kode_bahan_baku = '$kode_bahan_baku'");
	 	?> 
					
				<?php
	}

	function hapusbahanbaku($kode_bahan_baku){
			
			$kode_bahan_baku = $_GET['kode_bahan_baku'];

			$ambilData = mysqli_query($this->con, "SELECT jumlah_bahan_baku FROM bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");
			while($m = mysqli_fetch_array($ambilData))
				  $jumlah_bahan_baku=$m['jumlah_bahan_baku'];

			
				$x = mysqli_query($this->con, "DELETE FROM bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");
				$x = mysqli_query($this->con, "DELETE FROM bom WHERE kode_bahan_baku = '$kode_bahan_baku'");
				
			
					?>
					<script type="text/javascript">
						alert("Jumlah bahan baku tidak kosong!");
						window.location = "../_Pegawai/DataBahanBaku.php";						
					</script>	
				<?php
				
	}

	function tambahbahanbaku($kode_bahan_baku,$kode_supplier,$nama_bahan_baku,$harga_bahan_baku,$jumlah_bahan_baku,$satuan,$lead_time,$lotsize,$rop,$safety_stock){

		$result = mysqli_query($this->con, "SELECT * FROM bahanbaku");
		while($m = mysqli_fetch_array($result)){
		
		if(($nama_bahan_baku) == ($m['nama_bahan_baku'])){
			?>
			<script type="text/javascript">
				alert("Bahan baku sudah ada dalam daftar!");		
				window.location = "../_Pegawai/DataBahanBaku.php";				
			</script>
			<?php
			exit;
		}
		
	}

						if(!empty($kode_bahan_baku) && 
							!empty($kode_supplier) && 
							!empty($nama_bahan_baku) && 
						 
							!empty($harga_bahan_baku) &&
							!empty($jumlah_bahan_baku) && 
							!empty($satuan) && 
							!empty($lead_time) &&
							!empty($lotsize) &&
							!empty($safety_stock)){
								$query = mysqli_query($this->con, "INSERT INTO bahanbaku(
															kode_bahan_baku,
															kode_supplier,
															nama_bahan_baku,
															
															harga_bahan_baku,
															jumlah_bahan_baku,
															satuan,
															lead_time,
															lotsize,
															rop,
															safety_stock) 
											 VALUES('$kode_bahan_baku',
													'$kode_supplier',
											 		'$nama_bahan_baku',
						
											 		'$harga_bahan_baku',
													'$jumlah_bahan_baku',
											 		'$satuan',
													'$lead_time',
													'$lotsize',
											 			0,
											 				'$safety_stock')");
											 				?>
									 				
			<?php } 
	
}
	// CLASS END OF BAHAN BAKU
}
?>