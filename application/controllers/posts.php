<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class posts extends CI_Controller {
    
    public function __construct() {
        parent:: __construct();
		//if(! $this->session->set_flashdata('user_id'));
		 //return redirect('Auth/login');
        $this->load->helper('url');
       
    }


    public function index() {

        $this->load->model('post_model');

        $data['title'] = 'Latest Posts';

        $data['posts'] = $this->post_model->get_posts();

        $this->load->view('templates/header');
		$this->load->view('posts/index' , $data);
		$this->load->view('templates/footer');
    }

    public function view($id= NULL) {


        $this->load->model('post_model');

        $id = $this->uri->segment(3);

        $data['title'] = 'Post Details';

        $data['post'] = (array) $this->post_model->get_by_id($id);
        
        if(empty($data['post'])){
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('posts/view' , $data);
        $this->load->view('templates/footer');
    }


public function create() {

      
    $data['title'] = 'Create Posts';
    $this->load->model('post_model');
    $data['categories']= $this->post_model->get_categories();


    $this->form_validation->set_rules('title','title','required');
    $this->form_validation->set_rules('body','body','required');

    if($this->form_validation->run()===FALSE){

        $this->load->view('templates/header');
        $this->load->view('posts/create' , $data);
        $this->load->view('templates/footer');
   
    }else{
        $upload = array();
		$upload['image'] = '';
		$upload['error'] = '';  
		$upload['status'] = FALSE;
    	$config['upload_path']   = './asssets/images/posts'; 
    $config['allowed_types'] = 'gif|jpg|png'; 
     $config['max_size']      = 2024; 
     $config['max_width']     = 500; 
     $config['max_height']    = 500;  
     $this->load->library('upload', $config);
     if (!$this->upload->do_upload('image'))
     {
         $errors = array('error' => $this->upload->display_errors());
         $image='noimage.jpg';
        //  echo "<pre>";
        //  print_r($data);
        //  exit;

        //  $upload['error'] = $data['error'];
     }
     else
     {
        // echo "<pre>";
        // //  print_r($data);
        //  exit;
        $data =array('upload_data'=> $this->upload->data());
        $image=$_FILES['userfile']['name'];
        // $upload['status'] = TRUE;
        // $upload['image'] = $data['file_name'];
        
     }
     echo "<pre>";
       print_r($data);
      exit;
        $this->load->model('post_model');
        $data['posts'] = $this->post_model->create_post($image);
        redirect('posts');
    }
}
public function delete($id) {
    $this->load->model('post_model');
    $this->post_model->delete_post($id);
    // if(empty($user)){
    //     $this->session->set_flashdata('failure','Record cannot found');
    redirect(base_url().'posts/index');
    // }else{
    //     $this->post_model->delete_post($id);
    //     $this->session->set_flashdata('success','Record deleted Successfuly');
    //     redirect(base_url().'users/index');
    // }
}
public function edit() {
        
        $data['title'] = 'Edit Posts';
			
		$this->load->model('post_model'); // load the model first

		// $data = array();

		$id = $this->uri->segment(3);
    
        $data['categories'] = $this->post_model->get_categories();


		$post = $this->post_model->get_by_id($id);
        //  echo "<pre>";
		// 	print_r($post);
		// 	exit;

		$post_data = $this->input->post();

		if(isset($post_data['title'])){

			$data = array(
				'title' => $this->input->post('title'),
				'body' => $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),
			);
		
			if($this->post_model->update_posts($id,$data)) // call the method from the model
			{
				 redirect(base_url().'posts/index');
			}
			else
			{
				echo 'some thing went wrong';
			}

		}
		
		$data['post'] = $post;
        $this->load->view('templates/header');
        $this->load->view('posts/edit' , $data);
        $this->load->view('templates/footer');
}
}
