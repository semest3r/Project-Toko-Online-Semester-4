<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_produk extends CI_Model
{
    public function getBarang($limit, $start, $keyword = null)
    {
        $this->db->select('barang.id , barang.nama_barang, barang.harga, barang.stock, barang.id_kategori, kategori.nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori', 'inner');
        if ($keyword){
            $this->db->like('nama_barang', $keyword);
            $this->db->or_like('nama_kategori', $keyword);
        }
        $this->db->order_by('id');

        return $this->db->get('', $limit, $start)->result_array();
    }

    public function getDetailBarang($where)
    {
        $this->db->select('barang.id , barang.nama_barang, barang.harga, barang.stock, kategori.nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori', 'inner');
        return $this->db->get_where('', $where)->result_array();
    }

    public function getAllbarang()
    {
        return $this->db->get('barang')->result_array();
    }

    public function countAllbarang()
    {
        return $this->db->get('barang')->num_rows();

    }

    //menyimpan data ke database
    public function simpanBarang($data = null)
    {
        $this->db->insert('barang', $data);
    }

    

    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getKategoriById($where)
    {
        return $this->db->get_where('kategori', $where);
    }

    public function updateBarang($data = null, $where = null)
    {
        $this->db->update('barang', $data, $where);
    }

}
