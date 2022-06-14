<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Lpenjualan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
	}


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

	public function spreadsheet_export()
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename="laporan_penjualan.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('B2', 'Nama Barang');
		$sheet->setCellValue('C2', 'Jumlah');
		$a = 3;
		$checkout = $this->Model_Lpenjualan->getDetailPenjualan(['date' => $this->uri->segment(3)]);
		foreach ($checkout as $c) {
			$sheet->setCellValue('B' . $a, $c['nama_barang']);
			$sheet->setCellValue('C' . $a, $c['penjualan']);
			$a++;
		}
		$write = new Xlsx($spreadsheet);
		$write->save("php://output");
		redirect('Lpenjualan');
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

	function delete($where)
	{
		$data['laporan_penjualan'] = $this->Model_Lpenjualan->deleteLP($where);
		redirect('Lpenjualan');
	}
}
