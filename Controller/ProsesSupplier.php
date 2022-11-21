<?php
include "../Class/ClassSupplier.php";

$supplier = new Supplier;

$kode_supplier= $_POST['kode_supplier'];
$nama_supplier= $_POST['nama_supplier'];
$alamat_supplier= $_POST['alamat_supplier'];
$telp_supplier= $_POST['telp_supplier'];

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
	$supplier->tambahSupplier($kode_supplier,$nama_supplier,$alamat_supplier,$telp_supplier);
	header ("location:../_Pegawai/DataSupplier.php");
}elseif ($aksi == "update") {
	$supplier->updateSupplier($kode_supplier,$nama_supplier,$alamat_supplier,$telp_supplier);
	header ("location:../_Pegawai/DataSupplier.php");
}
elseif ($aksi == "tambahsup") {
	$supplier->tambahSupplierPembelian($kode_supplier,$nama_supplier,$alamat_supplier,$telp_supplier);
		header ("location:../_Pegawai/DataSupplier.php");
}


?>


								 				
	