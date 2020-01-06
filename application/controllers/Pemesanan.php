<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('status') != "login"){
		// 	redirect(base_url());
		// }M_marketing

		$this->load->model('M_pemesanan', 'pemesanan');
		$this->load->model('M_kategori', 'kategori');
		$this->load->model('M_pelanggan', 'pelanggan');
		$this->load->model('M_marketing', 'marketing');
        $this->load->model('M_pelanggan_akun', 'pelanggan_akun');
	}

	public function index()
	{
		$data['pemesanan'] = $this->pemesanan->tampil_data();

		$this->load->view('static/header_view');
		$this->load->view('pemesanan/pemesanan_view', $data);
		$this->load->view('static/footer_view');
	}

    public function order()
    {
        $id = $this->session->userdata('id_user');
        $data['pemesanan'] = $this->pemesanan->tampil_data_order($id);

        $this->load->view('static/header_view');
        $this->load->view('pemesanan/pemesanan_order', $data);
        $this->load->view('static/footer_view');
    }

    public function gantt($order_id)
    {
        $id = $this->session->userdata('id_user');
        $data['order_id'] = $order_id;

        $this->load->view('static/header_view');
        $this->load->view('pemesanan/pemesanan_gantt', $data);
        $this->load->view('static/footer_view');
    }

    public function gantt_view($order_id)
    {
        $id = $this->session->userdata('id_user');
        $data['order_id'] = $order_id;

        $this->load->view('static/header_view');
        $this->load->view('pemesanan/pemesanan_gantt_view', $data);
        $this->load->view('static/footer_view');
    }

	public function pemesanan_index()
	{
		$data['pemesanan'] = $this->marketing->getPesanann()->result();

		$this->load->view('static/header_view');
		$this->load->view('pemesanan/pemesanan_index', $data);
		$this->load->view('static/footer_view');
	}

	public function konfirmasi_pemesanan()
	{
		$data['list'] = $this->marketing->getKonfirmasiPembayaran()->result();

		$this->load->view('static/header_view');
		$this->load->view('pemesanan/konfirmasi_index', $data);
		$this->load->view('static/footer_view');
	}

	public function verifikasiPembayaran($id)
    {
        $update = $this->marketing->updatePembayaran($id);

        if ($update) {
        	$this->session->set_flashdata('message1', '
			<div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Melakukan Verifikasi!
            </div>
			');
            redirect(base_url().'pemesanan/konfirmasi_pemesanan');
        } else {
            $this->session->set_flashdata('message1', '
			<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Gagal <i class="glyphicon glyphicon-ok"></i></strong> Melakukan Verifikasi!
            </div>
			');
            redirect(base_url().'pemesanan/konfirmasi_pemesanan');
        }
    }

    public function tambah_order()
    {
        if ($this->session->userdata('nama_level') != 'Pelanggan') {
            $id_pelanggan = '';
        }else{
            $id_pelanggan = $this->session->userdata('id_user');
        }
        $data = array(
            'aksi'                      => 'Tambah',
            'action'                    => base_url('pemesanan/proses_tambah'),
            'id_pesanan'                => '',
            'nomor_pesanan'             => '',
            'id_pelanggan'              => $id_pelanggan,
            'id_kategori'               => '',
            'nama_produk'               => '',
            'qty'                       => '',
            'tgl_pesan'                 => ''
        );

        $data['kategori'] = $this->kategori->tampil_data();
        $data['produk'] = $this->pemesanan->tampil_produk();

        $this->load->view('static/header_view');
        $this->load->view('pemesanan/pemesanan_form_order', $data);
        $this->load->view('static/footer_view');
    }

	public function tambah_data()
	{
		$data = array(
            'aksi' 						=> 'Tambah',
            'action' 					=> base_url('pemesanan/proses_tambah'),
            'id_pesanan' 				=> '',
		    'nomor_pesanan' 			=> '',
            'id_pelanggan' 			    => '',
            'id_kategori'				=> '',
            'nama_produk' 				=> '',
            'qty' 						=> '',
            'tgl_pesan' 				=> ''
		);

		$data['kategori'] = $this->kategori->tampil_data();
        $data['pelanggan'] = $this->pelanggan_akun->tampil_data()->result();
        $data['produk'] = $this->pemesanan->tampil_produk();

		$this->load->view('static/header_view');
		$this->load->view('pemesanan/pemesanan_form', $data);
		$this->load->view('static/footer_view');
	}

	public function proses_tambah()
    {
        //generate No Pembayaran
        $cek = $this->pelanggan->getPembayaran()->num_rows() + 1;
        $no_pembayaran = 'AC240' . $cek;
        $no_pesanan = 'T00' . $cek;

        $data = array(
            'nomor_pesanan' 	=> $no_pesanan,
            'id_pelanggan' 	    => $this->input->post('id_pelanggan'),
            'id_kategori' 		=> $this->input->post('id_kategori'),
            'nama_produk' 		=> $this->input->post('nama_produk'),
            'qty' 				=> $this->input->post('qty'),
            'tgl_pesan' 		=> date('Y-m-d'),
            'id_status_pesan'   => 1,
            'id_proses' 		=> 8,
        );
        $tambahpesanan = $this->pelanggan->tambahpesanan($data);

        $data = array(
            'nomor_pesanan' => $no_pesanan,
            'no_pembayaran' => $no_pembayaran,
            'status' => 1
        );
        $tambahpesanan = $this->pelanggan->insertPembayaran($data);

        if ($tambahpesanan && $tambahpesanan) {
        	$this->session->set_flashdata('message1', '
			<div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> kirim pemesanan
            </div>
			');
            if ($this->session->userdata('nama_level') != 'Pelanggan') {
                redirect (base_url().'pemesanan');
            }else{
                redirect (base_url().'pemesanan/order');
            }
        }else{
        	$this->session->set_flashdata('message1', '
			<div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Gagal <i class="glyphicon glyphicon-ok"></i></strong> kirim pemesanan
            </div>
			');
            if ($this->session->userdata('nama_level') != 'Pelanggan') {
                redirect (base_url().'pemesanan');
            }else{
                redirect (base_url().'pemesanan/order');
            }
        }
        
    }

    function detail_order($id)
    {
        $row = $this->pemesanan->get_by_id($id);

        if ($row) {
            $data = array(
                'aksi'                      => 'Ubah',
                'action'                    => base_url('pemesanan/proses_edit'),
                'id_pesanan'                => set_value('id_pesanan', $row->id_pesanan),
                'nama_pelanggan'            => set_value('nama_pelanggan', $row->nama_pelanggan),
                'alamat'                    => set_value('alamat', $row->alamat),
                'no_hp'                     => set_value('no_hp', $row->no_hp),
                'nomor_pesanan'             => set_value('nomor_pesanan', $row->nomor_pesanan),
                'nama_kategori'             => set_value('nama_kategori', $row->nama_kategori),
                'nama_produk'               => set_value('nama_produk', $row->nama_produk),
                'tgl_pesan'                 => set_value('tgl_pesan', $row->tgl_pesan),
                'qty'                       => set_value('qty', $row->qty),
                'hitung_waktu'              => set_value('hitung_waktu', $row->hitung_waktu),
                'lama_whelding'             => set_value('lama_whelding', $row->lama_whelding),
                'lama_mashining'            => set_value('lama_mashining', $row->lama_mashining),
                'nama_status_pesan'         => set_value('nama_status_pesan', $row->nama_status_pesan),
                'nama_status_proses'        => set_value('nama_status_proses', $row->nama_status_proses),
                'total_pembayaran'          => set_value('total_pembayaran', $row->total_pembayaran),
            );

            $this->load->view('static/header_view');
            $this->load->view('pemesanan/pemesanan_detail_order', $data);
            $this->load->view('static/footer_view');
        } else {
            $this->session->set_flashdata('message1', '
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Gagal <i class="glyphicon glyphicon-ok"></i></strong> Ambil data
            </div>
            ');
            redirect (base_url().'pemesanan/order');
        }
    }

    function edit($id)
    {
        $row = $this->pemesanan->get_by_id($id);

        if ($row) {
            $data = array(
                'aksi'                      => 'Ubah',
                'action'                    => base_url('pemesanan/proses_edit'),
                'id_pesanan'                => set_value('id_pesanan', $row->id_pesanan),
                'nama_pelanggan'            => set_value('nama_pelanggan', $row->nama_pelanggan),
                'alamat'                    => set_value('alamat', $row->alamat),
                'no_hp'                     => set_value('no_hp', $row->no_hp),
                'nomor_pesanan'             => set_value('nomor_pesanan', $row->nomor_pesanan),
                'nama_kategori'             => set_value('nama_kategori', $row->nama_kategori),
                'nama_produk'               => set_value('nama_produk', $row->nama_produk),
                'qty'                       => set_value('qty', $row->qty),
                'hitung_waktu'              => set_value('hitung_waktu', $row->hitung_waktu),
                'lama_whelding'             => set_value('lama_whelding', $row->lama_whelding),
                'lama_mashining'            => set_value('lama_mashining', $row->lama_mashining),
                'tgl_pesan'                 => set_value('tgl_pesan', $row->tgl_pesan),
                'id_status_pesan'           => set_value('id_status_pesan', $row->id_status_pesan),
                'id_proses'                 => set_value('id_proses', $row->id_proses),
                'nama_status_pesan'         => set_value('nama_status_pesan', $row->nama_status_pesan),
                'nama_status_proses'        => set_value('nama_status_proses', $row->nama_status_proses),
                'total_pembayaran'          => set_value('total_pembayaran', $row->total_pembayaran),
            );

            $this->load->view('static/header_view');
            $this->load->view('pemesanan/pemesanan_edit', $data);
            $this->load->view('static/footer_view');
        } else {
            $this->session->set_flashdata('message1', '
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Gagal <i class="glyphicon glyphicon-ok"></i></strong> Ambil data
            </div>
            ');
            redirect (base_url().'pemesanan');
        }
    }

    function pcc_edit($id)
    {
        $row = $this->pemesanan->get_by_id($id);

        if ($row) {
            $data = array(
                'aksi'                      => 'Ubah',
                'action'                    => base_url('pemesanan/proses_pccedit'),
                'id_pesanan'                => set_value('id_pesanan', $row->id_pesanan),
                'nama_pelanggan'            => set_value('nama_pelanggan', $row->nama_pelanggan),
                'alamat'                    => set_value('alamat', $row->alamat),
                'no_hp'                     => set_value('no_hp', $row->no_hp),
                'nomor_pesanan'             => set_value('nomor_pesanan', $row->nomor_pesanan),
                'nama_kategori'             => set_value('nama_kategori', $row->nama_kategori),
                'nama_produk'               => set_value('nama_produk', $row->nama_produk),
                'qty'                       => set_value('qty', $row->qty),
                'hitung_waktu'              => set_value('hitung_waktu', $row->hitung_waktu),
                'lama_whelding'             => set_value('lama_whelding', $row->lama_whelding),
                'lama_mashining'            => set_value('lama_mashining', $row->lama_mashining),
                'tgl_pesan'                 => set_value('tgl_pesan', $row->tgl_pesan),
                'id_status_pesan'           => set_value('id_status_pesan', $row->id_status_pesan),
                'id_proses'                 => set_value('id_proses', $row->id_proses),
                'nama_status_pesan'         => set_value('nama_status_pesan', $row->nama_status_pesan),
                'nama_status_proses'        => set_value('nama_status_proses', $row->nama_status_proses),
                'total_pembayaran'          => set_value('total_pembayaran', $row->total_pembayaran),
            );

            $this->load->view('static/header_view');
            $this->load->view('pemesanan/pemesanan_pccedit', $data);
            $this->load->view('static/footer_view');
        } else {
            $this->session->set_flashdata('message1', '
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Gagal <i class="glyphicon glyphicon-ok"></i></strong> Ambil data
            </div>
            ');
            redirect (base_url().'pemesanan');
        }
    }

    function produksi_edit($id)
    {
        $row = $this->pemesanan->get_by_id($id);

        if ($row) {
            $data = array(
                'aksi'                      => 'Ubah',
                'action'                    => base_url('pemesanan/proses_produksiedit'),
                'id_pesanan'                => set_value('id_pesanan', $row->id_pesanan),
                'nama_pelanggan'            => set_value('nama_pelanggan', $row->nama_pelanggan),
                'alamat'                    => set_value('alamat', $row->alamat),
                'no_hp'                     => set_value('no_hp', $row->no_hp),
                'nomor_pesanan'             => set_value('nomor_pesanan', $row->nomor_pesanan),
                'nama_kategori'             => set_value('nama_kategori', $row->nama_kategori),
                'nama_produk'               => set_value('nama_produk', $row->nama_produk),
                'qty'                       => set_value('qty', $row->qty),
                'hitung_waktu'              => set_value('hitung_waktu', $row->hitung_waktu),
                'lama_whelding'             => set_value('lama_whelding', $row->lama_whelding),
                'lama_mashining'            => set_value('lama_mashining', $row->lama_mashining),
                'tgl_pesan'                 => set_value('tgl_pesan', $row->tgl_pesan),
                'id_status_pesan'           => set_value('id_status_pesan', $row->id_status_pesan),
                'id_proses'                 => set_value('id_proses', $row->id_proses),
                'nama_status_pesan'         => set_value('nama_status_pesan', $row->nama_status_pesan),
                'nama_status_proses'        => set_value('nama_status_proses', $row->nama_status_proses),
                'total_pembayaran'          => set_value('total_pembayaran', $row->total_pembayaran),
            );

            $this->load->view('static/header_view');
            $this->load->view('pemesanan/pemesanan_produksiedit', $data);
            $this->load->view('static/footer_view');
        } else {
            $this->session->set_flashdata('message1', '
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Gagal <i class="glyphicon glyphicon-ok"></i></strong> Ambil data
            </div>
            ');
            redirect (base_url().'pemesanan');
        }
    }

    function proses_edit()
    {
        $id_pesanan        = $this->input->post('id_pesanan');
 
        $data = array(
            'id_status_pesan'       => $this->input->post('id_status_pesan'),
            'id_proses'             => $this->input->post('id_proses'),
        );

        $where = array('id_pesanan' => $id_pesanan);

        $this->pemesanan->update_data($where, $data);
        $this->session->set_flashdata('message1', '
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Ubah data
            </div>
            ');
        redirect (base_url().'pemesanan');
    }

    function proses_produksiedit()
    {
        $id_pesanan                 = $this->input->post('id_pesanan');
 
        $data = array(
            'lama_whelding'       => $this->input->post('lama_whelding'),
            'lama_mashining'   => $this->input->post('lama_mashining'),
        );

        $where = array('id_pesanan' => $id_pesanan);

        $this->pemesanan->update_data($where, $data);
        $this->session->set_flashdata('message1', '
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Ubah data
            </div>
            ');
        redirect (base_url().'pemesanan/produksi_edit/'.$id_pesanan);
    }

    function proses_pccedit()
    {
        $id_pesanan                 = $this->input->post('id_pesanan');
 
        $data = array(
            'hitung_waktu'       => $this->input->post('hitung_waktu'),
            'total_pembayaran'   => $this->input->post('total_pembayaran'),
        );

        $where = array('id_pesanan' => $id_pesanan);

        $this->pemesanan->update_data($where, $data);
        $this->session->set_flashdata('message1', '
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Ubah data
            </div>
            ');
        redirect (base_url().'pemesanan/pcc_edit/'.$id_pesanan);
    }

    public function tambah_bahan_baku()
    {
        $id_pesanan                 = $this->input->post('id_pesanan');
 
        $data = array(
            'nama_bahan_baku'       => $this->input->post('nama_bahan_baku'),
            'id_pesanan'            => $id_pesanan,
            'suplier'               => $this->input->post('suplier'),
            'qty'                   => $this->input->post('qty'),
            'kebutuhan'             => $this->input->post('qty') + 5,
        );

        $this->pemesanan->input_data_bb($data);
        $this->session->set_flashdata('message1', '
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Ubah data
            </div>
            ');
        redirect (base_url().'pemesanan/pcc_edit/'.$id_pesanan);
    }

    public function hapus_bahan_baku($id_pesanan, $id_bb)
    {
        $where = array('id_bahan_baku' => $id_bb);
        $this->pemesanan->hapus_data_bb($where);
        $this->session->set_flashdata('message1', '
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Data telah di hapus
            </div>
            ');
        redirect (base_url().'pemesanan/pcc_edit/'.$id_pesanan);
    }

	function hapus($id){
		$where = array('id_pesanan' => $id);
		$this->pemesanan->hapus_data($where,'pesanan');
		$this->session->set_flashdata('message1', '
			<div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Data telah di hapus
            </div>
			');
		redirect (base_url().'pemesanan');
	}

    public function konfirmasiPembayaran()
    {

        $nomor_pesanan  = $this->input->post('nomor_pesanan');
        $id_pesanan     = $this->input->post('id_pesanan');

        $data = array(
            'status'         => 1,
        );

        if(!empty($_FILES['upload_file']['name']))
        {
            $upload = $this->_do_upload();
            $data['bukti'] = $upload;
        }

        $where = array('nomor_pesanan' => $nomor_pesanan);

        $this->pemesanan->upload_pembayaran($where, $data);
        $this->session->set_flashdata('message1', '
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Ubah data
            </div>
            ');
        redirect (base_url().'pemesanan/detail_order/'.$id_pesanan);
    }

    private function _do_upload()
    {
        $file_name = "file_".time();

        $config['upload_path']          = 'upload_file/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_size']             = '1000000';
        // $config['max_width']            = '1024';
        // $config['max_height']           = '768';
        $config['file_name']            = $file_name;

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('upload_file'))
        {
            $this->session->set_flashdata('message1', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong>Gagal </strong> Data gagal di upload
                </div>
                ');
            redirect (base_url().'pemesanan/order');
            exit();
        }

        return $this->upload->data('file_name');
    }

    // -----------------------------------------------------------------------
    // Gantt Chart Function



}

/* End of file Pemesanan.php */
/* Location: ./application/controllers/Pemesanan.php */