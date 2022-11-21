<?php
class Pembelian{
	
	public $kode_pembelian;
	public $kode_faktur;
	public $kode_supplier;
	public $kode_bahan_baku;
	public $nama_bahan_baku;
	public $pb_date;
	public $pb_date_tiba;
	public $bulan;
	public $tahun;
	public $pb_jumlah;
	public $satuan;
	public $pb_status;
	public $pb_porel;
	public $pb_laporan;
	public $jumlah;

function __construct(){	
		$con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $con; 
	}
	
	function TampilSemua(){
		$tahun_ini = date('Y');	
		$bulan_ini = date('m');				
		$query = mysqli_query($this->con, "SELECT DISTINCT kode_faktur,pb_date,kode_supplier,bulan FROM pembelian  where bulan='$bulan_ini' and tahun='$tahun_ini'");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_faktur'] = $m['kode_faktur'];
			$data[$i]['pb_date'] = $m['pb_date'];
			$data[$i]['kode_supplier'] = $m['kode_supplier'];
			
			$i++;
		}
		
		
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function TampilSemuaStatus(){
		$pb_status = "";			
		$query = mysqli_query($this->con, "SELECT * FROM pembelian WHERE pb_status='Menunggu'");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_pembelian'] = $m['kode_pembelian'];
			$data[$i]['pb_date'] = $m['pb_date'];
			$data[$i]['pb_date_tiba'] = $m['pb_date_tiba'];
			$data[$i]['pb_jumlah'] = $m['pb_jumlah'];
			$data[$i]['pb_status'] = $m['pb_status'];
			$data[$i]['kode_bahan_baku'] = $m['kode_bahan_baku'];
			
			
			$i++;
		}
		
		
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
		function TampilDataPembelian($kode_faktur){
		$query = mysqli_query($this->con, "SELECT * FROM pembelian WHERE kode_faktur='$kode_faktur'");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_faktur'] = $m['kode_faktur'];
			$data[$i]['kode_bahan_baku'] = $m['kode_bahan_baku'];
			$data[$i]['pb_jumlah'] = $m['pb_jumlah'];
			$data[$i]['pb_status'] = $m['pb_status'];
			$i++;
		}
		
		
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function TampilPembelian(){
		$bd_tgl = '';
		$supp = $_GET['supplier'];
		$bb = $_GET['bahanbaku'];
				
		$query = mysqli_query($this->con, "SELECT * FROM pembelian INNER JOIN supplier ON pembelian.kode_supplier = supplier.kode_supplier INNER JOIN bahanbaku ON pembelian.kode_bahan_baku = bahanbaku.kode_bahan_baku WHERE pembelian.kode_faktur = pembelian.kode_faktur ".$supp." ".$bb." ".$bd_tgl."");
	
			$m = mysqli_fetch_object($query);
			$this->nama_supplier = $m->nama_supplier;
			$this->nama_bahan_baku = $m->nama_bahan_baku;
			$this->pb_date = $m->pb_date;
			$this->pb_jumlah = $m->pb_jumlah;
			$this->satuan = $m->satuan;
			$this->pb_status = $m->pb_status;
		}
		
function HapusKeranjangPembelian($kode_keranjang){
		
		include "koneksi.php";
		
		$query = mysqli_query($this->con, "DELETE FROM keranjang WHERE kode_keranjang = '$kode_keranjang'");


		
	}
	

	function TambahKeranjangPembelian($nama_bahan_baku,$jumlah,$hari_sampai){
		include "koneksi.php";

	 	$query = mysqli_query($this->con, "SELECT * from bahanbaku WHERE nama_bahan_baku='$nama_bahan_baku'");
		while($m = mysqli_fetch_array($query))
	{
	$kode_bahan_baku = $m['kode_bahan_baku'];

	}
	$nama_supplier = $_POST['nama_supplier'];
	$query1 = mysqli_query($this->con, "SELECT * from supplier WHERE nama_supplier='$nama_supplier'");
	while($n = mysqli_fetch_array($query1))
	{
	$kode_supplier = $n['kode_supplier'];
	}
	$jumlah = $_POST['lotsize'];
	$hari_sampai = $_POST['hari_sampai'];


	if(!empty($kode_bahan_baku) && !empty($kode_supplier) && !empty($jumlah)){
	$query = mysqli_query($this->con, "INSERT INTO keranjang(kode_supplier,kode_bahan_baku,jumlah,hari_sampai)VALUES('$kode_supplier','$kode_bahan_baku','$jumlah','$hari_sampai')");
	}
	
	

	}
	
function TambahPembelian($kode_supplier){

	$tanggal = date('d-m-Y');
$bulan = date('m');
$ambil_tahun = date('Y');
$tahun = substr((date('Y')), 2, 2);
$pb_laporan = date("Y-m-d", strtotime($tanggal));
$bulan = $bulan;
$tahun1 = $ambil_tahun;
$status = 'Menunggu';


$ambilKode1 = mysqli_query($this->con, "SELECT substr((max(kode_faktur)), 13, 3) as maxKode1 FROM pembelian");
$ambilKode2 = mysqli_fetch_array($ambilKode1);
$ID2 = $ambilKode2['maxKode1'];
$ID2 = $ID2 + 1;

	if ($ID2 < 10){
		$char = "00";
		$faktur = "FAKTUR-" . $bulan . $tahun . "-" . $char . $ID2 ;
	}
	if ($ID2 < 100){
		$char1 = "0";
		$faktur = "FAKTUR-" . $bulan . $tahun . "-" . $char1 . $ID2 ;
	}
	else{
		$faktur = "FAKTUR-" . $bulan . $tahun . "-" . $ID2 ;
	}


$query = mysqli_query($this->con, "SELECT * FROM keranjang WHERE kode_supplier = '$kode_supplier'");
while($m = mysqli_fetch_array($query))
{
	
	
							$ambilKode1 = mysqli_query($this->con, "SELECT max(kode_pembelian) as maxKode FROM pembelian");
							$ambilKode = mysqli_fetch_array($ambilKode1);
							$kode_pembelian1 = $ambilKode['maxKode']; 

							$nomor = (int) substr($kode_pembelian1, 4, 5);
							$nomor++;
							$char = "PB-";
							$kode_pembelian = $char.sprintf("%05s", $nomor);
				

	
	$kode_keranjang = $m['kode_keranjang'];
	$kode_bahan_baku = $m['kode_bahan_baku'];
	$jumlah = $m['jumlah'];
	$lead_time = $m['hari_sampai'];
	

	if($lead_time == null){
		$query1 = mysqli_query($this->con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku = '$kode_bahan_baku'");
		while($n = mysqli_fetch_array($query1))
		{
			$lead_time = $n['lead_time'];
		}
	}
	else{
		//INPUT SEBAGAI SR
		$sekarang = date('d-m-Y');
		$tiba = date('d-m-Y', strtotime('+'.$lead_time.' days', strtotime($sekarang)));
		$final_tgl = substr($tiba, 0, 2);
		$final_bln = substr($tiba, 3, 2);
		mysqli_query($this->con, "INSERT INTO pre_order_bb(kode_bahan_baku,tanggal,bln,jumlah,status) VALUES('$kode_bahan_baku','$final_tgl','$final_bln','$jumlah','0')");
	}
	
	$tanggal_tiba = date('d-m-Y', strtotime('+'.$lead_time.' days', strtotime($tanggal)));
	
	//cek tanggal porel
	$tanggal_porel = "";
	$query2 = mysqli_query($this->con, "SELECT * FROM porel WHERE tanggal = '$tanggal' AND kode_bahan_baku = '$kode_bahan_baku' AND status = '0'");
	while($o = mysqli_fetch_array($query2))
	{
		$tanggal_porel = $o['tanggal'];
	}
		
	$nilai = 0;
	if($tanggal_porel == null){
		$nilai = 0;
	}
	else{
		$nilai = 1;
		mysqli_query($this->con, "UPDATE porel set status = '$nilai' WHERE tanggal = '$tanggal' AND kode_bahan_baku = '$kode_bahan_baku' AND status = '0'");
	}
	
	
		mysqli_query($this->con, "INSERT INTO pembelian(kode_pembelian, kode_faktur, kode_supplier, kode_bahan_baku, pb_date, pb_date_tiba, bulan, tahun, pb_jumlah, pb_status, pb_porel, pb_laporan)VALUES('$kode_pembelian','$faktur','$kode_supplier','$kode_bahan_baku','$tanggal','$tanggal_tiba','$bulan','$tahun1','$jumlah','$status','$nilai','$pb_laporan')");
}
$query = mysqli_query($this->con, "DELETE FROM keranjang WHERE kode_supplier = '$kode_supplier'");

	}
function TerimaPesanan($kode_pembelian){
	include "koneksi.php";
	$hari_ini = date ('Y-m-d');
	$query = mysqli_query($this->con, "SELECT * FROM pembelian where kode_pembelian ='$kode_pembelian '");
		while($m = mysqli_fetch_array($query)){
			//$jumlah_pesanan = $m['jumlah_pesanan'];
			$pb_jumlah = $m['pb_jumlah'];
			$kode_bahan_baku = $m['kode_bahan_baku'];
			
		$insert = mysqli_query($con, "INSERT INTO penggunaan(tgl_penggunaan,kode_bahan_baku,jumlah_penggunaan,status_penggunaan) VALUES ('$hari_ini','$kode_bahan_baku','$pb_jumlah','MASUK')");
		
		$query2 = mysqli_query($this->con, "SELECT * FROM bahanbaku WHERE kode_bahan_baku='$kode_bahan_baku'");
		while($m = mysqli_fetch_array($query2)){
			$jumlah_bahan_baku = $m['jumlah_bahan_baku'];
			$kode_supplier = $m['kode_supplier'];

			$tambah = $jumlah_bahan_baku + $pb_jumlah;
			
		
	
		
			}
		//update tambah bahan baku
		$update = mysqli_query($this->con, "UPDATE bahanbaku SET jumlah_bahan_baku='$tambah' WHERE kode_bahan_baku='$kode_bahan_baku'");
		
		//update laporan

		$kode_pesanan1 = mysqli_query($this->con, "SELECT kode_pembelian FROM pembelian WHERE kode_pembelian = '$kode_pembelian'");
		while($m = mysqli_fetch_array($kode_pesanan1)){
		$kode_pembelian=$m['kode_pembelian'];

		$update2 = mysqli_query($this->con, "UPDATE pembelian SET pb_status='berhasil' WHERE kode_pembelian='$kode_pembelian'");
		

		$update3 = mysqli_query($this->con, "UPDATE pre_order_bb SET status='1' WHERE kode_bahan_baku='$kode_bahan_baku'");
		}
		
		}
		
		
	
	}
function TolakPesanan($kode_pembelian){
	include "koneksi.php";
	
	$kode_pesanan1 = mysqli_query($this->con, "SELECT kode_pembelian FROM pembelian WHERE kode_pembelian = '$kode_pembelian'");
			while($m = mysqli_fetch_array($kode_pesanan1)){
				  $kode_pembelian=$m['kode_pembelian'];

			$update2 = mysqli_query($this->con, "UPDATE pembelian SET pb_status='Ditolak' WHERE kode_pembelian='$kode_pembelian'");
			
			}
				
}
	
}
	//Supplier
	?>