<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfirmasi extends CI_Controller
{

    public function index()
    {
        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->form_validation->set_rules('id_transaksi', 'Id_Transaksi', 'required|numeric', [
            'required' => 'ID Transaksi Harus Diisi',
            'numeric' => 'ID Transaksi Harung Angka'
        ]);

        $this->load->library('upload', $config);
		$data['kategori'] = $this->Model_market->getKategori();


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/base_market/header');
            $this->load->view('templates/base_market/sidebar', $data);
            $this->load->view('templates/base_market/topbar');
            $this->load->view('market/konfirmasi');
            $this->load->view('templates/base_market/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = 'default.jpg';
            }
            $data = [
                'id_transaksi' => $this->input->post('id_transaksi', true),
                'status_konfirmasi' => $this->input->post('status_konfirmasi', true),
                'image' => $gambar
            ];
            $this->Model_transaksi->simpanKonfirmasi($data);
            redirect('Market');
        }
    }
}
