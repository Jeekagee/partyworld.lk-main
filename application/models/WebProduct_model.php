<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class WebProduct_model extends CI_Model 
{
    public function get_var_img($pro_id,$clr_id){
        $sql = "SELECT * FROM varients WHERE product_id=$pro_id AND color=$clr_id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }
    
    public function get_var_size($pro_id,$clr_id){
        $sql = "SELECT * FROM varients WHERE product_id=$pro_id AND color=$clr_id GROUP BY size";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
                        
}


/* End of file WebProduct_model.php and path \application\models\WebProduct_model.php */
