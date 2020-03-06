<?php 
class Menu extends Controller {

    public function index() {
        $data['judul'] = 'Menu';
        $data['menuMinum'] = $this->model('Menu_model')->getMenuMinum();
        $data['menuMakan'] = $this->model('Menu_model')->getMenuMakan();
		$this->view('templates/header', $data);
		$this->view('menu/index', $data);
        $this->view('templates/footer');   
    }
    
    public function Cart() {
        $data['judul'] = 'Cart';
        $this->view('templates/header', $data);
        $this->view('cart/index');
        $this->view('templates/footer');   
    
    }
    public function Add_to_cart($kode_menu) {
        // $kode_menu =(int)$kode_menu[0];
        $kode_menu = $_GET['id']; 

        if ( isset($_SESSION['keranjang'][$kode_menu]) ) {
            $_SESSION['keranjang'][$kode_menu]+=1;
            echo "<script>alert('produk telah masuk keranjang ')</script>";
            header("Location:../Cart");
        } else {
            $_SESSION['keranjang'][$kode_menu] = 1;
            echo "<script>alert('produk gagal masuk keranjang ')</script>";
            header("Location:../Cart");
        }   
    }
    public function hapusCartByID($kode_menu) {
        $kode_menu = (int)$kode_menu[0];
        
        unset($_SESSION['keranjang'][$kode_menu]);
        echo "<script>
        alert('produk berhasil dihapus');
        location='../Cart';
        </script>";
	}
}