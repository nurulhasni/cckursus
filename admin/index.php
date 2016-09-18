<?php  session_start();

if (isset($_POST['login'])){

	include ("koneksi.php");
	
	$username=(($_POST['username']));
	$password=(($_POST['password']));
	
	$login=mysql_query("select * from admin where username='$username' and password='$password'");
	$cek_login=mysql_num_rows($login);

	if (empty($cek_login)){
	
		echo "<script> document.location.href='index.php?status=Password Anda salah!'; </script>";
		
	}else{
	
		//daftarkan ID jika user dan password BENAR
		while ($row=mysql_fetch_array($login))
		{
			$id_admin=$row['id_admin'];
			
			$_SESSION['id_admin']=$id_admin;
			$_SESSION['username']=$username;
			
		}
		
		echo "<script> document.location.href='home.php'; </script>";
	
	}
	
}else{
	unset($_POST['login']);
}
?>


<html>
<head>
<link href="../lib/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../lib/css/style.css">
    
    <title>Login</title>
</head>
<body onLoad="document.postform.elements['username'].focus();">
<p>&nbsp;</p>
<p>&nbsp;</p>

<div class="container">
      <form class="form-signin" role="form" action="index.php" method="post" name="postform">
        <h2 class="form-signin-heading">Login</h2>
        <input name="username" type="text" class="form-control" placeholder="Username" >
        <input name="password" type="password" class="form-control" placeholder="Password" >
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-success btn-block" type="submit" name="login">Login</button>
      </form>
    </div>

		
		
</body>
</html>