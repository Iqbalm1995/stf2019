<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('M_auth');
        $this->load->model('M_pelanggan_akun', 'pelanggan_akun');
    }

	public function index()
	{
		$data = array('mode' => 'Staff', 'action' => base_url('login/do_login'));
        $this->load->view('login/login_view', $data);
	}

	public function pelanggan()
	{
		$data = array('mode' => 'Pelanggan', 'action' => base_url('login/do_login_pelanggan'));
        $this->load->view('login/login_view', $data);
	}

	public function daftar()
	{
        $this->load->view('login/register_view');
	}

	public function proses_register()
    {
        $data = array(
            'nama_pelanggan' 	=> $this->input->post('nama_pelanggan'),
            'alamat' 			=> $this->input->post('alamat'),
            'no_hp' 			=> $this->input->post('no_hp'),
            'username' 			=> $this->input->post('username'),
            'password' 			=> password_hash($this->input->post('password'), PASSWORD_BCRYPT)
        );

        $simpan_data = $this->pelanggan_akun->input_data($data);

    	$this->session->set_flashdata('pesan1', '
		<div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Akun anda berhasil terdaftar. Silahkan Login
        </div>
		');
		redirect (base_url().'login');
        
    }

	public function do_login_pelanggan()
	{

		$uname  	= $this->input->post('username');
		$pass 		= $this->input->post('password');



        if (isset($uname) && isset($pass)) {
            $user = $this->M_auth->getPelangganByLogin($uname, $pass);
            $passHash = strval($user->password);
            if ($user) {
            	$data_session = array(
					'id_user' 			=> $user->id_pelanggan,
					'username' 			=> $user->username,
					'nama_level' 		=> 'Pelanggan',
					'status_login' 		=> "loginactive"
				);
				$this->session->set_userdata($data_session);
            	redirect(base_url().'dashboard');
            }else{
            	$this->session->set_flashdata('pesan2', '
				<div class="alert alert-warning alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <strong>Login Gagal</strong><br>Periksa kembali username dan password. 
                  </div>
                </div>');
            	redirect(base_url().'login');
            }
        }
	}

	public function do_login()
	{

		$uname  	= $this->input->post('username');
		$pass 		= $this->input->post('password');



        if (isset($uname) && isset($pass)) {
            $user = $this->M_auth->getUserByLogin($uname, $pass);
            $passHash = strval($user->password);
            if ($user) {
            	$data_session = array(
					'id_user' 			=> $user->id_user,
					'username' 			=> $user->username,
					'nama_level' 		=> $user->nama_level,
					'status_login' 		=> "loginactive"
				);
				$this->session->set_userdata($data_session);
            	redirect(base_url().'dashboard');
            }else{
            	$this->session->set_flashdata('pesan2', '
				<div class="alert alert-warning alert-dismissible show fade">
                  <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <strong>Login Gagal</strong><br>Periksa kembali username dan password. 
                  </div>
                </div>');
            	redirect(base_url().'login/staff');
            }
        }
	}

	public function do_logout()
	{
		if ($this->session->userdata('nama_level') != 'Pelanggan') {
			$mod = 'staff';
		}else{
			$mod = 'pelanggan';
		}
		$data_session = array(
							'ID' 				=> '',
							'id_user' 			=> '',
							'username' 			=> '',
							'nama_level' 		=> '',
							'status_login' 		=> ''
				);
		$this->session->unset_userdata($data_session);
    	$this->session->sess_destroy();

    	if ($mod == 'staff') {
	    	redirect(base_url().'login/staff');
    	}else{
			redirect(base_url().'login');
    	}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */