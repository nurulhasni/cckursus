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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php  echo $namaaplikasi ?></title>
    <link href="lib/css/bootstrap.css" rel="stylesheet">
    <link href="lib/css/style.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">
    <?php include 'layout/navbar.php'; ?>
    <h3 align="center">Daftar Log Kursus Anda</h3>
    <hr>
    <div class="col-md-12 well">
    	<?php  
    	$logquery=mysql_query("SELECT * FROM log_baba WHERE akun_id='".$_SESSION['userid']."' ORDER BY log_id DESC");
    	while ($row=mysql_fetch_array($logquery)) {
    		$materiq=mysql_query("SELECT * FROM materi WHERE materi_id='".$row['materi_id']."'");
    		$materi=mysql_fetch_array($materiq);
    		$sub=mysql_fetch_array(mysql_query("SELECT * FROM sub WHERE id_sub='".$row['id_sub']."'"));
    	?>
    	<div class="alert alert-success">
    		<p>
    		<i class='glyphicon glyphicon-ok'></i> Anda Telah Menyelesaikan Materi <?php echo "<b>".$materi['judul_materi'].": ".$sub['judul_sub']."</b>"; ?>  
    		<span class='pull-right'><i class='glyphicon glyphicon-time'></i> <?php echo $row['tanggal'] ?></span>
    		</p>
    	</div>
    	<?php
    	}
    	?>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
  </body>
</html>
