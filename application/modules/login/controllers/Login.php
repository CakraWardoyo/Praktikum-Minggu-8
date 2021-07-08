<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('LoginModel');
    }
    public function index()
    {
        $this->load->view('templates/auth_header');  
        $this->load->view('v_login');
        $this->load->view('templates/auth_footer');  
    }
    
    public function register()
    {
        $data['title'] = 'Machine-KU Registration';
        $this->load->view('templates/auth_header', $data);  
        $this->load->view('v_daftar');
        $this->load->view('templates/auth_footer');     
    }

    public function simpan_data()
    {
        
        // masukkan data ke database
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'alamat' => $this->input->post('alamat'),
            'password' => password_hash($this->input->post('password1'), PASSWORD_BCRYPT));
        if ($this->LoginModel->tambah_user($data)) {
            echo "sukses";
        }else{
            echo "Gagal";
        }
        // echo "BLOK";
        // var_dump($data);
    }

    public function masuk()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password1');
        
        $rL = $this->LoginModel->masuk($email);

        if ($rL -> num_rows() == 1) {
            $res = $rL -> result_array()[0];
            $passwordDb = $res['password'];
            if (password_verify($password, $passwordDb)) {
                $this->session->set_userdata('name', $res['name']);
                redirect(base_url('Toko'));
            }else{
                echo "+()+";
            }
        }
        // var_dump($rL);
    }
}
