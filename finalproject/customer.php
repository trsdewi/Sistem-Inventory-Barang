<?php 
// memanggil file functions
require 'functions.php';
$cust = query("SELECT * FROM customer");

if ( isset($_POST["caricust"])) {
	$cust = caricust($_POST["key"]);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Customer</title>
	<link rel="stylesheet" href="assets/css/search.css">
	<link rel="stylesheet" href="assets/css/sidebar.css">
	<link rel="stylesheet" href="assets/css/table.css">
	<link rel="stylesheet" href="assets/css/button.css">
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
	<h1>Daftar Customer</h1>
	<br><br>

	<form action="" method="post"class="box">

		<input type="text" name="key" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="key">
		<input type="submit" name="caricust" id="caricust" value="Search">

	</form>

	<br><br>
	<a href="tambahcust.php" class="tombol1">Tambah</a>

	<br><br>

	<table class="table1">
	<tr>
        <th>No.</th>
		<th>ID Penerima</th>
		<th>Nama Penerima</th>
		<th>Alamat</th>
		<th>Telepon</th>
		<th>Aksi</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach ($cust as $row) : ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row["id_penerima"] ?></td>
		<td><?php echo $row["nama_penerima"] ?></td>
		<td><?php echo $row["alamat"] ?></td>
		<td><?php echo $row["telepon"] ?></td>
		<td>
			<a href="updatecust.php?id= <?php echo $row["id_penerima"]; ?>">ubah</a> | 
			<a href="deletecust.php?id=<?= $row["id_penerima"]; ?>"> delete</a>
		</td>
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
	</table>

</body>
</html>

<?php /*
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Barang Masuk</title>
</head>
<body>
	<h1>Daftar Customer</h1>
	<a href="customer.php">Tambah</a>
	<br><br>

	<form action="" method="post">

		<input type="text" name="key" size="60" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
		<button type="submit" name="cari">Cari!</button>

	</form>

	<br><br>

	<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No.</th>
		<th>ID Penerima</th>
		<th>Nama Penerima</th>
		<th>Alamat</th>
		<th>Telepon</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach ($cust as $row) : ?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $row["id_penerima"] ?></td>
		<td><?php echo $row["nama_penerima"] ?></td>
		<td><?php echo $row["alamat"] ?></td>
		<td><?php echo $row["telepon"] ?></td>	
	</tr>
	<?php $i++; ?>
<?php endforeach; ?>
	</table>

	<br><br> 
	<a href="stockbarang.php">Stock Barang</a>

	<br><br> 
	<a href="logout.php">Logout</a>
</body>
</html>
*/?>
