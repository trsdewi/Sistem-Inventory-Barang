<?php
require "functions.php";

// ambil data di URL
$id = $_GET["id"];

// query data supplier berdasarkan id_supplier
$supp = query ("SELECT * FROM supplier WHERE id_supplier = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {


// cek data berhasil diubah atau tidak
	if (updatesupp($_POST) > 0){
		echo "
		<script>
		alert('Data berhasil diubah!');
		document.location.href = 'supplier.php';
		</script>
		";
	} else {
		echo "<script>
		alert('Data gagal diubah!');
		document.location.href = 'supplier.php';
		</script>";
	}

} else if (isset($_POST["batal"])){
	header("Location: supplier.php");
}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Data supplier</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head class="form">
	<div class="wrap">
		<div class="container2">
<body>
	<h1>Update Data supplier</h1>
	<form action="" method="post">
		<input type="hidden" name="id_supplier" value="<?php echo $supp["id_supplier"]; ?>">
		<table>
			<tr>
				<td>Nama Supplier</td>
				<td>:</td>
				<td><input type="text" name="nama_supplier" id="nama_supplier" value="<?php echo $supp["nama_supplier"];  ?>"></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="alamat" id="alamat" value="<?php echo $supp["alamat"];  ?>"></td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td>:</td>
				<td><input type="text" name="telepon" id="telepon" value="<?php echo $supp["telepon"];  ?>"></td>
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
