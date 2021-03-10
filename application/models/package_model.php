<?php 

Class Package_model extends CI_Model{

    public function get_all(){
        
       $data =  $this->db->get('package')->result();
        
        // echo "<pre>";
        // print_r($data);
        // exit;

        return $data;
    }  


    public function add_package($data){

        $this->db->insert('package', $data);  
    }
    public function get_by_id($id){

        $data =  $this->db->where('id',$id)->get('package')->row();
       
        return $data;

    }

     
 
 public function updatepackage($id , $data) {

    return $this->db->update('package',$data,array('id'=>$id));


}

function deletepackage($id){
    
    $this->db->where('id',$id);
    $this->db->delete('package');
    
    
    
    }

    // public function get_by_id($id){
    //     $data =  $this->db->get('package')->result();
    //     return $this->db->where('id', $id)
    //     ->get('package')->row();
    
    // }

} 