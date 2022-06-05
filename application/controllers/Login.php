<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('Dashboard');
		}
		$this->form_validation->set_rules('username', 'Username', 'trim|required', [
			'required' => 'Username Harus diisi!!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required', [
			'required' => 'Password Harus diisi'
		]);
		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Login';
			$data['user'] = '';
			//kata 'login' merupakan nilai dari variabel judul dalam array $data dikirimkan ke view aute_header
			$this->load->view('login/login.php');
		} else {
			$this->_login();
		}
	}

	private function _login()
    {
        $username = htmlspecialchars($this->input->post('username', true));
        $password = $this->input->post('password', true);

        $user = $this->Model_user->cekData(['username' => $username])->row_array();
        //jika usernya ada
        if ($user) {
            //jika user sudah aktif
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'role_id' => $user['role_id'],
                        'jabatan' => $user['jabatan'],
                        'status_role' => $user['status_role'],
                    ];

                    $this->session->set_userdata($data);
                    redirect('Dashboard');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Password salah!!</div>');
                    redirect('Login');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User Sudah Tidak Aktif!!</div>');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">User tidak terdaftar!!</div>');
            redirect('Login');
        }
    }
	public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('logout','<div class="alert alert-success alert-message" role="alert">Anda telah logout!!</div>');
        redirect('Login');
    }
}
