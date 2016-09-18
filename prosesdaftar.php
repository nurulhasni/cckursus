<?php
require_once('conf/config.php');
$username = $_POST['username'];
$pass = $_POST['password'];
$nama_lengkap = $_POST['nama_lengkap'];
$cekuser = mysql_query("SELECT * FROM akun WHERE username = '$username'");
if(mysql_num_rows($cekuser) > 0) {
   echo "Username Sudah Terdaftar!";
   echo '<a href="daftar.php">Back</a>';
} else {
   if(!$username || !$pass) {
     echo "Masih ada data yang kosong!";
     echo '<a href="daftar.php">Back</a>';
   } else {
     $simpan = mysql_query("INSERT INTO akun(nama_lengkap, username, password) VALUES('$nama_lengkap','$username', '$pass')");
     if($simpan) {
      echo "Pendaftaran Sukses! Silakan ";
       echo '<a href="home.php">Login</a>';
     } else {
       echo "Proses Gagal!";
     }
   }
}
?>