<?php 
	include('koneksi.php');

	$id = $_POST['id'];
	$FotoBarang = $_FILES['FotoBarang']['name'];
	$NamaBarang = $_POST['NamaBarang'];
	$HargaBeli = $_POST['HargaBeli'];
	$HargaJual = $_POST['HargaJual'];
	$Stok = $_POST['Stok'];

	if($FotoBarang != ""){
		$ekstensi_diperbolehkan = array('png','jpg');
		$x = explode('.', $FotoBarang);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['FotoBarang']['tmp_name'];
		$angka_acak = rand(1, 999);
		$FotoBarang_baru = $angka_acak.'-'.$FotoBarang;

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			move_uploaded_file($file_tmp, 'gambar/'.$FotoBarang_baru);

			$query = "UPDATE data_barang SET FotoBarang = '$FotoBarang_baru', NamaBarang = '$NamaBarang', HargaBeli = '$HargaBeli', HargaJual = '$HargaJual', Stok = '$Stok'";
			$query .= "WHERE id ='$id'";
			$result =mysqli_query($koneksi, $query);

			if(!$result){
				die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
			} else {
				echo "<script>alert('Barang Baru Berhasil Diubah!');window.location='index.php';</script>";
		    } 
		} else {
			echo "<script>alert('Ekstensi gambar hanya bisa jpg dan png!');window.location='edit_barang.php';</script>";
		}
	 } else {
		$query = "UPDATE data_barang SET NamaBarang = '$NamaBarang', HargaBeli = '$HargaBeli', HargaJual = '$HargaJual', Stok = '$Stok'";
			$query .= "WHERE id ='$id'";
			$result =mysqli_query($koneksi, $query);

			if(!$result){
				die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
			} else {
				echo "<script>alert('Barang Baru Berhasil Diubah!');window.location='index.php';</script>";
		    } 
		}
?>