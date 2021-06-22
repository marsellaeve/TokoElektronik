<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang_model extends CI_Model {

    public function get_produk_all()
    {
        $query = $this->db->get('tbl_produk');
        return $query->result_array();
    }

    public function get_produk_kategori($kategori)
    {
        if($kategori>0)
            {
                $this->db->where('kategori',$kategori);
            }
        $query = $this->db->get('tbl_produk');
        return $query->result_array();
    }

    public function get_kategori_all()
    {
        $query = $this->db->get('tbl_kategori');
        return $query->result_array();
    }

    public  function get_produk_id($id)
    {
        $this->db->select('tbl_produk.*,nama_kategori');
        $this->db->from('tbl_produk');
        $this->db->join('tbl_kategori', 'kategori=tbl_kategori.id','left');
        $this->db->where('id_produk',$id);
        return $this->db->get();
    }

    public function tambah_order($data)
    {
        $this->db->insert('tbl_order', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }

    public function get_invoice($id)
    {
        $this->db->select('invoice');
        $this->db->from('tbl_order');
        $this->db->where('id',$id);
        return $this->db->get()->result();
    }

    public function tambah_detail_order($data)
    {
        $this->db->insert('tbl_detail_order', $data);
    }

    public function get_order($id)
    {
        $this->db->select('tbl_order.*');
        $this->db->from('tbl_order');
        $this->db->where('users',$id);
        return $this->db->get()->result();

    }

    public function get_order_all()
    {
        $this->db->select('tbl_order.*, users.full_name, users.phone');
        $this->db->from('tbl_order');
        $this->db->join('users', 'tbl_order.users = users.user_id');
        return $this->db->get()->result();

    }

    public function get_detail_order()
    {
        $this->db->select('tbl_detail_order.*, tbl_produk.nama_produk');
        $this->db->from('tbl_detail_order');
        $this->db->join('tbl_produk', 'tbl_produk.id_produk = tbl_detail_order.produk');
        return $this->db->get()->result();
    }

    public function add_total($total, $id)
    {
            $data = array(
                'total' => $total,
        );

        $this->db->where('id', $id);
        $this->db->update('tbl_order', $data);
    }
}
?>