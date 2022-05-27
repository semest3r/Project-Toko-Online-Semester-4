<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_market extends CI_Model
{
    function __construct()
    {
        $this->barang = 'barang';
        $this->kategori = 'kategori';
        
    }
    //MODEL DATABASE UNTUK CONTROLLER Edit_produk
    //getMarketProduk digunakan untuk memanggil data table barang jika berdasarkan id row_array jikatidak result_array
    public function getMarketProduk($id = '')
    {   
        $this->db->select('*');
        $this->db->from($this->barang);
        if($id){
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('nama_barang', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    

    //Model_Checkout
    //MODEL DATABASE PADA CONTROLLER Checkout
    //simpanPembeli digunakan untuk menyimpan data yang diinput ke table pembeli
    public function simpanPembeli($data){
        
        // Insert customer data
        $insert = $this->db->insert('pembeli', $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }
    //insertOrder digunakan untuk menyimpan data transaksi pembelian ke table transaksi
    public function insertOrder($data){
        
        // Insert order data
        $insert = $this->db->insert('transaksi', $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }

    //InsertOrderItems digunakan untuk menyimpan data secara Batch yang di order pada system Checkout
    public function insertOrderItems($data = array()) {
        
        // Insert order items
        $insert = $this->db->insert_batch('checkout', $data);

        // Return the status
        return $insert?true:false;
    }
}

