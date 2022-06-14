<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_market extends CI_Model
{
    function __construct()
    {
        $this->barang = 'barang';
        $this->kategori = 'kategori';
    }
    //MODEL DATABASE UNTUK CONTROLLER Market
    //getMarketProduk digunakan untuk memanggil data table barang jika berdasarkan id row_array jikatidak result_array
    public function getMarketProduk($id = '')
    {
        $this->db->select('*');
        $this->db->from($this->barang);
        if ($id) {
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $this->db->order_by('nama_barang', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result) ? $result : false;
    }


    //Model_Checkout
    //MODEL DATABASE PADA CONTROLLER Checkout
    //simpanPembeli digunakan untuk menyimpan data yang diinput ke table pembeli
    public function simpanPembeli($data)
    {
        if (!array_key_exists("date", $data)) {
            $date = date_create("", timezone_open("Asia/Bangkok"));
            $data['date'] = date_format($date, "Y-m-d H:i:s");
        }
        // Insert customer data
        $insert = $this->db->insert('pembeli', $data);

        // Return the status
        return $insert ? $this->db->insert_id() : false;
    }
    //insertOrder digunakan untuk menyimpan data transaksi pembelian ke table transaksi
    public function insertOrder($data)
    {
        if (!array_key_exists("date", $data)) {
            $date = date_create("", timezone_open("Asia/Bangkok"));
            $data['date'] = date_format($date, "Y-m-d H:i:s");
        }
        // Insert order data
        $insert = $this->db->insert('transaksi', $data);

        // Return the status
        return $insert ? $this->db->insert_id() : false;
    }

    //InsertOrderItems digunakan untuk menyimpan data secara Batch yang di order pada system Checkout
    public function insertOrderItems($data = array())
    {

        // Insert order items
        $insert = $this->db->insert_batch('checkout', $data);

        // Return the status
        return $insert ? true : false;
    }

    public function getOrder($id){
        $this->db->select('transaksi.*, pembeli.name, pembeli.email, pembeli.notelp, pembeli.alamat');
        $this->db->from('transaksi');
        $this->db->join('pembeli', 'pembeli.id = transaksi.id_pembeli', 'left');
        $this->db->where('transaksi.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        // Get order items
        $this->db->select('checkout.*, barang.nama_barang');
        $this->db->from('checkout');
        $this->db->join('barang', 'barang.id = checkout.id_barang', 'left');
        $this->db->where('checkout.id_transaksi', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        // Return fetched data
        return !empty($result)?$result:false;
    }

    public function getKurir()
    {
        return $this->db->get('kurir')->result_array();
    }

    //MODEL DATABASE PADA CONTROLLER Edit_transaksi
    //getTransaksiSukses 
    public function getTransaksiSukses($id)
    {
        $this->db->select('pembeli.*, transaksi.*');
        $this->db->from('transaksi');
        $this->db->join('pembeli', 'pembeli.id = transaksi.id_pembeli');
        $this->db->where('pembeli.id', $id);
        return $this->db->get('')->row_array();
    }

    public function getKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function getBarang($id)
    {
        $this->db->select('barang.*, kategori.*');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id = barang.id_kategori', 'inner');
        return $this->db->get_where('', $id)->result_array();
    }
}
