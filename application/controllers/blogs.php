<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blogs extends CI_Controller {
    public function __construct() {
        parent:: __construct();
		//if(! $this->session->set_flashdata('user_id'));
		 //return redirect('Auth/login');
        $this->load->helper('url');
   
    }


    public function view($page = 'home') {
        if(!file_exists(APPPATH.'views/pages/' .$page. '.php')){
            show_404();
        }
        $data['title'] = ucfirst($page);
        $this->load->view('templates/header');
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer');
    }
}