<!DOCTYPE html>
<html lang="en">

<head>
	<title>Keranjang</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="templates/bootstrap.min.css">
	<script src="templates/jquery.min.js"></script>
	<script src="templates/popper.min.js"></script>
	<script src="templates/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
	   <style> 
.pic {
    width: 50px;
    height: 50px;
    object-fit: contain
}

.table thead {
    background-color: #1D9BAE;
}

.table thead th {
    padding: 30px;
    font-size: 14px;
    color: white
}

.table tbody td input[type="checkbox"] {
    appearance: none;
    width: 20px;
    height: 20px;
    background-color: #eee;
    position: relative;
    border-radius: 3px;
    cursor: pointer
}

.container .table-wrap {
    margin: 20px auto;
    overflow-x: auto
}

.container .table-wrap::-webkit-scrollbar {
    height: 5px
}

.container .table-wrap::-webkit-scrollbar-thumb {
    border-radius: 5px;
    background-image: linear-gradient(to right, #5D7ECD, #0C91E6)
}

.table>:not(caption)>*>* {
    padding: 2rem 0.5rem
}

.input {
    width: 30px;
    height: 30px;
    color: black;
    font-weight: 600;
    outline: none;
    padding: 8px
}

::placeholder {
    color: black;
    font-weight: 600
}

.table tbody td input[type="checkbox"]:after {
    position: absolute;
    width: 100%;
    height: 100%;
    font-family: "Font Awesome 5 Free";
    font-weight: 600;
    content: "\f00c";
    color: #fff;
    font-size: 15px;
    display: none
}

.table tbody td input[type="checkbox"]:checked,
.table tbody td input[type="checkbox"]:checked:hover {
    background-color: #21cf95
}

.table tbody td input[type="checkbox"]:checked::after {
    display: flex;
    align-items: center;
    justify-content: center
}

.table tbody td input[type="checkbox"]:hover {
    background-color: #ddd
}

.table tbody td {
    padding: 30px;
    margin: 0;
    font-size: 14.5px;
    font-weight: 600
}
  .navbar {
 
  background-color: #DFF1F3;

 
}
.table tbody td .fa-times {
    color: #D32F2F
}

.text-muted {
    font-size: 12.5px
}

.table tbody tr td:nth-of-type(3) {
    min-width: 20px
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
					<a class="nav-link nav-item  active" href="Order.php">Keranjang</a>
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
			$data_table = '';
			$data = select_data6($_SESSION['user']);
			
			foreach ($data as $key => $val) {
				$data_table .= '
				
							
            <tbody>
                <tr class="align-middle alert border-bottom" role="alert">
				 
                
                    <td class="text-center"> <img class="pic" src="'.$val['gambar'].'" alt=""> </td>
                    <td>
                        <div>
                            <p class="m-0 fw-bold">'.$val['judul'].'</p>
                            
                        </div>
                    </td>
					
                    <td>
                        <div >Rp.'.$val['harga'].'</div>
                    </td>
					<td>
                      <a class="btn "  href="Order.php?update='.$val['orderid'].'&update2='.$val['jumlah'].'"   ><span class="fas fa-plus"></span></a>
						
                    </td>
                    <td class="d-"> <center><input class="input" type="text" placeholder="'.$val['jumlah'].'" disabled> </center></td>
					<td>
                      <a class="btn "  href="Order.php?update3='.$val['orderid'].'&update4='.$val['jumlah'].'"   ><span class="fas fa-minus"></span></a>
                    </td>
                    <td>Rp.'.$val['harga']*$val['jumlah'].' </td>
                    <td>
                       <a class="btn" href="Order.php?hapus='.$val['orderid'].'" data-bs-dismiss="alert"> <span class="fas fa-times"></span> </a>
                    </td>
                </tr>
               
                
            </tbody>
        
			
				';
				$harga += $val['harga']*$val['jumlah'] ;
		
			}
			
			if (!isset($_SESSION['user'])) {
			header("Location: login.php");
		} else {
			$tambah['jumlah'] = isset($_GET['update2']) ? $_GET['update2'] : "";
			
			$tambah['id'] = isset($_GET['update']) ? $_GET['update'] : "";
			if ($tambah['id'] != "") {
				$nim = "";
				$data = select_data7($tambah['id']);
				if (sizeof($data) > 0) {
				update_data2($tambah);
				header("Refresh:0; url=Order.php");
				} else {
					echo '<div style="text-align: center;" class="alert alert-danger">Nama '.$tambah['id'].' tidak ditemukan!</div>';
				}

		} }
		
		
			if (!isset($_SESSION['user'])) {
			header("Location: login.php");
		} else {
			$tambah['jumlah2'] = isset($_GET['update4']) ? $_GET['update4'] : "";
			
			$tambah['id2'] = isset($_GET['update3']) ? $_GET['update3'] : "";
			if ($tambah['id2'] != "") {
				$nim = "";
				$data = select_data7($tambah['id2']);
				if (sizeof($data) > 0) {
				update_data($tambah);
				header("Refresh:0; url=Order.php");
					
				} else {
					echo '<div style="text-align: center;" class="alert alert-danger">Nama '.$tambah['id'].' tidak ditemukan!</div>';
				}
		}
		}
		if (!isset($_SESSION['user'])) {
			header("Location: login.php");
		} else {
			

			$hapus = isset($_GET['hapus']) ? $_GET['hapus'] : "";
			if ($hapus != "") {
				
				$data = select_data7($hapus);
				if (sizeof($data) > 0) {
					delete_data($hapus);
					header("Refresh:0; url=Order.php");
				} 
		} }
		
			if (isset($_POST['tambah'])) {
				
				$unik = uniqid(time());
				
					foreach ($data as $key => $val) {
					
						insert_data5($val,$unik);
						delete_data3($_SESSION['user']);
						header("Refresh:2; url=Order.php");
					}
					
				 echo '<div class="alert alert-success"><center>Pesanan berhasil dibuat!</center></div>';
		}
		
			if ($data_table == "") {
				
				echo '
				<div class="container">
    <div class="table-wrap">
        <table class="table table-responsive table-borderless">
            <thead>
             
                <th>&nbsp;</th>
                <th>Judul</th>
                <th>Harga/unit</th>
				<th>&nbsp;</th>
                <th>Jumlah</th>
				<th>&nbsp;</th>
                <th>Harga</th>
                <th>&nbsp;</th>
            </thead>
				
				<tr><th colspan="8"><center>Silahkan Pilih Pesanan</center></th></tr>
			
				</table> </div> </div> </form>
				';
			}else {
				echo '<form method="post">
				<div class="container">
    <div class="table-wrap">
        <table class="table table-responsive table-borderless">
            <thead>
             
                 <th>&nbsp;</th>
                <th>Judul</th>
                <th>Harga/unit</th>
				<th>&nbsp;</th>
                <th>Jumlah</th>
				<th>&nbsp;</th>
                <th>Harga</th>
                <th>&nbsp;</th>
            </thead>
				
				'.$data_table.'
				<tr>
				<td>&nbsp;</td>
				<td colspan="5" nowrap>Total :</center></td>
				<td><center>Rp.'.$harga.'</center></td>
				<td>&nbsp;</td>
				</tr>
				<td colspan="8" nowrap><center><input style="background-color : #1D9BAE;" class="btn btn-primary" type="submit" name="tambah" value="Pesan"></center></td>
				</table> </div> </div> </form>
			';}
 }
				
		
		
		
		

		
		
?>
		
	
</body>

</html>