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

$username=$profil['username'];
$password=$profil['password'];
$nama_lengkap=$profil['nama_lengkap'];
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
  <?php include 'layout/navbar.php';?>
  	<div calss="jumbotron" align="center">
  		
  	</div>
  	   <div class="container" class="alert alert-success" >
  	     <h2 align="center">Profil <?php echo $profil['nama_lengkap'] ?></h2>
        		<div class="col-sm-6">
        			<ul class="list-group">
                <li class="list-group-item ">Nama Lengkap</li>
        			  <li class="list-group-item ">username</li>
              </ul>
        		</div>
        		<div class="col-sm-6">
        			<ul class="list-group">
                <li class="list-group-item "><?php echo $nama_lengkap?></li>
        			<li class="list-group-item "><?php echo $username?></li>
        		</div>
  	<br><br>
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form" action="conf/update.php" method="post">
            <h2 align="center"><small>Edit Profil</small></h2>
            <hr class="colorgraph">
            <div class="form-group">
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control input-lg" value="<?php echo $nama_lengkap?>">
            </div>
            <div class="form-group">
                <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" tabindex="" value="<?php echo $profil['username']?>">
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5" value="<?php echo $password?>">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                    </div>
                </div>
            </div>
                       
            <hr class="colorgraph">
            <div class="row">
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Simpan">
                    </fieldset>
                    </form>
                      <hr/>
        </form>
    </div>
</div>
  </body>