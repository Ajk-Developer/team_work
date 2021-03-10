<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class pages extends CI_Controller {
	public function __construct() {
        parent:: __construct();
		$this->load->helper('url');
        $this->load->model('page');
        $this->load->library("pagination");
    }
	public function index() {  
        $config["base_url"] = base_url() . "pages/index";
        $config["total_rows"] = $this->page->get_count();
        $config["per_page"] = 3;
        $config["uri_segment"] = 3;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['pages'] = $this->page->get_pages($config["per_page"], $page);
		$this->load->view('users/index', $data);
    }
}






















// class Posts extends CI_Controller {

//     public function __construct() {
//         parent:: __construct();

//         // $this->load->helper('url');
//         $this->load->library("pagination");
//         $this->load->model('post');
//         $this->perpage=3;
//     }

//     public function index() {
//         $config = array();
//         $conditions['returnType']='count';
//         $totalRec=$this->post->getRows($conditions);
//         $config['base_url'] = base_url() . 'pages/index';
//         $config['uri_segment'] = 3;
//         $config['total_rows'] = $totalRec;
//         $config['per_page'] = $this->perpage;

//         $this->pagination->initialize($config);

//         $page = $this->uri->segment(3);
//         $offset=!$page?0:$page;

//         $conditions['returnType']='';
//         $conditions['start']='offset';
//         $conditions['limit']=$this->perpage;

//         $data["posts"] = $this->post->getRows($conditions);
//         // echo "<pre>";
//         // print_r($data);
//         // exit;

//         // $data['page'] = $this->page_model->get_page($config["per_page"], $page);

//         $this->load->view('pages/index', $data);
//     }
// }