<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class employe extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->db->order_by('created_at', 'desc');
		//if(! $this->session->set_flashdata('user_id'));
		 //return redirect('Auth/login');
        $this->load->helper('url');
        $this->load->model('employe_model');
   
    }


    public function index() {
        
             $this->load->view('employe/header');
           $this->load->view('employe/index');
           $this->load->view('employe/footer');

    }
    public function showAllemploye() { 
   $result=$this->employe_model->showAllemploye();
//    echo "<pre>";
//    print_r($result);
//    exit;
   echo json_encode($result);
    }




    public function addemploye() { 
   $result=$this->employe_model->addemploye();
 $msg['status']= false;
 $msg['type']= 'add';
 if($result){
     $msg['status']= true;
 }
 echo json_encode($msg);
 exit;
    }






    public function editemploye() { 
        $result=$this->employe_model->editemploye();
 echo json_encode($result);
    }



    public function updateemploye() { 
        $result=$this->employe_model->updateemploye();
        $msg['success']= false;
        $msg['type']= 'update';
        if($result){
            $msg['success']= true;
        }
        echo json_encode($msg);
    }





    public function deleteemploye() { 
        $result=$this->employe_model->deleteemploye();
        $msg['success']= false;
        $msg['type']= 'Delete';
        if($result){
            $msg['success']= true;
        }
        echo json_encode($msg);
    }
}