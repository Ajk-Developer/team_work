<?php
class Auth extends CI_controller
{
    public function login(){

        $this->load->model('auth_model');

        $data = array();
        $data['login_error'] = '';

        if (isset($_POST['login'])) {
                $this->form_validation->set_rules('email','email','required');
                $this->form_validation->set_rules('password','password','required|min_length[5]');
                if($this->form_validation->run()==true){
                  
                    $email=$_POST['email'];
                    $password=md5($_POST['password']);

                    $user = $this->auth_model->get_by_login($email,$password);

                    // echo "<pre>234234234234";
                    // print_r($user);
                    // exit;

                    if (is_object($user)) {

                        $this->session->set_flashdata("success","Your are logged in");
                        $_SESSION['user_logged']= TRUE;
                        $_SESSION['firstname']= $user->firstname;
                        redirect("home","Refresh");
 
                    }else{
                        $data['login_error'] = "Invalid email or password!";   
                    }
                }
            }
           

            $this->load->view('login',$data);
       
    }

    public function register()
    {

        if (isset($_POST['register'])) {
            $this->form_validation->set_rules('firstname','firstname','required');
            $this->form_validation->set_rules('lastname','lastname','required');
            $this->form_validation->set_rules('email','email','required');
            $this->form_validation->set_rules('password','password','required|min_length[5]');
            if($this->form_validation->run()==true){
                
                $data=array(
                    'firstname'=>$_POST['firstname'],
                    'lastname'=>$_POST['lastname'],
                    'email'=>$_POST['email'],
                    'password'=>md5($_POST['password'])
                );
                $this->db->insert('admin', $data);            
            
                // die("hello");
                    $this->session->set_flashdata("success","Your account has been register");
            
                    redirect("Auth/Register","Refresh");
            }
        }
        
        $this->load->view('register');
    }
        
    public function logout(){
        $this->session->unset_userdata('firstname');
        redirect("Auth/login","Refresh");
    }
    
}

