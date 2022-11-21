<?php
class MRPProduk{
	
	public $kode_produk;
	public $tanggal;
	public $gr;
	public $sr;
	public $ph;
	public $net;
	public $porec;
	public $porel;
	
	public $tgl;
	public $faktur;
	public $bln;
	public $jumlah; 
	
	public $jmlh;

	public $bulan;
	public $status;
	
	function __construct(){	
		$this->con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $this->con; 
	}
	

function tambahMRPProduk($kode_produk){
	
mysqli_query($this->con, "TRUNCATE TABLE mrp_produk;");

$tanggal = date('d');
$bulan = date('m');
$tahun = date('Y');
$peramalan = $tahun;
											
$ID_peramalan = $peramalan . $kode_produk. "-" . $bulan; 


$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
			
			//GROSS REQUIREMENT per bahan baku
			$query = mysqli_query($this->con, "SELECT DISTINCT kode_produk from bom");
			while($m = mysqli_fetch_array($query))
			{ 
			$kode_produk = $m['kode_produk'];
			
			$ambil =0;
				$query3 = mysqli_query($this->con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
				while($p = mysqli_fetch_array($query3))
				{ 
					if ($p['peramalan'] == null){
													$ambil = 0;
												}
												else{
													$ambil = $p['peramalan'];
												}
					$ambil = $p['peramalan'];
				}
				
				
			//Ambil tanggal
			for($i = $tanggal+1; $i <= $akhir; $i++)
			{
				$gr = ceil($ambil/$akhir);
				if ($i < 10){
					$char = "0";
				}
				else{
					$char = "";
				}
				
				$tgl_sr = $char.$i;
				$bln_sr= date('m');
				$sr_p = 0;
				$sr_b = 0;
					
				//Cek jumlah Schedule Receipt PRODUK
				$sql5 = mysqli_query($this->con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr' and kode_produk='$kode_produk'");
				while($e = mysqli_fetch_array($sql5))
				{
					$sr_p  = $e['jumlah'];
				}
				
				$sr = $sr_p;
				$ph = 0;
				$hasil = round(($ph - $gr + $sr), 1);
				
				//INPUT DATABSE MRP PERHITUNGAN 
				$ii = "";
				if ($i < 10){
					$char = "0";
					$ii = $char.$i;
				}
				else{
					$ii = $i;
				}
				
				mysqli_query($this->con, "INSERT INTO mrp_produk(kode_produk, tanggal, gr, sr, ph)VALUES('$kode_produk','$ii','$gr','$sr','$ph')");
				
					if($hasil < $gr){
						$ambilTgl = $i;
						if ($ambilTgl < 10){
							$char = "0";
							$ambilTgl = $char.$ambilTgl;
						}
						else{
							$char = "";
							$ambilTgl = $char.$ambilTgl;
						}
					
						//Tambah produk
						$ph = $ph + $gr;
						$porec = $gr + $sr;
						
						//INSERT KE DB MRP_PERHITUNGAN
						mysqli_query($this->con, "UPDATE mrp_produk set net = '$porec' WHERE tanggal = '$ambilTgl' and kode_produk='$kode_produk'");
						mysqli_query($this->con, "UPDATE mrp_produk set porec = '$porec' WHERE tanggal = '$ambilTgl' and kode_produk='$kode_produk'");
						mysqli_query($this->con, "UPDATE mrp_produk set porel = '$porec' WHERE tanggal = '$ambilTgl' and kode_produk='$kode_produk'");
					}
				}
}}
		
}



	


?>
