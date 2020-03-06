<?php 

 ?>
<?php 
$conn = mysqli_connect('localhost', 'root', '', 'kopigital');
//menu
$query = "SELECT * FROM `menu`";
$result = mysqli_query($conn, $query);
$ambilRow = mysqli_num_rows($result);

//pelanggan
$query2 = "SELECT * FROM `user`";
$result2 = mysqli_query($conn, $query2);
$ambilRow2 = mysqli_num_rows($result2);

//toko kopi
$query3 = "SELECT * FROM `admin_toko`";
$result3 = mysqli_query($conn, $query3);
$ambilRow3 = mysqli_num_rows($result3);

//pesanan
$query4 = "SELECT * FROM `pemesanan`";
$result4 = mysqli_query($conn, $query4);
$ambilRow4 = mysqli_num_rows($result4);

 ?>

<div class="side-bar">
<h1>kopi<span>gital</span> </h1>
<ul>
    <a href="#beranda"><li>beranda</li></a>
    <a href="#produk"><li>produk</li></a>
    <a href="#pelanggan"><li>pelanggan</li></a>
    <a href="#toko_kopi"><li>toko kopi</li></a>
    <a href="#pesanan"><li> pemesanan</li></a>
    <a href="<?= BASEURL;?>/Admin/logout"><li>logout</li></a>
</ul>
</div>


<div class="bar">
        <h3>Selamat datang, admin !!!</h3> <br>
        <hr class="gariss">
        
    <h2>Beranda</h2>                                                                                 <h5 class="tanggal"><?= date('d F Y');?> </h5>
    <section id="beranda"></section>
    <ul>
        <li>
            <a href="#produk">
            <div class="info info1">
                <h5><?=$ambilRow; ?></h5>
                <small>Jumlah Produk</small>
            </div>
            </a>
        </li>

        <li>
            <a href="#pelanggan">
            <div class="info info2">
                <h5><?=$ambilRow2; ?></h5>
                <small>Jumlah Pelanggan</small>
            </div>
            </a>
        </li>

        <li>
            <a href="#toko_kopi">
            <div class="info info3">
                <h5><?=$ambilRow3; ?></h5>
                <small>Admin Toko</small>
            </div>
            </a>
        </li>

        <li>
            <a href="#pesanan">
            <div class="info info4">
                <h5><?=$ambilRow4; ?></h5>
                <small>Total Pesanan</small>
            </div>
            </a>
        </li>
    </ul>
    <div class="clear"></div> <br> <br> 
    <hr class="gariss"> <br>




    <!-- PRODUK -->
    
    <section id="produk"></section>
    <h2>Produk</h2>
    <!-- Trigger untuk menampilkan Modal [sebagai contoh] -->
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Tambah produk
</button>
<!-- Modal PRODUK -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <div class="form-group">
              <form>
                    <input type="hidden" name="id_user">
        <div class="form-group">
            <label for="exampleFormControlFile1">Masukan Gambar Produk</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
    <input type="text" class="form-control mt-3"  placeholder="Nama Produk">
    <input type="text" class="form-control" placeholder="Harga Produk">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- tabel produk -->
    <table class="tabelproduk">  
        <tr>
            <th>no</th>
            <th colspan="2">Nama Produk</th>
            <th>Harga Menu</th>
            <th>Action</th>
        </tr>
        <?php $nomor=1; ?>
        <?php foreach( $data['menu'] as $menu ) : ?>
        <tr>
            <td><?= $nomor;?></td>
            <td><img src="img/menu/<?= $menu['gambar'];?>" alt="" width="100"></td>
            <td><?= $menu['nama_menu'];?></td>
            <td>IDR <?= number_format($menu['harga_menu']);?></td>
            <td><a href="<?= BASEURL;?>/Admin/hapusProduk/<?= $menu['kode_menu']; ?>" class="badge badge-danger float-left" onclick="return confirm('yakin ingin menghapus?');">Delete</a>  <a href="" class="badge badge-primary float-right ml-2">Edit</a></td>
        </tr>
        <?php $nomor++;?>
    <?php endforeach;?>
    </table>
    <br> <br>
    <hr class="gariss"> <br> <br>




<!-- PELANGGAN -->
    <section id="pelanggan"></section>
    <h2>User / Pelanggan</h2>
    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPelanggan">
  Tambah Pelanggan
</button>
<!-- Modal USER-->
<div class="modal fade" id="modalPelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <div class="form-group">
        <input type="hidden" name="id_pelanggan">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <input type="text" class="form-control" placeholder="Nama Pelanggan" name="nm_pelanggan">
        <input type="text" class="form-control" placeholder="Alamat Pelanggan" name="almt_pelanggan">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <input type="password" class="form-control" placeholder="Ulangi Password" name="password2">
         </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <a class="btn btn-primary" href="<?= BASEURL;?>/Admin/tambahPelanggan" role="button">Tambah</a>
      </div>
    </div>
  </div>
</div>
    <table class="tabelpelanggan">  
        <tr>
            <th>no</th>
            <th>Username</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Daftar</th>
            <th>Action</th>
        </tr>
        <?php $nomor = 1;?>
        <?php foreach( $data['user'] as $user ) : ?>
        <tr>
            <td><?= $nomor;?></td>
            <td><?= $user['username'];?></td>
            <td><?= $user['nama_user'];?></td>
            <td><?= $user['tgl_daftar'];?></td>
            <td><a href="<?= BASEURL;?>/Admin/hapusUser/<?= $user['id_user']; ?>" class="badge badge-danger float-left" onclick="return confirm('yakin ingin menghapus?');">Delete</a>  <a href="" class="badge badge-primary float-right ml-2">Edit</a></td>
        </tr>
        <?php $nomor++;?>
    <?php endforeach;?>
    </table>

    <br> <br>
    <hr class="gariss"> <br> <br>





    <!-- toko kopi -->
    <section id="toko_kopi"></section>
    <h2>Toko Kopi</h2>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalToko">
  Tambah Toko Kopi
</button>
<!-- Modal -->
<div class="modal fade" id="modalToko" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Toko Kopi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
          <div class="form-group">
        <input type="hidden" name="id_toko">
        <input type="text" class="form-control" placeholder="Nama Toko">
        <input type="text" class="form-control mt-3" placeholder="Alamat Toko">
         </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Tambah</button>
      </div>
    </div>
  </div>
</div>
    <table class="tabelpelanggan tabeltoko">  
        <tr>
            <th>no</th>
            <th>Nama Toko</th>
            <th>Alamat Toko</th>
            <th>Action</th>
        </tr>
        <?php $nomor = 1;?>
        <?php foreach( $data['admin_toko'] as $admin_toko ) : ?>
        <tr>
            <td><?= $nomor;?></td>
            <td><?= $admin_toko['nama_toko'];?></td>
            <td><?= $admin_toko['alamat_toko'];?></td>
            <td><a href="<?= BASEURL;?>/Admin/hapusToko/<?= $menu['id_toko']; ?>" class="badge badge-danger float-left" onclick="return confirm('yakin ingin menghapus?');">Delete</a>  <a href="" class="badge badge-primary">Edit</a></td>
        </tr>
        <?php $nomor++?>
    <?php endforeach;?>
    </table>



    
    <br> <br>
    <hr class="gariss"> <br> <br>
    <!-- toko kopi -->
    <section id="pesanan"></section>
    <h2>Transaksi Pesanan</h2>

    <table class="tabelpelanggan tabeltoko">  
        <tr>
            <th>no</th>
            <th>Nama Pelanggan</th>
            <th>Alamat Toko</th>
            <th>Action</th>
        </tr>
        <?php $nomor = 1;?>
        <?php foreach( $data['pesanan'] as $pesanan ) : ?>
        <tr>
            <td><?= $nomor;?></td>
            <td><?= $pesanan['nama_toko'];?></td>
            <td><?= $pesanan['alamat_toko'];?></td>
            <td><a href="<?= BASEURL;?>/Admin/hapusToko/<?= $menu['id_toko']; ?>" class="badge badge-danger float-left" onclick="return confirm('yakin ingin menghapus?');">Delete</a>  <a href="" class="badge badge-primary">Edit</a></td>
        </tr>
        <?php $nomor++?>
    <?php endforeach;?>
    </table>
</div>

</div>

