<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan_merdeka extends CI_Model
{
    public function tampil_data($table, $where)
    {
        $this->db->where('nim', $where);
        return $this->db->get($table);
    }
    public function tampil_data_semua($table)
    {
        return $this->db->get($table);
    }
    public function export_excel($table)
    {
        return $this->db->get($table);
    }
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('laporan_merdeka');
        $this->db->like('nim', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('fakultas', $keyword);
        $this->db->or_like('jurusan', $keyword);
        $this->db->or_like('lokasi_kkn', $keyword);
        $this->db->or_like('nama_dpl', $keyword);

        return $this->db->get()->result();
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function getLaporan($table, $id)
    {
        $this->db->where('id', $id);
        return $this->db->get($table);
    }

    public function edit_data($table, $where)
    {
        $this->db->where('id', $where);
        return $this->db->get($table);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function get_data($limit, $start)
    {
        $this->db->from('laporan_merdeka');
        $this->db->order_by('id', 'asc');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
}
