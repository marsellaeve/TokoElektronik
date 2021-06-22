<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Produk_model extends CI_Model {
    public function rules()
    {
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'Harga',
            'rules' => 'numeric'],

            ['field' => 'deskripsi',
            'label' => 'Deskripsi',
            'rules' => 'required'],

            ['field' => 'kategori',
            'label' => 'Kategori',
            'rules' => 'required']
        ];
    }
    public function get_produk_all()
    {
        $this->db->select('id_produk AS id, nama_produk, harga, deskripsi, gambar, kat.id AS id_category, kat.nama_kategori AS kategori');
        $this->db->from('tbl_produk AS prod');
        $this->db->join('tbl_kategori AS kat', 'kat.id = prod.kategori');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('tbl_produk', ["id_produk" => $id])->row();
    }

    public function add()
    {
        $post = $this->input->post();
        $data = array(
            'nama_produk' => $post["nama"],
            'harga' => $post["harga"],
            'deskripsi' => $post["deskripsi"],
            'kategori' => $post["kategori"],
            'gambar'=> $this->_uploadImage($post["nama"])
        );
        $this->db->insert('tbl_produk', $data);
    }

    public function update()
    {
        $post = $this->input->post();
        if (!empty($_FILES["gambar"]["name"])) {
            $img = $this->_uploadImage($post["nama"]);
        } else {
            $img = $post["old_image"];
		}
        $data = array(
            'nama_produk' => $post["nama"],
            'harga' => $post["harga"],
            'deskripsi' => $post["deskripsi"],
            'kategori' => $post["kategori"],
            'gambar'=> $img
        );
        $this->db->update('tbl_produk', $data, array('id_produk' => $post['product_id']));
    }

    private function _uploadImage($nama)
    {
        $config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name']            = $nama;
        $config['overwrite']			= true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            return $upload_data['file_name'];
        }
    }

    public function delete()
    {
        $post = $this->input->post();
		$this->_deleteImage($post['product_id']);
        return $this->db->delete('tbl_produk', array("id_produk" => $post['product_id']));
	}

    private function _deleteImage($id)
	{

		$product = $this->getById($id);
		if ($product->gambar != "default.jpg") {
			$filename = explode(".", $product->gambar)[0];
			return array_map('unlink', glob(FCPATH."assets/images/$filename.*"));
		}
	}
}
?>