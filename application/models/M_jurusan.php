<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jurusan extends CI_Model
{
    public function all_data($table)
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $this->db->join('fakultas','fakultas.id = jurusan.fakultas_id');      
        $query = $this->db->get();
        return $query;
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function getData($table,$id)
    {
        $this->db->where('id_jurusan', $id);
        return $this->db->get($table);
    }

    public function getDataByFakultas($table,$id)
    {
        $this->db->where('id_jurusan', $id);
        return $this->db->get($table);
    }

    public function updateData($id, $data, $table)
    {
        $this->db->where('id_jurusan', $id);
        return $this->db->update($table, $data);
    }

    public function hapusData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getDataFakultas()
    {
        $query = $this->db->get('fakultas')->result();
        return $query;
    }
}