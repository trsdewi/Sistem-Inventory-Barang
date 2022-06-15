// ambil elemen yang dibutuhkan

// cari elemen yang punya id key yang ada di document
// klo ketemu elemen tsb masuk ke variabel key
var key = document.getElementById('key');
var cari = document.getElementById('cari');
var container = document.getElementById('container');

// tambahkan event ketika keyword ditulis
key.addEventListeners('keyup', function() {

	// buat object ajax
	var xhr = new XMLHttpRequest();

	// cek kesiapan ajax
	xhr.onreadystatechange = function() {
		if( xhr.readyState == 4 && xhr.status == 200 ) {
			container.innerHTML = xhr.responseText;
		}
	}

	// eksekusi ajax
	xhr.open('GET', 'assets/ajax/barang.php?key=' + key.value, true);
	xhr.send();
})
