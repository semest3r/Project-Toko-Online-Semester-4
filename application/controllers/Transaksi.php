<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function index()
	{
		$this->load->model('Model_transaksi', 'transaksi');

		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}

		// config pagination
        $this->db->select('transaksi.id, user.name, pembeli.id, pembeli.name, pembeli.notelp, pembeli.email, pembeli.alamat');
        $this->db->join('pembeli', 'pembeli.id = transaksi.id_pembeli', 'inner');
        $this->db->join('user', 'user.id = transaksi.id_user', 'inner');
		$this->db->like('pembeli.name', $data['keyword']);
		$this->db->or_like('user.name', $data['keyword']);
		$this->db->from('transaksi');
		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$data['starts'] = $this->uri->segment(3);
		$data['transaksi'] = $this->transaksi->getTransaksi($config['per_page'], $data['starts'], $data['keyword']);
		$this->load->view('templates/base_dashboard/header');
		$this->load->view('templates/base_dashboard/sidebar');
		$this->load->view('templates/base_dashboard/topbar');
		$this->load->view('dashboard/transaksi', $data);
		$this->load->view('templates/base_dashboard/footer');
	}
}
