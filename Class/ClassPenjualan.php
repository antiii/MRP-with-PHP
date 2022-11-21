
<?php
class Penjualan{
	public $kode_penjualan;								
	public $date;
	public $jumlah_penjualan;
	public $bulan;
	public $tahun;
	public $nama_user;
	public $nama_toko;
	public $nama_produk;
	public $total_penjualan;

function __construct(){	
		$con = mysqli_connect("localhost","root","","geprekf");
		$this->con = $con; 
	}
	
	function TampilSemua(){
		$bulan_ini = date('m');
		$tahun_ini = date('Y');	
		
		$query = mysqli_query($this->con, "SELECT * from penjualan where bulan='$bulan_ini' and tahun='$tahun_ini' ORDER BY `date` DESC ");
		$i = 0;
		while($fetch = mysqli_fetch_array($query)){
			$data[$i]['kode_penjualan'] = $fetch['kode_penjualan'];
			$data[$i]['nama_produk'] = $fetch['nama_produk'];
			$data[$i]['nama_user'] = $fetch['nama_user'];
			$data[$i]['nama_toko'] = $fetch['nama_toko'];
			$data[$i]['date'] = $fetch['date'];
			$data[$i]['jumlah_penjualan'] = $fetch['jumlah_penjualan'];
			$data[$i]['total_penjualan'] = $fetch['total_penjualan'];
			$i++;
		}
		
		
		if(mysqli_num_rows($query)!=0){
			return $data;
		} 
	}
	
	function TampilKeranjang(){
		$bulan_ini = date('m');
	
		$tahun_ini = date('Y');	
		
		$query = mysqli_query($this->con, "SELECT * FROM keranjang_penjualan where date='$date'");
		$i = 0;
		while($fetch = mysqli_fetch_array($query)){
			$data[$i]['kode_penjualan'] = $fetch['kode_penjualan'];
			$data[$i]['nama_produk'] = $fetch['nama_produk'];
			$data[$i]['nama_user'] = $fetch['nama_user'];
			$data[$i]['nama_toko'] = $fetch['nama_toko'];
			$data[$i]['date'] = $fetch['date'];
			$data[$i]['jumlah_penjualan'] = $fetch['jumlah_penjualan'];
			$data[$i]['total_penjualan'] = $fetch['total_penjualan'];
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
	
	
	
	function tambahPenjualan($date,$bulan,$tahun){
	$date = $_GET['date'];
	$query1 = mysqli_query($this->con, "SELECT * FROM keranjang_penjualan where date='$date'");
		while($n = mysqli_fetch_array($query1)){
			

			$ambilKode1 = mysqli_query($this->con, "SELECT max(kode_penjualan) as maxKode FROM penjualan");
			$ambilKode = mysqli_fetch_array($ambilKode1);
			$kode_penjualan1 = $ambilKode['maxKode']; 

			$nomor = (int) substr($kode_penjualan1, 5, 5);
			$nomor++;
			$char = "PJL-";
			$kode_penjualan = $char.sprintf("%05s", $nomor);
						
			$nama_produk = $n['nama_produk'];
			$nama_toko = $n['nama_toko'];
			$nama_user= $n['nama_user'];
			$jumlah_penjualan = $n['jumlah_penjualan'];
			$total_penjualan = $n['total_penjualan'];
			
		$query2 = mysqli_query($this->con, "SELECT * FROM produk WHERE nama_produk='$nama_produk'");
		while($m = mysqli_fetch_array($query2)){
		$kode_produk = $m['kode_produk'];
			
	$query = mysqli_query($this->con, "SELECT * FROM produksi WHERE produksi_laporan = '$date' and kode_produk='$kode_produk'");
	while($m = mysqli_fetch_array($query))
	{
	$kode_produksi = $m['kode_produksi']; echo "<br>";
	$produksi_jual= $m['produksi_jual']; echo "<br>";
	$produksi_total= $m['produksi_total']; echo "<br>";	
		
		if ($jumlah_penjualan > $produksi_total){
		?>
					<script type="text/javascript">
						alert("Produk Tidak Mencukupi, Silahkan Produksi!");
						window.location = "../_Pegawai/DataPenjualan.php";						
					</script>	
				<?php
			exit;		
		}
		else{
			
		$sisa = $produksi_jual - $jumlah_penjualan;
		
		$query3 = mysqli_query($this->con, "INSERT INTO penjualan(
															kode_penjualan,
															date,
															bulan,
															tahun,
															nama_user,
															nama_toko,
															nama_produk,
															jumlah_penjualan,
															total_penjualan) 
											 VALUES('$kode_penjualan',
											 				'$date',
															'$bulan',
															'$tahun',
															'$nama_user',
															'$nama_toko',
											 				'$nama_produk',
											 				'$jumlah_penjualan',
															'$total_penjualan')");
															
		//update tambah bahan baku
	
		
	$delete = mysqli_query($this->con, "DELETE from keranjang_penjualan WHERE date='$date'");

		
	$update1 =	mysqli_query($this->con, "UPDATE produksi SET produksi_jual = '$sisa' where produksi_laporan = '$date' and kode_produk='$kode_produk'");

					}
				}
			}
		}
	}
	
	function KeranjangHapus($date){	
		$query = mysqli_query($this->con, "DELETE FROM keranjang_penjualan WHERE date = '$date'");
		
	}
	
	function tambahKeranjangPenjualan($kode_keranjang,$kode_penjualan,$date,$nama_user,$nama_toko,$nama_produk,$jumlah_penjualan,$total_penjualan){
	
	$query2 = mysqli_query($this->con, "SELECT * FROM produk WHERE nama_produk='$nama_produk'");
	while($m = mysqli_fetch_array($query2)){
	$kode_produk = $m['kode_produk'];
			
	$query5 = mysqli_query($this->con, "SELECT * FROM produksi WHERE produksi_laporan = '$date' and kode_produk='$kode_produk'");
	while($m = mysqli_fetch_array($query5))
	{
	$produksi_laporan= $m['produksi_laporan']; echo "<br>";	
	$kode_produksi = $m['kode_produksi']; echo "<br>";
	$produksi_jual= $m['produksi_jual']; echo "<br>";
	$produksi_total= $m['produksi_total']; echo "<br>";	
			
	if ($jumlah_penjualan > $produksi_total){
		?>
					<script type="text/javascript">
						alert("Produk Tidak Mencukupi, Silahkan Produksi!");
						window.location = "../_Pegawai/DataProduksi.php";						
					</script>	
				<?php
			exit;		
		}
		else{


	$query = mysqli_query($this->con, "INSERT INTO keranjang_penjualan(kode_penjualan,nama_produk,nama_toko,jumlah_penjualan,nama_user,date,total_penjualan)VALUES('$kode_penjualan','$nama_produk','$nama_toko','$jumlah_penjualan','$nama_user','$date','$total_penjualan')");
				}
			}
		}	
	}
			
			
			
}	

?>