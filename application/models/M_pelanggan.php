<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelanggan extends CI_Model
{
    public function getKategori()
    {
        return $this->db->get('kategori');
    }

    public function tambahpesanan($data)
    {
        return $this->db->insert('pesanan', $data);
    }

    public function getPembayaran()
    {
        return $this->db->get('pembayaran');
    }

    public function insertPembayaran($data)
    {
        return $this->db->insert('pembayaran', $data);
    }

    public function getPembayaranWhere($kode)
    {
        $this->db->where('no_pembayaran', $kode);
        return $this->db->get('pembayaran');
    }

    public function cekKonfirmasi($nomor)
    {
        $this->db->where('nomor_pesanan', $nomor);
        return $this->db->get('pesanan');
    }

    public function insertBukti($nama, $no)
    {
        $data  = array(
            'bukti' => $nama,
            'status' => 1
        );
        $this->db->where('no_pembayaran', $no);
        return $this->db->update('pembayaran', $data);
    }

    public function updateproses($proses, $tes)
    {
        $this->db->where('nomor_pesanan', $tes);
        return $this->db->update('pesanan', $proses);
    }
}