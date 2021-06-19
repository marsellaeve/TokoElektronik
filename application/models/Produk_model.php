<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function get_produk_all()
    {
        $this->db->select('id_produk AS id, nama_produk, harga, deskripsi, gambar, kat.id AS id_category, kat.nama_kategori AS kategori');
        $this->db->from('tbl_produk AS prod');
        $this->db->join('tbl_kategori AS kat', 'kat.id = prod.kategori');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>