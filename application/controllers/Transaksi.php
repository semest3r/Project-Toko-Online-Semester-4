<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Transaksi extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        cek_login();
    }

	public function index()
	{
		$this->load->model('Model_transaksi', 'transaksi');
		$this->load->library('pagination');


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

		$config['base_url'] = 'http://localhost/tailwind/Transaksi/index';
		$config['num_links'] = 5;

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

	public function spreadsheet_export()
	{
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="product.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Nama Barang');
		$sheet->setCellValue('B1', 'Approver');
		$sheet->setCellValue('C1', 'Total Transaksi');
		$transaksi = $this->Model_transaksi->getAlltransaksi();
		$a = 2;
		foreach ($transaksi as $t) {
			$sheet->setCellValue('A' . $a, $t['nama_pembeli']);
			$sheet->setCellValue('B' . $a, $t['nama_user']);
			$sheet->setCellValue('C' . $a, $t['total_harga']);
			$a++;
		}

		$write = new Xlsx($spreadsheet);
		$write->save("php://output");
		redirect('Transaksi');
	}
	public function pdfDownload()
	{
		$data = array();
        $data['transaksi'] = $this->Model_transaksi->getDetailTransaksi(['transaksi.id' => $this->uri->segment(4)]);
		$data['checkout'] = $this->Model_transaksi->getDetailCheckout(['id_transaksi' => $this->uri->segment(4)]);
		$this->load->view('user_list', $data);
        $html = $this->output->get_output();
        $this->load->library('pdf');
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'landscape');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment" => 0));
	}
}
