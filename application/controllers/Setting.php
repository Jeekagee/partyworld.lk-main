<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    //if user not logged in
		if (!$this->session->has_userdata('user_id')) {
			redirect(base_url() . 'Login');
		}
		$this->load->model('Setting_model');
  }

  public function AddCatogery()
  {
    $data['title'] = "Add Catogery";
    $data['catogery'] = $this->Setting_model->show_cat();

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
    $this->load->view('main/aside');
    $this->load->view('setting/add-catogery');
    $this->load->view('setting/footer');
  }

  public function AddColor()
  {
    $data['title'] = "Add Color";
    $data['color'] = $this->Setting_model->show_clr();

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
    $this->load->view('main/aside');
    $this->load->view('setting/add-color');
    $this->load->view('setting/footer');
  }

  public function AddScale()
  {
    $data['title'] = "Add Scale";
    $data['scale'] = $this->Setting_model->show_scales();

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
    $this->load->view('main/aside');
    $this->load->view('setting/add-scale');
    $this->load->view('setting/footer');
  }

  public function AddSize()
  {
    $data['title'] = "Add Size";
    $data['size'] = $this->Setting_model->show_size();

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
    $this->load->view('main/aside');
    $this->load->view('setting/add-size');
    $this->load->view('setting/footer');
  }

  public function Insert_Catogery(){

      $this->form_validation->set_rules('cat', 'Catogery', 'required|is_unique[catogery.catogery]');
      $this->form_validation->set_message('is_unique', 'The %s is already taken');

      if ($this->form_validation->run() == FALSE){
          $this->AddCatogery();
      }
      else{
          $cat = $this->input->post('cat');
          //insert Model
          $this->Setting_model->insert_catogery($cat);
          // Success Msg
          $this->session->set_flashdata('success', "<div class='alert alert-success'>Catogery has been Added!</div>");

          redirect('Setting/AddCatogery');
      }
  }

  public function Insert_Color(){

    $this->form_validation->set_rules('clr_name', 'Color Name', 'required|is_unique[colors.color]');
    $this->form_validation->set_message('is_unique', 'The %s is already taken');

    if ($this->form_validation->run() == FALSE){
        $this->AddColor();
    }
    else{
        $clr_name = $this->input->post('clr_name');
        $clr = $this->input->post('clr');
        //insert Model
        $this->Setting_model->insert_color($clr_name,$clr);
        // Success Msg
        $this->session->set_flashdata('success', "<div class='alert alert-success'>Color has been Added!</div>");

        redirect('Setting/AddColor');
    }
  }

  public function Insert_Scale(){

    $this->form_validation->set_rules('scl', 'Scale', 'required|is_unique[scales.scale]');
    $this->form_validation->set_message('is_unique', 'The %s is already taken');

    if ($this->form_validation->run() == FALSE){
        $this->AddScale();
    }
    else{
        $scl = $this->input->post('scl');
        //insert Model
        $this->Setting_model->insert_scale($scl);
        // Success Msg
        $this->session->set_flashdata('success', "<div class='alert alert-success'>Scale has been Added!</div>");

        redirect('Setting/AddScale');
    }
  }

  public function Insert_Size(){

    $this->form_validation->set_rules('size', 'Size', 'required');

    if ($this->form_validation->run() == FALSE){
        $this->AddSize();
    }
    else{
        $scale = $this->input->post('scale');
        $size = $this->input->post('size');
        //insert Model
        $this->Setting_model->insert_size($scale,$size);
        // Success Msg
        $this->session->set_flashdata('success', "<div class='alert alert-success'>Size has been Added!</div>");

        redirect('Setting/AddSize');
    }
  }

  public function deleteCatogery(){
    $id = $this->input->post('cat_id');
    $this->Setting_model->Del_Cat($id);
  }

}


/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */