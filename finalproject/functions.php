<?php 
// koneksi ke database
$connect = mysqli_connect("localhost", "root", "", "finalproject");
 
 // fungsi registrasi
function register($data){
	global $connect;

	$username = strtolower(stripslashes($data["username"]));
	$password = $data["password"];
	$konfirm = $data["konfirm"];

	// cek username udh ada apa blum
	/*$result = mysqli_query($connect, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
					alert('username sudah terdaftar!')
			</script>";
		return false;
	}*/

	// cek konfirmasi pass
	if ($password !== $konfirm) {
		echo "<script>
			alert('Konfirmasi password tidak sesuai!');
		</script>";
		return false;
	}

	// enkripsi pass
	$password = password_hash($password, PASSWORD_DEFAULT);

	// Kalo regis berhasil
	// Tambah user baru di database
	mysqli_query($connect, "INSERT INTO tb_user VALUES('', '$username', '$password' )");

	return mysqli_affected_rows($connect);
}

function query($query){
	global $connect;
	$result = mysqli_query($connect, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
 }

 function tambah($data){
 	global $connect;

 	$kode_barang = htmlspecialchars($data["kode_barang"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$id_supplier = htmlspecialchars($data["id_supplier"]);
	$kategori = htmlspecialchars($data["kategori"]);
	$satuan = htmlspecialchars($data["satuan"]);
	$stock = $data["stock"];
	$harga_satuan = htmlspecialchars($data["harga_satuan"]);
	$sub_total = $data["stock"]*$data["harga_satuan"];


	$query = "INSERT INTO barang VALUES
	('', '$kode_barang', '$nama_barang', '$id_supplier', '$kategori', '$satuan', '$stock', '$harga_satuan', '$sub_total')";
	mysqli_query($connect, $query);

	return mysqli_affected_rows($connect);
 }

 function delete($id){
 	global $connect;
 	mysqli_query($connect, "DELETE FROM barang WHERE id = $id");

 	return mysqli_affected_rows($connect);
 }

 function deletecust($id){
	global $connect;
	mysqli_query($connect, "DELETE FROM customer WHERE id_penerima = $id");

	return mysqli_affected_rows($connect);
}

function deletesupp($id){
	global $connect;
	mysqli_query($connect, "DELETE FROM supplier WHERE id_supplier = $id");

	return mysqli_affected_rows($connect);
}

 function cari($key){
 	$query = "SELECT * FROM barang WHERE kode_barang LIKE '%$key%' OR nama_barang LIKE '%$key%' OR id_supplier LIKE '%$key%' OR kategori LIKE '%$key%' OR satuan LIKE '%$key%' OR stock LIKE '%$key%'
 	";
 	return query($query);
 }

 function carikeluar($key){
	$query = "SELECT * FROM brg_keluar WHERE id_transaksi LIKE '%$key%' OR tanggal LIKE '%$key%' OR kode_barang LIKE '%$key%' OR nama_barang LIKE '%$key%' OR customer LIKE '%$key%' OR jumlah LIKE '%$key%' OR satuan LIKE '%$key%' 
	";
	return query($query);
}

function carimasuk($key){
	$query = "SELECT * FROM brg_masuk WHERE id_transaksi LIKE '%$key%' OR tanggal LIKE '%$key%' OR kode_barang LIKE '%$key%' OR nama_barang LIKE '%$key%' OR supplier LIKE '%$key%' OR jumlah LIKE '%$key%' OR satuan LIKE '%$key%' 
	";
	return query($query);
}

function caricust($key){
	$query = "SELECT * FROM customer WHERE id_penerima LIKE '%$key%' OR nama_penerima LIKE '%$key%' OR alamat LIKE '%$key%' OR telepon LIKE '%$key%'";
	return query($query);
}

function carisupp($key){
	$query = "SELECT * FROM supplier WHERE id_supplier LIKE '%$key%' OR nama_supplier LIKE '%$key%' OR alamat LIKE '%$key%' OR telepon LIKE '%$key%'";
	return query($query);
}

 function update($data){
 	global $connect;

 	$id = $data["id"];
 	$kode_barang = htmlspecialchars($data["kode_barang"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$id_supplier = htmlspecialchars($data["id_supplier"]);
	$kategori = htmlspecialchars($data["kategori"]);
	$satuan = htmlspecialchars($data["satuan"]);
	$stock = $data["stock"];
	$harga_satuan = htmlspecialchars($data["harga_satuan"]);
	$sub_total = $data["stock"]*$data["harga_satuan"];

	$query = "UPDATE barang SET 
				kode_barang = '$kode_barang',
				nama_barang = '$nama_barang',
				id_supplier = '$id_supplier',
				kategori = '$kategori',
				satuan = '$satuan',
				stock = '$stock', harga_satuan ='$harga_satuan', sub_total ='$sub_total'
				WHERE id = $id
				";
	mysqli_query($connect, $query);

	return mysqli_affected_rows($connect);
 }

 function updatecust($data){
	global $connect;

	$id = $data["id_penerima"];
	$nama_penerima = htmlspecialchars($data["nama_penerima"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $telepon = htmlspecialchars($data["telepon"]);

   $query = "UPDATE customer SET 
			   nama_penerima = '$nama_penerima',
			   alamat = '$alamat',
			   telepon = '$telepon'
			   WHERE id_penerima = $id
			   ";
   mysqli_query($connect, $query);

   return mysqli_affected_rows($connect);
}

function updatesupp($data){
	global $connect;

	$id = $data["id_supplier"];
	$nama_supplier = htmlspecialchars($data["nama_supplier"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $telepon = htmlspecialchars($data["telepon"]);

   $query = "UPDATE supplier SET 
			   nama_supplier = '$nama_supplier',
			   alamat = '$alamat',
			   telepon = '$telepon'
			   WHERE id_supplier = $id
			   ";
   mysqli_query($connect, $query);

   return mysqli_affected_rows($connect);
}

function keluar($data){
 	global $connect;

 	$id_transaksi = htmlspecialchars($data["id_transaksi"]);
	$tanggal = $data["tanggal"];
	$kode_barang = htmlspecialchars($data["kode_barang"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$customer = htmlspecialchars($data["customer"]);
	$jumlah = $data["jumlah"];
	$satuan = htmlspecialchars($data["satuan"]);
	$query = "INSERT INTO brg_keluar VALUES
	('', '$id_transaksi','$tanggal', '$kode_barang', '$nama_barang', '$customer', $jumlah, '$satuan')";
	mysqli_query($connect, $query);

	return mysqli_affected_rows($connect);
 }

 function masuk($data){
 	global $connect;

	$id_transaksi = htmlspecialchars($data["id_transaksi"]);
	$tanggal = $data["tanggal"];
	$kode_barang = htmlspecialchars($data["kode_barang"]);
	$nama_barang = htmlspecialchars($data["nama_barang"]);
	$supplier = htmlspecialchars($data["supplier"]);
	$jumlah = $data["jumlah"];
	$satuan = htmlspecialchars($data["satuan"]);

	$query = "INSERT INTO brg_masuk VALUES
	('', '$id_transaksi', '$tanggal', '$kode_barang', '$nama_barang', '$supplier', $jumlah, '$satuan')";
	mysqli_query($connect, $query);

	return mysqli_affected_rows($connect);
 }

 function tambahcust($data){
	global $connect;
	
   $nama_penerima = htmlspecialchars($data["nama_penerima"]);
   $alamat = htmlspecialchars($data["alamat"]);
   $telepon = htmlspecialchars($data["telepon"]);

   $query = "INSERT INTO customer VALUES
   ('', '$nama_penerima', '$alamat', '$telepon')";
   mysqli_query($connect, $query);

   return mysqli_affected_rows($connect);
}

function tambahsupp($data){
	global $connect;
	
   $nama_supplier = htmlspecialchars($data["nama_supplier"]);
   $alamat = htmlspecialchars($data["alamat"]);
   $telepon = htmlspecialchars($data["telepon"]);

   $query = "INSERT INTO supplier VALUES
   ('', '$nama_supplier', '$alamat', '$telepon')";
   mysqli_query($connect, $query);

   return mysqli_affected_rows($connect);
}
 ?>
