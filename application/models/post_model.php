<?php
class post_model extends CI_Model {
	  
    public function __construct() {
        $this->load->database(); 
    }
    
    public function get_posts(){
        
          $this->db->select('posts.*, categories.name as category_name');
          $this->db->from('posts');
          $this->db->join('categories','posts.category_id = categories.id');
          $this->db->order_by('posts.id','DESC');
          $query = $this->db->get();
          $data = $query->result_array();
          return $data;

    }


    public function get_sposts($slug = FALSE){
        if($slug === FALSE){
            $this->db->order_by('id','DESC');
            // $this->db->limit(1);
            $query = $this->db->get('posts');
            return $query->result_array();
            }
            $query = $this->db->get_where('posts', array( 'slug' => $slug));
            return $query->row_array();
    }
    public function create_post($image){
      // $slug=url_title($this->input->post['title']);
        $data=array(
      'title'=> $this->input->post('title'),
      // 'slug'=>$slug,
      'body'=> $this->input->post('body'),
      'category_id'=> $this->input->post('category_id'),
       'userfile'=> $this->input->post('userfile')
        );
        return $this->db->insert('posts',$data);
}
public function delete_post($id){
    $this->db->where('id',$id);
    $this->db->delete('posts');
      
}

/**
 * 
 */
public function get_by_id($id){

    $data =  $this->db->where('id',$id)->get('posts')->row();

    return $data;

}

 
  /**
   * Update posts by id
   * @arg $id , Id to update
   * @arg $data , Data to save
   */

  public function update_posts($id,$data){
    
    // echo $id; 

    // print_r($data);

    // exit;

    $this->db->where('id',$id);
    return $this->db->update('posts' ,$data);

    // echo $this->db->last_query();
    // exit;
  
  }

  /**
   * get all categories. 
   */
  public function get_categories(){

    $this->db->order_by('name');
    $query = $this->db->get('categories');
    return $query->result_array();
  }


}