<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lpenjualan extends CI_Controller {

	public function index()
	{
		$data['laporan_penjualan'] = $this->Model_Lpenjualan->getPenjualan();
		$this->load->view('templates/base_dashboard/header');
		$this->load->view('templates/base_dashboard/sidebar');
		$this->load->view('templates/base_dashboard/topbar');
		$this->load->view('dashboard/laporan_penjualan', $data);
		$this->load->view('templates/base_dashboard/footer');
	}

	function detail()
	{
		$data['checkout'] = $this->Model_Lpenjualan->getDetailPenjualan(['date' => $this->uri->segment(3)]);

		$this->load->view('templates/base_dashboard/header');
		$this->load->view('templates/base_dashboard/sidebar');
		$this->load->view('templates/base_dashboard/topbar');
		$this->load->view('dashboard/detail_Lpenjualan', $data);
		$this->load->view('templates/base_dashboard/footer');
	}

	function simpanPenjualan()
	{
		$data = [
			'id_user' => $this->session->userdata('id_user'),
			'deskripsi' => $this->input->post('deskripsi'),
			'banyak_transaksi' => $this->input->post('banyak_transaksi'),
			'total_pemasukan' => $this->input->post('total_pemasukan'),
		];

		$this->Model_Lpenjualan->simpanPenjualan($data);
		redirect('Lpenjualan');
	}

}