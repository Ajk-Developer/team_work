<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Packages extends CI_Controller {
    public function __construct() {
        parent:: __construct();
		// $this->load->library('session');
		// if(! $this->session->set_userdata('user_logged'));
	

		//  return redirect('Auth/login');
              
    }
	/*
	 */
	public function index()
	{	

		$data = array();

		//echo "Herere"; exit;
		$this->load->model('package_model');

		$data['packages'] = $this->package_model->get_all();

		//common on each page. 
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		//changes on each page. 
		//content part. 
		$this->load->view('packages/index',$data);
		//common on each page. 
		$this->load->view('common/footer');
	}

	public function create(){

		$data = array();
		$data['errors'] = '';
		$this->load->model('package_model');


		$post_data = $this->input->post();


		$this->load->library('form_validation');

		$rules = array(
			array(
					'field' => 'name',
					'label' => 'Package Name',
					'rules' => 'required'
			),

			array(
				'field' => 'roi_percentage',
				'label' => 'roi_percentage',
				'rules' => 'required'
			),
			array(
				'field' => 'binary_percentage',
				'label' => 'binary_percentage',
				'rules' => 'required'
			),
			array(
				'field' => 'days',
				'label' => 'Days',
				'rules' => 'required'
			),
		);
	
		$this->form_validation->set_rules($rules);
	

		if(isset($post_data['name'])){

			if($this->form_validation->run()){

				$this->package_model->add_package($post_data);
				redirect(base_url().'packages/index');

			}else{

				$data['errors'] = validation_errors();

			}
  
		}

		//common on each page. 
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		//changes on each page. 
		//content part. 
		$this->load->view('packages/create',$data);
		//common on each page. 
		$this->load->view('common/footer');

	}

	public function update($id){

		
		$data = array();
		$data['errors'] = '';
		$this->load->model('package_model'); // load the model first
		
		$id = $this->uri->segment(3);

		$user = $this->package_model->get_by_id($id);

		$post_data = $this->input->post();
		
		$rules = array(
			array(
				'field' => 'roi_percentage',
				'label' => 'roi_percentage ',
				'rules' => 'required'
			),
			
			array(
				'field' => 'binary_percentage',
				'label' => 'Binary_percentage',
				'rules' => 'required'
			),
			array(
				'field' => 'days',
				'label' => 'Days',
				'rules' => 'required'
				)
			);
			$this->form_validation->set_rules($rules);
			$this->load->library('form_validation');
		if(isset($post_data['name'])){  

			if($this->form_validation->run()){

				$this->package_model->updatepackage($id,$post_data);
				redirect(base_url().'packages/index');
				// if($this->package_model->updatepackage($id,$data)) // call the method from the model
			
				// echo 'update successful';
			}
			else
			{
				$data['errors'] = validation_errors();
			}

		}

		$data['user'] = $user;

		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('packages/update',$data);
		$this->load->view('common/footer');
}
public function delete($id){
	$this->load->model('package_model');
	$user=$this->package_model->deletepackage($id);
	if(empty($user)){
		$this->session->set_flashdata('failure','Record cannot found');
		redirect(base_url().'packages/index');
	}else{
		$this->user_model->deleteUser($id);
		$this->session->set_flashdata('success','Record deleted Successfuly');
		redirect(base_url().'packages/index');
	}
}


}
