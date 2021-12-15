<!DOCTYPE html>
<html lang="en">

<head>
	<title>Halaman utama</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="templates/bootstrap.min.css">
	<script src="templates/jquery.min.js"></script>
	<script src="templates/popper.min.js"></script>
	<script src="templates/bootstrap.min.js"></script>
	   <style> 
   .card:hover {
        -webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        transform: scale(1.01);
   }
   .card {
    padding: 10px;
    height: 200px;
    border: none;
    -webkit-box-shadow: 0px 1px 9px 3px rgba(219, 210, 219, 1);
    -moz-box-shadow: 0px 1px 9px 3px rgba(219, 210, 219, 1);
    box-shadow: 0px 1px 9px 3px rgba(219, 210, 219, 1);
    display: flex;
    justify-content: center;
    align-items: center
}
    
  


    </style>
</head>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark"> 
		<a class="navbar-brand" href="indexadmin.php">ADMIN</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item"> 
					<a class="nav-link nav-item  active" href="indexadmin.php">Beranda</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link nav-item  " href="orderadm.php">Pesanan</a>
				</li>
				
					<li class="nav-item"> 
					<a class="nav-link nav-item  " href="historyadm.php">Riwayat</a>
				</li>
				
				
			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"> 
					<a class="nav-link" href="logoutadm.php">Keluar</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<?php
		require_once "functions.php";
	if (!isset($_SESSION['user'])) {
			header("Location: login.php");
		} else {
		
			
		
			echo '
				<div class="jumbotron">
					<h1 class="display-4">Hallo,' . $_SESSION['user'] . '</h1>
					<p class="lead">Selamat datang, Selamat beraktivitas!</p>
					<hr class="my-4">
					
  
    <div class="row g-2">
        <div class="col-md-3">
            <div class="card"> <a href="historyadm.php"> <img src="templates\refresh.png" width="40"></a>
                <h5>Riwayat</h5>
                <p>Lihat riwayat</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card"> <a href="pesanan.php"><img src="templates\delete.png" width="40"> </a>
                <h5>Ditolak</h5>
                <p>Pesanan ditolak</p>
            </div>
        </div>
		
        <div class="col-md-3">
            <div class="card"> <a href="editadm.php"><img src="templates\edit.png" width="40"> </a>
                <h5>Edit</h5>
                <p>Edit data buku</p>
            </div>
        </div>
		 <div class="col-md-3">
            <div class="card"><a href="tambah.php"> <img src="templates\add.png" width="40"></a>
                <h5>Tambah</h5>
                <p>Tambah data buku</p>
            </div>
        </div>
    </div>
</div>
				</div>
			
			';
		
		

		
		
		}
	?>
	
		
		<footer class="bg-light text-center text-lg-start">
 
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    ©2021 Copyright:
    <a class="text-dark" href="https://mdbootstrap.com/">RedifraMedia.com</a>
  </div>
 
</footer>
	
</body>

</html>