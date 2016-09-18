<?php  
session_start();
require_once('conf/config.php');
require_once('conf/data.php');
if ($_SESSION['login']==false) { // Cek Jika Belum Login
	header('Location:home.php');
}
$sql="SELECT * FROM akun WHERE akun_id='".$_SESSION['userid']."'";
$query=mysql_query($sql);
$profil=mysql_fetch_array($query);
$ceksudahbelum=mysql_query("SELECT * FROM log_baba WHERE akun_id='".$_SESSION['userid']."'");
if(mysql_num_rows($ceksudahbelum) != 9){
	echo 'Anda belum menyelesaikan kursus!<br/>';
  echo '<a href="user.php">&laquo; Kembali</a>';
  ?>

<?php
}else{
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php  echo $namaaplikasi ?></title>
    <link href="lib/css/bootstrap.css" rel="stylesheet">
    <link href="lib/css/style.css" rel="stylesheet">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/home.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">
    <?php include 'layout/navbar.php'; ?>
      <div class="header">
        <h2 align="center">Ujian</h2>
        
      </div>
       
     <div>
     <p align="center">Silakan upload foto kreasi masakan anda untuk mendapatkan sertifikat.</p>

        <div>
    
        <form enctype="multipart/form-data" action="upload.php" method="post">
        <table align="center">
        
            <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Judul Masakan</p></font></td>
            <td><input type="text" name="judul" size="30"/></td>
        </tr>
        
       
        <tr>
            <td width="29%" height="37" valign="middle"><font size="2" face="verdana"><p>Dokumentasi Masakan</p></font></td>
            <td><input type="file"  name="gambar" size="30" id="gambar" /></td>
        </tr>
        

        <tr>
            <td>&nbsp;</td>
            <td width="50%"><input class="btn btn-primary " name="submit" type="submit" value="Submit" />&nbsp;</td>
            
        </tr>
        </table>
        </form>
    
</div>



</div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
?>

