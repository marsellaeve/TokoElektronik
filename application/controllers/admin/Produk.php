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

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET')
        {
            $data['kategori'] = $this->kategori->get_kategori_all();
            $this->load->view("admin/produk/create",$data);
        }
        else if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $produk = $this->produk;
            $validation = $this->form_validation;
            $validation->set_rules($produk->rules());
            if ($validation->run()) {
                $produk->add();
                $this->session->set_flashdata(
                    'message',
                    [
                      'type' => 'success',
                      'message' => 'Berhasil menambahkan produk!'
                    ]
                );
                redirect(base_url('dashboard-admin/produk/daftar'));
            }
            else
            {
                $this->session->set_flashdata(
                    'message',
                    [
                      'type' => 'error',
                      'message' => 'Silahkan cek kembali data input anda!'
                    ]
                );
                redirect(base_url('dashboard-admin/produk/tambah'));

            }
        }
        else
        {
            show_404();
        }
    }

    public function update()
    {

        $product = $this->produk;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata(
                'message',
                [
                  'type' => 'success',
                  'message' => 'Berhasil mengedit produk!'
                ]
            );
            redirect(base_url('dashboard-admin/produk/daftar'));
        }
        else
        {
            $this->session->set_flashdata(
                'message',
                [
                    'type' => 'error',
                    'message' => 'Silahkan cek kembali data edit anda!'
                ]
            );
            redirect(base_url('dashboard-admin/produk/daftar'));
        }
    }

    public function delete()
    {

        if ($this->produk->delete()) {
            $this->session->set_flashdata(
                'message',
                [
                  'type' => 'success',
                  'message' => 'Berhasil menghapus produk!'
                ]
            );
            redirect(base_url('dashboard-admin/produk/daftar'));
        }
    }
}