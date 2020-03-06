<?php 

	$conn = new mysqli("localhost","root","","kopigital");
	if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
	{
		echo "<script>
		alert('Keranjang kosong, silahkan belanja dahulu');
		location='../Menu'; 
		</script>";
	}
 ?>

		<div class="container mt-5">
			<h1>Keranjang Belanja</h1>
			<table class="table table-bordered mt-5">
					<tr class="text-center">
						<th>No</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
						<th>Aksi</th>
					</tr>
					<?php $nomor=1; ?>
					<?php foreach ($_SESSION['keranjang'] as $kode_menu => $jumlah) : ?>
					<?php 
						$ambil = $conn->query("SELECT * FROM menu WHERE kode_menu = '$kode_menu'");
						$pecah = $ambil->fetch_assoc();
						$subtotal = $pecah["harga_menu"] * $jumlah; 
					 ?>
					<tr>
						<td class="text-center"><?= $nomor; ?></td>
						<td><?= $pecah["nama_menu"]; ?></td>
						<td class="text-right">IDR <?= number_format($pecah["harga_menu"]); ?></td>
						<td class="text-center"><?= $jumlah; ?></td>
						<td class="text-right">IDR <?= number_format($subtotal); ?></td>
						<td class="text-center">
							<a href="<?= BASEURL;?>/Cart/hapusCartById/<?= $pecah['kode_menu']; ?>"><img src="<?= BASEURL;?>/img/close.png" alt="" width="30"></a>
						</td>
					</tr>
				<?php $nomor++; ?>
			<?php endforeach ?>
			</table>

			<a href="<?= BASEURL;?>/Menu" class="btn btn-default">Lanjutkan Belanja</a>
			<a href="checkout.php" class="btn btn-primary">Checkout</a>
		</div>


</div>