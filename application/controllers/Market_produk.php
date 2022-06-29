<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Market_produk extends CI_Controller
{

	public function index()
	{
		$data['barang'] = $this->Model_market->getMarketProduk();
		$data['kategori'] = $this->Model_market->getKategori();

		$this->load->view('templates/base_market/header');
		$this->load->view('templates/base_market/sidebar', $data);
		$this->load->view('templates/base_market/topbar');
		$this->load->view('market/market_produk', $data);
		$this->load->view('templates/base_market/footer');
	}

	public function addToCart($barangID)
	{
		$barang = $this->Model_market->getMarketProduk($barangID);
		$data = array(
			'id' => $barang['id_barang'],
			'qty' => 1,
			'name' => $barang['nama_barang'],
			'price' => $barang['harga'],
		);

		$this->cart->insert($data);
		redirect('market_produk');
		
	}

	public function kategori()
	{
		$data['kategori'] = $this->Model_market->getKategori();
		$data['barang'] = $this->Model_market->getBarang(['id_kategori' => $this->uri->segment(4)]);
		$this->load->view('templates/base_market/header');
		$this->load->view('templates/base_market/sidebar', $data);
		$this->load->view('templates/base_market/topbar');
		$this->load->view('market/market_ktg_produk', $data);
		$this->load->view('templates/base_market/footer');
	}
}
