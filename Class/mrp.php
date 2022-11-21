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
							
$peramalan = $tahun - 1;
$ID_peramalan = $peramalan . $kode_produk. "-" . $bulan; 

$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
	

		
		$query = mysqli_query($this->con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan = '$namabulan'");
		while($m = mysqli_fetch_array($query))
		{ 
			$kode_produk = $m['kode_produk'];
			$ambil = $m['peramalan'];
			
		}
		
		//GROSS REQUIREMENT per bahan baku
		$query = mysqli_query($this->con, "SELECT DISTINCT kode_produk from bom");
		while($m = mysqli_fetch_array($query))
		{ 
		$kode_produk = $m['kode_produk'];
			
			$gr = 0;
			$query1 = mysqli_query($this->con, "SELECT * from produk");
			while($n = mysqli_fetch_array($query1))
			{ 
				$kode_produk = $n['kode_produk'];
				
				$ambil =0;
				$query3 = mysqli_query($this->con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan = '$namabulan' AND kode_produk='$kode_produk'");
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
				
				$temp = 0;
				
				}
	
			
					$coba = round(((ceil($ambil/$akhir))), 1);
					$temp = $coba;
					$gr += $temp;
			
			
			//Ambil tanggal
			for($i = $tanggal+1; $i <= $akhir; $i++)
			{
				
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
					
				$temp1 = 0;
				$temp2 = 0;
				
				
				
				//Cek jumlah Schedule Receipt Produk
				$sql2 = mysqli_query($this->con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr' and kode_produk='$kode_produk'");
				while($w = mysqli_fetch_array($sql2))
				{
					//Schedule Receipt
					$jumlah = $w['jumlah'];
				}	
					
					$n = round(($w['jumlah']), 1); 
					$temp1 = $n;
					$sr_p += $temp1;
					$ph = 0;
					$hasil = round(($ph - $gr + $sr_p), 1);
					
				
		
				
				
					$char3 = "-";
					$ID_perhitungan = $kode_produk.$char3.$i;
					
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
						$porec = $gr + $sr_p;
						
						
	
						
						
						//INSERT BAHAN BAKU KE DB MRP
						
						
						
						
						mysqli_query($this->con, "UPDATE mrp_produk set net = '$porec' WHERE tgl = '$ambilTgl'");
						mysqli_query($this->con, "UPDATE mrp_produk set porec = '$porec' WHERE tgl = '$ambilTgl'");
							mysqli_query($this->con, "UPDATE mrp_produk set porel = '$porec' WHERE tgl = '$ambilTgl'");
						
	
						}
					}
				}
}
			}
		
	



	


?>
