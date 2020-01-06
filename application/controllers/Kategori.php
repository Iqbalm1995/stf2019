<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url());
		// }M_marketing

		$this->load->model('M_kategori', 'kategori');
	}

	public function index()
	{
		$data['kategori'] = $this->kategori->tampil_data()->result();

		$this->load->view('static/header_view');
		$this->load->view('kategori/kategori_view', $data);
		$this->load->view('static/footer_view');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */