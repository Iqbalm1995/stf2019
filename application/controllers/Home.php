<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('static/header_login');
		$this->load->view('dashboard/home_view');
		$this->load->view('static/footer_login');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */