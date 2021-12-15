<!DOCTYPE html>
<html lang="en">

<head>
	<title>Edit Buku</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="templates/bootstrap.min.css">
	<script src="templates/jquery.min.js"></script>
	<script src="templates/popper.min.js"></script>
	<script src="templates/bootstrap.min.js"></script>
</head>
</style>


</style>
<body>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark"> 
		<a class="navbar-brand" href="indexadmin.php">ADMIN</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item"> 
					<a class="nav-link nav-item  " href="indexadmin.php">Home</a>
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
	<div class="container" style="margin-top:50px">
	<?php
		require_once "functions.php";

		if (!isset($_SESSION['user'])) {
			header("Location: login.php");
		} else {
			$id = isset($_GET['nim']) ? $_GET['nim'] : "";

			$hapus = isset($_GET['hapus']) ? $_GET['hapus'] : "";
			if ($hapus != "") {
				$id = "";
				$data = select_data2($hapus);
				if (sizeof($data) > 0) {
					if (delete_data2($hapus)){
						unlink($data[0]['gambar']);
						echo '<div class="alert alert-success">Sukses hapus data buku dengan id ('.$hapus.')!</div>';
					}
					else {echo '<div class="alert alert-danger">Gagal hapus data buku dengan id ('.$hapus.')!</div>';}
				} else {
					echo '<div class="alert alert-danger">Buku ('.$hapus.') tidak ditemukan!</div>';
				}
			}

			echo '
				<form method="get">
					<table class="table table-bordered">
						<tr>
							<th class="table-dark" width="15%" nowrap>ID BUKU</th>
							<td><input type="text" class="form-control" name="nim" value="'.$id.'" required></td>
						</tr>
						<tr>
							<td colspan="2"><input class="btn btn-dark" type="submit" value="CARI"></td>
						</tr>
					</table>
				</form>
				<br>
			';

			if ($id != "") {
				if (isset($_POST['ganti'])) {
					$new_data['judul'] = isset($_POST['judul']) ? $_POST['judul'] : "";
					$new_data['harga'] = isset($_POST['harga']) ?  $_POST['harga'] : "";
					$new_data['deskripsi'] = isset($_POST['deskripsi']) ? $_POST['deskripsi'] : "";
					$new_data['halaman'] = isset($_POST['halaman']) ? $_POST['halaman'] : "";
					$new_data['penerbit'] = isset($_POST['penerbit']) ?  $_POST['penerbit'] : "";
					$new_data['tanggal'] = isset($_POST['tanggal']) ? $_POST['tanggal'] : "";
					$new_data['berat'] = isset($_POST['berat']) ? $_POST['berat'] : "";
					$new_data['lebar'] = isset($_POST['lebar']) ?  $_POST['lebar'] : "";
					$new_data['panjang'] = isset($_POST['panjang']) ? $_POST['panjang'] : "";
					$new_data['isbn'] = isset($_POST['isbn']) ? $_POST['isbn'] : "";
					$new_data['bahasa'] = isset($_POST['bahasa']) ? $_POST['bahasa'] : "";
					$new_data['tema'] = isset($_POST['tema']) ? $_POST['tema'] : "";

					
						$data = select_data2($id);
						if (sizeof($data) > 0) {
							if (update_data6($id,$new_data)) { 
							

			
			

			$query = "UPDATE images SET name =?,image =? where id = ?";

			$statement  = $con->prepare($query);
		
	
			


			   	$filename = $_FILES['files']['name'];


          			$ext = pathinfo($filename, PATHINFO_EXTENSION); 


          		$valid_ext = array("png","jpeg","jpg");

          		

   
				   	if(move_uploaded_file($_FILES['files']['tmp_name'],'upload/'.$filename)){


						$statement->execute(array($filename,'upload/'.$filename,$id));
						unlink($data[0]['gambar']);
					}
          		
			   	
			
							echo '<div class="alert alert-success">Sukses ganti data buku dengan id ('.$id.')!</div>';
							}
							else { 
							echo '<div class="alert alert-danger">Gagal ganti data buku dengan id ('.$hapus.')!</div>';
							}
						} else {
							echo '<div class="alert alert-danger">Buku dengan id ('.$hapus.') tidak ditemukan!</div>';
						}
					
				}

				$data_table = '';
				$data = select_data2($id);
				if (sizeof($data) > 0) {
					echo '
						<form method="post" action="editadm.php?nim='.$id.'" enctype="multipart/form-data">
							<table class="table table-bordered table-hover">
								<tr>
									<th class="table-dark" width="15%" nowrap>ID</th>
									<td><input type="text" class="form-control" value="'.$id.'" disabled></td>
								</tr>
						<tr>
							<th class="table-dark">Judul</th>
							<td><input class="form-control" type="text" name="judul" value="'.$data[0]['judul'].'" required></td>
						</tr>
						<tr>
							<th class="table-dark" width="15%" nowrap>Harga</th>
							<td><input class="form-control" type="text" name="harga" value="'.$data[0]['harga'].'" required></td>
						</tr>
						
						<tr>
							<th class="table-dark">Deskripsi</th>
							<td><input class="form-control" type="text" name="deskripsi" value="'.$data[0]['deskripsi'].'" required></td>
						</tr>
						<tr>
							<th class="table-dark" width="15%" nowrap>Jumlah Halaman</th>
							<td><input class="form-control" type="text" name="halaman" value="'.$data[0]['halaman'].'" required></td>
						</tr>
						
						<tr>
							<th class="table-dark">Penerbit</th>
							<td><input class="form-control" type="text" name="penerbit" value="'.$data[0]['penerbit'].'" required></td>
						</tr>
						<tr>
							<th class="table-dark" width="15%" nowrap>Tanggal Terbit</th>
							<td><input class="form-control" type="text" name="tanggal" value="'.$data[0]['tanggal'].'" required></td>
						</tr>
						
						<tr>
							<th class="table-dark">Berat</th>
							<td><input class="form-control" type="text" name="berat" value="'.$data[0]['berat'].'" required></td>
						</tr>
						<tr>
							<th class="table-dark" width="15%" nowrap>Lebar</th>
							<td><input class="form-control" type="text" name="lebar" value="'.$data[0]['lebar'].'" required></td>
						</tr>
						
						<tr>
							<th class="table-dark">Panjang</th>
							<td><input class="form-control" type="text" name="panjang" value="'.$data[0]['panjang'].'" required></td>
						</tr>
						<tr>
							<th class="table-dark" width="15%" nowrap>ISBN</th>
							<td><input class="form-control" type="text" name="isbn" value="'.$data[0]['isbn'].'" required></td>
						</tr>
						<tr>
							<th class="table-dark">Bahasa</th>
							<td><input class="form-control" type="text" name="bahasa" value="'.$data[0]['bahasa'].'" required></td>
						</tr>
						<tr>
							<th class="table-dark" width="15%" nowrap>Tema</th>
							<td><input class="form-control" type="text" name="tema" value="'.$data[0]['tema'].'" required></td>
						</tr>
						<tr>
						<td colspan="2" ><input type="file" name="files" multiple /></td>
						</tr>
						
								<tr>
									<td colspan="2">
										<input class="btn btn-warning text-light" type="submit" name="ganti" value="GANTI">
										 &nbsp;&nbsp;&nbsp; 
										<a class="btn btn-danger text-light" href="editadm.php?hapus='.$id.'">HAPUS</a>
									</td>
								</tr>
							</table>
						</form>
					';
				} else {
					echo '<div class="alert alert-danger">ID buku tidak ditemkuan!</div>';
				}
			}
		}
	?>
	</div>
</body>

</html>