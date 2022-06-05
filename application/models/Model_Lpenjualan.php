<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Model_Lpenjualan extends CI_Model
{
    public function getPenjualanByDate($where)
    {
            return $this->db->get_where('user', $where);
    }

    public function getPenjualan()
    {
        $this->db->select('user.*, laporan_penjualan.*');
        $this->db->from('laporan_penjualan');
        $this->db->join('user', 'user.id = laporan_penjualan.id_user');
        return $this->db->get('')->result_array();
    }

    public function getDetailPenjualan($where)
    {
        $this->db->select('barang.nama_barang, checkout.date');
        $this->db->select_sum('checkout.total_barang', 'penjualan');
        $this->db->from('checkout');
        $this->db->join('barang', 'barang.id = checkout.id_barang', 'inner');
        $this->db->group_by('nama_barang');
        return $this->db->get_where('', $where)->result_array();
    }
    public function simpanPenjualan($data = null)
    {
        $this->db->insert('laporan_penjualan', $data);
    }

    public function getMonth()
    {
        $this->db->select('laporan_penjualan.*');
        $this->db->select('MONTH(date) as bulan');
        $this->db->from('laporan_penjualan');
        $this->db->group_by('bulan');
        return $this->db->get('')->result_array();
    }
}