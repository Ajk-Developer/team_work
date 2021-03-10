<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transections extends CI_Controller {

    public function __construct() {
        parent:: __construct();
		//if(! $this->session->set_flashdata('user_id'));
		 //return redirect('Auth/login');
        $this->load->helper('url');
        $this->load->model('user');
        $this->load->library("pagination");
    }

	/*
	 */
	public function index()
	{	

		$data = array();

		

		//echo "Herere"; exit;
		//$this->load->model('user');
		$this->load->model('transection_model');
		$data['transections'] = $this->transection_model->get_all();

		//common on each page. 
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		//changes on each page. 
		//content part. 
		$this->load->view('transections/index',$data);
		//common on each page. 
		$this->load->view('common/footer');
	}


	public function create(){

		$data = array();
		$data['errors'] = '';

		
		$this->load->model('user','user_model');

		$this->load->model('transection_model');

		$data['balance_types'] = $this->transection_model->get_balance_types();
		$data['trans_types'] = $this->transection_model->get_trans_types();
		$data['users'] = $this->transection_model->get_user_id();
		//  $data=$this->transection_model->get_all();

		

		
		$post_data = $this->input->post();

		$this->load->library('form_validation');

		$rules = array(
			array(
					'field' => 'user_id',
					'label' => 'user Id',
					'rules' => 'required'
			),
			array(
				'field' => 'trans_type',
				'label' => 'Transection Type',
				'rules' => 'required'
			),
			array(
				'field' => 'balance_type',
				'label' => 'Balance Type',
				'rules' => 'required'
			),
			
			);
			

		
	
		$this->form_validation->set_rules($rules);
		if(isset($post_data['user_id'])){
			// echo "<pre>";
			// 	print_r($post_data['user_id']);
			// 	exit;

			$post_data = $this->input->post();

			if($this->form_validation->run()){

				
				$this->transection_model->add_transection($post_data); 
				redirect(base_url().'transections/index');

			}



			}else{

			 $data['errors'] = validation_errors();
			
			}

		
	
			//common on each page. 
			$this->load->view('common/header');
			$this->load->view('common/sidebar');
			//changes on each page. 
			//content part. 
			$this->load->view('transections/create',$data);
			//common on each page. 
			
			$this->load->view('common/footer');
		}
	
		
	}
	 

