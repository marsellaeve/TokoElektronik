<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $libraries = array('form_validation', 'session');
        $this->load->model("user_model", 'user');
        $this->load->model("keranjang_model", 'keranjang');
        $this->load->model("produk_model", 'produk');
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
        $data['admin'] = count($this->user->get_admin_all());
        $data['customer'] = count($this->user->get_customer_all());
        $data['invoice'] = count($this->keranjang->get_order_all());
        $data['produk'] = count($this->keranjang->get_produk_all());
        $this->load->view('admin/overview', $data);
    }

    public function list_admin(){
        $data['user'] = $this->user->get_admin_all();
            $this->load->view("admin/user/admin_list",$data);
    }

    public function list_customer(){
        $data['user'] = $this->user->get_customer_all();
            $this->load->view("admin/user/customer_list",$data);
    }
}