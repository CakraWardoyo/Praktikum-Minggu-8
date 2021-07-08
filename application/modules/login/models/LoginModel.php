<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LoginModel extends CI_Model
{
    public function tambah_user($data)
    {
        return $this->db->insert('users', $data);
        // echo "User ditambahkan";
    }

    public function masuk($email)
    {
        return $this->db->get_where('users',array('email'=> $email));
    }
}
