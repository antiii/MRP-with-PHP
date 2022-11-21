<?php
include "../Class/ClassMRP.php";

$mrp = new Mrp;

$kode_produk = $_POST['kode_produk'];

$mrp->tambahMRP($kode_produk);
?>