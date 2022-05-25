<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lpenjualan extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/base_dashboard/header');
		$this->load->view('templates/base_dashboard/sidebar');
		$this->load->view('templates/base_dashboard/topbar');
		$this->load->view('dashboard/laporan_penjualan');
		$this->load->view('templates/base_dashboard/footer');
	}
}