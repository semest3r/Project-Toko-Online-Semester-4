<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_produk extends CI_Model
{
    //MODEL DATABASE UNTUK CONTROLLER PRODUK
    //getBarang untuk memanggil table join barang dan kategori dari table barang
    public function getBarang($limit, $start, $keyword = null)
    {
        $this->db->select('barang.id , barang.nama_barang, barang.harga, barang.stock, barang.id_kategori, barang.image, kategori.nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori', 'inner');
        if ($keyword){
            $this->db->like('nama_barang', $keyword);
            $this->db->or_like('nama_kategori', $keyword);
        }
        return $this->db->get('', $limit, $start)->result_array();
    }
    

    //getAllbarang digunakan untuk memanggil data pada table barang ada pada function Spreadsheet
    public function getAllbarang()
    {
        return $this->db->get('barang')->result_array();
    }
    //hapusBarang digunakan untuk menghapus data barang berdasarkan "id" pada table barang
    public function hapusBarang($where)
    {
        $this->db->where('id', $where);
        $this->db->delete('barang');
    }


    //MODEL DATABASE UNTUK CONTROLLER Update_Produk
    //getDetailBarang digunakan untuk memanggil data table join barang dan kategori dari table barang
    //berdasarkan "id"
    public function getDetailBarang($where)
    {
        $this->db->select('barang.id , barang.nama_barang, barang.harga, barang.stock, barang.image, kategori.nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori', 'inner');
        return $this->db->get_where('', $where)->result_array();
    }
    //simpanBarang digunakan untuk menyimpan data yang di input ke table barang
    public function simpanBarang($data = null)
    {
        $this->db->insert('barang', $data);
    }



    //MODEL DATABASE UNTUK CONTROLLER Edit_produk
    //updateBarang digunakan untuk mengubah data pada table barang
    public function updateBarang($data = null, $where = null)
    {
        $this->db->update('barang', $data, $where);
    }

    //MODEL DATABASE UNTUK CONTROLLER PRODUK/KATEGORI
    //getKategori digunakan untuk memanggil data pada table kategori
    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }
    
    public function createKategori($data = null)
    {
        $this->db->insert('kategori', $data);
    }
    public function hapusKategori($where)
    {
        $this->db->where('id', $where);
        $this->db->delete('kategori');
    }

    //MODEL DATABASE UNTUK CONTROLLER PRODUK/Kurir
    //getKategori digunakan untuk memanggil data pada table kategori
    public function getKurir()
    {
        return $this->db->get('kurir')->result_array();
    }
    
    public function createKurir($data = null)
    {
        $this->db->insert('kurir', $data);
    }
    public function hapusKurir($where)
    {
        $this->db->where('id', $where);
        $this->db->delete('kurir');
    }
}
