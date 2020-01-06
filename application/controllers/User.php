<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url());
		// }M_marketing

		$this->load->model('M_user', 'user');
	}

	public function index()
	{
		$data['user'] = $this->user->tampil_data()->result();

		$this->load->view('static/header_view');
		$this->load->view('user/user_view', $data);
		$this->load->view('static/footer_view');
	}

	public function tambah_data()
	{
		$data = array(
            'aksi' 						=> 'Tambah',
            'action' 					=> base_url('user/proses_tambah'),
            'id_user' 					=> '',
		    'username' 					=> '',
            'password' 					=> '',
            'id_level'					=> ''
		);

		$this->load->view('static/header_view');
		$this->load->view('user/user_form', $data);
		$this->load->view('static/footer_view');
	}

	public function proses_tambah()
    {

        $data = array(
            'username' 			=> $this->input->post('username'),
            'password' 			=> password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'id_level' 			=> $this->input->post('id_level')
        );

        $simpan_data = $this->user->input_data($data);

    	$this->session->set_flashdata('message1', '
		<div class="alert alert-info alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Tambah data
        </div>
		');
		redirect (base_url().'user');
        
    }

    function edit($id)
	{
		$row = $this->user->get_by_id($id);

        if ($row) {
            $data = array(
                'aksi' 						=> 'Ubah',
                'action' 					=> base_url('user/proses_edit'),
                'id_user' 					=> set_value('id', $row->id_user),
			    'username' 					=> set_value('username', $row->username),
	            'password' 					=> '',
	            'id_level'					=> set_value('id_level', $row->id_level)
		    );

			$this->load->view('static/header_view');
			$this->load->view('user/user_form', $data);
			$this->load->view('static/footer_view');
        } else {
            $this->session->set_flashdata('message1', '
			<div class="alert alert-danger alert-dismissible" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong>Gagal <i class="glyphicon glyphicon-ok"></i></strong> Ambil data
	        </div>
			');
            redirect (base_url().'user');
        }
	}

	function proses_edit()
	{
		$id_user 		= $this->input->post('id_user');
 
		$data = array(
			'username' 		=> $this->input->post('username'),
			'password' 		=> password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'id_level' 		=> $this->input->post('id_level')
		);

		$where = array('id_user' => $id_user);

		$this->user->update_data($where, $data);
		$this->session->set_flashdata('message1', '
			<div class="alert alert-info alert-dismissible" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Ubah data
	        </div>
			');
		redirect (base_url().'user');
	}

	function hapus($id)
	{
		$where = array('id_user' => $id);

		$this->user->hapus_data($where);
		$this->session->set_flashdata('message1', '
			<div class="alert alert-info alert-dismissible" role="alert">
	          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Hapus data
	        </div>
			');
		redirect (base_url().'user');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */