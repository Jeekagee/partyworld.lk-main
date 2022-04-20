<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Setting_model extends CI_Model {

  //Insert Catogery
  public function insert_catogery($cat){
    $data = array(
      'catogery' => $cat
    );

    $this->db->insert('catogery', $data);
  }

  //Insert Color
  public function insert_color($clr_name,$clr){
    $data = array(
      'color' => $clr_name,
      'hex' => $clr
    );

    $this->db->insert('colors', $data);
  }

  //Insert Scale
  public function insert_scale($scale){
    $data = array(
      'scale' => $scale
    );

    $this->db->insert('scales', $data);
  }

  //Insert Size
  public function insert_size($scale,$size){
    $data = array(
      'size' => $size,
      'scale' => $scale
    );

    $this->db->insert('size', $data);
  }

  //Show Scales for add Size

  public function show_scales(){
      $sql = "SELECT * FROM scales";
      $query = $this->db->query($sql);
      $result = $query->result();
      return $result;
  }

  public function show_cat(){
    $sql = "SELECT * FROM catogery";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
  }

  public function show_clr(){
    $sql = "SELECT * FROM colors";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
  }

  public function show_size(){
    $sql = "SELECT * FROM size";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
  }

  public function Del_Cat($id){
      $this->db->where('id', $id);
      $this->db->delete('catogery');
  }

}

/* End of file Setting_model.php */
/* Location: ./application/models/Setting_model.php */