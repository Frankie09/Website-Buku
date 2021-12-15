<!DOCTYPE html>
<html lang="en">

<head>
	<title>Masuk </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="assets/css/style.css" rel="stylesheet">
 
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="templates/bootstrap.min.css">
	<script src="templates/jquery.min.js"></script>
	<script src="templates/popper.min.js"></script>
	<script src="templates/bootstrap.min.js"></script>
<style>

.card {
        -webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        transform: scale(1.01);
   }

</style>
</head>
<body >
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark"> 
		<a class="navbar-brand" href="loginadmin.php"> ADMIN</a>
	</nav>
	<div class="container" style="margin-top:50px">
<?php
require_once "functions.php";

if (isset($_SESSION['user'])) {
	header("Location: index.php");
} else {
	if (isset($_POST['login'])) {
	

		
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		
		$query = $con->prepare("SELECT * FROM tbl_admin WHERE username =? AND password =?");
		$query->execute(array($user,$pass));
		$control = $query->fetch(PDO::FETCH_OBJ);
		if($control>0){
			$_SESSION['user'] = $user;
			header("Location: indexadmin.php");
		}
			echo '<div  style="text-align: center;"  class="alert alert-danger">Nama/Kata Sandi anda salah!</div>';
		
	}

	
}
echo '
		 <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
                
              <div class="card-body">
                <h1>Login</h1>
                <p class="text-muted">Silahkan masuk ke akun anda.</p>
              <form method="POST">
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                    <input type="text" name="user" class="form-control" placeholder="Nama" autocomplete="off" required="">
                </div>


                <div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-lock"></i>
                    </span>
                  </div>
                    <input type="password" name="pass" class="form-control" placeholder="Kata sandi" required="">
                </div>


                <div class="row">
                  <div class="col-6">
                      <button type="submit" name="login" class="btn btn-dark px-4">Masuk</button>
					 
                  </div>
				  
				  
				 
                </div>
              </form>
              
              </div>
            </div>


            <div class="card text-white bg-dark py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Hi, Admin!</h2>
                  <p>Untuk mengakses, silahkan login terlebih dahulu.</p>
                </div>
				
              </div>
			 <center><h6><a  style="color: white;" href="login.php">Login User</a></h6></center>
            </div>
			
          </div>
        </div>
      </div>
    </div>
			
		
	';

?>
	</div>
</body>

</html>