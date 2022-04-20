<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();

		//if user not logged in
		if (!$this->session->has_userdata('user_id')) {
			redirect(base_url() . 'Login');
		}
		$this->load->model('Inventory_model');
	}

    public function index(){

        $data['title'] = "Inventory";
        $data['inventory'] = $this->Inventory_model->inventory();

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
        $this->load->view('main/aside');
        $this->load->view('inventory/inventory');
        $this->load->view('inventory/footer');
    }

    public function View(){

        if ($this->uri->segment(3) === FALSE)
        {
                $p_id = 0;
        }
        else
        {
                $p_id = $this->uri->segment(3);
        }

        $data['title'] = "View Product";
        $data['view_items'] = $this->Inventory_model->single_product($p_id);

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
        $this->load->view('main/aside');
        $this->load->view('inventory/view_items.php');
        $this->load->view('inventory/footer');
    }

    // public function Orders(){

    //     if ($this->uri->segment(3) === FALSE)
    //     {
    //             $order_id = 0;
    //     }
    //     else
    //     {
    //             $order_id = $this->uri->segment(3);
    //     }

    //     $data['title'] = "View Order";
    //     $data['orders'] = $this->Inventory_model->view_orders($order_id);

	// 	$this->load->view('dashboard/head',$data);
	// 	$this->load->view('main/nav');
    //     $this->load->view('main/aside');
    //     $this->load->view('inventory/view_orders.php');
    //     $this->load->view('inventory/footer');
    // }
}
