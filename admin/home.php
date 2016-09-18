<?php session_start();
if(isset($_SESSION['id_admin'])){
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
<link href="../assets/css/dasbor.css" rel="stylesheet" />
    <title>admin</title>
</head>
<body>

<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">CC Cooking Course</a>
                
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li >
                <a href="#" ><?php echo $_SESSION['username'];?><b ></b></a>
               
                
            </li>
            <li class="dropdown">
                
                <a href="logout.php" >Logout<b></b></a>
                
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="member.php" data-toggle="collapse" ><i ></i> Cek User <i ></i></a>
                    
                </li>
                
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    <h1>Selamat Datang <?php echo $_SESSION['username'];?>!</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->

</body>
</html>
<?php
}else{
    ?><p>Anda belum login. silahkan <a href="index.php">Login</a></p><?php
}