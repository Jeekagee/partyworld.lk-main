<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
    }
    public function index()
    {
        $data['title'] = "Party World - Home";
        $data['products'] = $this->Home_model->products();
        $data['categories'] = $this->Home_model->categories();

        $this->load->view('Website/header',$data);
        $this->load->view('Website/nav',$data);    
        $this->load->view('home',$data);
        $this->load->view('Website/footer',$data);
    }

    public function Product()
    {
        if ($this->uri->segment(3) === FALSE)
        {
                $p_id = 0;
                $this->index();
        }
        else
        {
                $p_id = $this->uri->segment(3);
        }

        $data['title'] = "Product";
        $data['product'] = $this->Home_model->view_product($p_id);
        $data['colors'] = $this->Home_model->product_colors($p_id);
        $data['sizes'] = $this->Home_model->product_size($p_id);

        $this->load->view('Website/header',$data);  
        $this->load->view('single_product',$data);
        $this->load->view('single_product_footer',$data);  
        $this->load->view('Website/footer',$data);
    }
}

/* End of file Home.php and path /application/controllers/Home.php */


