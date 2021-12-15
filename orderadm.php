<!DOCTYPE html>
<html lang="en">

<head>
	<title>Pesanan</title>
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
    background-color: #1f211f
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
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark"> 
		<a class="navbar-brand" href="indexadmin.php">ADMIN</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item"> 
					<a class="nav-link nav-item  " href="indexadmin.php">Beranda</a>
				</li>
				<li class="nav-item"> 
					<a class="nav-link nav-item  active" href="orderadm.php">Pesanan</a>
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
		$harga =0;
		
	    if(!isset($_SESSION['user'])) {
			header("Location: login.php");
		} else {
			$data_table = '';
			$data = select_data8();
			
			foreach ($data as $key => $val) {
				$data_table .= '
				
							
            <tbody>
                <tr class="align-middle alert border-bottom" role="alert">
				 
                 <td ><a  href="barangdetail.php?detail='.$val['id'].'" >'.$val['id'].'</a> </td>
                    <td class="text-center">'.$val['pemesan'].' </td>
                    <td>
                        <div>
                            <p class="m-0 fw-bold">'.$val['barang'].'</p>
                            
                        </div>
                    </td>
					
                    <td>
                        <div >'.$val['status'].'</div>
                    </td>
					
                    <td class="d-"> <center><input class="input" type="text" placeholder="'.$val['jumlah2'].'" disabled> </center></td>
					
                    <td>Rp.'.$val['totalfinal'].' </td>
					
                    <td>
                       <a class="btn" href="orderadm.php?update='.$val['id'].'&status='.$val['status'].'" data-bs-dismiss="alert"> <span class="fas fa-check"></span> </a>
					    <a class="btn" href="orderadm.php?tolak='.$val['id'].'&status2='.$val['status'].'" data-bs-dismiss="alert"> <span class="fas fa-times"></span> </a>
                    </td>
					
					
                </tr>
               
                
            </tbody>
				
					
			
				';
				$harga += $val['harga']*$val['jumlah2'] ;
		
			}
			
		if (!isset($_SESSION['user'])) {
			header("Location: login.php");
		} else {
			

			$update = isset($_GET['update']) ? $_GET['update'] : "";
			$status = isset($_GET['status']) ? $_GET['status'] : "";
			if ($update != "") {
				
				$data = select_data9($update);
				if (sizeof($data) > 0) {
					if ($status == 'Sedang Diproses') {
						update_data4($update); 
						header("Refresh:0; url=orderadm.php");
						}else {
							
						update_data3($update); 
						header("Refresh:0; url=orderadm.php");
							
							}
					
				} 
		} 
		}
		
		if (!isset($_SESSION['user'])) {
			header("Location: login.php");
		} else {
			

			$tolak = isset($_GET['tolak']) ? $_GET['tolak'] : "";
			$status2 = isset($_GET['status2']) ? $_GET['status2'] : "";
			if ($tolak != "") {
				
				$data = select_data9($tolak);
				if (sizeof($data) > 0) {
					if ($status2 == 'Sedang Diproses') {
						update_data7($tolak);
						header("Refresh:0; url=orderadm.php");
					}
					else {
						update_data5($tolak);
						
						header("Refresh:0; url=orderadm.php");
					}
					
				} else {
					echo '<div style="text-align: center;" class="alert alert-danger">ID '.$update.' tidak ditemukan!</div>';
				}
		} }
		
	
		
		
		
			if ($data_table == "") {
				
				echo '<form method="post">
				<div class="container">
    <div class="table-wrap">
        <table class="table table-responsive table-borderless">
            <thead>
             <th>ID</th>
                <th>Pembeli</th>
                <th>Judul</th>
                <th>Status</th>
				
                <th>Jumlah</th>
			
                <th>Total</th>
                <th>&nbsp;</th>
				
            </thead>
				
				<tr><th colspan="7"><center>Tidak ada pesanan.</center></th></tr>
				
				</table> </div> </div> </form>
			';
			}else {
				echo '<form method="post">
				<div class="container">
    <div class="table-wrap">
        <table class="table table-responsive table-borderless">
            <thead>
             <th>ID</th>
                <th>Pembeli</th>
                <th>Judul</th>
                <th>Status</th>
				
                <th>Jumlah</th>
			
                <th>Total</th>
                <th>&nbsp;</th>
				
            </thead>
				
				'.$data_table.'
				
				</table> </div> </div> </form>
			'; }
 }
				
		
	
		?>
		
		
		<?php 
		
		
		
	
		
		
		
		?>
	
  </div>
</div>
</body>

</html>