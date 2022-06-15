<?php
session_start();

if ( isset($_SESSION['login'])) {
	header("Location: stockbarang.php");
	exit;
}

require 'functions.php';

//cek tombol login sudah ditekan apa belum
//jika sudah, cek pass
if( isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($connect, "SELECT * FROM tb_user WHERE username = '$username'");

	//cek username
	if( mysqli_num_rows($result) === 1) {
		//cek pass
		$row = mysqli_fetch_assoc($result);
		if(password_verify($password, $row["password"])) {

			//set session
			$_SESSION['login'] = true;

			header("Location: stockbarang.php");
			exit;
		}
	}

	$error = true;

}

//Tampilan Sementara
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
          <h1>Login</h1>

          <?php if( isset($error)) : ?>
          	<p style="color : red; font-style: italic;">Username / password salah!</p>
          <?php endif; ?>

            <form action="" method="post">
                <label>Username</label><br>
                <input type="text" name="username" id="username"><br>
                <label>Password</label><br>
                <input type="password" name="password" id="password"><br>
                <button type="submit" name="login">Log in</button>
                <br><br>
                <span style="color : skyblue;">Belum punya akun?</span>
                <a href="regis.php" style="color : white; font-style : italic;">Register</a>
            </form>
        </div>     
</body>
</html>
