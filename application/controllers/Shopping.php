<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


class Shopping extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('keranjang_model');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
        $data['produk'] = $this->keranjang_model->get_produk_kategori($kategori);
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $this->load->view('themes/header',$data);
        $this->load->view('shopping/list_produk',$data);
        $this->load->view('themes/footer');
    }
    public function tampil_cart()
    {
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $this->load->view('themes/header',$data);
        $this->load->view('shopping/tampil_cart',$data);
        $this->load->view('themes/footer');
    }

    public function check_out()
    {
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $this->load->view('themes/header',$data);
        $this->load->view('shopping/check_out',$data);
        $this->load->view('themes/footer');
    }

    public function detail_produk()
    {
        $id=($this->uri->segment(3))?$this->uri->segment(3):0;
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $data['detail'] = $this->keranjang_model->get_produk_id($id)->row_array();
        $this->load->view('themes/header',$data);
        $this->load->view('shopping/detail_produk',$data);
        $this->load->view('themes/footer');
    }

    function tambah()
    {
        $data_produk= array('id' => $this->input->post('id'),
                             'name' => $this->input->post('nama'),
                             'price' => $this->input->post('harga'),
                             'gambar' => $this->input->post('gambar'),
                             'qty' =>$this->input->post('qty')
                            );
        $this->cart->insert($data_produk);
        redirect('shopping');
    }

    function hapus($rowid)
    {
        if ($rowid=="all")
            {
                $this->cart->destroy();
            }
        else
            {
                $data = array('rowid' => $rowid,
                              'qty' =>0);
                $this->cart->update($data);
            }
        redirect('shopping/tampil_cart');
    }

    function ubah_cart()
    {
        $cart_info = $_POST['cart'] ;
        foreach( $cart_info as $id => $cart)
        {
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $gambar = $cart['gambar'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array('rowid' => $rowid,
                            'price' => $price,
                            'gambar' => $gambar,
                            'amount' => $amount,
                            'qty' => $qty);
            $this->cart->update($data);
        }
        redirect('shopping/tampil_cart');
    }

    public function proses_order()
    {
        $this->load->helper('string');
        $invoice = random_string('alnum',8);
        //-------------------------Input data order------------------------------
        $data_order = array('tanggal' => date('Y-m-d'),
                            'users' => $this->session->user_logged->user_id,
                            'nama_tujuan' => $this->input->post('nama'),
                            'alamat_tujuan' => $this->input->post('alamat'),
                            'telepon_tujuan' => $this->input->post('telp'),
                            'invoice' => $invoice,
                            'status' => 0);
        $id_order = $this->keranjang_model->tambah_order($data_order);
        //-------------------------Input data detail order-----------------------
        $total = 0;
        if ($cart = $this->cart->contents())
            {
                foreach ($cart as $item)
                    {
                        $data_detail = array('order_id' =>$id_order,
                                        'produk' => $item['id'],
                                        'qty' => $item['qty'],
                                        'harga' => $item['price']);
                        $proses = $this->keranjang_model->tambah_detail_order($data_detail);
                        $total = $total + (intval($item['qty']) * intval($item['price']));
                    }
                    // var_dump($total);
                    // die();
                $add = $this->keranjang_model->add_total($total, $id_order );
            }
        //-------------------------Hapus shopping cart--------------------------
        $this->cart->destroy();
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $data['invoice'] = $this->keranjang_model->get_invoice($id_order);
        // var_dump($data);
        // die();
        $this->load->view('themes/header',$data);
        $this->load->view('shopping/sukses',$data);
        $this->load->view('themes/footer');
    }
    public function history_shopping()
    {
        $id = $this->session->user_logged->user_id;
        //-------------------------Hapus shopping cart--------------------------
        // $this->cart->destroy();
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $data['order'] = $this->keranjang_model->get_order($id);
        $data['detail_order'] = $this->keranjang_model->get_detail_order();
        $this->load->view('themes/header',$data);
        $this->load->view('shopping/history_shopping',$data);
        $this->load->view('themes/footer');
    }

    public function update_invoice()
    {
        $id = $this->session->user_logged->user_id;
        $this->keranjang_model->update_invoice();
        //-------------------------Hapus shopping cart--------------------------
        // $this->cart->destroy();
        $data['kategori'] = $this->keranjang_model->get_kategori_all();
        $data['order'] = $this->keranjang_model->get_order($id);
        $data['detail_order'] = $this->keranjang_model->get_detail_order();
        $this->load->view('themes/header',$data);
        $this->load->view('shopping/history_shopping',$data);
        $this->load->view('themes/footer');
    }
}
?>