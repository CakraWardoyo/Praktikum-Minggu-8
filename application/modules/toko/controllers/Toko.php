<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {
	public function __construct()
	{	
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('toko_model');
	}
	public function index()
	{
		$kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['produk'] = $this->toko_model->get_produk_kategori($kategori);
		$data['kategori'] = $this->toko_model->get_kategori_all();
		$this->load->view('themes/header');
		$this->load->view('themes/navbar');
		$this->load->view('v_toko',$data);
		$this->load->view('themes/footer');
	}
}
