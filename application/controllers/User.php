<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
        public function index()
        {
                $data['user'] = $this->Model_user->getAllUser();
                $data['role'] = $this->Model_user->getRole();
                $data['aktifasi'] = $this->Model_user->getAktifasi();

                $this->load->view('templates/base_dashboard/header');
                $this->load->view('templates/base_dashboard/sidebar');
                $this->load->view('templates/base_dashboard/topbar');
                $this->load->view('dashboard/user', $data);
                $this->load->view('templates/base_dashboard/footer');
        }

        public function createUser()
        {
                $data = [
                        'role_id' => $this->input->post('role_id', true),
                        'username' => $this->input->post('username', true),
                        'password' => $this->input->post('password', true),
                        'name' => $this->input->post('name', true),
                        'nip' => $this->input->post('nip', true),
                        'id_aktifasi' => $this->input->post('id_aktifasi', true),
                ];
                $this->Model_user->simpanUser($data);
                redirect('User');
        }
        public function createUser1()
        {
                $data['role'] = $this->Model_user->getRole();
                $data['aktifasi'] = $this->Model_user->getAktifasi();

                $this->form_validation->set_rules('username', 'Username', 'required', [
                        'required' => 'Username Harus Diisi!!!'
                ]);
                if ($this->form_validation->run() == false) {
                        $this->load->view('templates/base_dashboard/header');
                        $this->load->view('templates/base_dashboard/sidebar');
                        $this->load->view('templates/base_dashboard/topbar');
                        $this->load->view('dashboard/register', $data);
                        $this->load->view('templates/base_dashboard/footer');
                } else {
                        $data = [
                                'role_id' => $this->input->post('role_id', true),
                                'username' => $this->input->post('username', true),
                                'password' => $this->input->post('password', true),
                                'name' => $this->input->post('name', true),
                                'nip' => $this->input->post('nip', true),
                                'id_aktifasi' => $this->input->post('id_aktifasi', true),
                        ];
                        $this->Model_user->simpanUser($data);
                        redirect('User');
                }
        }
}
