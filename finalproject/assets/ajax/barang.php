<?php 
require '../../functions.php';

$key = $_GET["key"];

$query = "SELECT * FROM barang WHERE kode_barang LIKE '%$key%' OR nama_barang LIKE '%$key%' OR id_supplier LIKE '%$key%' OR jenis LIKE '%$key%' OR satuan LIKE '%$key%' OR stock LIKE '%$key%'
 	";
$brg = query($query);
?>

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
		<td><?php echo $row["jenis"] ?></td>
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

