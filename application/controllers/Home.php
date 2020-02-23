<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('static/header');
		$this->load->view('dashboard/home');
		$this->load->view('static/footer');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */