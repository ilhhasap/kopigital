<?php 
session_start();
require 'function.php';
	if(isset($_POST['login'])){
		$_SESSION['username'] = $_POST["username"];
        $_SESSION['password'] = $_POST["password"];
        
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION[username]'" );

        //cek username
        if ( mysqli_num_rows($result) === 1 ) {
			// cek password
            $row = mysqli_fetch_assoc($result);
			$pass = sha1($_SESSION['password']);
			if( $pass == $row["password"]  ){
				if ( ($row["level"] == "admin") ) {
					header("Location: ../Admin");
				}else{
                header("Location: home/index");
                exit;}
			}
            
        }
        $error = true;
	}
	?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Halaman Login</title>
	<link rel="stylesheet" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="<?= BASEURL;?>/js/script.js"></script>

</head>
<body>

 <div class="body_login">
 <center>
	 <h2>kopi<span>gital</span></h2>
<a href="../"><img src="../img/close.png" alt="" width="50" class="pt-5 ml-5"></a>	 
</center>

	<div class="kotak_login">
		<p class="tulisan_login">login</p>
 <hr class="garis">
		<form action="" method="post">


			<input type="text" name="username" placeholder="username" required="required" class="username">
				<br>
			<input type="password" name="password" placeholder="password" required="required" class="password">
				<br>
					<a class="link" href="register.php">Belum punya akun</a>
			<button type="submit" name="login" class="login"><img src="../img/register.png" alt="" width="40"></button>
			<br>
		</form>
		
		<?php if( isset($error) ) : ?>
		<div class="alert alert-danger mt-4" role="alert">
	 <p>username atau password salah</p>
	</div>
	<?php endif; ?>
	</div>
	</div>

</body>
</html>