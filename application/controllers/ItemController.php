<?php


defined('BASEPATH') OR exit('No direct script access allowed');


class ItemController extends CI_Controller {


   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
      parent::__construct();
      $this->load->database();
   }


   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function ajaxRequest()
   {
       $data['data'] = $this->db->get("balance_type")->result();
       $this->load->view('ajax/itemlist', $data);
   }
   public function ajaxRequestPost()
   {
       $data = array(
           'keyword' => $this->input->post('keyword'),
                'name' => $this->input->post('name')
             );
             
             $this->db->insert('balance_type', $data);  
      
      echo 'Added successfully.';  
   }

}