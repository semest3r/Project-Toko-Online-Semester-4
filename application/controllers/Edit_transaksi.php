<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit_transaksi extends CI_Controller
{

	public function index()
	{
		$data['transaksi'] = $this->Model_transaksi->getDetailTransaksi(['transaksi.id' => $this->uri->segment(3)]);
		$data['checkout'] = $this->Model_transaksi->getDetailCheckout(['id_transaksi' => $this->uri->segment(3)]);
		$data['user'] = $this->Model_transaksi->getUser();

		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.mailtrap.io',
			'smtp_port' => 2525,
			'smtp_user' => 'f5afd82df79411',
			'smtp_pass' => 'a5620976a43ac0',
			'crlf' => "\r\n",
			'newline' => "\r\n"
		);

		$this->load->library('email', $config);
		$this->email->initialize($config);

		$this->form_validation->set_rules('status', 'Status', 'required', [
			'required' => 'Nama Barang harus diisi'
		]);
		if ($this->form_validation->run() == false) {
			$this->load->view('templates/base_dashboard/header');
			$this->load->view('templates/base_dashboard/sidebar');
			$this->load->view('templates/base_dashboard/topbar');
			$this->load->view('dashboard/edit_transaksi', $data);
			$this->load->view('templates/base_dashboard/footer');
		} else {
			$data = [
				'status' => $this->input->post('status', true),
				'id_user' => $this->input->post('user', true)
			];
			$this->Model_transaksi->updateTransaksi($data, ['id' => $this->input->post('idtransaksi')]);
			$email = $this->input->post('email');
			$pesan = $this->input->post('pesan');

			$this->email->from('emailfrom@test.test');
			$this->email->to($email);
			$this->email->subject('Update Pengiriman');
			$this->email->message($pesan);
			if ($this->email->send()) {
				redirect('Transaksi');
			} else {
				show_error($this->email->print_debugger());
			}
		}
	}


	public function send_email()
	{
		$submit = $this->input->post('submit_email');
		if (isset($submit)) {
			$email = $this->input->post('email');
			$subject = $this->input->post('nama_pembeli');
			$pesan = $this->input->post('pesan');
		}
		if (!empty($email)) {
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'smtp.mailtrap.io',
				'smtp_port' => 2525,
				'smtp_user' => 'f5afd82df79411',
				'smtp_pass' => 'a5620976a43ac0',
				'crlf' => "\r\n",
				'newline' => "\r\n"
			);
			$this->load->library('email', $config);
			$this->email->initialize($config);

			$this->email->from('emailfrom@test.test');
			$this->email->to($email);
			$this->email->subject($subject);
			$this->email->message($pesan);
			if ($this->email->send()) {
				redirect('Transaksi');
			} else {
				show_error($this->email->print_debugger());
			}
		}
	}
}
