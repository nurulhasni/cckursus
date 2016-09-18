<?php
session_start();
error_reporting(1);
require_once('config.php');
require_once('data.php');

$username=$_POST['username'];
$password=$_POST['password'];
$nama_lengkap=$_POST['nama_lengkap'];

//$query_insert = "insert into akun(username, password,nama_lengkap ) values('$username', '$password','$nama_lengkap') where akun_id='".$_SESSION['userid']."';";
$sql="update akun set username='$username',
password='$password',
nama_lengkap='$nama_lengkap' where akun_id='".$_SESSION['userid']."';";

mysql_query($sql, $koneksi)
or die ("Failed".mysql_error());
header('Location:../profil.php')
?>