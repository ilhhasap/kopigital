<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Halaman
            <?= $data['judul']; ?></title>
        <link rel="stylesheet" href="<?= BASEURL;?>/css/style.css">
        <link rel="stylesheet" href="<?= BASEURL;?>/css/bootstrap.min.css">

        <link
            href="https://fonts.googleapis.com/css?family=Asap+Condensed|Concert+One|Montserrat&display=swap"
            rel="stylesheet">

    </head>
    <body>

        <nav class="">
            <ul class="nav">

                <!-- tampilan jika user belum ada dan keranjang -->
                <li class="nav-item mr-auto">
                    <a class="nav-link" href="<?= BASEURL;?>/menu/Cart">
                        <img src="<?= BASEURL;?>/img/cartpng.png" alt="" width="40" class="float-left">
                        <?php if( isset($_SESSION['keranjang'])) {?>
                        <i>
                            <img src="<?= BASEURL;?>/img/dot.png" alt="" width="15" class="dot">
                        </i>
                        <?php } ?>
                    </a>
                </li>

                <li class="nav-item justify-content-center">
                    <nav class="brand text-center">
                      </nav>
                    </li>
                    
                <li class="nav-item ml-auto">
                    <?php 
    if ( !isset($_SESSION['username'])) :  ?>
                    <a class="nav-link" href="<?= BASEURL;?>/daftarlogin/"><img src="<?= BASEURL;?>/img/user.png" alt="" width="35"></a>
                <?php else : ?>
                    <a
                    href="<?= BASEURL;?>/Logout"
                        onclick="return confirm('<?= $_SESSION['username'];?>, ingin pergi? :(');"><img src="<?= BASEURL;?>/img/logout.png" class="nav-link" width="70"></a>
                    <?php endif; ?>
                </li>

            </nav>
          </ul>
          <a href="<?= BASEURL;?>">
              <h4>kopi<span class="gital">gital</span></h4>
          </a>