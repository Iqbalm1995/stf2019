<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemesanan extends CI_Model {

	var $table 			= 'pesanan';
	var $primary_key 	= 'id_pesanan';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function tampil_data_order($id)
	{
		$this->db->select('pesanan.*, pelanggan.*, kategori.*, status_proses.*, status_pesan.*');
        $this->db->from($this->table);
        $this->db->join('pelanggan', 'ON pelanggan.id_pelanggan = pesanan.id_pelanggan');
        $this->db->join('kategori', 'ON kategori.id_kategori = pesanan.id_kategori');
        $this->db->join('status_proses', 'ON status_proses.id_proses = pesanan.id_proses');
        $this->db->join('status_pesan', 'ON status_pesan.id_status_pesan = pesanan.id_status_pesan');
        $this->db->where("pesanan.id_pelanggan", $id);
        $this->db->order_by("pesanan.id_pesanan", "DESC");
        $query = $this->db->get();
		return $query->result();
	}

	public function tampil_data()
	{
		$this->db->select('pesanan.*, pelanggan.*, kategori.*, status_proses.*, status_pesan.*');
        $this->db->from($this->table);
        $this->db->join('pelanggan', 'ON pelanggan.id_pelanggan = pesanan.id_pelanggan');
        $this->db->join('kategori', 'ON kategori.id_kategori = pesanan.id_kategori');
        $this->db->join('status_proses', 'ON status_proses.id_proses = pesanan.id_proses');
        $this->db->join('status_pesan', 'ON status_pesan.id_status_pesan = pesanan.id_status_pesan');
        $this->db->order_by("pesanan.id_pesanan", "DESC");
        $query = $this->db->get();
		return $query->result();
	}

	public function tampil_bahan_baku($id)
	{
        $this->db->from('bahan_baku');
        $this->db->where("id_pesanan", $id);
        $this->db->order_by("id_bahan_baku", "ASC");
        $query = $this->db->get();
		return $query->result();
	}

	public function tampil_produk()
	{
        $this->db->from('ket_bahan_baku');
        $this->db->order_by("id_ket_bb", "ASC");
        $query = $this->db->get();
		return $query->result();
	}

	public function tampil_bb($param)
	{
		$this->db->select('ket_bahan_baku.*, data_bahan_baku.*');
        $this->db->from('data_bahan_baku');
        $this->db->join('ket_bahan_baku', 'ON data_bahan_baku.id_ket_bb = ket_bahan_baku.id_ket_bb');
        $this->db->where("keterangan", $param);
        $this->db->order_by("data_bahan_baku.jenis", "DESC");
        $query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($id)
	{	$this->db->select('pesanan.*, pelanggan.*, kategori.*, status_proses.*, status_pesan.*');
        $this->db->from($this->table);
        $this->db->join('pelanggan', 'ON pelanggan.id_pelanggan = pesanan.id_pelanggan');
        $this->db->join('kategori', 'ON kategori.id_kategori = pesanan.id_kategori');
        $this->db->join('status_proses', 'ON status_proses.id_proses = pesanan.id_proses');
        $this->db->join('status_pesan', 'ON status_pesan.id_status_pesan = pesanan.id_status_pesan');
		$this->db->where("pesanan.id_pesanan", $id);
		$query = $this->db->get();
		return $query->row();
	}

	function input_data($data){
		$this->db->insert($this->table,$data);
	}

	function input_gantt($data){
		$this->db->insert('task',$data);
	}

	function input_data_bb($data){
		$this->db->insert('bahan_baku',$data);
	}

	function update_data($where,$data){
		$this->db->where($where);
		$this->db->update($this->table,$data);
	}

	function upload_pembayaran($where,$data){
		$this->db->where($where);
		$this->db->update('pembayaran', $data);
	}

	function hapus_data($where){
		$this->db->where($where);
		$this->db->delete($this->table);
	}

	function hapus_data_bb($where){
		$this->db->where($where);
		$this->db->delete('bahan_baku');
	}

	function cek($where,$table){		
		return $this->db->get_where($table,$where);
	}

	function getPembayaran($nomor_pesanan)
	{
		$this->db->select('pesanan.*, pembayaran.*, status_bayar.*');
        $this->db->from('pesanan');
        $this->db->join('pembayaran', 'ON pembayaran.nomor_pesanan = pesanan.nomor_pesanan');
        $this->db->join('status_bayar', 'ON status_bayar.id_status_bayar = pembayaran.status');
		$this->db->where("pesanan.nomor_pesanan", $nomor_pesanan);
		$query = $this->db->get();
		return $query->row();
	}

}

/* End of file M_pemesanan.php */
/* Location: ./application/models/M_pemesanan.php */