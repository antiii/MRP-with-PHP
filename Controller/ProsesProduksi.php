<?php
include "../Class/ClassProduksi.php";
include "../Class/ClassMRP.php";
include "../Class/ClassMRProduk.php";

$mrp = new Mrp;
$produksi = new Produksi;
$mrpproduk = new MRPProduk;

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {

	$produksi_tgl = $_GET['produksi_tgl'];
	$produksi->tambahProduksi($produksi_tgl);
		$mrp->tambahMRP($kode_produk);
	header ("location:../_Pegawai/Produksi.php");
}elseif ($aksi == "hapus") {
	$produksi_tgl = $_GET['produksi_tgl'];
	$produksi->KeranjangHapus($produksi_tgl);
}elseif ($aksi == "tambahkeranjang") {
	$kode_produk = $_POST['kode_produk'];
	$produksi_tgl = $_POST['produksi_tgl'];
	$produksi_ramal = $_POST['produksi_ramal'];
	$produksi_tambahan= $_POST['produksi_tambahan'];
	$produksi_sr = $_POST['produksi_sr'];
	$produksi_total= $_POST['produksi_total'];
	$produksi->KeranjangTambah($produksi_tgl,$kode_produk,$produksi_ramal,$produksi_tambahan,$produksi_sr,$produksi_total);
}
?>