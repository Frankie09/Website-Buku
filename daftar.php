<!DOCTYPE html>
<html lang="en">

<head>
	<title>Daftar Akun</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="assets/css/style.css" rel="stylesheet">
 
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.min.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" href="templates/bootstrap.min.css">
	<script src="templates/jquery.min.js"></script>
	<script src="templates/popper.min.js"></script>
	<script src="templates/bootstrap.min.js"></script>

</head>
<style>
 .navbar {
 
  background-color: #DFF1F3;

 
}

 
.card {
        -webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        transform: scale(1.01);
   }
   .asc {
 
  background-color: #8AA39B;

 
}
</style>
<body >
<nav class="navbar navbar-expand-sm  navbar-light"> 
		<a class="navbar-brand" href="login.php">RedifraMedia</a>
	</nav>
	<div class="container" style="margin-top:50px">
<?php
require_once "functions.php";


			if (isset($_POST['tambah'])) {
				$tambah_data['username'] = isset($_POST['username']) ? $_POST['username'] : "";
				
				$tambah_data['password'] = isset($_POST['password']) ? $_POST['password'] : "";
				$tambah_data['email'] = isset($_POST['email']) ? $_POST['email'] : "";
				$tambah_data['phone'] = isset($_POST['phone']) ? $_POST['phone'] : "";

				
					$data = select_data($tambah_data['username']);
					if (sizeof($data) > 0) {
						echo '<div class="alert alert-danger">Nama ('.$tambah_data['username'].') sudah terdaftar! Silahkan pakai nama lain</div>';
						
					} else {
						if (insert_data($tambah_data)){
							 echo '<div class="alert alert-success">Berhasil daftar!</div>';
						header("Refresh:2; url=login.php");
						}
						else { echo '<div class="alert alert-danger">Gagal daftar!</div>';}
						
					}
				
			}
echo '
		 <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-group">
            <div class="card p-4">
                
              <div class="card-body">
                <h1>Daftar</h1>
                <p class="text-muted">Silahkan daftar akunmu.</p>
              <form method="POST">
                
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-user"></i>
                    </span>
                  </div>
                    <input type="text" name="username" class="form-control" placeholder="Nama" autocomplete="off" required="">
                </div>
				  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-lock"></i>
                    </span>
                  </div>
                    <input type="password" name="password" class="form-control" placeholder="Kata sandi" required="">
                </div>
				<div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-address-book"></i>
                    </span>
                  </div>
                    <input type="email" name="email" class="form-control" placeholder="Email" autocomplete="off" required="">
                </div>

				<div class="input-group mb-4">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="fa fa-phone"></i>
                    </span>
                  </div>
                    <input type="text" name="phone" class="form-control" placeholder="Nomor seluler" autocomplete="off" required="">
                </div>


                <div class="row">
                  <div class="col-6">
                      <button type="submit" name="tambah" class="btn btn-secondary px-4">Daftar</button>
					 
                  </div>
				  <div class="col-6">
				 
				  <span> <a style="color: secondary;" href="login.php"> Masuk</a> </span>
				  </div> 
				  
				 
				 
                </div>
              </form>
              
              </div>
            </div>
		

            <div class="card text-white asc py-5 d-md-down-none" style="width:44%">
              <div class="card-body text-center">
                <div>
                  <h2>Welcome to Sign Up page!</h2>
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
			<br><br>
		
	';
	

?>
	</div>
</body>

</html>