<?php 
require 'functions.php';

$id = $_GET["id"];

if( deletecust($id) > 0){
	echo "
		<script>
		alert('Data berhasil dihapus!');
		document.location.href = 'customer.php';
		</script>
		";
	} else {
		echo "<script>
		alert('Data Gagal Dihapus!');
		document.location.href = 'customer.php';
		</script>";
	}
 ?>