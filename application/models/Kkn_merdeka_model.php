<?php

class Kkn_merdeka_model extends CI_Model
{
    public function tampil_data($table, $where)
    {
        $this->db->where('nim', $where);
        return $this->db->get($table);
    }

    public function tampil_data_admin($table)
    {
        // $this->db->where('nim', $where);
        return $this->db->get($table);
    }


    public function edit_data($table, $where)
    {
        $this->db->where('id', $where);
        return $this->db->get($table);
    }

    // public function tampil_data($table,$where)
    // {
    //     $this->db->where('nim', $where);
    //     return $this->db->get($table);
    // }

public function ambil_id_Kkn_merdeka($id)
{
    $hasil = $this->db->where('id', $id)->get('Kkn_merdeka');
    if ($hasil->num_rows() > 0) {
        return $hasil->result();
    } else {
        return false;
    }
}
    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('kkn_merdeka');
        $this->db->like('nama_lengkap', $keyword);
        $this->db->or_like('nim', $keyword);
        $this->db->or_like('fakultas', $keyword);
        return $this->db->get()->result();
    }

    public function export_excel($table)
    {
        return $this->db->get($table);
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
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
        $this->db->from('kkn_merdeka');
        $this->db->order_by('id', 'asc');
        $this->db->limit($limit, $start);
        return $this->db->get();
    }
}
