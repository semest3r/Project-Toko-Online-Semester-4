<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_market extends CI_Model
{
    function __construct()
    {
        $this->barang = 'barang';
        $this->kategori = 'kategori';
        
    }
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
    
    public function getKategoriById($where)
    {
        return $this->db->get_where('kategori', $where);
    }

    //Model_Checkout
    public function simpanPembeli($data){
        
        // Insert customer data
        $insert = $this->db->insert('pembeli', $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }

    public function insertOrder($data){
        
        // Insert order data
        $insert = $this->db->insert('transaksi', $data);

        // Return the status
        return $insert?$this->db->insert_id():false;
    }

    //Model Simpan Barang Batch yang di order pada system Checkout
    public function insertOrderItems($data = array()) {
        
        // Insert order items
        $insert = $this->db->insert_batch('checkout', $data);

        // Return the status
        return $insert?true:false;
    }

    public function getBarangById($where)
    {
        return $this->db->get_where('kategori', $where);
    }

    public function updateBarang($data = null, $where = null)
    {
        $this->db->update('barang', $data, $where);
    }
}

