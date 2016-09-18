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
       <hr>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive img-border-left" src="assets/img/nsgor.jpg" alt="">
                </div>
                <div class="col-md-6">
                    <p>Cooking Course adalah tempat terbaik untukmu yang ingin belajar memasak.</p>
                    <p>Kami menyediakan berbagai resep dan video tutorial memasak yang mudah untuk anda praktekkan di rumah.</p>
                    <p>Ayo mulai memasak, dan tunjukan kreasi masakanmu!</p>
                </div>
                 <?php 
      $sql2="SELECT * FROM materi ORDER BY materi_id ASC";
      $query2=mysql_query($sql2);
      while ($row=mysql_fetch_array($query2)) { ?>

      <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title" align="center"><a href="<?php echo $linkaplikasi ?>kursus.php?id=<?php echo $row['materi_id'] ?>&nomor=1"><?php echo $row['judul_materi'] ?></a></h3>
          </div>
          
          
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
                <div class="clearfix"></div>
            </div>
        </div>
     
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
  </body>
</html>
