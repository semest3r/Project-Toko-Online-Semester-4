<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH . 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Produk extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        cek_login();
    }

	public function index()
	{
		//$data['barang'] = $this->Model_produk->getBarang()->result_array();
		$this->load->model('Model_produk', 'barang');

		//load library
		$this->load->library('pagination');

		// get data keyword 
		if ($this->input->post('submit')) {
			$data['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $data['keyword']);
		} else {
			$data['keyword'] = $this->session->userdata('keyword');
		}


		// config Search Keyword
		$this->db->select('barang.id , barang.nama_barang, barang.harga, barang.stock, barang.id_kategori, kategori.nama_kategori');
		$this->db->join('kategori', 'kategori.id = barang.id_kategori', 'inner');
		$this->db->like('nama_barang', $data['keyword']);
		$this->db->or_like('nama_kategori', $data['keyword']);
		$this->db->from('barang');

		//config pagination
		$config['base_url'] = 'http://localhost/tailwind/Produk/index';
		$config['num_links'] = 5;

		$config['total_rows'] = $this->db->count_all_results();
		$data['total_rows'] = $config['total_rows'];
		$config['per_page'] = 10;

		// initialize pagination
		$this->pagination->initialize($config);

		$data['starts'] = $this->uri->segment(3);
		$data['barang'] = $this->barang->getBarang($config['per_page'], $data['starts'], $data['keyword']);
		//$data['kategori'] = $this->kategori->getKategori();

		$this->load->view('templates/base_dashboard/header');
		$this->load->view('templates/base_dashboard/sidebar');
		$this->load->view('templates/base_dashboard/topbar');
		$this->load->view('dashboard/produk', $data);
		$this->load->view('templates/base_dashboard/footer');
	}
	public function spreadsheet_export()
	{


		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="product.xlsx"');
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Nama Barang');
		$sheet->setCellValue('B1', 'Stock');
		$barang = $this->Model_produk->getAllbarang();
		$a = 2;
		foreach ($barang as $b) {
			$sheet->setCellValue('A' . $a, $b['nama_barang']);
			$sheet->setCellValue('B' . $a, $b['stock']);
			$a++;
		}

		$write = new Xlsx($spreadsheet);
		$write->save("php://output");
	}

	//Function untuk menampilkan halaman Kategori
	public function Kategori()
	{
		$data['kategori'] = $this->Model_produk->getKategori();

		$this->load->view('templates/base_dashboard/header');
		$this->load->view('templates/base_dashboard/sidebar');
		$this->load->view('templates/base_dashboard/topbar');
		$this->load->view('dashboard/kategori', $data);
		$this->load->view('templates/base_dashboard/footer');
	}

	public function CreateKategori()
	{
		$data = [
			'nama_kategori' => $this->input->post('nama_kategori', true)
		];
		$this->Model_produk->createKategori($data);
		redirect('Produk/Kategori');
	}


	public function hapusKategori($where)
	{
		$data['kategori'] = $this->Model_produk->hapusKategori($where);
		redirect('Produk/Kategori');
	}

	//Controller function untuk halaman Kurir
	public function Kurir()
	{
		$data['kurir'] = $this->Model_produk->getKurir();

		$this->load->view('templates/base_dashboard/header');
		$this->load->view('templates/base_dashboard/sidebar');
		$this->load->view('templates/base_dashboard/topbar');
		$this->load->view('dashboard/kurir', $data);
		$this->load->view('templates/base_dashboard/footer');
	}
	public function CreateKurir()
	{
		$data = [
			'nama_kurir' => $this->input->post('nama_kurir', true),
			'kode_kurir' => $this->input->post('kode_kurir', true),
		];
		$this->Model_produk->createKurir($data);
		redirect('Produk/Kurir');
	}


	public function hapusKurir($where)
	{
		$data['kurir'] = $this->Model_produk->hapusKurir($where);
		redirect('Produk/Kurir');
	}
}
