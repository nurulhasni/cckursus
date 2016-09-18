<?php
session_start();
if(isset($_SESSION['username'])) {
header('location:home.php'); }
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
    <div class="container">

        <!-- Jumbotron Header -->
        <header> 
            <h1  align="center">CC Cooking Course</h1>
            <p align="center">Kursus Memasak Online</p>
         </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3 align="center">Form Pendaftaran CC Cooking Course</h3>
            </div>
        </div>
      

        <!-- Page Features -->
        
        <div class="row text-justify">
        <div class="col-lg-12">
        <p>
            <div class="container">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <form role="form" action="prosesdaftar.php" method="post">
            <h2><small>Silakan daftar untuk memulai kursus</small></h2>
            <hr class="colorgraph">
            
            <div class="form-group">
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control input-lg" placeholder="Nama Lengkap" tabindex="3">
            </div>
            <div class="form-group">
                <input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" tabindex="4">
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Konfirmasi Password" tabindex="6">
                    </div>
                </div>
            </div>
                       
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-md-6"><input type="submit" value="Daftar" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                <div class="col-xs-12 col-md-6"><a href="home.php" class="btn btn-success btn-block btn-lg">Sign In</a></div>
            </div>
        </form>
    </div>
</div>
<!-- Modal -->
<!-- /.modal -->


        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p align="center">Copyright © Your Biz 2014</p>
                </div>
            </div>
        </footer>

    </div>
</body>
</html>