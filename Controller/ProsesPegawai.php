<?php

include "../Class/ClassPegawai.php";

$pegawai = new Pegawai;

$aksi = $_GET['aksi'];
if ($aksi == "tambah") {
	$username= $_POST['username'];
	$password = $_POST['password'];
	$nama_user= $_POST['nama_user'];
	$jabatan= $_POST['jabatan'];
	$kode_user= $_POST['kode_user'];
	$alamat=$_POST['alamat'];
	$no_hp=$_POST['no_hp'];
	$foto = $_FILES['foto']['name'];
	$pegawai->tambahPegawai($username,$password,$nama_user,$alamat,$jabatan,$kode_user,$no_hp,$foto);
	header("location:../_Pemilik/DataPegawai.php"); 
}elseif ($aksi == "hapus") {
	$kode_user = $_GET['kode_user'];
	$pegawai->hapusPegawai($kode_user);
	header("location:../_Pemilik/DataPegawai.php");
}elseif ($aksi == "update") {
	$kode_user= $_POST['kode_user'];
	$alamat=$_POST['alamat'];
	$nama_user= $_POST['nama_user'];
	$username= $_POST['username'];


	$pegawai->updatePegawai($kode_user,$nama_user,$username,$alamat);
	header("location:../_Pemilik/DataPegawai.php");
}
?>