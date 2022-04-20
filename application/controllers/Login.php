<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
	}
	
	public function index()
	{
		
		// User Already Logged IN
		if ($this->session->has_userdata('user_id')) {
			redirect(base_url() . 'Dashboard');
		}

		$data['title'] = "Login";
        $this->load->view('layout/head',$data);
		$this->load->view('index');
	}

	public function validation()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{
				$this->index();
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($this->Login_model->login($username,$password) == 1) {

				$logged_user = $this->Login_model->logged_user($username,$password);
				$user_id = $logged_user->user_id;
				$level = $logged_user->level;

				$userdata = array(
					'username' => $username,
					'user_id' => $user_id,
					'level' => $level
				);
				$this->session->set_userdata($userdata);
				redirect(base_url() . 'Dashboard');
			}
			else{
				$this->session->set_flashdata('error', 'Invalid Username or Password');  
                redirect(base_url() . 'Login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'Login');
	}
}
