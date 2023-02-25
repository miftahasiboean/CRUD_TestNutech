<?php 
	include('koneksi.php');

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

			$query = "INSERT INTO data_barang (FotoBarang, NamaBarang, HargaBeli, HargaJual, Stok) VALUE ('$FotoBarang_baru', '$NamaBarang', '$HargaBeli', '$HargaJual', '$Stok')";
			$result =mysqli_query($koneksi, $query);

			if(!$result){
				die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
			} else {
				echo "<script>alert('Barang Baru Berhasil Ditambahkan!');window.location='index.php';</script>";
		    } 
		} else {
			echo "<script>alert('Ekstensi gambar hanya bisa jpg dan png!');window.location='tambah_barang.php';</script>";
		}
	 } else {
		$query = "INSERT INTO data_barang (NamaBarang, HargaBeli, HargaJual, Stok) VALUE ('$NamaBarang', '$HargaBeli', '$HargaJual', '$Stok')";
			$result =mysqli_query($koneksi, $query);

			if(!$result){
				die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
			} else {
				echo "<script>alert('Barang Baru Berhasil Ditambahkan!');window.location='index.php';</script>";
			}
		}
?>