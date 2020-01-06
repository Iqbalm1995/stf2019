<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url());
		// }M_marketing

		$this->load->model('M_pelanggan_akun', 'pelanggan_akun');
	}

	public function index()
	{
		$data['pelanggan'] = $this->pelanggan_akun->tampil_data()->result();

		$this->load->view('static/header_view');
		$this->load->view('pelanggan/pelanggan_view', $data);
		$this->load->view('static/footer_view');
	}

	public function tambah_data()
	{
		$data = array(
            'aksi' 						=> 'Tambah',
            'action' 					=> base_url('pelanggan/proses_tambah'),
            'id_pelanggan' 				=> '',
		    'nama_pelanggan' 			=> '',
		    'alamat' 					=> '',
		    'no_hp' 					=> '',
		    'username' 					=> '',
            'password' 					=> ''
		);

		$this->load->view('static/header_view');
		$this->load->view('pelanggan/pelanggan_form', $data);
		$this->load->view('static/footer_view');
	}

	public function proses_tambah()
    {
        $data = array(
            'nama_pelanggan' 	=> $this->input->post('nama_pelanggan'),
            'alamat' 			=> $this->input->post('alamat'),
            'no_hp' 			=> $this->input->post('no_hp'),
            'username' 			=> $this->input->post('username'),
            'password' 			=> password_hash($this->input->post('password'), PASSWORD_BCRYPT)
        );

        $simpan_data = $this->pelanggan_akun->input_data($data);

    	$this->session->set_flashdata('message1', '
		<div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Tambah data
        </div>
		');
		redirect (base_url().'pelanggan');
        
    }

    function edit($id)
	{
		$row = $this->pelanggan_akun->get_by_id($id);

        if ($row) {
            $data = array(
                'aksi' 						=> 'Ubah',
                'action' 					=> base_url('pelanggan/proses_edit'),
	            'id_pelanggan' 				=> set_value('id_pelanggan', $row->id_pelanggan),
			    'nama_pelanggan' 			=> set_value('nama_pelanggan', $row->nama_pelanggan),
			    'alamat' 					=> set_value('alamat', $row->alamat),
			    'no_hp' 					=> set_value('no_hp', $row->no_hp),
			    'username' 					=> set_value('username', $row->username),
	            'password' 					=> ''
		    );

			$this->load->view('static/header_view');
			$this->load->view('pelanggan/pelanggan_form', $data);
			$this->load->view('static/footer_view');
        } else {
            $this->session->set_flashdata('message1', '
			<div class="alert alert-danger alert-dismissible" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong>Gagal <i class="glyphicon glyphicon-ok"></i></strong> Ambil data
	        </div>
			');
            redirect (base_url().'pelanggan');
        }
	}

	function proses_edit()
	{
		$id_pelanggan 		= $this->input->post('id_pelanggan');
 
		$data = array(
			'nama_pelanggan' 	=> $this->input->post('nama_pelanggan'),
            'alamat' 			=> $this->input->post('alamat'),
            'no_hp' 			=> $this->input->post('no_hp'),
            'username' 			=> $this->input->post('username'),
            'password' 			=> password_hash($this->input->post('password'), PASSWORD_BCRYPT)
		);

		$where = array('id_pelanggan' => $id_pelanggan);

		$this->pelanggan_akun->update_data($where, $data);
		$this->session->set_flashdata('message1', '
			<div class="alert alert-info alert-dismissible" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Ubah data
	        </div>
			');
		redirect (base_url().'pelanggan');
	}

	function hapus($id)
	{
		$where = array('id_pelanggan' => $id);

		$this->pelanggan_akun->hapus_data($where);
		$this->session->set_flashdata('message1', '
			<div class="alert alert-info alert-dismissible" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Hapus data
	        </div>
			');
		redirect (base_url().'pelanggan');
	}

}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/Pelanggan.php */