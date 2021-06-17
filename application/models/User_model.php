<?php

class User_model extends CI_Model
{
    private $_table = "users";

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"])
                ->or_where('username', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if($user){
            // periksa password-nya
            if($user->password===$post["password"]) $isPasswordTrue=true;

            // jika password benar dan dia admin
            if($isPasswordTrue && ($user->role === "admin" || $user->role === "customer")){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                echo($user->user_id);
                $this->_updateLastLogin($user->user_id);
                return $user->role;
            }
        }
        echo $user->username;
        // login gagal
		return false;
    }

    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    public function doRegister()
    {   
		$post = $this->input->post();
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $email=$this->input->post('email');
        $full_name=$this->input->post('fullname');
        $phone=$this->input->post('phone');
        $data = array(
            'username'=>$username,
            'password'=>$password,
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

}