<div class="poster-menu">
<img src="<?= BASEURL;?>/img/menu.jpg" alt="" width="100%" height="700">
</div>

<div class="judul-menu">
<h3>OUR <span>DRINKS</span></h3>
<hr class="garis">
</div>

<div class="container">
	<div class="menu-menu">


		<ul>
			<?php foreach( $data['menuMinum'] as $menu ) : ?>
			<li>
			<form method="post" action="<?= BASEURL;?>/Cart/index&kode_menu=<?= $menu["kode_menu"]; ?>">
				<div class="permenu">
				<a href=""><img src="img/menu/<?= $menu['gambar']?>" alt="" width="230" height="260"></a> 
				<h4><?= $menu['nama_menu']?></h4>
				<p>IDR <?= number_format($menu['harga_menu']) ?></p>

				<?php 
    				if ( isset($_SESSION['username'])) :  ?>
				<a href="<?= BASEURL;?>/Menu/Add_to_cart/<?= $menu['kode_menu'];?>"  ><img src="<?= BASEURL;?>/img/add.png" alt="" width="50" class="add_cart"></a>

				<?php else :?>
					<a href="<?= BASEURL;?>/daftarlogin" onclick="return alert('harap login!');"  class="add_cart"><img src="<?= BASEURL;?>/img/add.png" alt="" width="50"></a>
					<?php endif;?>
				</div>
				
		</form>
			</li>
<?php endforeach;?>
		</ul>

<div class="clear"></div>

<!-- MAKANAN -->
		<div class="judul-menu menu-snack">
<h3>OUR <span>SNACKS</span></h3>
<hr class="garis">
</div>
		<ul>
			<?php foreach( $data['menuMakan'] as $menu ) : ?>
			<li>
			<form method="post" action="<?= BASEURL;?>/Cart/index&kode_menu=<?= $menu["kode_menu"]; ?>">
				<div class="permenu">
				<a href=""><img src="img/menu/<?= $menu['gambar']?>" alt="" width="230" height="260"></a> 
				<h4><?= $menu['nama_menu']?></h4>
				<p>IDR <?= number_format($menu['harga_menu']) ?></p>

				<?php 
    				if ( isset($_SESSION['username'])) :  ?>
				<a href="<?= BASEURL;?>/Menu/Add_to_cart/<?= $menu['kode_menu'];?>"  ><img src="<?= BASEURL;?>/img/add.png" alt="" width="50" class="add_cart"></a>

				<?php else :?>
					<a href="<?= BASEURL;?>/daftarlogin" onclick="return alert('harap login!');"  class="add_cart"><img src="<?= BASEURL;?>/img/add.png" alt="" width="50"></a>
					<?php endif;?>
				</div>
				
		</form>
			</li>
<?php endforeach;?>
				</ul>
				
	</div>
</div>