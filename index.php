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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	
	   <style> 
	   
   html,
body {
    height: 100%
}

* {
    padding: 0px;
    margin: 0px
}

body {
    background-color: white;
    display: grid;
    place-items: center
	padding-top: 70px;
}

.card {
    background-color: #ffffff;
    border-radius: 20px
	
	
	
	
}

#heading {
    font-size: 18px
}

.darkWhite {
    color: #464747;
}

.div1 {
    background-color: #e4eff0;
    color: #c4c7e4;
    border-radius: 10px 10px 0px 0px
}

#desc {
    color: #7f8182;
    font-weight: 500
}

#circl {
    background-color: #ffffff;
    height: 80%
	
}

.btn {
    background-color: #1D9BAE;
    border-radius: 10px;
    font-size: 80%
	
}

a,
a:hover {
    text-decoration: none;
    color: #77cbc5;
   
}

.sp1 {
    background-color: #37b6b2
}

.fa {
    color: white;
    font-size: 18px;
    font-weight: bold
}

.btn:focus {
    outline: none;
    box-shadow: none
}

*:focus {
    outline: none
}
  .navbar {
  overflow: hidden;
  background-color: #DFF1F3;
  position: fixed;
  color: blue;
  top: 0;
  width: 100%;
   z-index: 9999;
 
}
h4.text-danger {
    margin-left: 200px;
    color: #f11126 !important
}

h6.text-muted {
    color: #6c757d85 !important
}
.btn.btn-primary {
    width: 100%;
    height: 55px;
     border-radius: 10px;
	
    padding: 13px 0;
    background-color: #2dbeeb;
    border: none;
    font-weight: 600
}

.btn.btn-primary:hover .fas {
    transform: translateX(10px);
    transition: transform 0.5s ease
}
.card:hover {
        -webkit-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        -moz-box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        box-shadow: -1px 9px 40px -12px rgba(0,0,0,0.75);
        transform: scale(1.01);
   }
    

.card-text{
    font-size:19px;
 text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;   
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
					<a class="nav-link nav-item  active" href="index.php">Beranda</a>
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
					<a class="nav-link nav-item  " href="tentang.php">Tentang</a>
				</li>
			
				
			</ul>
				 
			<ul class="navbar-nav ml-auto">
			<li >
			<form method="get" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Cari Judul atau Tema buku" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0 " type="submit">Cari </button>
    </form>
				</li>
				<li class="nav-item"> 
					<a class="nav-link" href="logout.php">Keluar</a>
				</li>
			</ul>
		
		</div>
	</nav>
	
	
	<?php
		require_once "functions.php";
	if (!isset($_SESSION['user'])) {
			header("Location: login.php");
		} else {
			
			$search = isset($_GET['search']) ? $_GET['search'] : "";
			$data_table = '';
			$data = select_data3();
			
			foreach ($data as $key => $val ) {
				$data_table .= '
					 <div class="col-12 col-md-4 col-sm-12 col-xs-12 ">
            <div class="card px-4 py-2 mb-3 h-100  ">
                <div class="div1 row py-2 px-2 ">
                    <div class="col-6  mt-2">
                        <p class="font-weight-bold mb-4 darkWhite card-text" id="heading"> '.$val['judul'].'</p>
                        <p class="darkWhite mt-3">Rp.'.$val['harga'].' </p>
                    </div>
                    <div class="col-5 d-flex align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center w-100" id="circl"> <img src="'.$val['gambar'].'" height="140px" width="90px" alt=""> </div>
                    </div>
                </div>
                <div class="py-2">
                    <p id="desc"> Dapatkan buku "'.$val['judul'].'". Untuk detailnya silahkan klik rincian.  </p>
                    <div class="d-flex">
                        <button type="button" class="btn d-flex text-white  " data-toggle="modal" data-target="#mymodal'.$val['id'].'">Rincian</button> <a href="index.php?tambah='.$val['id'].'&user='.$_SESSION['user'].'&judul='.$val['judul'].'&harga='.$val['harga'].'"class="btn d-flex ml-auto px-3 text-white   "> Beli </a>
				</div>
				
                </div>
            </div>
        </div>
		<div id="mymodal'.$val['id'].'"class="modal fade bd-example-modal-lg mt-4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
					<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="container m-5 mx-auto">
    <div class="row main">
        <div class="col-lg-6 col-12 my-5 rcol">
            <h3 class="product text-center">'.$val['judul'].'</h3>
            <div class="image text-center"><img src="'.$val['gambar'].'" width="300px" height="350px"></div>
            <p class="text-center my-3">'.$val['deskripsi'].'</p>
        </div>
        <div class="col-lg-6 col-12 my-5 scol">
            <div class="row r1">
                <h6 class="text-muted">Harga :</h6> 
                <h4 class="text-danger"> Rp.'.$val['harga'].'</h4>
            </div>
           
            <div class="row r3">
                <h3 >DETAIL BUKU</h3>
            </div>
           
			<div>
                        <p class="text-muted m-0">Halaman</p>
                        <p class="h5">'.$val['halaman'].'</p>
                    </div>
                    <div >
                        <p class="text-muted m-0">Penerbit</p>
                        <p class="h5 ">'.$val['penerbit'].'</p>
                    </div>
                    <div >
                        <p class="text-muted m-0">Tanggal Terbit</p>
                        <p class="h5 ">'.$val['tanggal'].'</p>
                    </div>
                    <div >
                        <p class="text-muted m-0">Berat</p>
                        <p class="h5 ">'.$val['berat'].' kg</p>
                    </div>
                    <div >
                        <p class="text-muted m-0">Lebar</p>
                        <p class="h5 ">'.$val['lebar'].' cm</p>
                    </div>
                    <div >
                        <p class="text-muted m-0">Panjang</p>
                        <p class="h5 ">'.$val['panjang'].' cm</p>
                    </div>
					<div >
                        <p class="text-muted m-0">ISBN</p>
                        <p class="h5 ">'.$val['isbn'].'</p>
                    </div>
					<div >
                        <p class="text-muted m-0">Bahasa</p>
                        <p class="h5 mb-3">'.$val['bahasa'].'</p>
                    </div>
					 <div class="col-6 mb-4 p-0" >
                           <div ><a class="btn btn-primary" href="index.php?tambah='.$val['id'].'&user='.$_SESSION['user'].'&judul='.$val['judul'].'&harga='.$val['harga'].'"> <center>Beli<span class="fas fa-arrow-right ps-2"></span> </center> </a></div>
						   
                        </div>
						
            
          
        </div>
    </div>
</div>
				</div>
			</div>
				</div>
                    
				';
			}
				
			if ($search != "") {
				$data_table = '';
				$data_table = '';
			$data = select_data3($search);
			
			foreach ($data as $key => $val ) {
				$data_table .= '
					 <div class="col-12 col-md-4 col-sm-12 col-xs-12 ">
            <div class="card px-4 py-2 mb-3 h-100  ">
                <div class="div1 row py-2 px-2 ">
                    <div class="col-6  mt-2">
                        <p class="font-weight-bold mb-4 darkWhite card-text" id="heading"> '.$val['judul'].'</p>
                        <p class="darkWhite mt-3">Rp.'.$val['harga'].' </p>
                    </div>
                    <div class="col-5 d-flex align-items-center">
                        <div class="rounded-circle d-flex align-items-center justify-content-center w-100" id="circl"> <img src="'.$val['gambar'].'" height="140px" width="90px" alt=""> </div>
                    </div>
                </div>
                <div class="py-2">
                    <p id="desc"> Dapatkan buku "'.$val['judul'].'". Untuk detailnya silahkan klik rincian. </p>
                    <div class="d-flex">
                        <button type="button" class="btn d-flex text-white  " data-toggle="modal" data-target="#mymodal'.$val['id'].'">Rincian</button> <a href="index.php?tambah='.$val['id'].'&user='.$_SESSION['user'].'&judul='.$val['judul'].'&harga='.$val['harga'].'"class="btn d-flex ml-auto px-3 text-white   "> Beli </a>
				</div>
				
                </div>
            </div>
        </div>
		<div id="mymodal'.$val['id'].'"class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
    <div class="container m-5 mx-auto">
    <div class="row main">
        <div class="col-lg-6 col-12 my-5 rcol">
            <h3 class="product text-center">PRODUCT DETAILS</h3>
            <div class="image text-center"><img src="'.$val['gambar'].'" width="300px" height="350px"></div>
            <p class="text-center my-3">'.$val['deskripsi'].'</p>
        </div>
        <div class="col-lg-6 col-12 my-5 scol">
            <div class="row r1">
                <h6 class="text-muted">Harga :</h6> 
                <h4 class="text-danger"> Rp.'.$val['harga'].'</h4>
            </div>
           
            <div class="row r3">
                <h3 >DETAIL BUKU</h3>
            </div>
           
			<div>
                        <p class="text-muted m-0">Halaman</p>
                        <p class="h5">'.$val['halaman'].'</p>
                    </div>
                    <div >
                        <p class="text-muted m-0">Penerbit</p>
                        <p class="h5 ">'.$val['penerbit'].'</p>
                    </div>
                    <div >
                        <p class="text-muted m-0">Tanggal Terbit</p>
                        <p class="h5 ">'.$val['tanggal'].'</p>
                    </div>
                    <div >
                        <p class="text-muted m-0">Berat</p>
                        <p class="h5 ">'.$val['berat'].'</p>
                    </div>
                    <div >
                        <p class="text-muted m-0">Lebar</p>
                        <p class="h5 ">'.$val['lebar'].'</p>
                    </div>
                    <div >
                        <p class="text-muted m-0">Panjang</p>
                        <p class="h5 ">'.$val['panjang'].'</p>
                    </div>
					<div >
                        <p class="text-muted m-0">ISBN</p>
                        <p class="h5 ">'.$val['isbn'].'</p>
                    </div>
					<div >
                        <p class="text-muted m-0">Bahasa</p>
                        <p class="h5 mb-3">'.$val['bahasa'].'</p>
                    </div>
					 <div class="col-6 mb-4 p-0" >
                            <div ><a class="btn btn-primary" href="index.php?tambah='.$val['id'].'&user='.$_SESSION['user'].'&judul='.$val['judul'].'&harga='.$val['harga'].'"> <center>Beli<span class="fas fa-arrow-right ps-2"></span> </center> </a></div>
                        </div>
           
          
        </div>
    </div>
</div>
				</div>
			</div>
				</div>
                    
				';
			} 
			echo '
				<div style ="margin-top: 10%;"  class="container-fluid">
			<div class="row  ">
			'.$data_table.'
			
				</div>
	
				</div>
			';
				
			}else {

			echo '
				<div style ="margin-top: 10%;"  class="container-fluid">
			<div class="row  ">
			'.$data_table.'
			
				</div>
	
				</div>
			';
		}
		}
		
		
		
		
	?>
	
		<?php
		
			$tambah['id'] = isset($_GET['tambah']) ? $_GET['tambah'] : "";
			$tambah['pemesan'] = isset($_GET['user']) ? $_GET['user'] : "";
			$tambah['judul'] = isset($_GET['judul']) ? $_GET['judul'] : "";
			$tambah['harga'] = isset($_GET['harga']) ? $_GET['harga'] : "";
			if ($tambah['id'] != "") {
				
				$data = select_data5($tambah['id'],$tambah['pemesan']);
				if (sizeof($data) > 0) {
				
				echo '<div class="alert fixed-bottom alert-danger"><center>Barang sudah ada!</center></div>';
					
				} else {
					if (insert_data3($tambah)) {
						
						header("Refresh:0; url=Order.php");
					}
						
					
						else {echo '<div class="alert  fixed-bottom alert-danger">Gagal tambah orderan!</div>';}
					
				}
		
			}
		?>
		
	
		<footer class="bg-light text-center text-lg-start  ">
 
  <div class="text-center p-3" style="background-color: #DFF1F3 ;">
    ©2021 Copyright:
    <a class="text-dark" href="Rediframedia.com">RedifraMedia</a>
  </div></footer>
 
	
</body>

</html>