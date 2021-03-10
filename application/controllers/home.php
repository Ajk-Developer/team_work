<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	// public function __construct(){
	// 	parent::__construct();
	// 	$this->logged_in;
	// }

	// private function logged_in(){
	// 	if(!$this->session->userdata('user_logged'));
	// 	redirect('Auth/login');
	// }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view('home');
		$this->load->view('common/footer');
	}
}