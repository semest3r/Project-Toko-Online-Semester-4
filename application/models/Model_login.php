<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_login extends CI_Model
{

    public function cekData($where = null)
    {
        $this->db->select('user.*, role.*');
        $this->db->from('user');
        $this->db->join('role', 'role.id = user.role_id', 'inner');
        return $this->db->get_where('', $where);
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }
}
