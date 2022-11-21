<?php
include "../Class/ClassBahanBaku.php";
include "../Class/ClassMRP.php";

$bahanBaku = new bahanBaku;
$mrp = new Mrp;


$kode_bahan_baku = $_POST['kode_bahan_baku'];
$kode_supplier = $_POST['kode_supplier'];
$nama_bahan_baku = $_POST['nama_bahan_baku'];

$harga_bahan_baku = $_POST['harga_bahan_baku'];
$jumlah_bahan_baku = $_POST['jumlah_bahan_baku'];
$satuan = $_POST['satuan'];
$lead_time = $_POST['lead_time'];
$lotsize = $_POST['lotsize'];
$rop = '';
$safety_stock = $_POST['safety_stock'];

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
	$bahanBaku->tambahBahanBaku($kode_bahan_baku,$kode_supplier,$nama_bahan_baku,$harga_bahan_baku,$jumlah_bahan_baku,$satuan,$lead_time,$lotsize,$rop,$safety_stock);
	?>
			<script type="text/javascript">
				alert("Bahan baku berhasil ditambah!");		
				window.location = "../_Pegawai/DataBahanBaku.php";				
			</script>
			<?php
}elseif ($aksi == "hapus") {
	$bahanBaku->hapusBahanBaku($kode_bahan_baku);
	$mrp->tambahMRP($kode_produk);
	header ("location:../_Pegawai/DataBahanBaku.php");
}elseif ($aksi == "update") {
	$bahanBaku->updateBahanBaku($kode_bahan_baku,$nama_bahan_baku,$harga_bahan_baku,$satuan,$safety_stock,$lotsize,$kode_supplier);
	header ("location:../_Pegawai/DataBahanBaku.php");
}
?>

