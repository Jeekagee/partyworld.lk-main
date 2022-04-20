<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Cart
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

class Cart extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Cart_model');
  }

  public function index()
  {
        if ($this->session->customer) {
          $user_id = $this->session->customer;
        }
        else if ($this->session->guest) {
          $user_id = $this->session->guest;
        }

        $data['title'] = "cart";
        $data['cart_items'] = $this->Cart_model->cart_items($user_id);

        $this->load->view('Website/header',$data);
        $this->load->view('Website/nav',$data);
        $this->load->view('Website/Cart/cart',$data);
        $this->load->view('Website/footer',$data);
  }

  public function Add()
  {
    $product_id = $this->input->post('product_id');
    $quantity = $this->input->post('quantity');

    if ($this->input->post('color')) {
      $color_id = $this->input->post('color');
    }
    else{
      $color_id = 0;
    }

    if ($this->input->post('size')) {
      $size_id = $this->input->post('size');
    }
    else{
      $size_id = 0;
    }


    if ($this->session->customer) {
      $user_id = $this->session->customer;
      $user_type = 1;
    }
    else if ($this->session->guest) {
      $user_id = $this->session->guest;
      $user_type = 2;
    }
    else{
      // Create Guest id
      $user_id = $this->Cart_model->created_guest();
      $this->session->set_userdata('guest', $user_id);
      $user_type = 2;
    }

    if ($this->Cart_model->cart_items_is($user_id) > 0) {
      $order_id = $this->session->order_id;
    }
    else{
      $order_id = abs( crc32( uniqid() ) );
      $this->session->set_userdata('order_id', $order_id);
    }

    $price = $this->Cart_model->getPrice($product_id,$color_id,$size_id);

    $this->Cart_model->addCart($user_id,$user_type,$product_id,$color_id,$size_id,$quantity,$price,$order_id);
  
    redirect('Cart');
  }

  public function clear_cart()
  {
    if ($this->session->customer) {
      $user_id = $this->session->customer;
    }
    else if ($this->session->guest) {
      $user_id = $this->session->guest;
    }

    $this->Cart_model->clear_cart($user_id);

    redirect('Home');
  }

  public function delete_cart($cart_id)
  {
    $this->Cart_model->delete_cart($cart_id);
    redirect('Cart');
  }
  
  public function checkout()
  {
    if ($this->session->customer) {
      $user_id = $this->session->customer;
    }
    else if ($this->session->guest) {
      $user_id = $this->session->guest;
    }

    $data['title'] = "Checkout";
    $data['cart_items'] = $this->Cart_model->cart_items($user_id);

    $this->load->view('Website/header',$data);
    $this->load->view('Website/nav',$data);
    $this->load->view('Website/Cart/checkout',$data);
    $this->load->view('Website/footer',$data);
  }

  public function placeorder()
  {
    

        $data['title'] = "placeOrder";
        $data['place_order'] = $this->Cart_model->placeorder();

        $this->load->view('Website/header',$data);
        $this->load->view('Website/nav',$data);
        $this->load->view('Website/Cart/placeorder',$data);
        $this->load->view('Website/footer',$data);
  }

  public function insert_address()
  {
    $this->form_validation->set_rules('firstname', 'First Name', 'required');
    $this->form_validation->set_rules('lastname', 'Last Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
    $this->form_validation->set_rules('telephone', 'Mobile Number', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $this->form_validation->set_rules('city', 'City', 'required');
    $this->form_validation->set_rules('post_code', 'Post Code', 'required');

    if ($this->form_validation->run() == FALSE)
    {
            $this->checkout();
    }
    else{

      if ($this->session->customer) {
        $user_id = $this->session->customer;
      }
      else if ($this->session->guest) {
        $user_id = $this->session->guest;
      }

      $firstname = $this->input->post('firstname');
      $lastname = $this->input->post('lastname');
      $email = $this->input->post('email');
      $mobile = $this->input->post('telephone');
      $address = $this->input->post('address');
      $city = $this->input->post('city');
      $post_code = $this->input->post('post_code');
      $this->Cart_model->insert_address($user_id,$firstname,$lastname,$email,$mobile,$address,$city,$post_code);

      $order_id = $this->session->order_id;
      $this->Cart_model->insert_order($order_id,$user_id);

      // Cart confirm = 1
      $this->Cart_model->cart_confirm($order_id);
      $this->session->unset_userdata('order_id');

      redirect('Home');
    }
  }

  public function testing()
  {
    $data['title'] = "placeOrder";
    $this->load->view('Website/header',$data);
    $this->load->view('Website/Cart/test',$data);
  }
}


/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */