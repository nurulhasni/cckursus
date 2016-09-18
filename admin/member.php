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
            <li >
                
                <a href="logout.php" >Logout<b ></b></a>
                
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="admin/member.php" data-toggle="collapse" ><i ></i> Cek User <i ></i></a>
                    
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
         <div id="page-wrapper" >
            <div id="page-inner">
                
                <hr />
                <div class="col-md-9 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Daftar User
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Akun Id</th>
                                            <th>Username</th>
                                           <th>Fullname</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql3="SELECT * FROM akun ORDER BY akun_id ASC";
                                        $query3=mysql_query($sql3);
                                        while ($row1=mysql_fetch_array($query3)) { ?>
                                        <tr>
                                            <td><?php  echo $row1['akun_id'] ?></td>
                                            <td><?php  echo $row1['username'] ?></td>
                                            <td><?php  echo $row1['nama_lengkap'] ?></td>
                                            
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
            </div>
        </div>
    </div>
</body>








<script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script> 
    
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