<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model", 'user');
        $this->load->library('form_validation');
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $this->load->view("admin/login_page.php");
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if($this->input->post())
            {
                if($this->user_model->doLogin()==='customer')
                {
                    redirect(site_url('shopping'));
                }
                else if($this->user_model->doLogin()==='admin'){
                    redirect(site_url('admin'));
                }
            }
        }
        else
        {
            show_404();
        }
    }

    public function register_admin()
    {
        // jika form login disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $this->load->view("admin/register_page.php");
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if($this->input->post())
            {
                if($this->user_model->doRegisterAdmin())
                {
                    $this->session->set_flashdata(
                        'message',
                        [
                          'type' => 'success',
                          'message' => ['Berhasil mendaftarkan akun, silahkan login terlebih dahulu']
                        ]
                    );

                    redirect(base_url('login'));
                }
            }
        }
        else
        {
            show_404();
        }

    }

    public function register_user()
    {
        // jika form login disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $this->load->view("admin/register_page.php");
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if($this->input->post())
            {
                if($this->user_model->doRegisterCustomer())
                {
                    $this->session->set_flashdata(
                        'message',
                        [
                          'type' => 'success',
                          'message' => ['Berhasil mendaftarkan akun, silahkan login terlebih dahulu']
                        ]
                    );

                    redirect(base_url('login'));
                }
            }
        }
        else
        {
            show_404();
        }
    }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('admin/login'));
    }
}