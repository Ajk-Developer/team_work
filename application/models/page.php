<?php


class page extends CI_Model {
	protected $table = 'user';
	public function __construct() {
        parent::__construct();  
    }
	public function get_count() {
        return $this->db->count_all($this->table);
    }
	public function get_pages($limit, $offset) {
        $this->db->limit($limit, $offset);
        $query = $this->db->get($this->table);
		return $query->result();
    }
}
   















// class Post extends CI_Model {

//     function getRows($params=array()){
//         $this->db->select('*');
//         $this->db->from('user');
//         if(array_key_exists("id",$params)){
//             $this->db->where('id',$params['id']);
//             $query->$this->db->get( );
//             $result=$query->row_array();
//         }else{
//             if(array_key_exists('start',$params)&& array_key_exists('limit',$params)){
//                 $this->db->limit($params['limit'], $params['start']); 
//             }elseif (!array_key_exists('start',$params)&& array_key_exists('limit',$params)){
//                 $this->db->limit($params['limit']); 
//         }
//         if(array_key_exists('returnType',$params)&& $params['returnType']== 'count'){
//             $result= $this->db->count_all_results();
//         }else{

//             $query = $this->db->get();
//             $result=($query->num_rows()>0)?$query->result_array():FALSE;
//         }
//         }}  
    // }  -->