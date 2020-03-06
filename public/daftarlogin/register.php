<?php 

require "function.php";
    if ( isset($_POST["submit"]) ) {
        
        if ( register($_POST) > 0 ) {
            echo "<script> alert('user baru telah ditambah')
                window.location='index.php';
             </script>";
        } else {
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Halaman Register</title>
	<link rel="stylesheet" href="../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="<?= BASEURL;?>/js/script.js"></script> 

</head>
<body>

<div class="body_register">
    <center><h2>kopi<span>gital</span></h2>
    <a href="../"><img src="../img/close.png" alt="" width="40" class="mt-5"></a>	 </center>
        <div class="kotak_register">
    <p class="tulisan_register">register</p>
    <hr class="garis">
<form action="" method="post">
<ul>
    <li>
        <input type="text" name="username" class="username" placeholder="username" required>
    </li>
    <li>
        <input type="text" name="nama_user" class="nm_user" placeholder="nama lengkap" required>
    </li>
    <li>
        <input type="password" name="password" class="password" placeholder="password" required>
    </li>
    <li>
        <input type="password" name="password2" class="password2" placeholder="ulangi password">
    </li>
    <li>
    <a href="index.php">Sudah punya akun</a>
    </li>
    <li>
        <button type="submit" name="submit" class="register"><img src="../img/register.png" alt="" width="40"> </button>
    </li>
    <li>
        
    </li>
</ul>
</form>

</div>
</div>

</body>
</html>

