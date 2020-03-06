<?php 
class Cart_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getMenuById($id) {
    //    $this->db->query('SELECT * FROM' . $this->table);
    $this->db->query("SELECT * FROM `menu` ");
        return $this->db->resultSet();
    }
}