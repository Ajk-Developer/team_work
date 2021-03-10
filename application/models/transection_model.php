<?php 

Class transection_model extends CI_Model{
    public function get_all(){
        
        $data =  $this->db->get('transection')->result();
      
         
        
         return $data; 
     }
 

    public function get_trans_types(){
        
       $data =  $this->db->get('trans_type')->result();
        return $data;
    }  

    public function get_balance_types(){
        
        $data =  $this->db->get('balance_type')->result();
        return $data;
    }  
    public function get_user_id(){
        
        $data =  $this->db->get('user')->result();
        return $data;
    }  
 
    public function add_transection($data){
        //    echo "<pre>";
        //    	print_r($data);
        //    	exit;
        
        $this->db->insert('transection', $data);  
       
       
    }

} 