<?php

class User_model extends CI_Model
{
    private $_table = "users";

    public function doLogin(){
		$post = $this->input->post();
        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"])->or_where('username', $post["email"]);
        $user = $this->db->get($this->_table)->row();
        $isPasswordTrue = false;
        // jika user terdaftar
        if($user){
            // periksa password-nya
            if(password_verify($post["password"], $user->password))
            {
                $isPasswordTrue=true;
            }
            else
            {
                throw new Exception('Silakan periksa kembali password yang Anda masukkan');
            }
            // jika password benar dan dia admin
            if($isPasswordTrue && ($user->role === "admin" || $user->role === "customer"))
            {
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->user_id);
                return $user->role;
            }
        }
        // echo $user->username;
        // login gagal
        else
        {
            throw new Exception('Silakan periksa kembali username atau email dan password yang Anda masukkan');
        }
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    public function doRegisterAdmin()
    {
		$post = $this->input->post();
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $email=$this->input->post('email');
        $full_name=$this->input->post('fullname');
        $phone=$this->input->post('phone');
        $data = array(
            'username'=>$username,
            'password'=> password_hash($password, PASSWORD_DEFAULT),
            'email'=>$email,
            'full_name'=>$full_name,
            'phone'=>$phone,
            'role'=>'admin'
        );

        $this->db->insert($this->_table,$data);
        return true;
    }

    public function doRegisterCustomer()
    {
		$post = $this->input->post();
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $email=$this->input->post('email');
        $full_name=$this->input->post('fullname');
        $phone=$this->input->post('phone');
        $data = array(
            'username'=>$username,
            'password'=> password_hash($password, PASSWORD_DEFAULT),
            'email'=>$email,
            'full_name'=>$full_name,
            'phone'=>$phone,
            'role'=>'customer'
        );

        $this->db->insert($this->_table,$data);
        return true;
    }

    private function _updateLastLogin ($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

    public function get_admin_all()
    {
        $this->db->select('username, full_name, email, phone');
        $this->db->from('users');
        $this->db->where("users.role = 'admin'");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_customer_all()
    {
        $this->db->select('username, full_name, email, phone');
        $this->db->from('users');
        $this->db->where("users.role = 'customer'");
        $query = $this->db->get();
        return $query->result_array();
    }

}