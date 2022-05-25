<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_transaksi extends CI_Model
{
    public function getTransaksi($limit, $start, $keyword = null)
    {
        $this->db->select('transaksi.id AS idtransaksi, user.name AS nama_user, pembeli.id AS idpembeli, pembeli.name AS nama_pembeli, pembeli.notelp AS notelp_pembeli, pembeli.email AS email_pembeli, pembeli.alamat AS alamat_pembeli, transaksi.status');
        $this->db->from('transaksi');
        $this->db->join('pembeli', 'pembeli.id = transaksi.id_pembeli', 'inner');
        $this->db->join('user', 'user.id = transaksi.id_user', 'inner');

        if ($keyword){
            $this->db->like('pembeli.name', $keyword);
            $this->db->or_like('user.name', $keyword);
        }
        $this->db->order_by('transaksi.id');

        return $this->db->get('', $limit, $start)->result_array();
    }

    public function getDetailTransaksi($where)
    {
        $this->db->select('transaksi.id AS idtransaksi, user.name AS nama_user, pembeli.id AS idpembeli, pembeli.name AS nama_pembeli, pembeli.notelp AS notelp_pembeli, pembeli.email AS email_pembeli, pembeli.alamat AS alamat_pembeli, transaksi.status');
        $this->db->from('transaksi');
        $this->db->join('pembeli', 'pembeli.id = transaksi.id_pembeli', 'inner');
        $this->db->join('user', 'user.id = transaksi.id_user', 'inner');
        return $this->db->get_where('', $where)->result_array();
    }

    public function getDetailCheckout($where)
    {   
        $this->db->select('checkout.id, barang.nama_barang, barang.harga, checkout.total_barang, checkout.total_harga_barang');
        $this->db->from('checkout');
        $this->db->join('barang', 'barang.id = checkout.id_barang', 'inner');
        return $this->db->get_where('', $where)->result_array();
    }

    public function getUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function updateTransaksi($data = null, $where = null)
    {
        $this->db->select('transaksi.id AS idtransaksi, user.name AS nama_user, pembeli.id AS idpembeli, pembeli.name AS nama_pembeli, pembeli.notelp AS notelp_pembeli, pembeli.email AS email_pembeli, pembeli.alamat AS alamat_pembeli, transaksi.status');
        $this->db->from('transaksi');
        $this->db->join('pembeli', 'pembeli.id = transaksi.id_pembeli', 'inner');
        $this->db->join('user', 'user.id = transaksi.id_user', 'inner');
        $this->db->update('transaksi', $data, $where);
    }

}
