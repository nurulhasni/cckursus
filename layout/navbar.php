<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                    <li>
                        <a href="<?php echo $linkaplikasi ?>">Kursus</a>
                    </li>
                    
                    <?php  
        $logquery=mysql_query("SELECT * FROM log_baba WHERE akun_id='".$_SESSION['userid']."' ");
      
            
                    if(($row=mysql_fetch_array($logquery)))
                        echo "<li><a href='ujian.php'><b>Ujian</b></a></li>";
                    
                    
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>            
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong><?php echo $profil['nama_lengkap']  ?></strong><b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="profil.php"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
            </div>
            
            
        </div>
      </nav>
