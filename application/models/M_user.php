<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapusUser($where,$whereNim, $table)
    {
        $this->db->where($where);
        $this->db->or_where($whereNim);
        $this->db->delete($table);
    }

    public function hapusUserDpl($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function insert_data_multiple($dataMahasiswa = [])
    {
        $jumlah = count($dataMahasiswa);
		
		if($jumlah > 0 ){
			$this->db->insert_batch('login_user',$dataMahasiswa);
            
		}
    }

    public function dataDpl($id_dpl, $table)
    {     
        $this->db->where('id_dpl',$id_dpl);
        return $this->db->get($table);
    }

    public function dataMahasiswa($id, $table)
    {     
        $this->db->where('nim',$id);
        $this->db->or_where('id_mhs',$id);
        return $this->db->get($table);
    }
   
}