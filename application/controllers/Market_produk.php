<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market_produk extends CI_Controller {

	public function index()
	{
		$data['barang'] = $this->Model_market->getMarketProduk();

		$this->load->view('templates/base_market/header');
		$this->load->view('templates/base_market/sidebar');
		$this->load->view('templates/base_market/topbar');
		$this->load->view('market/market_produk', $data);
		$this->load->view('templates/base_market/footer');
	}

	public function addToCart($barangID)
	{
		$barang = $this->Model_market->getMarketProduk($barangID);
		$data = array(
			'id' => $barang['id'],
			'qty' => 1,
			'name' => $barang['nama_barang'],
			'price' => $barang['harga'],
		);

		$this->cart->insert($data);

		redirect('Market_produk');
		
	}
}