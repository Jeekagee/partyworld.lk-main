<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WebProduct extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('WebProduct_model');
  }

  public function show_image(){
    $pro_id = $this->input->post('pro_id');
    $clr_id = $this->input->post('clr_id');

    $varient = $this->WebProduct_model->get_var_img($pro_id,$clr_id);

    ?>
    <img class="zoompro blur-up lazyload" data-zoom-image="<?php echo base_url(); ?>uploads/<?php echo $varient->image; ?>" alt="" src="<?php echo base_url(); ?>uploads/<?php echo $varient->image; ?>" />
    <?php
  }

  public function show_size()
  {
    $pro_id = $this->input->post('pro_id');
    $clr_id = $this->input->post('clr_id');

    $sizes = $this->WebProduct_model->get_var_size($pro_id,$clr_id);

    foreach ($sizes as $size) {
      $size_id = $size->size;
      ?>
      
      <div data-value="<?php echo $size_name = $this->size_name($size_id); ?>" class="swatch-element xs available">
          <input checked class="swatchInput" id="swatch-1-<?php echo $size_name; ?>" type="radio" name="size"
              value="<?php echo $size_id; ?>">
          <label class="swatchLbl medium rectangle" for="swatch-1-<?php echo $size_name; ?>"
              title="<?php echo $size_name; ?>"><?php echo $size_name; ?></label>
      </div>
      <?php
    }
  }

  public function size_name($size_id)
  {
      $sql = "SELECT size FROM size WHERE id = $size_id";
      $query = $this->db->query($sql);
      $row = $query->first_row();
      return $row->size;
  }

}


/* End of file WebProduct.php */
/* Location: ./application/controllers/WebProduct.php */