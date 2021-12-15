<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tambah</title>
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

		
		
		
			if (isset($_POST['submit'])) {
				$tambah_data['id'] = isset($_POST['id']) ? $_POST['id'] : "";
				$tambah_data['judul'] = isset($_POST['judul']) ? $_POST['judul'] : "";
				$tambah_data['harga'] = isset($_POST['harga']) ? $_POST['harga'] : "";
				$tambah_data['deskripsi'] = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : "";
				$tambah_data['halaman'] = isset($_POST['halaman']) ? $_POST['halaman'] : "";
				$tambah_data['penerbit'] = isset($_POST['penerbit']) ? $_POST['penerbit'] : "";
				$tambah_data['tanggal'] = isset($_POST['tanggal']) ? $_POST['tanggal'] : "";
				$tambah_data['berat'] = isset($_POST['berat']) ? $_POST['berat'] : "";
				$tambah_data['lebar'] = isset($_POST['lebar']) ? $_POST['lebar'] : "";
				$tambah_data['panjang'] = isset($_POST['panjang']) ? $_POST['panjang'] : "";
				$tambah_data['isbn'] = isset($_POST['isbn']) ? $_POST['isbn'] : "";
				$tambah_data['bahasa'] = isset($_POST['bahasa']) ? $_POST['bahasa'] : "";
				$tambah_data['tema'] = isset($_POST['tema']) ? $_POST['tema'] : "";

				if ($tambah_data['id'] == ""  ||$tambah_data['judul'] == "") {
					echo '<div class="alert alert-danger">Pastikan semua kolom sudah diisi!</div>';
				} else {
					$data = select_data2($tambah_data['id']);
					if (sizeof($data) > 0) {
						echo '<div class="alert alert-danger">Buku ('.$tambah_data['judul'].') sudah terdaftar!</div>';
					} else {
						if (insert_data2($tambah_data)) {
						echo '<div class="alert alert-success">Sukses tambah buku dengan judul ('.$tambah_data['judul'].')!</div>';
						
			// GAMBAR
			
				

			
			$countfiles = count($_FILES['files']['name']);
			
			$query = "INSERT INTO images (id,name,image) VALUES(?,?,?)";

			$statement  = $con->prepare($query);
		

			for($i=0;$i<$countfiles;$i++){

				
			   	$filename = $_FILES['files']['name'][$i];

			   
          		$ext = pathinfo($filename, PATHINFO_EXTENSION); 

          	
          		$valid_ext = array("png","jpeg","jpg");

          		if(in_array($ext, $valid_ext)){

          		
				   	if(move_uploaded_file($_FILES['files']['tmp_name'][$i],'upload/'.$filename)){

				   		
						$statement->execute(array($_POST['id'],$filename,'upload/'.$filename));

					}
          		}
			   	
			}
			
		
			
						
						}
						else {echo '<div class="alert alert-danger">Gagal tambah data buku!</div>';}
					
					}
				}
			}
	
			
		
	?>
	</div>
	<form method='post' action='' enctype='multipart/form-data'>
					<table class="table table-borderless mt-2 ">
						<tr>
							<th class="table-dark" width="15%" nowrap>ID</th>
							<td><input class="form-control" type="text" name="id" required></td>
						</tr>
						
						<tr>
							<th class="table-dark">Judul</th>
							<td><input class="form-control" type="text" name="judul" required></td>
						</tr>
						<tr>
							<th class="table-dark" width="15%" nowrap>Harga</th>
							<td><input class="form-control" type="text" name="harga" required></td>
						</tr>
						
						<tr>
							<th class="table-dark">Deskripsi</th>
							<td><input class="form-control" type="text" name="deskripsi" required></td>
						</tr>
						<tr>
							<th class="table-dark" width="15%" nowrap>Jumlah Halaman</th>
							<td><input class="form-control" type="text" name="halaman" required></td>
						</tr>
						
						<tr>
							<th class="table-dark">Penerbit</th>
							<td><input class="form-control" type="text" name="penerbit" required></td>
						</tr>
						<tr>
							<th class="table-dark" width="15%" nowrap>Tanggal rilis</th>
							<td><input class="form-control" type="text" name="tanggal" required></td>
						</tr>
						
						<tr>
							<th class="table-dark">Berat</th>
							<td><input class="form-control" type="text" name="berat" required></td>
						</tr>
						<tr>
							<th class="table-dark" width="15%" nowrap>Lebar</th>
							<td><input class="form-control" type="text" name="lebar" required></td>
						</tr>
						
						<tr>
							<th class="table-dark">Tinggi</th>
							<td><input class="form-control" type="text" name="panjang" required></td>
						</tr>
						<tr>
							<th class="table-dark" width="15%" nowrap>ISBN</th>
							<td><input class="form-control" type="text" name="isbn" required></td>
						</tr>
						
						<tr>
							<th class="table-dark">Bahasa</th>
							<td><input class="form-control" type="text" name="bahasa" required></td>
						</tr>
						<tr>
							<th class="table-dark">Tema</th>
							<td><input class="form-control" type="text" name="tema" required></td>
						</tr>
						<tr>
						<td colspan="2" ><input type='file' name='files[]' multiple required /></td>
						</tr>
						<tr>
							<td colspan="2"><input class="btn btn-info" type="submit" name="submit" value="ADD"></td>
						</tr>
					</table>
				</form>
	
		
		
	
</body>

</html>