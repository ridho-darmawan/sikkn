<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lokasiKkn extends CI_Model
{
    // public function all_data($table)
    // {
    //     $this->db->select('*');
    //     $this->db->from('jurusan');
    //     $this->db->join('fakultas','fakultas.id = jurusan.fakultas_id');      
    //     $query = $this->db->get();
    //     return $query;
    // }

    public function all_data($table)
    {     
        return $this->db->get($table);
    }

    public function getDpl()
    {
        $dpl = [];

        $this->db->select('*');
        $query = $this->db->get('dpl');

        $dpl = $query->result_array();

        return $dpl;
    }

    public function getProvinsi()
    {
        $provinsi = [];

        $this->db->select('*');
        $query = $this->db->get('provinces');

        $provinsi = $query->result_array();

        return $provinsi;
    }

    function get_kabupaten($provinsi_id){
        $query = $this->db->get_where('regencies', array('province_id' => $provinsi_id));
        return $query;
    }

    function get_kecamatan($kabupaten_id){
        $query = $this->db->get_where('districts', array('regency_id' => $kabupaten_id));
        return $query;
    }

    function get_desa($kec_id){
        $query = $this->db->get_where('villages', array('district_id' => $kec_id));
        return $query;
    }

    function get_desa_name($desa_id){
        $query = $this->db->get_where('villages', array('id' => $desa_id));
        return $query;
    }



    public function getWilayah()
    {
        $this->db->select('*');
        $this->db->from('lokasi_kkn a'); 
        $this->db->join('provinces b', 'b.id=a.provinsi_id', 'left');
        $this->db->join('regencies c', 'c.id=a.kabupaten_id', 'left');
        $this->db->join('districts d', 'd.id=a.kecamatan_id', 'left');
        $this->db->join('villages e', 'e.id=a.desa_id', 'left');   
        $this->db->join('dpl f', 'f.id_dpl=a.id_dpl', 'left');   
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query;
        }
        else
        {
            return false;
        }
    }

   
    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }



    public function getData($table,$id)
    {
        $this->db->where('id_lokasi', $id);
        return $this->db->get($table);
    }

    public function updateData($id, $data, $table)
    {
        $this->db->where('id_lokasi', $id);
        return $this->db->update($table, $data);
    }

    public function hapusData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function hapusUserDesa($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

}