<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profil extends CI_Model
{
   

    public function all_data($id_mhs)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa a'); 
        $this->db->where('id_mhs', $id_mhs); 
        $this->db->or_where('nim', $id_mhs); 
        $this->db->join('fakultas b', 'b.id=a.fakultas_id', 'left');
        $this->db->join('jurusan c', 'c.id_jurusan=a.jurusan_id', 'left');  
        return $this->db->get(); 
       
    }

    public function updatePassword($id, $data, $table)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, $data);
    }

    function get_jurusan($fakultas_id){
        $query = $this->db->get_where('jurusan', array('fakultas_id' => $fakultas_id));
        return $query;
    }

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function getData($table,$id)
    {
        $this->db->where('id_mhs', $id);
        return $this->db->get($table);
    }  
    
    public function getDataUser($table,$id)
    {
        $this->db->where('id', $id);
        return $this->db->get($table);
    }  

    public function updateData($id, $data, $table)
    {
        $this->db->where('id_mhs', $id);
        return $this->db->update($table, $data);
    }

    public function hapusData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function formatDataExcel($table)
    {
        return $this->db->get($table);
    }

    
}