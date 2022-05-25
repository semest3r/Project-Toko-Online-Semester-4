<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_produk extends CI_Controller {

	public function index()
	{
		//$this->load->model('Model_produk', 'barang');
		
		$data['barang'] = $this->Model_produk->getDetailBarang(['barang.id' => $this->uri->segment(3)]);
		$data['kategori'] = $this->Model_produk->getKategori();

		$config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
		
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', [
            'required' => 'Nama Barang harus diisi'
        ]);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', [
            'required' => 'Kategori Harus Dipilih',
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric', [
            'required' => 'Harga Harus Disi',
            'numeric' => 'Harga Harus Diisi Dengan Angka'
        ]);

        
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric', [
            'required' => 'Stock Harus Disi',
            'numeric' => 'Harga Harus Diisi Dengan Angka'
        ]);

		$this->load->library('upload', $config);

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/base_dashboard/header');
			$this->load->view('templates/base_dashboard/sidebar');
			$this->load->view('templates/base_dashboard/topbar');
			$this->load->view('dashboard/edit_produk', $data);
			$this->load->view('templates/base_dashboard/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = 'default.jpg';
            }
            $data = [
                'nama_barang' => $this->input->post('nama_barang', true),
                'stock' => $this->input->post('stock', true),
                'id_kategori' => $this->input->post('id_kategori', true),
                'harga' => $this->input->post('harga', true),
                'image' => $gambar
            ];
            $this->Model_produk->updateBarang($data, ['id' => $this->input->post('id')]);
            redirect('Produk');
			}
	}
}