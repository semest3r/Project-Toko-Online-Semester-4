<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/base_market/header');
		$this->load->view('templates/base_market/sidebar');
		$this->load->view('templates/base_market/topbar');
		$this->load->view('market/welcome');
		$this->load->view('templates/base_market/footer');
	}

}