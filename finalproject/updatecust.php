<?php
require "functions.php";

// ambil data di URL
$id = $_GET["id"];

// query data mahasiswa berdasarkan id_penerima
$cust = query ("SELECT * FROM customer WHERE id_penerima = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {


// cek data berhasil diubah atau tidak
	if (updatecust($_POST) > 0){
		echo "
		<script>
		alert('Data berhasil diubah!');
		document.location.href = 'customer.php';
		</script>
		";
	} else {
		echo "<script>
		alert('Data gagal diubah!');
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
	<title>Update Data Customer</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head class="form">
	<div class="wrap">
		<div class="container2">
<body>
	<h1>Update Data Customer</h1>
	<form action="" method="post">
		<input type="hidden" name="id_penerima" value="<?php echo $cust["id_penerima"]; ?>">
		<table>
			<tr>
				<td>Nama Penerima</td>
				<td>:</td>
				<td><input type="text" name="nama_penerima" id="nama_penerima" value="<?php echo $cust["nama_penerima"];  ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat" id="alamat" value="<?php echo $cust["alamat"];  ?>"></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><input type="text" name="telepon" id="telepon" value="<?php echo $cust["telepon"];  ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
				<button type="submit" name="submit">Update</button>
				<button type="submit" name="batal">Batal</button>
				</td>
			</tr>
		</table>
	</form>
	</div>
	</div>

</body>
</html>
