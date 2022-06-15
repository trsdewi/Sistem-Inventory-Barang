<?php
require 'functions.php';

	if( isset($_POST['register'])){
		if(register($_POST) > 0 ){
			echo "<script>
					alert('user baru berhasil ditambahkan!')
			</script>";
		} else {
			echo mysqli_error($connect);
		}
	}

//Tampilan sementara
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Halaman Login</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login">
	<div class="container">
          <h1>Register</h1>

          <?php if( isset($error)) : ?>
          	<p style="color : red; font-style: italic;">Username / password salah!</p>
          <?php endif; ?>

            <form action="" method="post">
                <label>Username</label><br>
                <input type="text" name="username" id="username"><br>
                <label>Password</label><br>
                <input type="password" name="password" id="password"><br>
                <label>Konfirmasi Password</label><br>
                <input type="password" name="konfirm" id="konfirm"><br>
                <button type="submit" name="regis">Register</button>
                <br><br>
                <span style="color : skyblue;">Sudah punya akun?</span>
                <a href="login.php" style="color : white; font-style : italic;">Login</a>
            </form>
        </div>     
</body>
</html>
