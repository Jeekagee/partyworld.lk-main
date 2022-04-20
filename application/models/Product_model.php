<?php
class Product_model extends CI_Model {

    public function insert($pro_id,$pro_name,$pro_des,$pro_img,$cat,$scale,$tags,$price){

        $data = array(
        'product_id' => $pro_id,
        'name' => $pro_name,
        'description' => $pro_des,
        'image' => $pro_img,
        'catogery' => $cat,
        'scale' => $scale,
        'tags' => $tags,
        'price' => $price
        );

        $this->db->insert('products', $data);
    }

    public function product_id(){
        $sql = "SELECT product_id FROM products WHERE status = 1";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function products(){
        $sql = "SELECT * FROM products";
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

    public function colors(){
        $sql = "SELECT * FROM colors";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function scales(){
        $sql = "SELECT * FROM scales";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function show_size($scale){
        $sql = "SELECT * FROM size WHERE scale = $scale";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function insert_varient($product_id,$color,$scale,$size,$price){
        $data = array(
            'product_id' => $product_id,
            'color' => $color,
            'scale' => $scale,
            'size' => $size,
            'price' => $price
        );
        
        $this->db->insert('varients', $data);
    }

    public function show_varients($p_id){
        $sql = "SELECT * FROM varients WHERE product_id = '$p_id'";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function show_color($id){
        $sql = "SELECT * FROM colors WHERE id = $id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

    public function show_scale($id){
        $sql = "SELECT * FROM scales WHERE id = $id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

    public function show_sizee($id){
        $sql = "SELECT * FROM size WHERE id = $id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

    public function delete_var($id){
        $this->db->where('id', $id);
        $this->db->delete('varients');
    }

    public function delete_pro($id){
        $this->db->where('id', $id);
        $this->db->delete('products');
    }

    public function delete_all_var($id){
        $this->db->where('product_id', $id);
        $this->db->delete('varients');
    }

    public function show_catogeries(){
        $sql = "SELECT * FROM catogery";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function show_catogery($cat_id){
        $sql = "SELECT * FROM catogery WHERE id=$cat_id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

    public function show_scales(){
        $sql = "SELECT * FROM scales";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function product_size($p_id){
        $sql = "SELECT size.id, size.size FROM size INNER JOIN products ON products.scale = size.scale WHERE products.id = $p_id";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

    public function update_var_img($var_id,$var_img){
        $data = array(
            'image' => $var_img
        );
        
        $this->db->where('id', $var_id);
        $this->db->update('varients', $data);
    }


    public function get_var_img($pro_id,$clr_id){
        $sql = "SELECT * FROM varients WHERE product_id=$pro_id AND color=$clr_id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }
    

}
?>