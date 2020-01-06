<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url());
		// }
	}

	public function index()
	{
		$this->load->view('static/header_view');
		$this->load->view('dashboard/dashboard_view');
		$this->load->view('static/footer_view');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */