<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Orders
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Orders extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    //if user not logged in
		if (!$this->session->has_userdata('user_id')) {
			redirect(base_url() . 'Login');
		}
		$this->load->model('Orders_model');
  }

  public function index()
  {
    $data['title'] = "Orders";
    $data['orders'] = $this->Orders_model->orders();

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
    $this->load->view('main/aside');
    $this->load->view('orders/orders');
    $this->load->view('orders/footer');
  }

}


/* End of file Orders.php */
/* Location: ./application/controllers/Orders.php */