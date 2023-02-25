<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD Test</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		*{
			font-family: "Trebuchet MS";
		}
		.flex-container{
			display: flex;
			align-items: stretch;
			width: 70%;
			margin: 10px auto 10px auto;
		}
		h1{
			text-transform: uppercase;
			color: salmon;
		}
		table{
			border: 1px solid #ddeeee;
			border-collapse: collapse;
			border-spacing: 0;
			width: 70%;
			margin: 10px auto 10px auto;
		}
		table thead th{
			background-color: #ddefcf;
			border: 1px solid #ddeeee;
			color: #336b6b;
			padding: 10px;
			text-align: left;
			text-shadow: 1px 1px 1px #fff;
		}
		table tbody td{
			border: 1px solid #ddeeee;
			color: #333;
			padding: 10px;
		}
		a{
			background-color: salmon;
			color: #fff;
			padding: 10px;
			font-size: 12px;
			text-decoration: none;
		}
		@media screen and (max-width: 1012px){
			.btn{
				width: 50%;
				display: inline-flex;
				margin: 1px;
			}
		}
	</style>
</head>
<body>
	<center><h1>DATA BARANG</h1></center>
	<div class="flex-container">
		<a href="tambah_barang.php">+ &nbsp; Tambah Barang</a>
		<form method="GET" action="index.php" class="search" style="margin: 10px auto 10px 340px;max-width: 300px;">
			<input type="text" placeholder="Search..." name="cari" value="<?php if(isset($_GET['cari'])){ echo $_GET['cari']; } ?>">
			<button type="submit" style=""><i class="fa fa-search"></i></button>
		</form>
	</div>
	<table>
		<thead>
			<tr>
				<th>No.</th>
				<th>Foto Barang</th>
				<th>Nama Barang</th>
				<th>Harga Beli</th>
				<th>Harga Jual</th>
				<th>Stok</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				include "koneksi.php";
				if(isset($_GET['cari'])){
					$search = $_GET['cari'];
					$query = "SELECT * FROM data_barang where NamaBarang like '%".$search."%'";
				} else {
					$query = "SELECT * FROM data_barang";
				}

			   
				$result = mysqli_query($koneksi, $query);

				if(!$result){
					die("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
				}
				$no = 1;

				while ($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><img style="width: 120px" src="gambar/<?php echo $row['FotoBarang']; ?>"></td>
				<td><?php echo $row['NamaBarang']; ?></td>
				<td>Rp <?php echo number_format($row['HargaBeli'], 0, ',', '.'); ?></td>
				<td>Rp <?php echo number_format($row['HargaJual'], 0, ',', '.'); ?></td>
				<td><?php echo $row['Stok']; ?></td>
				<td>
					<a href="edit_barang.php?id=<?php echo $row['id']; ?>" class="btn">Edit</a>
					<a href="delete_barang.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')" class="btn">Delete</a>
				</td>
			</tr>
			<?php 
			$no++;
		}
			?>
		</tbody>
	</table>
</body>
</html>