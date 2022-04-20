<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
   

    public function getMahasiswa($nim)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa'); 
        $this->db->where('nim',$nim) ;
        $this->db->or_where('id_mhs',$nim) ;
        return $this->db->get(); 
       
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

    public function importDataMahasiswa($dataMahasiswa = [])
    {
        $jumlah = count($dataMahasiswa);
		
		if($jumlah > 0 ){
			$this->db->insert_batch('mahasiswa',$dataMahasiswa);
		}
    }

    public function kknReguler()
    {
        $this->db->select('*');
        $this->db->from('kkn a'); 
        $this->db->where('jenis_kkn','kkn_reguler');
        $this->db->join('mahasiswa b', 'b.id_mhs=a.id_mhs', 'left');
        $this->db->join('jurusan c', 'c.id_jurusan=b.jurusan_id', 'left');  
        $this->db->join('fakultas d', 'd.id=c.fakultas_id', 'left');  
        return $this->db->get(); 
    }

    public function kknMerdeka()
    {
        $this->db->select('*');
        $this->db->from('kkn a'); 
        $this->db->where('jenis_kkn','kkn_merdeka');
        $this->db->join('mahasiswa b', 'b.id_mhs=a.id_mhs', 'left');
        $this->db->join('jurusan c', 'c.id_jurusan=b.jurusan_id', 'left');  
        $this->db->join('fakultas d', 'd.id=c.fakultas_id', 'left');  
        return $this->db->get(); 
    }

    public function all_data($lokasi)
    {
        $this->db->select('*');
        $this->db->from('kkn a'); 
        $this->db->where('lokasi_kkn', $lokasi); 
        $this->db->join('mahasiswa b', 'b.id_mhs=a.id_mhs_kkn', 'left');
        $this->db->join('fakultas c', 'c.id=b.fakultas_id', 'left');
        $this->db->join('jurusan d', 'd.id_jurusan=b.jurusan_id', 'left');  
        return $this->db->get(); 
       
    }
}