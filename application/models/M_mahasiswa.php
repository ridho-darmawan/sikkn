<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_mahasiswa extends CI_Model
{
   

    public function all_data()
    {
        $this->db->select('*');
        $this->db->from('mahasiswa a'); 
        $this->db->join('fakultas b', 'b.id=a.fakultas_id', 'left');
        $this->db->join('jurusan c', 'c.id_jurusan=a.jurusan_id', 'left');  
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

    public function updateSertifikat($id, $data, $table)
    {
        $this->db->where('id_kkn', $id);
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
        $this->db->join('mahasiswa b', 'b.id_mhs=a.id_mhs_kkn', 'left');
        $this->db->join('jurusan c', 'c.id_jurusan=b.jurusan_id', 'left');  
        $this->db->join('fakultas d', 'd.id=c.fakultas_id', 'left');  
        $this->db->join('nilai_kkn e', 'e.id_kkn_mhs=a.id_kkn', 'left');  
        return $this->db->get(); 
    }

    public function kknMerdeka()
    {
        $this->db->select('*');
        $this->db->from('kkn a'); 
        $this->db->where('jenis_kkn','kkn_merdeka');
        $this->db->join('mahasiswa b', 'b.id_mhs=a.id_mhs_kkn', 'left');
        $this->db->join('jurusan c', 'c.id_jurusan=b.jurusan_id', 'left');  
        $this->db->join('fakultas d', 'd.id=c.fakultas_id', 'left');  
        $this->db->join('nilai_kkn e', 'e.id_kkn_mhs=a.id_kkn', 'left');  
        return $this->db->get(); 
    }

    public function dataForSertifikat($table, $id_mhs, $id_kkn)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa a'); 
        $this->db->where('id_mhs',$id_mhs);
        $this->db->join('fakultas b', 'b.id=a.fakultas_id', 'left');
        $this->db->join('jurusan c', 'c.id_jurusan=a.jurusan_id', 'left');  
        $this->db->join('kkn d', 'd.id_kkn='.$id_kkn, 'left');  
        $this->db->join('villages e', 'e.id=d.lokasi_kkn', 'left');  
        $this->db->join('nilai_kkn f', 'f.id_kkn_mhs=d.id_kkn', 'left');  
        return $this->db->get(); 
    }

    public function dataSetKkn()
    {
        $this->db->select('*');
        $this->db->from('setting_kkn');
        return $this->db->get(); 
    }

    public function kkn($id)
    {
        $this->db->select('*');
        $this->db->from('kkn k');
        $this->db->where('id_kkn',$id);
        $this->db->join('villages v', 'v.id=k.lokasi_kkn', 'left');  
        $this->db->join('districts d', 'd.id=v.district_id', 'left');  
        $this->db->join('regencies r', 'r.id=d.regency_id', 'left');  
        $this->db->join('provinces p', 'p.id=r.province_id', 'left');  
        return $this->db->get();
    }

    // public function laporanKknMerdeka()
    // {
    //     $this->db->select('*');
    //     $this->db->from('kkn a'); 
    //     $this->db->where('jenis_kkn','kkn_merdeka');
    //     $this->db->join('mahasiswa b', 'b.id_mhs=a.id_mhs', 'left');
    //     $this->db->join('jurusan c', 'c.id_jurusan=b.jurusan_id', 'left');  
    //     $this->db->join('fakultas d', 'd.id=c.fakultas_id', 'left');  
    //     return $this->db->get(); 
    // }
}