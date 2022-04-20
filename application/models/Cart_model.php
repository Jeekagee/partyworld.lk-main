<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Cart_model extends CI_Model 
{
    
    public function created_guest()
    {
        $sql = "SELECT user_id FROM cart WHERE user_type = 2 ORDER BY user_id DESC LIMIT 1";
        $query = $this->db->query($sql);
        $rows = $query->num_rows();

        if ($rows == 0) {
            // First Guest
            return 4444;
        }
        else{
            $result = $query->first_row();
            return $result->user_id+1;
        }
    }

    public function addCart($user_id,$user_type,$product_id,$color_id,$size_id,$quantity,$price,$order_id)
    {
        $data =  array (
            'user_id' => $user_id,
            'user_type' => $user_type,
            'product_id' => $product_id,
            'color_id' => $color_id,
            'size_id' => $size_id,
            'quantity' => $quantity,
            'price' => $price,
            'order_id' => $order_id,
        );
        
        $this->db->insert('cart',$data);
    }

    public function getPrice($product_id,$color_id,$size_id)
    {
        $sql = "SELECT price FROM varients WHERE product_id = $product_id AND color = $color_id AND size = $size_id";
        $query = $this->db->query($sql);
        $rows = $query->num_rows();

        if ($rows == 1) {
            $result = $query->first_row();
            return $result->price;
        }
        else{
            return $this->defaultPrice($product_id);
        }
    }

    public function defaultPrice($product_id)
    {
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row->price;
    }

    public function cart_items($user_id)
    {
        $sql = "SELECT * FROM cart WHERE user_id = $user_id AND confirm = 0";
        $query = $this->db->query($sql);
        $rows = $query->result();
        return $rows;
    }

    public function product_data($product_id)
    {
        $sql = "SELECT * FROM products WHERE id = $product_id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        return $row;
    }

    public function varient_img($product_id,$size_id,$color_id)
    {
        $sql = "SELECT image FROM varients WHERE product_id = $product_id AND color = $color_id AND size = $size_id";
        $query = $this->db->query($sql);
        $row = $query->first_row();
        
        return $row->image;
    }

    public function clear_cart($user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->where('confirm', 0);
        $this->db->delete('cart');
    }

    public function delete_cart($cart_id)
    {
        $this->db->where('cart_id', $cart_id);
        $this->db->delete('cart');
    }

    public function cart_items_is($user_id)
    {
        $sql = "SELECT * FROM cart WHERE user_id = $user_id AND confirm = 0";
        $query = $this->db->query($sql);
        $rows = $query->num_rows();
        return $rows;
    }
            
    public function insert_address($user_id,$firstname,$lastname,$email,$mobile,$address,$city,$post_code)
    {
        $data =  array (
            'user_id' => $user_id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'mobile' => $mobile,
            'address' => $address,
            'city' => $city,
            'post_code' => $post_code,
        );
        
        $this->db->insert('address',$data);
    }

    public function address_id($user_id)
    {
        $sql = "SELECT * FROM address WHERE user_id = $user_id ORDER BY created_at DESC";
        $query = $this->db->query($sql);
        $rows = $query->result();
        return $rows->address_id;
    }

    public function insert_order($order_id,$user_id){
        $data =  array (
            'customer_id' => $user_id,
            'order_id' => $order_id
        );
        
        $this->db->insert('orders',$data);
    }

    public function cart_confirm($order_id)
    {
        $data = array(
            'confirm' => 1,
        );
        
        $this->db->where('order_id', $order_id);
        $this->db->update('cart', $data);
    }

    public function placeorder()
    {
        // $sql = "SELECT order_id FROM orders WHERE order_id = $order_id ORDER BY crated_at DESC";
        $sql = "SELECT order_id FROM orders ORDER BY crated_at DESC";
        $query = $this->db->query($sql);
        $rows = $query->result();
        return $rows;
    }
    
}


/* End of file Cart_model.php and path \application\models\Cart_model.php */
