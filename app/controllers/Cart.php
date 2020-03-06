<?php 
class Cart extends Controller {

    public function index() {
        $data['judul'] = 'Cart';
		$this->view('templates/header', $data);
		$this->view('cart/index', $data);
        $this->view('templates/footer');   
    }

    public function buy($kode_menu)
    {
        // $kode_menu =(int)$kode_menu[0];
        $kode_menu = $_GET['id']; 
        
        if(!empty($_POST["qty"])) {
            $productByCode = $this->model('Menu_model')->getMenuById();
            $itemArray = array($productByCode[0]["kode_menu"]=>array('nama_menu'=>$productByCode[0]["nama_menu"], 'kode_menu'=>$productByCode[0]["kode_menu"], 'qty'=>$_POST["qty"], 'harga_menu'=>$productByCode[0]["harga_menu"], 'gambar'=>$productByCode[0]["gambar"]));
            
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode[0]["kode_menu"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["kode_menu"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["qty"])) {
                                    $_SESSION["cart_item"][$k]["qty"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["qty"] += $_POST["qty"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
        
    }
}