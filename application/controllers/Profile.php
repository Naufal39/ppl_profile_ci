<?php 
class Profile extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
        $this->load->model('login_model');
    }

     function u_pakar(){
    $this->load->view('pakar/dashboard_view');
    $this->load->view('pakar/index_u');
  }

}