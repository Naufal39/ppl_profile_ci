<?php
class Login extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('login_model');
  }
 
  function index(){
    $this->load->view('dashboard_login');
    $this->load->view('login_view');
  }

   function pakar(){
    $this->load->view('pakar/dashboard_login');
    $this->load->view('pakar/login_view');
  }

   function user_b(){
    $this->load->view('user_b/dashboard_login');
    $this->load->view('user_b/login_view');
  }

  function u_pakar(){
    $this->load->view('pakar/dashboard_login');
    $this->load->view('pakar/index_u');
  }
 
  function r_pakar(){
      $this->load->view('pakar/dashboard_login');
    $this->load->view('pakar/registrasi');
  }

  function r_user_b(){
      $this->load->view('user_b/dashboard_login');
    $this->load->view('user_b/registrasi');
  }

  function auth(){
    $email    = $this->input->post('email',TRUE);
    $password = md5($this->input->post('password',TRUE));
    $validate = $this->login_model->validate($email,$password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $name  = $data['user_name'];
        $email = $data['user_email'];
        $level = $data['user_level'];
        $sesdata = array(
            'username'  => $name,
            'email'     => $email,
            'level'     => $level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
        // access login for admin
        if($level === '1'){
            redirect('page');
 
        // access login for staff
        }elseif($level === '2'){
            redirect('page/staff');
 
        // access login for author
        }else{
            redirect('page/author');
        }
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('login');
    }
  }
 
  function logout(){
      $this->session->sess_destroy();
      redirect('login');
  }
 
}