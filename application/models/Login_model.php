<?php
class Login_model extends CI_Model {

    public function login($username,$password){
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND status = 1";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    public function logged_user($username,$password){
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND status = 1";
        $query = $this->db->query($sql);
        return $query->first_row();
    }
}
?>