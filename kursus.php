<?php  
session_start();
require_once('conf/config.php');
require_once('conf/data.php');
if ($_SESSION['login']==false) { // Cek Jika Belum Login
	header('Location:login.php');
}

$id=$_GET['id'];
$nomor=$_GET['nomor'];
//Mendapatkan Akun
$sql="SELECT * FROM akun WHERE akun_id='".$_SESSION['userid']."'";
$query=mysql_query($sql);
$profil=mysql_fetch_array($query);

//Mendapatkan Detail Materi
$detmateri=mysql_query("SELECT * FROM materi WHERE materi_id='$id'");
$materi=mysql_fetch_array($detmateri);



//Mendapatkan Putar Sekarang Sub Kursus
$putarsub=mysql_query("SELECT * FROM sub WHERE materi_id='$id' AND nomor='$nomor' ORDER BY nomor ASC");
$putar=mysql_fetch_array($putarsub);

//Cek apakah pernah nonton
$ceknonton=mysql_query("SELECT * FROM log_baba WHERE akun_id='".$_SESSION['userid']."' AND materi_id='$id' AND id_sub='".$putar['id_sub']."'");
if (mysql_num_rows($ceknonton)==0) {
	mysql_query("INSERT INTO log_baba(akun_id,materi_id,id_sub) VALUES('".$_SESSION['userid']."','$id','".$putar['id_sub']."')");
}
//Mendapatkan Daftar Putar
$dafputar=mysql_query("SELECT * FROM sub WHERE materi_id='$id' ORDER BY nomor ASC");
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
        <h2 align="center"><?php  echo $namaaplikasi ?></h2>
        <p align="center"><?php  echo $keteranganaplikasi ?></p>
      </div>

    <div class="container">
    <?php include 'layout/navbar.php'; ?>
    <div class="col-md-12" align="center">
      <video controls width="960" height="430">
      	<source src="<?php echo $putar['link_video']?>">
      </video>
      <h2>
      <i class="glyphicon glyphicon-facetime-video"></i> <?php echo $materi['judul_materi'].": ".$putar['judul_sub'] ?>
      </h2>
    </div>
    <div class="container">
    <div class="col-lg-12">
		<div class="col-sm-8 well">
			<h5 class="b">
				
				<span class="badge badge-success pull-right">
					<?php if (mysql_num_rows($ceknonton)==1){ ?>
						Pernah Ditonton
					<?php }else{ ?>
						Belum Pernah Ditonton
					<?php } ?>
				</span>
			</h5>
			<hr>
			Keterangan
			<div class="well">
				<?php echo $putar['keterangan_sub'] ?>
			</div>
			<hr>
			
		</div>

		<div class="col-sm-4" style="background-color:">
			<h4>Daftar Putar</h4>
			<table class="table col-sm-12 table-bordered table-stripped">
			<?php while ($row=mysql_fetch_array($dafputar)) { ?>
			<tr>
				<td>
				<i class="glyphicon glyphicon-step-forward"></i> 
				<?php echo "<a href='".$linkaplikasi."kursus.php?id=".$id."&nomor=".$row['nomor']."'>".$row['judul_sub']."</a>" ?>
				<?php  
				$ceknonton2=mysql_query("SELECT * FROM log_baba WHERE akun_id='".$_SESSION['userid']."' AND materi_id='$id' AND id_sub='".$row['id_sub']."'");
				if (mysql_num_rows($ceknonton2)==0) {
					echo "<span class='badge pull-right' title='Belum Menonton'><i class='glyphicon glyphicon-eye-close'></i></span>";
				}else{
					echo "<span class='badge pull-right' title='Sudah Ditonton'><i class='glyphicon glyphicon-eye-open'></i></span>";
				}
				?>
				</td>
			</tr>
			<?php } ?>
			</table>
		</div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
  </body>
</html>
