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

        $this->load->view('static/header');
        $this->load->view('pemesanan/pemesanan_order_new', $data);
        $this->load->view('static/footer');
    }

    public function gantt($nomor_pesanan)
    {
        $id = $this->session->userdata('id_user');
        $data['nomor_pesanan'] = $nomor_pesanan;

        $this->load->view('static/header_view');
        $this->load->view('pemesanan/pemesanan_gantt', $data);
        $this->load->view('static/footer_view');
    }

    public function gantt_view($nomor_pesanan)
    {
        $id = $this->session->userdata('id_user');
        $data['nomor_pesanan'] = $nomor_pesanan;

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

        $this->load->view('static/header');
        $this->load->view('pemesanan/pemesanan_form_order_new', $data);
        $this->load->view('static/footer');
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

    public function penjadwalan($qty, $perencanaan, $machine, $welding, $pengadaan, $quality, $packing, $distribusi)
    {
        $dateNow = date('Y-m-d');

        $lipat = 0;
        $lipatPengadaan = 1;
        $lipatQuality = 1;
        $lipatPacking = 1;
        $lipatDistribusi = 1;
        for ($i=0; $i < $qty ; $i+= 25) { 
            $lipat++;
            $lipatPengadaan = $lipatPengadaan + $pengadaan;
            $lipatQuality = $lipatQuality + $quality;
            $lipatPacking = $lipatPacking + $packing;
            $lipatDistribusi = $lipatDistribusi + $distribusi;
        }

        $perencanaan_bb_awal = $dateNow;
        $perencanaan_bb_lama = $perencanaan;
        $perencanaan_bb_akhir = date("Y-m-d", strtotime("$perencanaan_bb_awal +$perencanaan_bb_lama day"));

        $lamaPengadaan = $lipatPengadaan - 1;
        $pengadaan_bb_awal = $perencanaan_bb_akhir;
        $pengadaan_bb_akhir = date("Y-m-d", strtotime("$pengadaan_bb_awal +$lamaPengadaan day"));

        $lamaMachining = $lipat*$machine;
        $proses_machining_awal = $pengadaan_bb_akhir;
        $proses_machining_akhir = date("Y-m-d", strtotime("$proses_machining_awal +$lamaMachining day"));

        $lamaWelding = $lipat*$welding;
        $proses_welding_awal = $proses_machining_akhir;
        $proses_welding_akhir = date("Y-m-d", strtotime("$proses_welding_awal +$lamaWelding day"));

        $lamaQuality = $lipatQuality - 1;
        $quality_control_awal = $proses_welding_akhir;
        $quality_control_akhir = date("Y-m-d", strtotime("$quality_control_awal +$lamaQuality day"));

        $lamaPacking = $lipatPacking - 1;
        $packing_awal = $quality_control_akhir;
        $packing_akhir = date("Y-m-d", strtotime("$quality_control_akhir +$lamaPacking day"));

        $lamaDistribusi = $lipatDistribusi - 1;
        $distribusi_awal = $packing_akhir;
        $distribusi_akhir = date("Y-m-d", strtotime("$distribusi_awal +$lamaDistribusi day"));

        $data = array(  'dateNow'                   => $dateNow,
                        'start_pemesanan'           => $proses_machining_awal,
                        'jadwal_produksi'           => $proses_machining_awal,
                        'jadwal_distribusi'         => $distribusi_awal,
                        'delivery_pemesanan'        => $distribusi_awal,
                        'perencanaan_bb_lama'       => $perencanaan_bb_lama,
                        'perencanaan_bb_awal'       => $perencanaan_bb_awal,
                        'perencanaan_bb_akhir'      => $perencanaan_bb_akhir,
                        'pengadaan_bb_lama'         => $lamaPengadaan,
                        'pengadaan_bb_awal'         => $pengadaan_bb_awal,
                        'pengadaan_bb_akhir'        => $pengadaan_bb_akhir,
                        'machining_lama'            => $lamaMachining,
                        'machining_awal'            => $proses_machining_awal,
                        'machining_akhir'           => $proses_machining_akhir,
                        'welding_lama'              => $lamaWelding,
                        'welding_awal'              => $proses_welding_awal,
                        'welding_akhir'             => $proses_welding_akhir,
                        'quality_control_lama'      => $lamaQuality,
                        'quality_control_awal'      => $quality_control_awal,
                        'quality_control_akhir'     => $quality_control_akhir,
                        'packing_lama'              => $lamaPacking,
                        'packing_awal'              => $packing_awal,
                        'packing_akhir'             => $packing_akhir,
                        'distribusi_lama'           => $lamaDistribusi,
                        'distribusi_awal'           => $distribusi_awal,
                        'distribusi_akhir'          => $distribusi_akhir
                );

        return $data;
    }

    public function estimasi_harga($nama_produk, $qty)
    {
        $list_bb = $this->pemesanan->tampil_bb($nama_produk);
        $no = 1;
        $total_bb = 0;
        $total_harga_bb = 0;

        foreach($list_bb as $bb){ 
            $bb_qty = $bb->qty;
            $order_p = $qty;
            $total_bbQty = $bb_qty * $order_p;
            $harga_bb = $total_bbQty * $bb->harga;
            $total_bb = $total_bb +  $harga_bb;
            $total_harga_bb = $total_harga_bb +  $total_bb;
        }

        $potongan_total_harga_bb = (10/100)*$total_harga_bb;
        $total_biaya_estimasi = $total_harga_bb + $potongan_total_harga_bb;

        $estimasi_data = array( 'qty_bb' => $total_bb, 
                                'biaya_bb' => $total_harga_bb,
                                'potongan_bb' => $potongan_total_harga_bb, 
                                'total_biaya' => $total_biaya_estimasi
                                );
        return $estimasi_data;
    }

    public function testdata()
    {
        $dataEstimasi = $this->estimasi_harga('Conveyor', 60);
        echo "<pre>";
        print_r($dataEstimasi['total_biaya']);
        echo "<pre>";
    }

	public function proses_tambah()
    {
        //generate No Pembayaran
        $cek = $this->pelanggan->getPembayaran()->num_rows() + 1;
        $no_pembayaran = 'AC240' . $cek;
        $no_pesanan = 'T00' . $cek;
        $nama_produk = $this->input->post('nama_produk');
        $qty = $this->input->post('qty');

        switch ($nama_produk) {
            case 'Conveyor':

                 $perencanaan = 3;
                 $machine = 5;
                 $welding = 5;
                 $pengadaan = 1;
                 $quality = 2;
                 $packing = 1;
                 $distribusi = 4;

                 $proses_jadwal = $this->penjadwalan($qty, $perencanaan, $machine, $welding, $pengadaan, $quality, $packing, $distribusi);

            break;

            case 'Fish Feeder':

                 $perencanaan = 1;
                 $machine = 6;
                 $welding = 6;
                 $pengadaan = 3;
                 $quality = 1;
                 $packing = 1;
                 $distribusi = 6;

                 $proses_jadwal = $this->penjadwalan($qty, $perencanaan, $machine, $welding, $pengadaan, $quality, $packing, $distribusi);

                break;
            
            default:

                 $perencanaan = 3;
                 $machine = 5;
                 $welding = 5;
                 $pengadaan = 4;
                 $quality = 1;
                 $packing = 1;
                 $distribusi = 2;

                 $proses_jadwal = $this->penjadwalan($qty, $perencanaan, $machine, $welding, $pengadaan, $quality, $packing, $distribusi);

                break;
        }



        // echo "<pre>";
        // print_r($proses_jadwal);
        // echo "</pre>";
        $dataEstimasi = $this->estimasi_harga($nama_produk, $qty);

        $data = array(
            'nomor_pesanan' 	=> $no_pesanan,
            'id_pelanggan' 	    => $this->input->post('id_pelanggan'),
            'id_kategori' 		=> $this->input->post('id_kategori'),
            'nama_produk' 		=> $nama_produk,
            'qty' 				=> $qty,
            'tgl_pesan' 		=> $proses_jadwal['dateNow'],
            'lama_whelding'     => $proses_jadwal['machining_lama'],
            'lama_mashining'    => $proses_jadwal['welding_lama'],
            'id_status_pesan'   => 1,
            'id_proses' 		=> 7,
            'delivery_pemesanan'=> $proses_jadwal['delivery_pemesanan'],
            'jadwal_produksi'   => $proses_jadwal['jadwal_produksi'],
            'jadwal_distribusi' => $proses_jadwal['jadwal_distribusi'],
            'start_pemesanan'   => $proses_jadwal['start_pemesanan'],
            'total_pembayaran'  => $dataEstimasi['total_biaya']
        );
        $tambahpesanan = $this->pelanggan->tambahpesanan($data);

        $taskPerencanaan = array(
            'order_id'              => $no_pesanan,
            'name'                  => 'PERENCANAAN BAHAN BAKU',
            'start'                 => $proses_jadwal['perencanaan_bb_awal'],
            'end'                   => $proses_jadwal['perencanaan_bb_akhir'],
            'parent_id'             => null,
            'milestone'             => 0,
            'ordinal'               => 1,
            'ordinal_priority'      => $proses_jadwal['dateNow'],
            'complete'              => 100
        );

        $taskPengadaan = array(
            'order_id'              => $no_pesanan,
            'name'                  => 'PENGADAAN BAHAN BAKU',
            'start'                 => $proses_jadwal['pengadaan_bb_awal'],
            'end'                   => $proses_jadwal['pengadaan_bb_akhir'],
            'parent_id'             => null,
            'milestone'             => 0,
            'ordinal'               => 2,
            'ordinal_priority'      => $proses_jadwal['dateNow'],
            'complete'              => 100
        );

        $taskMachining = array(
            'order_id'              => $no_pesanan,
            'name'                  => 'PROSES MACHINING',
            'start'                 => $proses_jadwal['machining_awal'],
            'end'                   => $proses_jadwal['machining_akhir'],
            'parent_id'             => null,
            'milestone'             => 0,
            'ordinal'               => 3,
            'ordinal_priority'      => $proses_jadwal['dateNow'],
            'complete'              => 100
        );

        $taskWelding = array(
            'order_id'              => $no_pesanan,
            'name'                  => 'PROSES WELDING',
            'start'                 => $proses_jadwal['welding_awal'],
            'end'                   => $proses_jadwal['welding_akhir'],
            'parent_id'             => null,
            'milestone'             => 0,
            'ordinal'               => 4,
            'ordinal_priority'      => $proses_jadwal['dateNow'],
            'complete'              => 100
        );

        $taskQuality = array(
            'order_id'              => $no_pesanan,
            'name'                  => 'QUALITY CONTROL',
            'start'                 => $proses_jadwal['quality_control_awal'],
            'end'                   => $proses_jadwal['quality_control_akhir'],
            'parent_id'             => null,
            'milestone'             => 0,
            'ordinal'               => 5,
            'ordinal_priority'      => $proses_jadwal['dateNow'],
            'complete'              => 100
        );

        $taskPacking = array(
            'order_id'              => $no_pesanan,
            'name'                  => 'PACKING',
            'start'                 => $proses_jadwal['packing_awal'],
            'end'                   => $proses_jadwal['packing_akhir'],
            'parent_id'             => null,
            'milestone'             => 0,
            'ordinal'               => 6,
            'ordinal_priority'      => $proses_jadwal['dateNow'],
            'complete'              => 100
        );

        $taskDistribusi = array(
            'order_id'              => $no_pesanan,
            'name'                  => 'DISTRIBUSI',
            'start'                 => $proses_jadwal['distribusi_awal'],
            'end'                   => $proses_jadwal['distribusi_akhir'],
            'parent_id'             => null,
            'milestone'             => 0,
            'ordinal'               => 7,
            'ordinal_priority'      => $proses_jadwal['dateNow'],
            'complete'              => 100
        );

        $this->pemesanan->input_gantt($taskPerencanaan);
        $this->pemesanan->input_gantt($taskPengadaan);
        $this->pemesanan->input_gantt($taskMachining);
        $this->pemesanan->input_gantt($taskWelding);
        $this->pemesanan->input_gantt($taskQuality);
        $this->pemesanan->input_gantt($taskPacking);
        $this->pemesanan->input_gantt($taskDistribusi);

        $dataPembayaran = array(
            'nomor_pesanan' => $no_pesanan,
            'no_pembayaran' => $no_pembayaran,
            'status' => 1
        );
        $tambahpesanan = $this->pelanggan->insertPembayaran($dataPembayaran);

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
                'start_pemesanan'           => set_value('start_pemesanan', $row->start_pemesanan),
                'delivery_pemesanan'        => set_value('delivery_pemesanan', $row->delivery_pemesanan),
            );

            $this->load->view('static/header');
            $this->load->view('pemesanan/pemesanan_detail_order_new', $data);
            $this->load->view('static/footer');
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
                'start_pemesanan'           => set_value('start_pemesanan', $row->start_pemesanan),
                'delivery_pemesanan'        => set_value('delivery_pemesanan', $row->delivery_pemesanan),
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
                'start_pemesanan'           => set_value('start_pemesanan', $row->start_pemesanan),
                'delivery_pemesanan'        => set_value('delivery_pemesanan', $row->delivery_pemesanan),
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
                'start_pemesanan'           => set_value('start_pemesanan', $row->start_pemesanan),
                'delivery_pemesanan'        => set_value('delivery_pemesanan', $row->delivery_pemesanan),
                'jadwal_produksi'           => set_value('jadwal_produksi', $row->jadwal_produksi),
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

    function operasional_edit($id)
    {
        $row = $this->pemesanan->get_by_id($id);

        if ($row) {
            $data = array(
                'aksi'                      => 'Ubah',
                'action'                    => base_url('pemesanan/proses_operasionaledit'),
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
                'start_pemesanan'           => set_value('start_pemesanan', $row->start_pemesanan),
                'delivery_pemesanan'        => set_value('delivery_pemesanan', $row->delivery_pemesanan),
                'jadwal_distribusi'         => set_value('jadwal_distribusi', $row->jadwal_distribusi),
            );

            $this->load->view('static/header_view');
            $this->load->view('pemesanan/pemesanan_operasionaledit', $data);
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
            'start_pemesanan'       => $this->input->post('start_pemesanan'),
            'delivery_pemesanan'    => $this->input->post('delivery_pemesanan')
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
            'jadwal_produksi'       => $this->input->post('jadwal_produksi'),
            'lama_whelding'         => $this->input->post('lama_whelding'),
            'lama_mashining'        => $this->input->post('lama_mashining'),
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
        redirect (base_url().'pemesanan/produksi_edit/'.$id_pesanan);
    }

    function proses_pccedit()
    {
        $id_pesanan                 = $this->input->post('id_pesanan');
 
        $data = array(
            'hitung_waktu'       => $this->input->post('hitung_waktu'),
            'total_pembayaran'   => $this->input->post('total_pembayaran'),
            'id_proses'          => $this->input->post('id_proses'),
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

    function proses_operasionaledit()
    {
        $id_pesanan                 = $this->input->post('id_pesanan');
 
        $data = array(
            'id_proses'          => $this->input->post('id_proses'),
            'jadwal_distribusi'  => $this->input->post('jadwal_distribusi'),
        );

        $where = array('id_pesanan' => $id_pesanan);

        $this->pemesanan->update_data($where, $data);
        $this->session->set_flashdata('message1', '
            <div class="alert alert-info alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Berhasil <i class="glyphicon glyphicon-ok"></i></strong> Ubah data
            </div>
            ');
        redirect (base_url().'pemesanan/operasional_edit/'.$id_pesanan);
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