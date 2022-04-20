<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    
	public function __construct()
	{
		parent::__construct();

		//if user not logged in
		if (!$this->session->has_userdata('user_id')) {
			redirect(base_url() . 'Login');
		}
		$this->load->model('Product_model');
	}

    public function index(){

        $data['title'] = "Products";
        $data['products'] = $this->Product_model->products();

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
        $this->load->view('main/aside');
        $this->load->view('product/products');
        $this->load->view('product/footer');
    }
	
	public function Add(){

        $data['title'] = "Add product";
        $data['cats'] = $this->Product_model->show_catogeries();
        $data['scales'] = $this->Product_model->show_scales();

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
        $this->load->view('main/aside');
        $this->load->view('product/add_product');
        $this->load->view('product/footer');
    }

    public function AddStock(){

        $data['title'] = "Add Stock";
        $data['product_ids'] = $this->Product_model->product_id();

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
        $this->load->view('main/aside');
        $this->load->view('product/add_stock');
        $this->load->view('product/footer');
    }

    public function add_img(){

        $data['title'] = "Add Image";
        //$data['product_ids'] = $this->Product_model->product_id();
        if ($this->uri->segment(3) === FALSE)
        {
                $v_id = 0;
        }
        else
        {
                $v_id = $this->uri->segment(3);
        }
        $data['var_id'] = $v_id;

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
        $this->load->view('main/aside');
        $this->load->view('product/add_image',$data);
        $this->load->view('product/footer');
    }

    public function AddVarients(){

        if ($this->uri->segment(3) === FALSE)
        {
                $p_id = 0;
        }
        else
        {
                $p_id = $this->uri->segment(3);
        }

        $data['title'] = "Add Varients";
        $data['product'] = $this->Product_model->single_product($p_id);
        $data['varients'] = $this->Product_model->show_varients($p_id);
        $data['colors'] = $this->Product_model->colors();
        $data['sizes'] = $this->Product_model->product_size($p_id);

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
        $this->load->view('main/aside');
        $this->load->view('product/add_varients');
        $this->load->view('product/footer');
    }

    //View Single Product

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
        $data['product'] = $this->Product_model->single_product($p_id);

		$this->load->view('dashboard/head',$data);
		$this->load->view('main/nav');
        $this->load->view('main/aside');
        $this->load->view('product/view-product.php');
        $this->load->view('product/footer');
    }

    //Insert Product Basic Details
    public function insert(){
        $this->form_validation->set_rules('pro_id', 'Product ID', 'required|is_unique[products.product_id]');
        $this->form_validation->set_rules('pro_name', 'Product Name', 'required');
        $this->form_validation->set_rules('pro_des', 'Product Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        //$this->form_validation->set_rules('pro_img', 'Product Image', 'required');

        if ($this->form_validation->run() == FALSE)
		{
				$this->Add();
        }
        else{
            $pro_id = $this->input->post('pro_id');
            $pro_name = $this->input->post('pro_name');
            $pro_des = $this->input->post('pro_des');
            $price = $this->input->post('price');
            $cat = $this->input->post('cat');
            $scale = $this->input->post('scale');
            $tags = $this->input->post('tags');

            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;
            $config['file_name'] = "product_".$pro_id;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('pro_img'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    // Set flash data 
                    $this->session->set_flashdata('file_error', $error);
                    $this->Add();
            }
            else{
                $pro_img = $this->upload->data('file_name');       // Filename
                $this->Product_model->insert($pro_id,$pro_name,$pro_des,$pro_img,$cat,$scale,$tags,$price);
                $this->session->set_flashdata('success', "<div class='alert alert-success'>Product added succesfully!</div>");
                redirect('Product/Add','refresh');
            }
        }
    }

    //insert new varient
    public function insert_varient_img(){
        $var_id = $this->input->post('var_id');

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $config['file_name'] = "var_".$var_id;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('var_img'))
        {
                $error = array('error' => $this->upload->display_errors());
                // Set flash data 
                $this->session->set_flashdata('file_error', $error);
                $this->index();
        }
        else{
            
            echo $var_img = $this->upload->data('file_name');       // Filename
            $this->Product_model->update_var_img($var_id,$var_img);
            $this->session->set_flashdata('success', "<div class='alert alert-success'>Product added succesfully!</div>");
            $this->index();
        }
    }

    //insert new varient
    public function insert_varient(){

        $product_id = $this->input->post('product_id');
        $color = $this->input->post('color');
        $scale = $this->input->post('scale');
        $size = $this->input->post('size');
        $price = $this->input->post('price');

        $this->Product_model->insert_varient($product_id,$color,$scale,$size,$price);

        redirect('Product/AddVarients/'.$product_id.'');
    }

    public function show_size(){
        $scale = $this->input->post('scale');
        $sizes = $this->Product_model->show_size($scale);

        foreach ($sizes as $size) {
            echo "<option value='$size->id'>$size->size</option>";
        }
    }

    public function delete_varient(){
        if ($this->uri->segment(3) === FALSE)
        {
                $varient_id = 0;
        }
        else
        {
                $varient_id = $this->uri->segment(3);
        }

        $this->Product_model->delete_var($varient_id);

        $product_id = $this->uri->segment(4);
        
        redirect('Product/AddVarients/'.$product_id.'');
    }

    public function deletePro(){
        $p_id = $this->input->post('id');
        $this->Product_model->delete_pro($p_id);
        $this->Product_model->delete_all_var($p_id);
    }

    public function show_image(){
        $pro_id = $this->input->post('pro_id');
        $clr_id = $this->input->post('clr_id');

        $varient = $this->Product_model->get_var_img($pro_id,$clr_id);

        ?>
        <img class="zoompro blur-up lazyload" data-zoom-image="<?php echo base_url(); ?>uploads/<?php echo $varient->image; ?>" alt="" src="<?php echo base_url(); ?>uploads/<?php echo $varient->image; ?>" />
        <?php
    }
}
