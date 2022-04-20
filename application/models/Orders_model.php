<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Orders_model extends CI_Model 
{
    public function orders(){
        $sql = "SELECT * FROM orders";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    
    public function customer_data($user_id){
        $sql = "SELECT * FROM address WHERE user_id = $user_id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

    public function order_total($order_id)
    {
        $sql = "SELECT quantity,price FROM cart WHERE order_id = $order_id";
        $query = $this->db->query($sql);
        $result = $query->result();
        
        $total = 0;
        foreach ($result as $order) {
           $total = $total + ($order->price * $order->quantity);
        }
        return $total;
    }
                        
}


/* End of file Orders_model.php and path \application\models\Orders_model.php */
