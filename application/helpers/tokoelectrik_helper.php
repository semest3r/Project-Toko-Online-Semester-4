<?php

function cek_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!! </div>');
        redirect('Login');
    } else {
        $role_id = $ci->session->userdata('role_id');
    }
}