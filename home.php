<?php  
session_start(); // Memulai Session Untuk Login
error_reporting(1); // Menghapus Error
require_once('conf/config.php');

if ($_SESSION['login']==true) { // Ngecek Apakah Sudah Login atau Belum ?
    header('location:user.php');
}
if ($_SERVER['REQUEST_METHOD']=='POST') { // Ngecek Apakah Sudah Klik Login
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM akun WHERE username='$username' AND password='$password'";
    $query=mysql_query($sql);
    if (mysql_num_rows($query) == 1) { //Membuat Sesi Untuk Login dan Merubah Status Login Jadi True
        $data=mysql_fetch_array($query);
        $_SESSION['login']=true;
        $_SESSION['username']=$data['username'];
        $_SESSION['userid']=$data['akun_id'];
        header('location:user.php');
    }else{
        header('Location:home.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/home.css" rel="stylesheet">
	<title>home</title>
</head>
<body>


    <!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header"
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">CC Cooking Course</a>
            </div>
            
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="daftar.php">Kursus</a>
                    </li>
                    <li>
                        <a href="about.php">About Us</a>
                    </li>

                </ul>
            </div>
            
        </div>
        
    </nav>

    <!-- Page Content -->
    
    <div class="container" >
    <form class="form-inline" action="#" method="POST">
        <div class="form-group">
            <label class="sr-only" for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="username">
        </div>
        <div class="form-group">
            <label class="sr-only" for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="password">
        </div>
        <div class="checkbox">
            <label>
            <input type="checkbox"> Remember me
            </label>
        </div>
        <button value="Login" type="submit" class="btn btn-default">Sign in</button>
    </form>


        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer" > 
            <h1>CC Cooking Course</h1>
            <p>Kursus Memasak Online</p>
            <p><a href="daftar.html" class="btn btn-primary btn-large">Daftar Kursus</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>CC Cooking Course</h3>
            </div>
        </div>
      

        <!-- Page Features -->
        <div class="row text-justify">
        <div class="col-lg-12">
        <p> CC Cooking Course merupakan sebuah website kursus memasak online. Kami menyediakan berbagai tutorial masakan
        mulai dari hidangan pembuka, hidangan utama, sampai hidangan penutup. Website ini akan mempermudah anda untuk belajar 
        memasak baik bagi pemula maupun bagi anda yang ingin mengembangkan keterampilan memasak anda. Kami menyediakan video-video tutorial memasak yang mudah untuk anda pahami dan anda praktekan di rumah. Setelah mengikuti kursus, anda dapat mengikuti ujian untuk mendapatkan sertifikat atas keikutsertaan anda dalam
        kursus memasak online di ccourse.com. Ayo mulai memasak, dan tunjukkan kreasi masakanmu! </p>
		</div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h3 class="intro-text text-center"><a href="daftar.html">Ayo Belajar Memasak</a></h3>
                                       
                </div>
            </div>
        </div>

        <div class="row">
        <div class="box">
        <div class="col-lg-12">
            <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="assets/img/telur.jpg" alt="">
                    <small>Telur Mata Sapi</small>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="assets/img/sop.jpg" alt="">
                    <small>Sop</small>
                    
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="assets/img/nsgor.jpg" alt="">
                    
                        <small>Nasi Goreng</small>
                    
                </div>
                </div>
                
                <div class="clearfix"></div>
        </div>
        </div>   
        <div class="row">
        <div class="box">
        <div class="col-lg-12">
            <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="assets/img/ayam.png" alt="">
                    <small>Ayam Goreng</small>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="assets/img/jus.jpg" alt="">
                    <small>Jus Buah</small>
                    
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="assets/img/omlet.png" alt="">
                    
                        <small>Omelet</small>
                    
                </div>
                </div>
                
                <div class="clearfix"></div>
        </div>
        </div>    
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p align="center"> Copyright © Your Biz 2014</p>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>