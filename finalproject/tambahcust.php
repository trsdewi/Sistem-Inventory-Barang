<?php
require "functions.php";

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {


// cek data berhasil ditambah atau tidak
	if (tambahcust($_POST) > 0){
		echo "
		<script>
		alert('Data berhasil ditambahkan!');
		document.location.href = 'customer.php';
		</script>
		";
	} else {
		echo "<script>
		alert('Gagal!');
		document.location.href = 'customer.php';
		</script>";
	}

} else if (isset($_POST["batal"])){
	header("Location: customer.php");
}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Data Customer</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head class="form">
	<div class="wrap">
		<div class="container2">
<body>
	<h1>Input Data Customer</h1>
	<form action="" method="post">
	<table>
			<tr>
				<td>Nama Penerima</td>
				<td>:</td>
				<td><input type="text" name="nama_penerima" id="nama_penerima"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat" id="alamat"></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><input type="text" name="telepon" id="telepon"></td>
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
