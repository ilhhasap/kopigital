<?php

class Admin extends Controller {
	public function __construct()
	{
		$conn = mysqli_connect('localhost', 'root', '', 'kopigital');
	}
	public function index() 
	{
		$data['judul'] = 'Admin';
		$data['menu'] = $this->model('Admin_model')->getAllProducts();
		$data['user'] = $this->model('Admin_model')->getAllUsers();
		$data['admin_toko'] = $this->model('Admin_model')->getAllStores();
		$data['pesanan'] = $this->model('Admin_model')->getAllOrders();
		$this->view('templates/user_header', $data);
		$this->view('admin/index', $data);
	}
	
	public function logout() {
    	session_start();
    	session_destroy();
    	echo "<script>
    	alert('anda telah logout!');
    		location='../daftarlogin';
    		</script>";
	}

	public function tambahPelanggan($data) {
		global $conn;
        $username = htmlspecialchars(strtolower(stripslashes(trim($data["username"]))));
        $nama_user = htmlspecialchars($data["nama_user"]);
        $password =htmlspecialchars(mysqli_real_escape_string($conn, $data["password"]));
        $password2 = htmlspecialchars(mysqli_real_escape_string($conn,$data["password2"]));
        date_default_timezone_set('Asia/Jakarta');
        $tgl_daftar = date('Y-m-d');
        
        $cek_user = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pelanggan WHERE username = '$username'"));
        if (  $cek_user > 0 ) {
            echo "<script>
            alert('username sudah terdaftar!');
            window.location='../';
            </script>";
            exit();
        }
        if ( $password != $password2 ) {
            echo "<script>
                alert('password tidak sesuai');
            </script>";
            return false;
        }
        

        //enskripsi pswrd
        $password = hash("sha1", $password);
        mysqli_query($conn, "INSERT INTO user  VALUES
        ('', '$nama_user', '$username', '$password', '$tgl_daftar')");
        return mysqli_affected_rows($conn);
	}


	public function hapusProduk($kode_menu) {
		$kode_menu = (int)$kode_menu[0];

		$conn = mysqli_connect('localhost', 'root', '', 'kopigital');
		mysqli_query($conn, "DELETE FROM menu WHERE kdoe_menu = '$kode_menu'");
		if ( !mysqli_query($conn, "DELETE FROM menu WHERE kode_menu = '$kode_menu'") ) {
			echo mysqli_error($conn);
			mysqli_close($conn);
		}
		else {
			echo "<script>alert('id. $kode_menu .berhasil dihapus')</script>";
			header("Location:../..");
		}
	}


	public function hapusUser($id_user) {
		$id_user = (int)$id_user[0];

		$conn = mysqli_connect('localhost', 'root', '', 'kopigital');
		mysqli_query($conn, "DELETE FROM menu WHERE id_user = '$id_user'");
		if ( !mysqli_query($conn, "DELETE FROM menu WHERE id_user = '$id_user'") ) {
			echo mysqli_error($conn);
			mysqli_close($conn);
		}
		else {
			echo "<script>alert('id. $id_user .berhasil dihapus')</script>";
			header("Location:../..");
		}
	}
	public function hapusToko($id_toko) {
		$id_toko = (int)$id_toko[0];

		$conn = mysqli_connect('localhost', 'root', '', 'kopigital');
		mysqli_query($conn, "DELETE FROM user WHERE id_toko = '$id_toko'");
		if ( !mysqli_query($conn, "DELETE FROM user WHERE id_toko = '$id_toko'") ) {
			echo mysqli_error($conn);
			mysqli_close($conn);
		}
		else {
			echo "<script>alert('id. $id_toko .berhasil dihapus')</script>";
			header("Location:../");
		}
	}

	
}