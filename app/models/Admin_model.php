<?php 
 
 class Admin_model {
     public function __construct() {
        $this->db = new Database;
        $conn = mysqli_connect('localhost', 'root', '', 'kopigital');
     }

     public function getAllProducts() {
        $this->db->query("SELECT * FROM `menu`");
        return $this->db->resultSet();
    }

     public function getAllUsers() {
        $this->db->query("SELECT * FROM `user` WHERE level = 'user' ");
        return $this->db->resultSet();
    }
     public function getAllStores() {
        $this->db->query("SELECT * FROM `admin_toko`");
        return $this->db->resultSet();
    }
     public function getAllOrders() {
        $this->db->query("SELECT * FROM `pesanan`");
        return $this->db->resultSet();
    }
 }