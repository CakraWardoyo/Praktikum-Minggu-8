<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{	
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('page_model');
	}
	public function index()
	{
		$kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['produk'] = $this->page_model->get_produk_kategori($kategori);
		$data['kategori'] = $this->page_model->get_kategori_all();
		$this->load->view('themes/header');
		$this->load->view('themes/navbar');
		$this->load->view('v_toko',$data);
		$this->load->view('themes/footer');
	}
	public function tentang()
		{
			$data['kategori'] = $this->page_model->get_kategori_all();
			$this->load->view('themes/header');
			$this->load->view('themes/navbar');
			$this->load->view('v_page',$data);
			$this->load->view('themes/footer');
		}

	public function cara_bayar()
		{
			$data['kategori'] = $this->page_model->get_kategori_all();
			$this->load->view('themes/header',$data);
			$this->load->view('themes/navbar');
			$this->load->view('v_bayar',$data);
			$this->load->view('themes/footer');
		}	
}
