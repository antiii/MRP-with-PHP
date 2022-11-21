<?php
class MRP{
	public $id_perhitungan;
	public $kode_bahan_baku;
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
	public $id_mrp;
	public $rop;
	public $bulan;
	public $status;
	
	function __construct(){	
		$con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $con; 
	}
	
function tambahMRP($kode_produk){


mysqli_query($this->con, "TRUNCATE TABLE porel;");
$tanggal = date('d');
$bulan = date('m');
$tahun = date('Y');

$tahun = date ('Y');											
$peramalan = $tahun;
$ID_peramalan = $peramalan . $kode_produk. "-" . $bulan; 

$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
	
//Cek persediaan per bahan baku
$query = mysqli_query($this->con, "SELECT * from bom INNER JOIN bahanbaku ON bahanbaku.kode_bahan_baku = bom.kode_bahan_baku");
while($m = mysqli_fetch_array($query))
{ 
	for($i = 0; $i <= $m['kode_bahan_baku']; $i++){
		if ($i < 10){
			$j = $i + 1;
			$char = "BAKU-0";
			$kode_bahan_baku = $char . $j;
		}
		else{
			$j = $i + 1;
			$char = "BAKU-0";
			$kode_bahan_baku = $char . $j;
		}
		$kode_bahan_baku;
			
		
		$query = mysqli_query($this->con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan'");
		while($m = mysqli_fetch_array($query))
		{ 
			$kode_produk = $m['kode_produk'];
			$ambil = $m['peramalan'];
			
		}
		
		//GROSS REQUIREMENT per bahan baku 
		//Mulai hitung whitebox mrp
		$query = mysqli_query($this->con, "SELECT DISTINCT kode_bahan_baku from bom"); //1
		while($m = mysqli_fetch_array($query)) //2
		{ 
		$kode_bahan_baku = $m['kode_bahan_baku']; //3
			
			$gr = 0; //4
			$query1 = mysqli_query($this->con, "SELECT * from produk"); //5
			while($n = mysqli_fetch_array($query1)) //6
			{ 
				$kode_produk = $n['kode_produk']; //7
				$banyak_produksi = $n['banyak_produksi'];
				
				$ambil =0;//8
				$query3 = mysqli_query($this->con, "SELECT * from peramalan_penjualan  WHERE tahun = '$peramalan' 
				AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'"); //9
				while($p = mysqli_fetch_array($query3)) //10
				{ 
					if ($p['peramalan'] == null){ //11
													$ambil = 0; //12
												}
												else{ //13
													$ambil = $p['peramalan']; //14
												}//15
					$ambil = $p['peramalan'];
				} //16
				
				$temp = 0; //17
				$jumlah_penggunaan = 0; //18
				$query2 = mysqli_query($this->con, "SELECT * from bom INNER JOIN bahanbaku ON bom.kode_bahan_baku = bahanbaku.kode_bahan_baku
				 WHERE bom.kode_bahan_baku = '$kode_bahan_baku' AND bom.kode_produk = '$kode_produk'"); //19
				while($o = mysqli_fetch_array($query2)) //20
				{
					$jumlah_penggunaan = $o['jumlah_penggunaan']; //21
					$ph = $o['jumlah_bahan_baku']; //22
					$lotsize = $o['lotsize']; //23
					$leadtime = $o['leadtime']; //24
					$safetystock = $o['safetystock'];  //25
				
				} //26
			 $jumlah_penggunaan; "<br>"; //27
			
					$coba = round(((ceil($ambil/$akhir))*$jumlah_penggunaan/$banyak_produksi), 1); //28
					$temp = $coba; //29
					$gr += $temp; //30
			} //31
			
			//Ambil tanggal
			for($i = $tanggal+1; $i <= $akhir; $i++){ //32
				
				if ($i < 10){ //33
					$char = "0"; //34
					$kode= $char.$i;  
				}
				else{ //35
					$char = ""; //36
					$kode = $char.$i;
				} //37
				 
				$sr_p = 0; //38
				$sr_b = 0;//39
					
				$temp1 = 0; //40
				$temp2 = 0; //41
				
			
				//Menghitung ROP
				$sql = mysqli_query($this->con, "SELECT * from bom INNER JOIN bahanbaku ON 
				bahanbaku.kode_bahan_baku = bom.kode_bahan_baku WHERE bom.kode_bahan_baku = '$kode_bahan_baku'"); //42
				while($p = mysqli_fetch_array($sql)) //43
				{
					//Ambil safety stock
					$ss = $p['safety_stock'];  //44
					$lt = $p['lead_time'];
					 $ROP = ceil($lt*$gr)+$ss; 
					
					if($ph < $gr){ //45
						echo $ambilTgl = $i+1; 
						echo "<br>";
						if ($ambilTgl < 10){ //46
							$char = "0";
							$net = $gr - $ph + $sr_b   ;
							$ambilTgltes = $char.$ambilTgl;
						}
						else{
							$char = "";
							$net = $gr - $ph + $sr_b  ;
							$ambilTgltes = $char.$ambilTgl;
						}
						
						$periode = substr($tgl2, 0, 2)+$lt;
						if ($periode < 10){ //47
							$char = "0";
							$periode = $char.$periode;
						}
						else{
							$char = "";
							$periode = $char.$periode;
						}
						
						$periode1 = substr($tgl2, 0, 2);
						
						
						//cek pembelian
						$kode_pembelian = NULL; //48
						$sql8 = mysqli_query($this->con, "SELECT * FROM pembelian WHERE pb_date = '$tgl2' AND kode_bahan_baku = '$kode_bahan_baku'");
						while($h = mysqli_fetch_array($sql8)) //59
						{
							$kode_pembelian = $h['kode_pembelian'];
						}
						
						if($kode_pembelian == NULL){ //50
							$status_porel = 0;
						}
						else{
							$status_porel = 1;
						}
						
						
						//Tambah bahan baku
						$ph = $ph + $p['lotsize'];	//51
						$char4 = "-";
						$ID_mrp = $kode_bahan_baku.$char4.substr($tgl2,0,2);
						
						//INSERT KE DB MRP
						mysqli_query($this->con, "INSERT INTO mrp(ID_mrp, kode_bahan_baku, rop, tanggal,tgl, bulan, status)
						VALUES('$ID_mrp','$kode_bahan_baku','$ROP','$tgl2','$periode1','$bulan','$status_porel')"); //52
						
						mysqli_query($this->con, "UPDATE bahanbaku set rop = '$ROP' WHERE kode_bahan_baku = '$kode_bahan_baku'"); //53
	
					}
				}
			}
				 
		} // endddddd
	}
}}

function tambahMRP1($kode_produk){

mysqli_query($this->con, "TRUNCATE TABLE mrp_perhitungan;");
mysqli_query($this->con, "TRUNCATE TABLE porec;");
$tanggal = date('d');
$bulan = date('m');
$tahun = date('Y');

$tahun = date ('Y');											
$peramalan = $tahun;
$ID_peramalan = $peramalan . $kode_produk. "-" . $bulan; 

$akhir = substr(date('t-m-Y', strtotime(date('d-m-Y'))),0,2);
	
//Cek persediaan per bahan baku
$query = mysqli_query($this->con, "SELECT * from bom INNER JOIN bahanbaku ON bahanbaku.kode_bahan_baku = bom.kode_bahan_baku");
while($m = mysqli_fetch_array($query))
{ 
	for($i = 0; $i <= $m['kode_bahan_baku']; $i++){
		if ($i < 10){
			$j = $i + 1;
			$char = "BAKU-0";
			$kode_bahan_baku = $char . $j;
		}
		else{
			$j = $i + 1;
			$char = "BAKU-0";
			$kode_bahan_baku = $char . $j;
		}
		$kode_bahan_baku;
			
		
		$query = mysqli_query($this->con, "SELECT * from peramalan_penjualan WHERE tahun = '$peramalan' AND bulan_angka = '$bulan'");
		while($m = mysqli_fetch_array($query))
		{ 
			$kode_produk = $m['kode_produk'];
			$ambil = $m['peramalan'];
			
		}
		
		//GROSS REQUIREMENT per bahan baku
		$query = mysqli_query($this->con, "SELECT DISTINCT kode_bahan_baku from bom");
		while($m = mysqli_fetch_array($query))
		{ 
		$kode_bahan_baku = $m['kode_bahan_baku'];
			
			$gr = 0;
			$query1 = mysqli_query($this->con, "SELECT * from produk");
			while($n = mysqli_fetch_array($query1))
			{ 
				$kode_produk = $n['kode_produk'];
				$banyak_produksi = $n['banyak_produksi'];
				
				$ambil =0;
				$query3 = mysqli_query($this->con, "SELECT * from peramalan_penjualan  WHERE tahun = '$peramalan' AND bulan_angka = '$bulan' AND kode_produk='$kode_produk'");
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
				$jumlah_penggunaan = 0;
				$query2 = mysqli_query($this->con, "SELECT * from bom INNER JOIN bahanbaku ON bom.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE bom.kode_bahan_baku = '$kode_bahan_baku' AND bom.kode_produk = '$kode_produk'");
				while($o = mysqli_fetch_array($query2))
				{
					$jumlah_penggunaan = $o['jumlah_penggunaan'];
					$ph = $o['jumlah_bahan_baku'];
					$lotsize = $o['lotsize'];
					
				}
			 $jumlah_penggunaan; "<br>";
			
					$coba = round(((ceil($ambil/$akhir))*$jumlah_penggunaan/$banyak_produksi), 1);
					$temp = $coba;
					$gr += $temp;
			}
			
			//Ambil tanggal
			for($i = $tanggal+1; $i <= $akhir; $i++)
			{
				
				if ($i < 10){
					$char = "0";
					$kode= $char.$i;
				}
				else{
					$char = "";
					$kode = $char.$i;
				}
				
				$tgl_sr = $char.$i;
				$bln_sr= date('m');
				$sr_p = 0;
				$sr_b = 0;
					
				$temp1 = 0;
				$temp2 = 0;
				
				
				
				//Cek jumlah Schedule Receipt Produk
				$sql2 = mysqli_query($this->con, "SELECT * FROM pre_order WHERE tgl = '$tgl_sr' AND bln = '$bln_sr'");
				while($w = mysqli_fetch_array($sql2))
				{
					//Schedule Receipt
			
					$kode_produk = $w['kode_produk'];
					
					$query1 = mysqli_query($this->con, "SELECT * from produk WHERE kode_produk = '$kode_produk'");
					while($x = mysqli_fetch_array($query1))
					{
						$banyak_produksi = $x['banyak_produksi'];
					}
					
					$jumlah_penggunaan = 0;
					$query11 = mysqli_query($this->con, "SELECT * from bom WHERE kode_produk = '$kode_produk' AND kode_bahan_baku = '$kode_bahan_baku'");
					while($y = mysqli_fetch_array($query11))
					{
						 $jumlah_penggunaan = $y['jumlah_penggunaan']; 
					}
				 $jumlah_penggunaan; 
				 $schedule = $w['jumlah'];
				 $n = round(($w['jumlah']*$jumlah_penggunaan/$banyak_produksi), 1); 
					$temp1 = $n;
					$sr_p += $temp1;
				}
				
				
				//Cek jumlah Schedule Bahan Baku
				$sql3 = mysqli_query($this->con, "SELECT * FROM pre_order_bb WHERE tanggal = '$tgl_sr' AND bln = '$bln_sr' and kode_bahan_baku = '$kode_bahan_baku'");
				while($g = mysqli_fetch_array($sql3))
				{
					//Schedule Receipt
					$sr_b = $g['jumlah'];
					$sr_b += $temp2; 
				}

				
				
				//Proses Pengurangan
				$sr = abs($sr_b - $sr_p);
				
				$ph = round(($ph - $gr + $sr_b - $sr_p), 1);
				
				
				$gr1 = $gr+$sr_p;
					$char3 = "-";
					$ID_perhitungan = $kode_bahan_baku.$char3.$kode;
					
					//INPUT DATABSE MRP PERHITUNGAN 
					$ii = "";
					if ($i < 10){
						$char = "0";
						$ii = $char.$i;
					}
					else{
						$ii = $i;
					}
			
				mysqli_query($this->con, "INSERT INTO mrp_perhitungan(ID_perhitungan, kode_bahan_baku, tanggal, gr, sr, ph,net)VALUES('$ID_perhitungan','$kode_bahan_baku','$ii','$gr1','$sr_b','$ph','0')");
			
				//Menghitung ROP
				$sql = mysqli_query($this->con, "SELECT * from bom INNER JOIN bahanbaku ON bahanbaku.kode_bahan_baku = bom.kode_bahan_baku WHERE bom.kode_bahan_baku = '$kode_bahan_baku'");
				while($p = mysqli_fetch_array($sql))
				{
					//Ambil safety stock
					$ss = $p['safety_stock'];
					$lt = $p['lead_time'];
					 $ROP = ceil($lt*$gr)+$ss; 
					
					if($ph < $gr){
						$ambilTgl = $i+1;
						if ($ambilTgl < 10){
							$char = "0";
							$net = $gr - $ph + $sr_b   ;
							$ambilTgltes = $char.$ambilTgl;
						}
						else{
							$char = "";
							$net = $gr - $ph + $sr_b  ;
							$ambilTgltes = $char.$ambilTgl;
						}
						
						$tgl1 = date($ambilTgltes."-".date('m')."-".$tahun);
						$tgl2 = date('d-m-Y', strtotime('-'.$lt.' days', strtotime($tgl1)));
					
						$periode = substr($tgl2, 0, 2)+$lt;
						if ($periode < 10){
							$char = "0";
							$periode = $char.$periode;
						}
						else{
							$char = "";
							$periode = $char.$periode;
						}
						
						$periode1 = substr($tgl2, 0, 2);
						
						
						//cek pembelian
						$kode_pembelian = NULL;
						$sql8 = mysqli_query($this->con, "SELECT * FROM pembelian WHERE pb_date = '$tgl2' AND kode_bahan_baku = '$kode_bahan_baku'");
						while($h = mysqli_fetch_array($sql8))
						{
							$kode_pembelian = $h['kode_pembelian'];
						}
						
						if($kode_pembelian == NULL){
							$status_porel = 0;
						}
						else{
							$status_porel = 1;
						}
						
						
						//Tambah bahan baku
						$ph = $ph + $p['lotsize'];	
						
						$char4 = "-";
						$ID_mrp = $kode_bahan_baku.$char4.substr($tgl2,0,2);
						$ID_tes = $kode_bahan_baku.$char3.$kode;
						
						//INSERT BAHAN BAKU KE DB MRP
					
					
						mysqli_query($this->con, "UPDATE mrp_perhitungan  set net = '$net' WHERE ID_perhitungan = '$ID_perhitungan'");
						mysqli_query($this->con, "INSERT INTO porec(kode_bahan_baku, tgl, net, porec)VALUES('$kode_bahan_baku','$periode','$net','$lotsize')");
						
						mysqli_query($this->con, "UPDATE mrp_perhitungan set porec = '$lotsize' WHERE kode_bahan_baku = '$kode_bahan_baku' AND tanggal = '$periode'");
						
						mysqli_query($this->con, "UPDATE mrp_perhitungan set porel = '$lotsize' WHERE kode_bahan_baku = '$kode_bahan_baku' AND tanggal = '$periode1'");
						
						//INSERT KE DB MRP
					}
				}
			}
				 
		}//selesai
	}
}}}







		


?>
