<?php

class Register extends CI_Controller
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
            echo 'ini';
            if($this->user_model->doRegister()) redirect(site_url('shopping'));
        }
        $this->load->view("admin/register_page.php");
    }
}