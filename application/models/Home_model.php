<?php
class Home_model extends CI_Model {
    
    public function products(){
        $sql = "SELECT * FROM products WHERE status = 1 LIMIT 10";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function productsByCat($catogery_id){
        $sql = "SELECT * FROM products WHERE status = 1 AND catogery = $catogery_id LIMIT 10";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function view_product($id){
        $sql = "SELECT * FROM products WHERE id = $id AND status = 1";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

    public function product_colors($id){
        $sql = "SELECT color FROM varients WHERE product_id = $id  GROUP BY color";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function product_size($id){
        $sql = "SELECT * FROM varients WHERE product_id = $id AND size != 0";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function color_code($id){
        $sql = "SELECT * FROM colors WHERE id = $id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

    public function size($id){
        $sql = "SELECT * FROM size WHERE id = $id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

    public function categories(){
        $sql = "SELECT * FROM catogery";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function size_scale_name($scale_id)
    {
        $sql = "SELECT scale FROM scales WHERE id = $scale_id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        if ($query->num_rows() > 0) {
            return $row->scale;
        }
        else{
            return null;
        }
        
    }

}
?>