<?php
class employe_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showAllemploye(){
        $query=$this->db->get('employedb');
        if($query->num_rows() > 0){
return $query->result();
        }else{
            return false;
        }
        }



        public function addemploye(){
        
        $field=array(
            'name'=>$this->input->post('name'),
            'address'=>$this->input->post('address'),
            'created_at'=>date('y-m-d H:i:s'),
        );
        $this->db->insert('employedb',$field);
        return true;
//         if($this->db->affected_rows()>0){
// return true; 
//         }else{
//             return false;
//         }
        
        }







        public function editemploye(){ 
        
        $id=$this->input->get('id');
        $this->db->where('id',$id);
        $query= $this->db->get('employedb');
    if($query->num_rows() > 0){
        return $query->row();
        }else{
            return false;
        }
        }



        
        public function updateemploye(){ 
            $id=$this->input->post('txtid');
            $field=array(
                'name'=>$this->input->post('name'),
                'address'=>$this->input->post('address'),
                'updated_at'=>date('y-m-d H:i:s'),
            );
            $this->db->where('id',$id);
           $this->db->update('employedb', $field);
            if($this->db->affected_rows() > 0){
                return true;
                }else{
                    return false;
                }
        }



        
        public function deleteemploye() {
            $id=$this->input->get('id');
            $this->db->where('id',$id);
        $this->db->delete('employedb');
            if($this->db->affected_rows() > 0){
                return true;
                }else{
                    return false;
                } 
        }
    }