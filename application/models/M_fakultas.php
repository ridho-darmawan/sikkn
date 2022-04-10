<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_fakultas extends CI_Model
{
    public function all_data($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function getData($table,$id)
    {
        $this->db->where('id', $id);
        return $this->db->get($table);
    }

    public function updateData($id, $data, $table)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, $data);
    }

    public function hapusData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}