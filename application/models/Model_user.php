<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function cekData($where = null)
    {
        $this->db->select('user.name, user.username, user.password, user.nip, user.id_aktifasi, user.id as id_user, role.jabatan, role.status as status_role, aktifasi.*');
        $this->db->from('user');
        $this->db->join('role', 'role.id = user.role_id', 'inner');
        $this->db->join('aktifasi', 'aktifasi.id = user.id_aktifasi', 'inner');
        return $this->db->get_where('', $where);
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getAllUser()
    {
        $this->db->select('user.*, role.status as s_role, aktifasi.status as a_status');
        $this->db->from('user');
        $this->db->join('role', 'role.id = user.role_id', 'inner');
        $this->db->join('aktifasi', 'aktifasi.id = user.id_aktifasi', 'inner');
        return $this->db->get('')->result_array();
    }

    public function simpanUser($data = null)
    {
        $this->db->insert('user', $data);
    }

    function getRole()
    {
        return $this->db->get('role')->result_array();
    }

    function getAktifasi()
    {
        return $this->db->get('aktifasi')->result_array();
    }
}
