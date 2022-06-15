<?php 
require 'functions.php';

$id = $_GET["id"];

if( deletesupp($id) > 0){
	echo "
		<script>
		alert('Data berhasil dihapus!');
		document.location.href = 'supplier.php';
		</script>
		";
	} else {
		echo "<script>
		alert('Data Gagal Dihapus!');
		document.location.href = 'supplier.php';
		</script>";
	}
 ?>