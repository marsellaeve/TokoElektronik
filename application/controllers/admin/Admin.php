<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $libraries = array('form_validation', 'session');
        $this->load->model("user_model", 'user');
        $this->load->library($libraries);
        if($this->user->isNotLogin())
        {
            redirect(base_url('login'));
        }
        else
        {
            if($this->session->user_logged->role != "admin")
            {
                $this->session->sess_destroy();
                $this->session->set_flashdata(
                    'message',
                    [
                      'type' => 'error',
                      'message' => 'Anda tidak memiliki hak akses untuk ke halaman tersebut, silahkan login kembali!'
                    ]
                );
                redirect(base_url('login'));
            }

        }
    }
    public function index(){
        $this->load->view('admin/overview');
    }
    public function tentang()
        {
            $data['kategori'] = $this->keranjang_model->get_kategori_all();
            $this->load->view('themes/header',$data);
            $this->load->view('pages/tentang',$data);
            $this->load->view('themes/footer');
        }
    public function cara_bayar()
        {
            $data['kategori'] = $this->keranjang_model->get_kategori_all();
            $this->load->view('themes/header',$data);
            $this->load->view('pages/cara_bayar',$data);
            $this->load->view('themes/footer');
        }
}