<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentikasi extends CI_Controller {

	public function index()
	{
		$this->load->view('dashboard/laporan_penjualan');
	}
}