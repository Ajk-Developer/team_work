<?php 

Class User extends CI_Model{
  
	public function __construct() {
        parent::__construct();  
    }

    public function get_all(){
        
       $data =  $this->db->select('user.*,package.name as package_name, parent.firstname as parent_name')
       ->from('user')
       ->join('package','package.id=user.package_id','left')
       ->join('user as parent','parent.id=user.parent_id','left')
       ->get()
       ->result();
        
        // echo "<pre>";   
        // print_r($data);
        // exit;

        return $data; 
    }


    public function get_by_page($start,$offset){
        
        $data =  $this->db->get('user')->result();
         
       
 
         return $data;
    }
         public function get_by_id($id){

            $data =  $this->db->where('id',$id)->get('user')->row();
            return $data;
    
        }

         
     
     public function updateUser($id , $data) {

        return $this->db->update('user',$data,array('id'=>$id));
  }
   

    public function add_user($data){

        $this->db->insert('user', $data);  
    }
    



    public function get_count() {
        return $this->db->count_all($this->user);
    }



    function deleteUser($id){  
    $this->db->where('id',$id);
    $this->db->delete('user');
      }

      


public function userprofile($id){

    $data= $this->db
    ->where('id',$id)
    ->get('user')
    ->result();  

    
        // exit;

    }
    public function count_all() {
        return $this->db->count_all('user');
    }

	public function get_pagination($slug = FALSE, $limit = FALSE, $offset = FALSE) {

        if($limit){
        $this->db->limit($limit, $offset);
        }
        if($slug === FALSE){
        $query = $this->db->get('user');
        return $query->result_array();
        }
        $query = $this->db->get_where('user', array( 'slug' => $slug));
        return $query->row_array();
    }

    public function get_children($parent_id,$position){

        $data =  $this->db->where('parent_id',$parent_id)
        ->where('position',$position)
        ->get('user')->result();
        //var_dump($data); exit;
        return $data;

    }
   
         


}