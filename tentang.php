<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tentang</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="templates/bootstrap.min.css">
	<script src="templates/jquery.min.js"></script>
	<script src="templates/popper.min.js"></script>
	<script src="templates/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	   <style> 
 

   .navbar {
 
  background-color: #DFF1F3;

 
}

.card {
    padding: 10px;
    height: 250px;
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
	<nav class="navbar navbar-expand-sm bg-lg navbar-light"> 
		<a class="navbar-brand" href="index.php">RedifraMedia</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item"> 
					<a class="nav-link nav-item  " href="index.php">Beranda</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link nav-item  " href="Order.php">Keranjang</a>
				</li>
			<li class="nav-item"> 
					<a class="nav-link nav-item  " href="proses.php">Pesanan</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link nav-item  " href="history.php">Riwayat</a>
				</li>
			<li class="nav-item"> 
					<a class="nav-link nav-item active " href="tentang.php">Tentang</a>
				</li>
				
			</ul>
		
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"> 
					<a class="nav-link" href="logout.php">Keluar</a>
				</li>
			</ul>
		</div>
	</nav>
	
	
<?php	
	require_once "functions.php";
		$harga =0;
		
	    if(!isset($_SESSION['user'])) {
			header("Location: login.php");
		} else {
			echo'
			<div class="container mt-5">
    <div class="text-center mb-3">
        <h3>Hubungi kami</h3>
    </div>
    <div class="row g-2">
        <div class="col-md-4">
            <div class="card"> <img src="https://i.imgur.com/xuGJbnU.png" width="40">
                <h5>Alamat</h5>
                <p>Salatiga, Kemiri</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card"> <img src="https://i.imgur.com/TNKflal.png" width="40">
                <h5>Email</h5>
                <p>rediframedia@gmai.com</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card"> <img src="https://i.imgur.com/pZLFSO3.png" width="40">
                <h5>No Telefon</h5>
                <p>0898549597524</p>
            </div>
        </div>
    </div>
</div>
			';
		
		}
		?>
			<footer class="bg-light text-center text-lg-start fixed-bottom  ">
 
  <div class="text-center p-3" style="background-color: #DFF1F3 ;">
    ©2021 Copyright:
    <a class="text-dark" href="Rediframedia.com">RedifraMedia</a>
  </div></footer>
</body>

</html>