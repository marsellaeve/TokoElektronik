<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // jika form login disubmit
        $this->load->model("user_model");
        if($this->input->post()){
            if($this->user_model->doLogin()==='customer') {
                redirect(site_url('shopping'));
            }
            else if($this->user_model->doLogin()==='admin'){
                redirect(site_url('admin'));
            }
            else
            $this->load->view("admin/login_page.php");
        }
        $this->load->view("admin/login_page.php");
    }
    
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }
}