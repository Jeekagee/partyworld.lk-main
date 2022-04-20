<?php
class Inventory_model extends CI_Model {

    

    public function inventory(){
        $sql = "SELECT p.id, p.product_id, p.name, c.product_id, c.quantity FROM products p INNER JOIN cart c ON p.id=c.product_id";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function single_product($p_id){
        $sql = "SELECT * FROM products WHERE id = $p_id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

}
?>