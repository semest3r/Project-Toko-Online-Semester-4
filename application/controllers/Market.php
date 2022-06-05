<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Market extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/base_welcome/header');
		$this->load->view('market/welcome');
		$this->load->view('templates/base_welcome/footer');
	}

}