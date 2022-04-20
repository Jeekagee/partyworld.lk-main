<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();

		//if user not logged in
		if (!$this->session->has_userdata('user_id')) {
			redirect(base_url() . 'Login');
		}
		//$this->load->model('Login_model');
	}
	
	public function index()
	{
		$data['title'] = "Dashboard";

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
		$this->load->view('main/aside');
		$this->load->view('dashboard/dashboard');
		$this->load->view('dashboard/footer');
	}

	
}
