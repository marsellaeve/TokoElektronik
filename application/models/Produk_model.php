<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function get_produk_all()
    {
        $query = $this->db->get('tbl_produk');
        return $query->result_array();
    }
}
?>