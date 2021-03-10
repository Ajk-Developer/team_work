<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends CI_Controller {

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

		$data['upload_path'] = $this->config->item('upload_path');

		//echo "Herere"; exit;
		//$this->load->model('user');

		$data['users'] = $this->user->get_all();

		//common on each page. 
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		//changes on each page. 
		//content part. 
		$this->load->view('users/index',$data);
		//common on each page. 
		$this->load->view('common/footer');
	}
	public function create(){



		$data = array();
		$data['errors'] = '';
		
		$this->load->model('package_model');
		$this->load->model('user','user_model');
		$data['packages'] = $this->package_model->get_all();
		$data['users'] = $this->user->get_all();

	

		$post_data = $this->input->post();

		$this->load->library('form_validation');

		$rules = array(
			array(
					'field' => 'parent_id',
					'label' => 'Parent Id',
					'rules' => 'required'
			),

			array(
				'field' => 'firstname',
				'label' => 'First Name',
				'rules' => 'required'
			),
			array(
				'field' => 'lastname',
				'label' => 'Last Name',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			),
			array(
				'field' => 'package_id',
				'label' => 'Package Id',
				'rules' => 'required'
			),
			array(
				'field' => 'position',
				'label' => 'Position',
				'rules' => 'required|callback_position_check'
			),
			
			// array(
			// 	'field' => 'image',
			// 	'label' => 'image',
			// 	'rules' => 'required'
			// ),
		);

		//$this->form_validation->set_rules('username', 'Username', 'callback_username_check');
	
		$this->form_validation->set_rules($rules);
		
		$upload = array('error' => '');


		if(isset($post_data['firstname'])){

			$upload = $this->upload();

			$post_data = $this->input->post();

			if($this->form_validation->run() && empty($upload['error'])){

				$post_data['image'] = $upload['image'];

				// echo "<pre>";
				// print_r($post_data);
				// exit;

				$this->user_model->add_user($post_data);
				redirect(base_url().'users/index');

			}else{

				$data['errors'] = validation_errors();

			}

		}

		$data['upload'] = $upload;

		//common on each page. 
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		//changes on each page. 
		//content part. 
		$this->load->view('users/create',$data);
		//common on each page. 
		$this->load->view('common/footer');
	}


	public function position_check($position)
	{
		
		$parent_id = $this->input->post('parent_id');
		$children = $this->user->get_children($parent_id,$position);
		// echo "<pre>";
		// print_r($children);
		// exit;

		if(count($children) > 0){
			$this->form_validation->set_message('position_check', 'User already added at positon '.$position);
			return false;
		}

		return true;
	}

	public function edit($id){




			
		$this->load->model('user','user_model'); // load the model first

		$data = array();

		$id = $this->uri->segment(3);

		$user = $this->user_model->get_by_id($id);

		$post_data = $this->input->post();

		if(isset($post_data['firstname'])){   

			$data = array(
				'parent_id' => $this->input->post('parent_id'),
				'firstname' => $this->input->post('firstname'),
				'lastname' => $this->input->post('lastname'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'package_id' => $this->input->post('package_id'),
				'position' => $this->input->post('position'),
				'image' => $this->input->post('image'),

			);
			$config['upload_path']   = './uploads'; 
			$this->load->library('upload', $config);
			// echo "<pre>";
			// print_r($data);
			// exit;
			if($this->user_model->updateUser($id,$data)) // call the method from the model
			{
				// echo 'update successful';
				 redirect(base_url().'users/index');
			}
			else
			{
				echo 'some thing went wrong';
			}

		}
		
		$data['user'] = $user;

		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('users/update',$data);
		$this->load->view('common/footer');
}  
	
       

	
	public function delete($id){
		$this->load->model('user','user_model');
		$user=$this->user_model->deleteUser($id);
		if(empty($user)){
			$this->session->set_flashdata('failure','Record cannot found');
			redirect(base_url().'users/index');
		}
		// }else{
		// 	$this->user_model->deleteUser($id);
		// 	$this->session->set_flashdata('success','Record deleted Successfuly');
		// 	redirect(base_url().'users/index');
		// }
	}



	public function upload(){

		$upload = array();
		$upload['image'] = '';
		$upload['error'] = '';
		$upload['status'] = FALSE;

	    $config['upload_path']   = './uploads'; 
        $config['allowed_types'] = 'gif|jpg|png'; 
        //  $config['max_size']      = 1024; 
        //  $config['max_width']     = 1024; 
        //  $config['max_height']    = 1200;  
		 $this->load->library('upload', $config);
		 
		 if (!$this->upload->do_upload('image'))
		 {
			 $data = array('error' => $this->upload->display_errors());

			//  echo "<pre>";
			//  print_r($data);
			//  exit;

			 $upload['error'] = $data['error'];
		 }
		 else
		 {
			$data = $this->upload->data();
			$upload['status'] = TRUE;
			$upload['image'] = $data['file_name'];
			
		 }

		 return $upload;
		
    }

		
	public function profile($id){
		$data = array();

		$data['upload_path'] = $this->config->item('upload_path');

		//echo "Herere"; exit;
		$this->load->model('user');

		$data['users'] = $this->user->userprofile($id);
		// $config['upload_path']   = './uploads'; 
		// $this->load->library('upload', $config);
		// //common on each page. 
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		//changes on each page. 
		//content part. 
		$this->load->view('users/profile',$data);
		//common on each page. 
		$this->load->view('common/footer');
	}
	// class pages extends CI_Controller {
	// 	public function __construct() {
	// 		parent:: __construct();
	// 		$this->load->helper('url');
	// 		$this->load->model('page');
	// 		$this->load->library("pagination");
	// 	}
		public function pagination($offset = 0) {  
			$config["base_url"] = base_url() . "users/pagination";
			$config["total_rows"] = $this->user->count_all('pagination');
			$config["per_page"] = 3;
			$config["uri_segment"] = 3;
			$this->pagination->initialize($config);
			$user = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data["links"] = $this->pagination->create_links();
			$data['pagination'] = $this->user->get_pagination(FALSE, $config["per_page"], $offset);
			$this->load->view('users/index.php');
		}
		public function tree(){
			// $data = array();
	
			
	
		
			// $this->load->model('user');
	
			// $data['users'] = $this->user->usertree($id);
			// $config['upload_path']   = './uploads'; 
			// $this->load->library('upload', $config);
			// //common on each page. 
			$this->load->view('common/header');
			$this->load->view('common/sidebar');
			//changes on each page. 
			//content part. 
			$this->load->view('users/tree_view');
			//common on each page. 
			$this->load->view('common/footer');
		}
	
	
		public function transection(){



			$data = array();
			$data['errors'] = '';
			$trans_type = $this->input->post('trans_type');
	     	$balance_type = $this->input->post('balance_type');
			  $this->load->model('user','user_model');
			  
			  $data['balance_types'] = $this->user->get_transection($trans_type,$balance_type);
			  $data['trans_types'] = $this->user->get_transection($trans_type,$balance_type);
			  
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
				array(
					'field' => 'debit',
					'label' => 'Debit',
					'rules' => 'required'
				),
				array(
					'field' => 'credit',
					'label' => 'Credit ',
					'rules' => 'required'
				)
				);
				
	
			
		
			$this->form_validation->set_rules($rules);
			
			
	
	
			if(isset($post_data['user_id'])){
	
				$post_data = $this->input->post();
	
				if($this->form_validation->run()){

					// echo "<pre>";
					// print_r($post_data);
					// exit;
					$this->user_model->add_transection($post_data); 
					redirect(base_url().'users/transection');

				}
	
	
	
				}else{
	
					$data['errors'] = validation_errors();
	
				}
	
			
	
			//common on each page. 
			$this->load->view('common/header');
			$this->load->view('common/sidebar');
			//changes on each page. 
			//content part. 
			$this->load->view('users/transection',$data);
			//common on each page. 
			$this->load->view('common/footer');
		}
		
	}
	 

