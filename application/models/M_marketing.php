<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_marketing extends CI_Model
{
    public function cekLogin($data)
    {

        return $this->db->get_where('user', $data);
    }

    public function getPesanann()
    {
        $this->db->select('pesanan.*, kategori.*, pembayaran.*, status_bayar.*');
        $this->db->from('pesanan');
        $this->db->join('kategori', 'ON kategori.id_kategori = pesanan.id_kategori');
        $this->db->join('pembayaran', 'ON pembayaran.nomor_pesanan = pesanan.nomor_pesanan');
        $this->db->join('status_bayar', 'ON status_bayar.id_status_bayar = pembayaran.status');
        return $this->db->get();
    }

    public function getPesanan($id)
    {
        $this->db->select('pesanan.*, kategori.*, status_proses.*');
        $this->db->from('pesanan');
        $this->db->join('kategori', 'ON kategori.id_kategori = pesanan.id_kategori');
        $this->db->join('status_proses', 'ON status_proses.id_proses = pesanan.id_proses');
        $this->db->where('id_pesanan', $id);
        return $this->db->get();
    }

    public function insertGunchart($nama, $no)
    {
        $data  = array(
            'gunchart' => $nama
        );
        $this->db->where('id_pesanan', $no);
        return $this->db->update('pesanan', $data);
    }


    // public function getEstimasi()
    // {
    //     // , status_proses.id_proses, status_proses.nama_status_proses, user.id_user, user.username, hitung_waktu, harga, lama_welding, lama_machining
    //     $this->db->select('id_pesanan,nama_pelanggan, kategori.id_kategori,kategori.nama_kategori, alamat, no_hp, nama_produk, qty, tgl_pesan, status_pesan.id_status_pesan, status_pesan.nama_status_pesan, status_bayar.id_status_bayar, status_bayar.nama_status_bayar, hitung_waktu, harga, lama_whelding, lama_mashining');
    //     $this->db->from('pesanan');
    //     $this->db->join('kategori', 'ON kategori.id_kategori = pesanan.id_kategori');
    //     $this->db->join('status_pesan', 'ON status_pesan.id_status_pesan = pesanan.id_status_pesan');
    //     $this->db->join('status_bayar', 'ON status_bayar.id_status_bayar = pesanan.id_status_bayar');
    //     $where = "harga is  NOT NULL AND hitung_waktu is NOT NULL";
    //     $this->db->where($where);
    //     return $this->db->get();
    // }
    
    public function editpesanan($data, $id)
    {
        $this->db->where('id_pesanan', $id);
        return $this->db->update('pesanan', $data);
    }

    public function getKonfirmasiPembayaran()
    {
        $this->db->select('pembayaran.*, pesanan.*');
        $this->db->from('pembayaran');
        $this->db->join('pesanan', 'ON pesanan.nomor_pesanan = pembayaran.nomor_pesanan');
        $this->db->where('status', 1);
        return $this->db->get();
    }

    public function updatePembayaran($id)
    {
        $data = array(
            'status' => 2
        );
        $this->db->where('id_pembayaran', $id);
        return $this->db->update('pembayaran', $data);
    }
}