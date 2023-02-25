<?php include('koneksi.php'); 
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "SELECT * FROM data_barang where id = '$id'";
		$result = mysqli_query($koneksi, $query);
		if(!$result){
			die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
		}
		$data = mysqli_fetch_assoc($result);

		if(!count($data)){
			echo "<script>alert('Data tidak ditemukan pada tabel!');window.location='index.php';</script>";
		}
	} else {
		echo "<script>alert('Masukkan ID ynag ingin di edit');window.location='index.php';</script>";
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Barang</title>
	<style type="text/css">
		*{
			font-family: "Trebuchet MS";
		}
		h1{
			text-transform: uppercase;
			color: salmon;
		}
		.base{
			width: 400px;
			padding: 20px;
			margin-left: auto;
			margin-right: auto;
		}
		label{
			margin-top: 10px;
			float: left;
			text-align: left;
			width: 100%;
		}
		input{
			padding: 6px;
			width: 100%;
			box-sizing: border-box;
			background-color: #f8f8f8;
			border: 2px solid #ccc;
			outline-color: salmon;
		}
		select{
			padding: 6px;
			width: 100%;
			box-sizing: border-box;
			background-color: #f8f8f8;
			border: 2px solid #ccc;
			outline-color: salmon;
		}
		button{
			background-color: salmon;
			color: #fff;
			padding: 10px;
			font-size: 12px;
			border: 0;
			margin-top: 20px;
		}
	</style>
</head>
<body>
	<center><h1>Edit Barang <?php echo $data['NamaBarang']; ?></h1></center>
	<form method="POST" action="proses_edit.php" enctype="multipart/form-data">
	<section class="base">
		<div>
			<label>Foto Barang</label>
			<img src="gambar/<?php echo $data['FotoBarang']; ?>" style="width: 120px; float: left; margin-bottom: 5px;">
			<input type="file" name="FotoBarang" />
			<i style="float: left;font-size: 12px;color: red;">*Abaikan jika tidak merubah gambar!</i>
			
		</div>
		<div>
			<label>Nama Barang</label>
			<input type="text" name="NamaBarang" autofocus="" required="" value="<?php echo $data['NamaBarang']; ?>" />
			<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
		</div>
		<div>
			<label>Harga Beli</label>
			<input type="text" name="HargaBeli" required="" value="<?php echo $data['HargaBeli']; ?>" />
		</div>
		<div>
			<label>Harga Jual</label>
			<input type="text" name="HargaJual" required="" value="<?php echo $data['HargaJual']; ?>"/>
		</div>
		<div>
			<label>Stok</label>
			<input type="text" name="Stok" required="" value="<?php echo $data['Stok']; ?>"/>
		</div>
		<div>
			<br>
			<button type="submit">Simpan Perubahan</button>
		</div>
	</section>
	v</form>
</body>
</html>