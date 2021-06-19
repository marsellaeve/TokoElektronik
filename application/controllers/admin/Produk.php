<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Produk extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $libraries = array('form_validation', 'session');
        $this->load->model("produk_model", 'produk');
        $this->load->model("user_model", 'user');
        $this->load->model("kategori_model", 'kategori');
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
        $data['produk'] = $this->produk->get_produk_all();
        $data['kategori'] = $this->kategori->get_kategori_all();
        $this->load->view('admin/produk/index', $data);
    }
}