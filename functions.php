<?php
	require_once "config.php";
	
	
		function select_data($user="") {
		global $con;

		$hasil = array();

		if ($user != "") $sql = "SELECT * FROM tbl_user WHERE username = :username ";
		else $sql = "SELECT * FROM tbl_user";
		 

		try {
            $stmt = $con->prepare($sql);
          if ($user != "") $stmt->bindValue(':username', $user, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						$hasil[$i]['username'] = $val['username'];
        				$hasil[$i]['password'] = $val['password'];
						$hasil[$i]['email'] = $val['email'];
						$hasil[$i]['nohp'] = $val['nohp'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
	function select_data3($user="") {
		global $con;

		$hasil = array();
	
		if ($user != "")  $sql = "SELECT * FROM buku inner join images on buku.id = images.id where buku.judul like CONCAT( '%', :judul, '%') or buku.tema like CONCAT( '%', :tema, '%')order by buku.id desc";
		else  $sql = "SELECT * FROM buku inner join images on buku.id = images.id order by buku.id desc";
		
		 

		try {
            $stmt = $con->prepare($sql);
          if ($user != ""){ 
		  $stmt->bindValue(':judul', $user, PDO::PARAM_STR);
		  $stmt->bindValue(':tema', $user, PDO::PARAM_STR);
		  }

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['judul'] = $val['judul'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['deskripsi'] = $val['deskripsi'];
						$hasil[$i]['halaman'] = $val['halaman'];
						$hasil[$i]['penerbit'] = $val['penerbit'];
						$hasil[$i]['tanggal'] = $val['tanggal'];
						$hasil[$i]['berat'] = $val['berat'];
						$hasil[$i]['lebar'] = $val['lebar'];
						$hasil[$i]['panjang'] = $val['panjang'];
						$hasil[$i]['isbn'] = $val['isbn'];
						$hasil[$i]['bahasa'] = $val['bahasa'];
						$hasil[$i]['nama'] = $val['name'];
						$hasil[$i]['gambar'] = $val['image'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
	function select_data4($user="") {
		global $con;

		$hasil = array();

		if ($user != "") $sql = "SELECT * FROM images WHERE username = :username ";
		else $sql = "SELECT * FROM tbl_user";
		 

		try {
            $stmt = $con->prepare($sql);
          if ($user != "") $stmt->bindValue(':username', $user, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						$hasil[$i]['username'] = $val['username'];
        				$hasil[$i]['password'] = $val['password'];
						$hasil[$i]['email'] = $val['email'];
						$hasil[$i]['nohp'] = $val['nohp'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
	function select_data5($id="",$user="") {
		global $con;

		$hasil = array();

		$sql = "SELECT * FROM order_buku WHERE id = :id and pemesan = :pemesan ";
	
		 

		try {
            $stmt = $con->prepare($sql);
          $stmt->bindValue(':id', $id, PDO::PARAM_STR);
		   $stmt->bindValue(':pemesan', $user, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['judul'] = $val['judul'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['pemesan'] = $val['pemesan'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
		function select_data6($user="") {
		global $con;

		$hasil = array();

		 $sql = "SELECT * FROM order_buku inner join images on order_buku.id = images.id WHERE order_buku.pemesan = :pemesan";
		
		 

		try {
            $stmt = $con->prepare($sql);
          $stmt->bindValue(':pemesan', $user, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						$hasil[$i]['orderid'] = $val['orderid'];
						$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['judul'] = $val['judul'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['jumlah'] = $val['jumlah'];
						$hasil[$i]['pemesan'] = $val['pemesan'];
						$hasil[$i]['nama'] = $val['name'];
						$hasil[$i]['gambar'] = $val['image'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
	function select_data7($user="") {
		global $con;

		$hasil = array();

		 $sql = "SELECT * FROM order_buku inner join images on order_buku.id = images.id WHERE order_buku.orderid = :id";
		
		 

		try {
            $stmt = $con->prepare($sql);
          $stmt->bindValue(':id', $user, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						$hasil[$i]['orderid'] = $val['orderid'];
						$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['judul'] = $val['judul'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['jumlah'] = $val['jumlah'];
						$hasil[$i]['nama'] = $val['name'];
						$hasil[$i]['gambar'] = $val['image'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
	
	function update_data($data="") {
		global $con;

		if ($data != null) {
			try {
				$sql = "UPDATE order_buku SET jumlah = :jumlah WHERE orderid = :id ";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $data['id2'], PDO::PARAM_STR);
				$stmt->bindValue(':jumlah', $data['jumlah2']-1, PDO::PARAM_STR);

				if ($stmt->execute()) return true;
				else return false;
			} catch(Exception $e) {
				echo 'Error update_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	function update_data2($data="") {
		global $con;

		if ($data != null) {
			try {
				$sql = "UPDATE order_buku SET jumlah = :jumlah WHERE orderid = :id ";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $data['id'], PDO::PARAM_STR);
				$stmt->bindValue(':jumlah', $data['jumlah']+1, PDO::PARAM_STR);

				if ($stmt->execute()) return true;
				else return false;
			} catch(Exception $e) {
				echo 'Error update_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	
	function delete_data($id="") {
		global $con;

		if ($id != "") {
			try {
				$sql = "DELETE FROM order_buku WHERE orderid = :id";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $id, PDO::PARAM_STR);
				if ($stmt->execute()) return true;
				else return false;

				
			} catch(Exception $e) {
				echo 'Error delete_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	
	function delete_data3($id="") {
		global $con;

		if ($id != "") {
			try {
				$sql = "DELETE FROM order_buku WHERE pemesan = :pemesan";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':pemesan', $id, PDO::PARAM_STR);
				if ($stmt->execute()) return true;
				else return false;

			
			} catch(Exception $e) {
				echo 'Error delete_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	function insert_data($data) {
		global $con;

		if ($data != null) {
			try {
				

				$sql = "INSERT INTO tbl_user VALUES (:username, :password, :email, :nohp)";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':username', $data['username'], PDO::PARAM_STR);
				$stmt->bindValue(':password', $data['password'], PDO::PARAM_STR);
				$stmt->bindValue(':email', $data['email'], PDO::PARAM_STR);
				$stmt->bindValue(':nohp', $data['phone'], PDO::PARAM_STR);

				if ($stmt->execute()) return true;
				else return false;
			} catch(Exception $e) {
				echo 'Error insert_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	function insert_data3($data) {
		global $con;

		if ($data != null) {
			try {
				

				$sql = "INSERT INTO order_buku VALUES (DEFAULT, :id, :judul, :harga,1,:pemesan)";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $data['id'], PDO::PARAM_STR);
				$stmt->bindValue(':judul', $data['judul'], PDO::PARAM_STR);
				$stmt->bindValue(':harga', $data['harga'], PDO::PARAM_STR);
				$stmt->bindValue(':pemesan', $data['pemesan'], PDO::PARAM_STR);

				if ($stmt->execute()) return true;
				else return false;
			} catch(Exception $e) {
				echo 'Error insert_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	
	function insert_data5($data,$unik) {
		global $con;

		if ($data != null) {
			try {
				

				$sql = "INSERT INTO pesanan VALUES (DEFAULT,:id,:judul, :harga,:jumlah, :pemesan,now(),'Menunggu Konfirmasi',:total,:unik,NULL)";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $data['id'], PDO::PARAM_STR);
				$stmt->bindValue(':judul', $data['judul'], PDO::PARAM_STR);
				$stmt->bindValue(':harga', $data['harga'], PDO::PARAM_STR);
				$stmt->bindValue(':jumlah', $data['jumlah'], PDO::PARAM_STR);
				$stmt->bindValue(':pemesan', $data['pemesan'], PDO::PARAM_STR);
				$stmt->bindValue(':total', $data['harga']*$data['jumlah'], PDO::PARAM_STR);
				$stmt->bindValue(':unik', $unik, PDO::PARAM_STR);
				if ($stmt->execute()) return true;
				else return false;
			} catch(Exception $e) {
				echo 'Error insert_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	
	
	function select_data12($user="") {
		global $con;

		$hasil = array();

		 $sql = "SELECT *,SUM(jumlah) as 'jumlah2',SUM(total) as 'totalfinal',GROUP_CONCAT(judul) as 'barang' FROM pesanan WHERE pemesan = :pemesan and status != 'Selesai' group by unik order by tanggal desc  ";
		
		 

		try {
            $stmt = $con->prepare($sql);
         
		$stmt->bindValue(':pemesan', $user, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						
        				$hasil[$i]['judul'] = $val['barang'];
						$hasil[$i]['pemesan'] = $val['pemesan'];
						
						$hasil[$i]['id'] = $val['unik'];
        				$hasil[$i]['total'] = $val['totalfinal'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['jumlah'] = $val['jumlah2'];
						$hasil[$i]['unik'] = $val['unik'];
					$hasil[$i]['status'] = $val['status'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	function select_data13($user="") {
		global $con;

		$hasil = array();

		 $sql = "SELECT *,SUM(jumlah) as 'jumlah2',SUM(total) as 'totalfinal',GROUP_CONCAT(judul) as 'barang' FROM pesanan WHERE pemesan = :pemesan and status = 'Selesai' group by unik order by tanggalnow desc  ";
		
		 

		try {
            $stmt = $con->prepare($sql);
         
		$stmt->bindValue(':pemesan', $user, PDO::PARAM_STR);
            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						
        				$hasil[$i]['judul'] = $val['barang'];
						$hasil[$i]['pemesan'] = $val['pemesan'];
						$hasil[$i]['tanggal'] = $val['tanggal'];
						$hasil[$i]['id'] = $val['unik'];
        				$hasil[$i]['total'] = $val['totalfinal'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['jumlah'] = $val['jumlah2'];
						$hasil[$i]['unik'] = $val['unik'];
					$hasil[$i]['status'] = $val['status'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
	
	//admin
	
	function select_data2($user="") {
		global $con;

		$hasil = array();

		if ($user != "") $sql = "SELECT * FROM buku inner join images on buku.id = images.id where buku.id = :id ";
		else $sql = "SELECT * FROM buku";
		 

		try {
            $stmt = $con->prepare($sql);
          if ($user != "") $stmt->bindValue(':id', $user, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['judul'] = $val['judul'];
						$hasil[$i]['harga'] = $val['harga'];
        				$hasil[$i]['deskripsi'] = $val['deskripsi'];
						$hasil[$i]['halaman'] = $val['halaman'];
        				$hasil[$i]['penerbit'] = $val['penerbit'];
						$hasil[$i]['tanggal'] = $val['tanggal'];
        				$hasil[$i]['berat'] = $val['berat'];
						$hasil[$i]['lebar'] = $val['lebar'];
        				$hasil[$i]['panjang'] = $val['panjang'];
						$hasil[$i]['isbn'] = $val['isbn'];
						$hasil[$i]['bahasa'] = $val['bahasa'];
						$hasil[$i]['tema'] = $val['tema'];
						
						$hasil[$i]['gambar'] = $val['image'];
						

        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
	
	
		function insert_data2($data) {
		global $con;

		if ($data != null) {
			try {
				

				$sql = "INSERT INTO buku VALUES (:id, :judul, :harga, :deskripsi,:halaman,:penerbit,:tanggal,:berat,:lebar,:panjang,:isbn,:bahasa,:tema)";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $data['id'], PDO::PARAM_STR);
				$stmt->bindValue(':judul', $data['judul'], PDO::PARAM_STR);
				$stmt->bindValue(':harga', $data['harga'], PDO::PARAM_STR);
				$stmt->bindValue(':deskripsi', $data['deskripsi'], PDO::PARAM_STR);
				$stmt->bindValue(':halaman', $data['halaman'], PDO::PARAM_STR);
				$stmt->bindValue(':penerbit', $data['penerbit'], PDO::PARAM_STR);
				$stmt->bindValue(':tanggal', $data['tanggal'], PDO::PARAM_STR);
				$stmt->bindValue(':berat', $data['berat'], PDO::PARAM_STR);
				$stmt->bindValue(':lebar', $data['lebar'], PDO::PARAM_STR);
				$stmt->bindValue(':panjang', $data['panjang'], PDO::PARAM_STR);
				$stmt->bindValue(':isbn', $data['isbn'], PDO::PARAM_STR);
				$stmt->bindValue(':bahasa', $data['bahasa'], PDO::PARAM_STR);
				$stmt->bindValue(':tema', $data['tema'], PDO::PARAM_STR);
				if ($stmt->execute()) return true;
				else return false;
			} catch(Exception $e) {
				echo 'Error insert_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	
	function select_data8($user="") {
		global $con;

		$hasil = array();

		 $sql = "SELECT *,SUM(jumlah) as 'jumlah2',SUM(total) as 'totalfinal',GROUP_CONCAT(judul) as 'barang' FROM pesanan WHERE status like CONCAT( '%','Menunggu Konfirmasi', '%') or status like CONCAT( '%','Sedang Diproses', '%')  group by unik order by tanggal desc  ";
		
		 

		try {
            $stmt = $con->prepare($sql);
         

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						
        				$hasil[$i]['barang'] = $val['barang'];
						$hasil[$i]['pemesan'] = $val['pemesan'];
						$hasil[$i]['judul'] = $val['judul'];
						$hasil[$i]['id'] = $val['unik'];
        				$hasil[$i]['totalfinal'] = $val['totalfinal'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['jumlah2'] = $val['jumlah2'];
						
					$hasil[$i]['status'] = $val['status'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
	function select_data10($user="") {
		global $con;

		$hasil = array();

		 $sql = "SELECT *,SUM(jumlah) as 'jumlah2',SUM(total) as 'totalfinal',GROUP_CONCAT(judul) as 'barang' FROM pesanan WHERE status = 'Sedang Diproses' group by unik;  ";
		
		 

		try {
            $stmt = $con->prepare($sql);
         

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						
        				$hasil[$i]['judul'] = $val['barang'];
						$hasil[$i]['pemesan'] = $val['pemesan'];
						
						$hasil[$i]['id'] = $val['unik'];
        				$hasil[$i]['total'] = $val['totalfinal'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['jumlah'] = $val['jumlah2'];
						$hasil[$i]['unik'] = $val['unik'];
					$hasil[$i]['status'] = $val['status'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
	function select_data11($user="") {
		global $con;

		$hasil = array();

		 $sql = "SELECT *,SUM(jumlah) as 'jumlah2',SUM(total) as 'totalfinal',GROUP_CONCAT(judul) as 'barang' FROM pesanan WHERE status = 'Selesai' group by unik order by tanggalnow desc  ";
		
		 

		try {
            $stmt = $con->prepare($sql);
         

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						$hasil[$i]['tanggalnow'] = $val['tanggalnow'];
        				$hasil[$i]['judul'] = $val['barang'];
						$hasil[$i]['pemesan'] = $val['pemesan'];
						$hasil[$i]['tanggal'] = $val['tanggal'];
						$hasil[$i]['id'] = $val['unik'];
        				$hasil[$i]['total'] = $val['totalfinal'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['jumlah'] = $val['jumlah2'];
						$hasil[$i]['unik'] = $val['unik'];
					$hasil[$i]['status'] = $val['status'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
		function select_data9($user="") {
		global $con;

		$hasil = array();

		 $sql = "SELECT * FROM pesanan WHERE unik = :unik";
		
		 

		try {
            $stmt = $con->prepare($sql);
          $stmt->bindValue(':unik', $user, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
				
						$hasil[$i]['id'] = $val['id'];
        				$hasil[$i]['judul'] = $val['judul'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['jumlah'] = $val['jumlah'];
						
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
	
	function update_data3($nim="") {
		global $con;

		if ($nim != "") {
			try {
				$sql = "UPDATE pesanan SET status = 'Sedang Diproses' WHERE unik = :id";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $nim, PDO::PARAM_STR);
				if ($stmt->execute()) return true;
				else return false;

				
			} catch(Exception $e) {
				echo 'Error update_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	
	function update_data4($nim="") {
		global $con;

		if ($nim != "") {
			try {
				$sql = "UPDATE pesanan SET status = 'Selesai', tanggalnow = now()  WHERE unik = :id";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $nim, PDO::PARAM_STR);
				if ($stmt->execute()) $ok = true;
				else return false;

				
			} catch(Exception $e) {
				echo 'Error update_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	
	
	function update_data5($nim="") {
		global $con;

		if ($nim != "") {
			try {
				$sql = "UPDATE pesanan SET status = 'Ditolak', tanggalnow = now() WHERE unik = :id";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $nim, PDO::PARAM_STR);
				if ($stmt->execute()) $ok = true;
				else return false;

				
			} catch(Exception $e) {
				echo 'Error update_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	
	function update_data7($nim="") {
		global $con;

		if ($nim != "") {
			try {
				$sql = "UPDATE pesanan SET status = 'Dibatalkan', tanggalnow = now() WHERE unik = :id";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $nim, PDO::PARAM_STR);
				if ($stmt->execute()) return true;
				else return false;

				
			} catch(Exception $e) {
				echo 'Error update_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	
	
	
	function update_data6($id="",$data ="") {
		global $con;

		if ($data != null) {
			try {
				$sql = "UPDATE buku SET judul = :judul, harga = :harga, deskripsi = :deskripsi, halaman = :halaman, penerbit = :penerbit,tanggal = :tanggal,lebar = :lebar,berat = :berat, panjang = :panjang, isbn = :isbn, bahasa = :bahasa,tema = :tema WHERE id = :id";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $id, PDO::PARAM_STR);
				$stmt->bindValue(':judul', $data['judul'], PDO::PARAM_STR);
				$stmt->bindValue(':harga', $data['harga'], PDO::PARAM_STR);
				$stmt->bindValue(':deskripsi', $data['deskripsi'], PDO::PARAM_STR);
				$stmt->bindValue(':halaman', $data['halaman'], PDO::PARAM_STR);
				$stmt->bindValue(':penerbit', $data['penerbit'], PDO::PARAM_STR);
				$stmt->bindValue(':tanggal', $data['tanggal'], PDO::PARAM_STR);
				$stmt->bindValue(':berat', $data['berat'], PDO::PARAM_STR);
				$stmt->bindValue(':lebar', $data['lebar'], PDO::PARAM_STR);
				$stmt->bindValue(':panjang', $data['panjang'], PDO::PARAM_STR);
				$stmt->bindValue(':isbn', $data['isbn'], PDO::PARAM_STR);
				$stmt->bindValue(':bahasa', $data['bahasa'], PDO::PARAM_STR);
				$stmt->bindValue(':tema', $data['tema'], PDO::PARAM_STR);

				if ($stmt->execute()) return true;
				else return false;
			} catch(Exception $e) {
				echo 'Error update_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	

	function delete_data2($id="") {
		global $con;

		if ($id != "") {
			try {
				$sql = "DELETE buku,images FROM  buku inner join images on buku.id = images.id WHERE buku.id = :id";
				$stmt = $con->prepare($sql);
				$stmt->bindValue(':id', $id, PDO::PARAM_STR);
				if ($stmt->execute())return true;
				else return false;

				
			} catch(Exception $e) {
				echo 'Error delete_data : '.$e->getMessage();
				return false;
			}
		} else {
			return false;
		}
	}
	
	function select_data14($unik="") {
		global $con;

		$hasil = array();

		 $sql = "SELECT * FROM pesanan inner join images on pesanan.id = images.id WHERE pesanan.unik = :unik ";
		
		 

		try {
            $stmt = $con->prepare($sql);
         $stmt->bindValue(':unik', $unik, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						$hasil[$i]['tanggal'] = $val['tanggal'];
        			
						$hasil[$i]['pemesan'] = $val['pemesan'];
						$hasil[$i]['judul'] = $val['judul'];
						$hasil[$i]['id'] = $val['id'];
						$hasil[$i]['unik'] = $val['unik'];
						$hasil[$i]['idpesanan'] = $val['idpesanan'];
        				$hasil[$i]['total'] = $val['total'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['jumlah'] = $val['jumlah'];
						
					$hasil[$i]['status'] = $val['status'];
					$hasil[$i]['gambar'] = $val['image'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	
	function select_data15($user="") {
		global $con;

		$hasil = array();

		 $sql = "SELECT *,SUM(jumlah) as 'jumlah2',SUM(total) as 'totalfinal',GROUP_CONCAT(judul) as 'barang' FROM pesanan WHERE status like CONCAT( '%','Dibatalkan', '%') or status like CONCAT( '%','Ditolak', '%') group by unik order by tanggalnow desc  ";
		
		 

		try {
            $stmt = $con->prepare($sql);
         

            if ($stmt->execute()) {
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
        		$rs = $stmt->fetchAll();
        		
        		if ($rs != null) {
        			$i = 0;
        			foreach ($rs as $val) {
						$hasil[$i]['tanggalnow'] = $val['tanggalnow'];
        				$hasil[$i]['judul'] = $val['barang'];
						$hasil[$i]['pemesan'] = $val['pemesan'];
						$hasil[$i]['tanggal'] = $val['tanggal'];
						$hasil[$i]['id'] = $val['unik'];
        				$hasil[$i]['total'] = $val['totalfinal'];
						$hasil[$i]['harga'] = $val['harga'];
						$hasil[$i]['jumlah'] = $val['jumlah2'];
						$hasil[$i]['unik'] = $val['unik'];
					$hasil[$i]['status'] = $val['status'];
        			
					
						$i++;
        			}
        		}
        	}
        } catch(Exception $e) {
			echo 'Error select_data : '.$e->getMessage();
		}

		return $hasil;
	}
	?>
	
	