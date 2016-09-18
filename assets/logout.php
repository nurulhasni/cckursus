<?php  
session_start(); // Memulai Sesi
if ($_SESSION['login']==false) { //Cek apabila belum login
	header('Location:home.php');
}else{ //menghapus session
	$_SESSION['login']=false;
	session_destroy();
	header('Location:home.php');
}
?>