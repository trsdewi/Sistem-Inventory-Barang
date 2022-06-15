<?php
require "functions.php";

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {


// cek data berhasil ditambah atau tidak
	if (keluar($_POST) > 0){
		echo "
		<script>
		alert('Data berhasil ditambahkan!');
		document.location.href = 'brg_keluar.php';
		</script>
		";
	} else {
		echo "<script>
		alert('Gagal!');
		document.location.href = 'brg_keluar.php';
		</script>";
	}

} else if (isset($_POST["batal"])){
	header("Location: brg_keluar.php");
}
	
?>

<!DOCTYPE html>
<html>
<headclass=>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Barang Keluar</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</headclass="form">
	<div class="wrap">
		<div class="container2">
<body>
	<h1>Input Barang Keluar</h1>
	<form action="" method="post">
	<table>
			<tr>
				<td>ID Transaksi</td>
				<td>:</td>
				<td><input type="text" name="id_transaksi" id="id_transaksi"></td>
			</tr>
			<tr>
				<td>Tanggal</td>
				<td>:</td>
				<td><input type="text" name="tanggal" id="tanggal"></td>
			</tr>
			<tr>
				<td>Kode Barang</td>
				<td>:</td>
				<td><input type="text" name="kode_barang" id="kode_barang"></td>
			</tr>
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" name="nama_barang" id="nama_barang"></td>
			</tr>
			<tr>
				<td>Customer</td>
				<td>:</td>
				<td><input type="text" name="customer" id="customerr"></td>
			</tr>
			<tr>
				<td>Jumlah</td>
				<td>:</td>
				<td><input type="text" name="jumlah" id="jumlah"></td>
			</tr>
			<tr>
				<td>Satuan</td>
				<td>:</td>
				<td><input type="text" name="satuan" id="satuan"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
				<button type="submit" name="submit">Tambah</button>
					<button type="submit" name="batal">Batal</button>
				</td>
			</tr>
		</table>
	</form>
	</div>
	</div>

</body>
</html>
