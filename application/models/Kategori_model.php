<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function get_kategori_all()
    {
        $query = $this->db->get('tbl_kategori');
        return $query->result_array();
    }
}
?>