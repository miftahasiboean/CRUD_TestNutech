<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Barang</title>
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
	<center><h1>Tambah Barang</h1></center>
	<form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
	<section class="base">
		<div>
			<label>Foto Barang</label>
			<input type="file" name="FotoBarang" required="" />
		</div>
		<div>
			<label>Nama Barang</label>
			<input type="text" name="NamaBarang" autofocus="" required="" />
		</div>
		<div>
			<label>Harga Beli</label>
			<input type="number" name="HargaBeli" required="" />
		</div>
		<div>
			<label>Harga Jual</label>
			<input type="number" name="HargaJual" required="" />
		</div>
		<div>
			<label>Stok</label>
			<input type="number" name="Stok" required="" />
		</div>
		<div>
			<button type="submit">Simpan Barang</button>
		</div>
	</section>
	v</form>
</body>
</html>