<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Customer extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Customer_model');
  }

  // Customer Login
  public function login()
  {
        $data['title'] = "login";

        $this->load->view('Website/header',$data);
        $this->load->view('Website/nav',$data);
        $this->load->view('Website/Customer/login',$data);
        $this->load->view('Website/footer',$data);
  }

  // Customer SignUp
  public function signUp()
  {
        $data['title'] = "Sign Up";

        $this->load->view('Website/header',$data);
        $this->load->view('Website/nav',$data);
        $this->load->view('Website/Customer/signup',$data);
        $this->load->view('Website/footer',$data);
  }

  public function signIn()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    
    echo $this->Customer_model->signin($username,$password);

  }

  //Create Customer Account
  public function create()
  {
    $this->form_validation->set_rules('firstname', 'First Name', 'required');
    $this->form_validation->set_rules('lastname', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|numeric|max_length[10]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

    if ($this->form_validation->run() == FALSE)
    {
            $this->signUp();
    }
    else
    {
      $firstname = $this->input->post('firstname');
      $lastname = $this->input->post('lastname');
      $email = $this->input->post('email');
      $mobile = $this->input->post('mobile');
      $password = $this->input->post('password');

      $result = $this->Customer_model->insert($firstname,$lastname,$email,$mobile,$password);
      
      if ($result == false) { // User already is in
        //add flash data 
        $this->session->set_flashdata('signup',"<div class='alert alert-custom'>Email or Mobile is Already Registered!</div>"); 
   
        //redirect to signUp
        $this->signUp();
      }
      else{
        // Success
        //add flash data 
        $this->session->set_flashdata('login',"<div class='alert alert-success'>Registered Successfully!</div>"); 
        $this->session->set_userdata('customer_mobile', $mobile);
        //redirect to signUp
        redirect('Customer/confirm');
      }
    }
  }

  public function confirm()
  {
      $data['title'] = "Confirm";

      $this->load->view('Website/header',$data);
      $this->load->view('Website/nav',$data);
      $this->load->view('Website/Customer/confirm',$data);
      $this->load->view('Website/footer',$data);
  }

  public function confirm_code()
  {
    $code = $this->input->post('code');
    $confirm = $this->Customer_model->confirm_code($code);

    if ($confirm == true) {
      //Remove Session
      $this->session->unset_userdata('customer_mobile');
      // Redirect to login page
      $this->session->set_flashdata('login',"<div class='alert alert-success'>Confirmed Successfully!</div>");
      //redirect to confirm
      redirect('Customer/login');

    }
    else{
      // Error with Confirm
      $this->session->set_flashdata('login',"<div class='alert alert-danger'>Incorrect Code!</div>");
      //redirect to confirm
      redirect('Customer/confirm');
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
  }

}


/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */