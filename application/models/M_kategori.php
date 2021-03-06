<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	var $table 			= 'kategori';
	var $primary_key 	= 'id_kategori';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function tampil_data()
	{
        $this->db->from($this->table);
        $this->db->order_by("id_kategori", "DESC");
        $query = $this->db->get();
		return $query->result();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where($this->primary_key, $id);
		$query = $this->db->get();
		return $query->row();
	}

	function input_data($data){
		$this->db->insert($this->table,$data);
	}

	function update_data($where,$data){
		$this->db->where($where);
		$this->db->update($this->table,$data);
	}

	function hapus_data($where){
		$this->db->where($where);
		$this->db->delete($this->table);
	}

	function cek($where,$table){		
		return $this->db->get_where($table,$where);
	}

}

/* End of file M_pemesanan.php */
/* Location: ./application/models/M_pemesanan.php */