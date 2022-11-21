<?php 
session_start();
include 'koneksi.php';
$username=$_POST['username'];
$password=$_POST['password'];
$pas=md5($password);

$query1=mysql_query("SELECT * FROM user WHERE username='$username' AND password='$pas'")or die(mysql_error());

if(mysql_num_rows($query1)==1){
	$b=mysql_fetch_array($query1);
	$id=$b['id'];
	$_SESSION['nama_user']=$b['nama_user'];	
	$_SESSION['role']=$b['jabatan'];
	$_SESSION['id']=$id;
		
	if($b['jabatan']=="Admin"){
			header("location:_Pemilik/Dashboard.php");			
	}
	elseif ($b['jabatan']=="Manufaktur") {
			header("location:_Pegawai/Dashboard.php");		
		}
		elseif ($b['jabatan']=="Kasir") {
			header("location:_Kasir/Dashboard.php");		
		}		
	}
	else{
	header("location:index.php?pesan=gagal");
}
// echo $pas;
 ?>