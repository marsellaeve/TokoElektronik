<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Invoice extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $libraries = array('form_validation', 'session');
        $this->load->model("user_model", 'user');
        $this->load->model("keranjang_model", 'keranjang');
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
        $data['order'] = $this->keranjang->get_order_all();
        $data['detail_order'] = $this->keranjang->get_detail_order();
        $this->load->view('admin/invoice/index',$data);
    }
}