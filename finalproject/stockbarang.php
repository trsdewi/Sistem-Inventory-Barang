<?php 
session_start();

if ( !isset($_SESSION['login']) ) {
	header("Location: login.php");
	exit;
}

// memanggil file functions
require 'functions.php';

$brg = query("SELECT id, kode_barang, nama_barang, id_supplier, kategori, satuan, stock, harga_satuan, (stock*harga_satuan) AS sub_total FROM barang ORDER BY kode_barang");


if ( isset($_POST["cari"])) {
	$brg = cari($_POST["key"]);
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Stock Barang</title>
	<link rel="stylesheet" href="assets/css/button.css">
	<link rel="stylesheet" href="assets/css/search.css">
	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/sidebar.css">
	
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
	<div class="btn">
		<span class="fas fa-bars"></span>
	</div>
	<nav class="sidebar">
		<div class="text">Side Menu</div>
		<ul>
			<li><a href="stockbarang.php">Dashboard</a></li>
			<li>
				<a class="tran-btn">Transaksi
					<span class="fas fa-caret-down first"></span></a>
				<ul class="tran-show">
					<li><a href="brg_masuk.php">Barang Masuk</a></li>
					<li><a href="brg_keluar.php">Barang Keluar</a></li>
				</ul>
			</li>
			<li><a href="supplier.php">Suppliers</a></li>
			<li><a href="customer.php">Customer</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
	</nav>

	<script>
	$('.btn').click(function(){
		$(this).toggleClass("click");
		$('.sidebar').toggleClass("show");
	});
		$('.tran-btn').click(function() {
			$('nav ul .tran-show').toggleClass("show");
			$('nav ul .first').toggleClass("rotate");
		});
		$('nav ul li').click(function(){
			$(this).addClass("active").siblings().removeClass("active");
		})
	</script>

	<br>
	<h1>Daftar Barang</h1>
	<br><br>

	
	<form action="" method="post" class="box">

		<input type="text" name="key" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="key">
		<input type="submit" name="cari" id="cari" value="Search">
	</form>

	<br><br>
	<a href="tambah.php" class="tombol2">Tambah</a>

	<br><br>
	<div id="container">
	<table class="table1">
	<tr>
		<th>No.</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>ID Supplier</th>
		<th>Kategori</th>
		<th>Satuan</th>
		<th>Stock</th>
		<th>Harga Satuan</th>
		<th>Sub Total</th>
		<th>Aksi</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach ($brg as $row) : ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row["kode_barang"] ?></td>
		<td><?php echo $row["nama_barang"] ?></td>
		<td><?php echo $row["id_supplier"] ?></td>
		<td><?php echo $row["kategori"] ?></td>
		<td><?php echo $row["satuan"] ?></td>
		<td><?php echo $row["stock"] ?></td>
		<td><?php echo $row["harga_satuan"] ?></td>
		<td><?php echo $row["sub_total"] ?></td>
		<td>
			<a href="update.php?id= <?php echo $row["id"]; ?>">ubah</a> | 
			<a href="delete.php?id=<?= $row["id"]; ?>"> delete</a>
		</td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
	</table>
	</div>

	<script src="assets/js/script.js"></script>
</body>
</html>

<?php /*
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
	<h1>Daftar Barang</h1>
	<a href="tambah.php">Tambah data barang</a>
	<br><br>

	<form action="" method="post">

		<input type="text" name="key" size="60" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="key">
		<button type="submit" name="cari" id="cari">Cari!</button>

	</form>

	<br>
	<div id="container">
	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>Kode Barang</th>
		<th>Nama Barang</th>
		<th>ID Supplier</th>
		<th>Kategori</th>
		<th>Satuan</th>
		<th>Stock</th>
		<th>Harga Satuan</th>
		<th>Sub Total</th>
		<th>Aksi</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach ($brg as $row) : ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row["kode_barang"] ?></td>
		<td><?php echo $row["nama_barang"] ?></td>
		<td><?php echo $row["id_supplier"] ?></td>
		<td><?php echo $row["kategori"] ?></td>
		<td><?php echo $row["satuan"] ?></td>
		<td><?php echo $row["stock"] ?></td>
		<td><?php echo $row["harga_satuan"] ?></td>
		<td><?php echo $row["sub_total"] ?></td>
		<td>
			<a href="update.php?id= <?php echo $row["id"]; ?>">ubah</a> | 
			<a href="delete.php?id=<?= $row["id"]; ?>"> delete</a>
		</td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
	</table>
	</div>

	<br><br> 
	<a href="brg_keluar.php">Barang Keluar</a>

	<br><br> 
	<a href="brg_masuk.php">Barang Masuk</a>

	<br><br> 
	<a href="logout.php">Logout</a>

	<script src="assets/js/script.js"></script>
</body>
</html>
*/?>
