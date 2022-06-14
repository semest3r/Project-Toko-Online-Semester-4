<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_transaksi extends CI_Model
{
    //MODEL DATABASE PADA CONTROLLER Transaksi
    //getTransaksi digunakan untuk menampilkan data table join transaksi, pembeli, user dari table transaksi
    public function getTransaksi($limit, $start, $keyword = null)
    {
        $this->db->select('transaksi.id AS idtransaksi, user.name AS nama_user, pembeli.id AS idpembeli, pembeli.name AS nama_pembeli, pembeli.notelp AS notelp_pembeli, pembeli.email AS email_pembeli, pembeli.alamat AS alamat_pembeli, transaksi.status, transaksi.date`');
        $this->db->from('transaksi');
        $this->db->join('pembeli', 'pembeli.id = transaksi.id_pembeli', 'inner');
        $this->db->join('user', 'user.id = transaksi.id_user', 'inner');

        if ($keyword) {
            $this->db->like('pembeli.name', $keyword);
            $this->db->or_like('user.name', $keyword);
        }
        $this->db->order_by('transaksi.id', 'DESC');

        return $this->db->get('', $limit, $start)->result_array();
    }

    //terdapat pada function spreadsheet_export()
    //getAlltransaksi digunakan untuk menampilkan data table join transaksi, pembeli, dan user berdasarkan "id" dari table transaksi
    public function getAlltransaksi()
    {
        $this->db->select('transaksi.id AS idtransaksi, user.name AS nama_user, pembeli.id AS idpembeli, pembeli.name AS nama_pembeli, pembeli.notelp AS notelp_pembeli, pembeli.email AS email_pembeli, pembeli.alamat AS alamat_pembeli, transaksi.status, transaksi.total_harga');
        $this->db->from('transaksi');
        $this->db->join('pembeli', 'pembeli.id = transaksi.id_pembeli', 'inner');
        $this->db->join('user', 'user.id = transaksi.id_user', 'inner');
        return $this->db->get('')->result_array();
    }

    //MODEL DATABASE PADA CONTROLLER Edit_transaksi
    //getDetailCheckout digunakan untuk menampilkan data table join checkout dan barang berdasarkan "id" dari table checkout
    public function getDetailCheckout($where)
    {
        $this->db->select('checkout.id, barang.nama_barang, barang.harga, barang.image, checkout.total_barang, checkout.total_harga_barang');
        $this->db->from('checkout');
        $this->db->join('barang', 'barang.id = checkout.id_barang', 'inner');
        return $this->db->get_where('', $where)->result_array();
    }
    //getDetailTransaksi digunakan untuk menampilkan data table join transaksi, pembeli, dan user berdasarkan "id" dari table transaksi
    public function getDetailTransaksi($where)
    {
        $this->db->select('transaksi.id AS idtransaksi, user.name AS nama_user, pembeli.id AS idpembeli, pembeli.name AS nama_pembeli, pembeli.notelp AS notelp_pembeli, pembeli.email AS email_pembeli, pembeli.alamat AS alamat_pembeli, transaksi.status, transaksi.date');
        $this->db->from('transaksi');
        $this->db->join('pembeli', 'pembeli.id = transaksi.id_pembeli', 'inner');
        $this->db->join('user', 'user.id = transaksi.id_user', 'inner');
        return $this->db->get_where('', $where)->result_array();
    }
    //getUser digunakan untuk menapilkan data table user
    public function getUser()
    {
        return $this->db->get('user')->result_array();
    }
    //updateTransaksi digunakan untuk menampilkan data table join transaksi, pembeli, dan user berdasarkan "id" dari table transaksi
    public function updateTransaksi($data = null, $where = null)
    {
        $this->db->select('transaksi.id AS idtransaksi, user.name AS nama_user, pembeli.id AS idpembeli, pembeli.name AS nama_pembeli, pembeli.notelp AS notelp_pembeli, pembeli.email AS email_pembeli, pembeli.alamat AS alamat_pembeli, transaksi.status transaksi.date');
        $this->db->from('transaksi');
        $this->db->join('pembeli', 'pembeli.id = transaksi.id_pembeli', 'inner');
        $this->db->join('user', 'user.id = transaksi.id_user', 'inner');
        $this->db->update('transaksi', $data, $where);
    }

    //downloadTransaksi digunakan mendownload data pembeli


}
