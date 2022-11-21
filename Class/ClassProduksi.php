<?php
class Produksi{
	public $kode_produksi;
	public $kode_faktur_produksi;
	public $kode_produk;
	public $produksi_ramal;
	public $produksi_tambahan;
	public $produksi_sr;
	public $produksi_total;
	public $produksi_laporan;
	public $produksi_tgl;
	public $produksi_jual;
	public $produksi_bulan;
	
	function __construct(){	
		$con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $con; 
	}
	
	function TampilSemua(){
		$tanggal = date ('d-m-Y');
		$tgl = (int) substr($tanggal ,5, 2);
		
		$bulan = date ('m');
		$query = mysqli_query($this->con, "SELECT * FROM produksi where produksi_bulan='$bulan'");
		$i = 0;
		while($m = mysqli_fetch_array($query)){
			$data[$i]['kode_faktur_produksi'] = $m['kode_faktur_produksi'];
			$data[$i]['kode_produk'] = $m['kode_produk'];
			$data[$i]['produksi_tgl'] = $m['produksi_tgl'];
			$data[$i]['produksi_total'] = $m['produksi_total'];
			$data[$i]['produksi_jual'] = $m['produksi_jual'];
		
			$i++;
		}
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function KeranjangHapus($produksi_tgl){
	$query = mysqli_query($this->con, "DELETE FROM produksi_temp WHERE produksi_tgl = '$produksi_tgl'");
		header('location:../_Pegawai/Produksi.php');
	}
	
	function KeranjangTambah($produksi_tgl,$kode_produk,$produksi_ramal,$produksi_tambahan,$produksi_sr,$produksi_total){
		$kode_produk = $_POST['kode_produk'];
		$tg = date('d');
		$tgl = date('d-m-Y');
		$ambil_tahun = date('Y');
		$bulan = substr($tgl, 4, 1);
		$tahun = substr($tgl, 6, 2);
		
	if ($bulan < 10){
		$char = "0";
		$bulan = $char . $bulan;
	}
	else{
		$bulan = $bulan;
	}
	
		$ambilKode1 = mysqli_query($this->con, "SELECT substr((max(kode_produksi)), 9, 3) as maxKode FROM produksi");
	
	
							$ambilKode = mysqli_fetch_array($ambilKode1);
							$kode_produksi1 = $ambilKode['maxKode']; 
							$nomor = (int) substr($kode_produksi1, 2, 5);
							$nomor++;
							$char = "-";
							$kode_produksi = $char.sprintf("%05s", $nomor);
	
	
				
	
		$final = "PR-" . $bulan . $tg . $tahun. $kode_produksi ."-".$kode_produk ;

	$kode_produksi  = $final;
	$kode_produk = $_POST['kode_produk'];
	$produksi_tgl = $_POST['produksi_tgl'];
	$produksi_ramal = $_POST['produksi_ramal'];
	$produksi_tambahan= $_POST['produksi_tambahan'];
	$produksi_sr = $_POST['produksi_sr'];
	$produksi_total= $_POST['produksi_total'];

	$tambahan= $_POST['produksi_tambahan'];
	if($tambahan == null){
	$produksi_tambahan = 0;
	}
	else{
	$produksi_tambahan = $tambahan;
	}

	$total = $_POST['produksi_total'];
	if($total == null){
	$produksi_total = $pr_ramal;
	}
	else{
	$produksi_total = $total; 
	}
				  
				  $query = mysqli_query($this->con, "INSERT INTO produksi_temp(
															kode_produksi,
															produksi_tgl,
															kode_produk,
															produksi_ramal,
															produksi_tambahan,
															produksi_sr,
															produksi_total) 
											 VALUES('$kode_produksi',
											 '$produksi_tgl',
											 '$kode_produk',
											 '$produksi_ramal',
											'$produksi_tambahan',
										'$produksi_sr',	
										'$produksi_total')");
		
				?>
					<script type="text/javascript">
						alert("Berhasil!");
						window.location = "../_Pegawai/Produksi.php";						
					</script>	
				<?php

}
	function tambahProduksi($produksi_tgl){
	$tanggal = date('dmY');
	$tanggalLap = date('d-m-Y');
	$tg = date('d');
	$bulan = date('m');
	$tahun = substr((date('Y')), 2, 2);
	$faktur = "FAKTUR-PR-" . $bulan . $tahun . "-" . $tg;
	

	$produksi_laporan = date("Y-m-d", strtotime($tanggalLap));
	$query = mysqli_query($this->con, "SELECT * FROM produksi_temp WHERE produksi_tgl = '$produksi_tgl'");
	while($m = mysqli_fetch_array($query))
	{
	$kode_produk = $m['kode_produk'];
	$produksi_ramal = $m['produksi_ramal']; 
	$produksi_tambahan = $m['produksi_tambahan']; 
	$produksi_sr = $m['produksi_sr']; 
	$produksi_total = $m['produksi_total']; 
	
	$bulan = date('m');
	$tahun = substr((date('Y')), 2, 2);
	$ambilKode1 = mysqli_query($this->con, "SELECT substr(max(kode_produksi), 9, 3) as maxKode FROM produksi");

	
	
							$ambilKode = mysqli_fetch_array($ambilKode1);
							$kode_produksi1 = $ambilKode['maxKode']; 
							$nomor = (int) substr($kode_produksi1, 2, 5);
							$nomor++;
							$char = "-";
							$kode_produksi = $char.sprintf("%05s", $nomor);
	
	
				
	
		$final1 = "PR-" . $bulan . $tg . $tahun. $kode_produksi ."-".$kode_produk ;
		
			
		$query2 = mysqli_query($this->con, "SELECT * FROM produk WHERE kode_produk='$kode_produk'");
		while($m = mysqli_fetch_array($query2)){
			
			$banyak_produksi = $m['banyak_produksi'];
		
		
		 $query4 = mysqli_query($this->con, "SELECT * from bom WHERE kode_produk='$kode_produk'");
         while($m = mysqli_fetch_array($query4)){
                $jumlah_penggunaan = $m['jumlah_penggunaan'];
                $kode_bahan_baku = $m['kode_bahan_baku'];
		
		$query3 = mysqli_query($this->con, "SELECT jumlah_bahan_baku FROM bahanbaku WHERE kode_bahan_baku='$kode_bahan_baku'");
        while($m = mysqli_fetch_array($query3)){
                 $jumlah_bahan_baku = $m['jumlah_bahan_baku'];	

		
        $penggunaan_produksi = round (($jumlah_penggunaan * $produksi_total / $banyak_produksi),1);		 
	
		if(($jumlah_bahan_baku) <= ($penggunaan_produksi)){
				?>
					<script type="text/javascript">
						alert("Bahan Baku tidak mencukupi!");
						window.location = "../_Pegawai/Produksi.php";						
					</script>	
				<?php
				exit;	
		}}}}
		
		$query9 = mysqli_query($this->con, "SELECT * FROM produk WHERE kode_produk='$kode_produk'");
		while($z = mysqli_fetch_array($query9)){
		
			$banyak_produksi = $z['banyak_produksi'];
		
		
		 $query8 = mysqli_query($this->con, "SELECT * from bom WHERE kode_produk='$kode_produk'");
         while($b = mysqli_fetch_array($query8)){
                $jumlah_penggunaan = $b['jumlah_penggunaan'];
                $kode_bahan_baku = $b['kode_bahan_baku'];
		
		$query6 = mysqli_query($this->con, "SELECT jumlah_bahan_baku FROM bahanbaku WHERE kode_bahan_baku='$kode_bahan_baku'");
        while($y = mysqli_fetch_array($query6)){
                 $jumlah_bahan_baku = $y['jumlah_bahan_baku'];	

		
        $penggunaan_produksi = round (($jumlah_penggunaan * $produksi_total / $banyak_produksi),1);		 

       //hitung penggunaan bahan baku

		
		//sisa bahan baku 
        $jumlah_bahan_baku1 = $jumlah_bahan_baku - $penggunaan_produksi;
		
        //      update untuk kurang tb_bahan_baku
                  $update = mysqli_query($this->con, "UPDATE bahanbaku SET jumlah_bahan_baku='$jumlah_bahan_baku1' WHERE kode_bahan_baku='$kode_bahan_baku'");
				  
		
		mysqli_query($this->con, "INSERT INTO produksi(
															kode_produksi,
															kode_faktur_produksi,
															produksi_tgl,
															produksi_bulan,
															kode_produk,
															produksi_ramal,
															produksi_tambahan,
															produksi_sr,
															produksi_total,
															produksi_laporan) 
											 VALUES('$final1',
											 '$faktur',
											 '$produksi_tgl',
											 '$bulan',
											 '$kode_produk',
											 '$produksi_ramal',
											'$produksi_tambahan',
										'$produksi_sr',	
										'$produksi_total',
										'$produksi_laporan')");
		
				$insert = mysqli_query($this->con, "INSERT INTO penggunaan(tgl_penggunaan,kode_bahan_baku,jumlah_penggunaan,status_penggunaan) VALUES ('$produksi_laporan','$kode_bahan_baku','$penggunaan_produksi','KELUAR')");				
														
		
		mysqli_query($this->con, "DELETE FROM produksi_temp WHERE produksi_tgl = '$produksi_tgl'");

}}}}
}
}

	?>