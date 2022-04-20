<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Customer_model extends CI_Model 
{
    public function signin($uname,$pwd)
    {
        $hashpwd = $this->encrypt->encode($pwd);
    }
    
    //Insert New Customer
    public function insert($firstname,$lastname,$email,$mobile,$password)
    {
        if ($this->customer_availabel($email,$mobile) == 0) {
            // Create new
            $hashed = $this->encrypt->encode($password);
            $mobile_code = rand(100000,999999);
            $data =  array (
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'mobile' => $mobile,
                'password' => $hashed,
                'code' => $mobile_code,
            );
            
            $this->db->insert('customer',$data);
            return true;
        }
        else{
            // Return with message
            return false;
        }
    }

    //Check mobile or email is available
    public function customer_availabel($email,$mobile)
    {
        $sql = "SELECT id FROM customer WHERE email = '$email' OR mobile = '$mobile'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function check_code($mobile,$code)
    {
        $sql = "SELECT code FROM customer WHERE code = $code AND mobile = $mobile";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function confirm_code($code)
    {
        $mobile = $this->session->customer_mobile;
        if ($this->check_code($mobile,$code)==1) {
            // Update as confirm
            $data = array(
                'confirm' => 1,
            );
            $this->db->update('customer', $data);

            return true;
        }
        else{
            // Return error msg
            return false;
        }
        
    }
                        
}


/* End of file Customer_model.php and path \application\models\Customer_model.php */
