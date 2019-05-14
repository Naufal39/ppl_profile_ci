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
   $this->form_validation->set_rules('user_name','User Name','required');
    $this->form_validation->set_rules('user_password','User Password','required');
    $this->form_validation->set_rules('user_email','user_email','required');
    $this->form_validation->set_rules('user_contact','User Contact','required');
    $this->form_validation->set_rules('user_level','User Level','required');

    if($this->form_validation->run() == TRUE)
    {
      $user_name = $this->input->post('user_name',TRUE);
      $user_password      = md5($this->input->post('user_password',TRUE));
      $user_email  = $this->input->post('user_email',TRUE);
      $user_contact  = $this->input->post('user_contact',TRUE);
      $user_level   = $this->input->post('user_level',TRUE);
      

      $data = array(
            'user_name' => $user_name,
            'user_password'      => $user_password,
            'user_email'  => $user_email,
            'user_contact'  => $user_contact,
            'user_level'    => $user_level,
      );
      $this->login_model->simpan($data);

      $this->session->set_flashdata('msg_berhasil','Anda berhasil Daftar');
      redirect(base_url('login/r_pakar'));
    }else {
       $this->load->view('pakar/dashboard_login');
      $this->load->view('pakar/registrasi');
    }

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