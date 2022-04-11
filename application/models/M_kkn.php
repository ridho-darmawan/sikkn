<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kkn extends CI_Model
{
    public function getDataMahasiswa($table,$nim)
    {
        $this->db->where('nim', $nim);
        return $this->db->get($table);
    } 

    public function getData($nim, $table)
    {
        $this->db->where('nim', $nim);
        return $this->db->get($table);
    } 

    public function export_excel_kkn_reguler($table)
    {
        $this->db->select('*');
        $this->db->where('jenis_kkn', 'kkn_reguler');
        $this->db->join('mahasiswa', 'mahasiswa.id_mhs = kkn.id_mhs_kkn', 'left');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id', 'left');
        return $this->db->get($table);
    }

    public function export_excel_kkn_merdeka($table)
    {
        $this->db->select('*');
        $this->db->where('jenis_kkn', 'kkn_merdeka');
        $this->db->join('mahasiswa', 'mahasiswa.id_mhs = kkn.id_mhs_kkn', 'left');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id', 'left');
        return $this->db->get($table);
    }


    public function getDataKkn($id, $table)
    {
        $this->db->where('id_mhs_kkn', $id);
        return $this->db->get($table);
    } 

    public function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function insertLokasiKknMahasiswa($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function getIdKkn($id,$table)
    {
        $this->db->where('id_kkn', $id);
        return $this->db->get($table);
    }

    public function getLokasiKknMahasiswa($id,$table)
    {
        $this->db->where('id_kkn', $id);
        $this->db->from('kkn');
        $this->db->join('villages','villages.id = kkn.lokasi_kkn');
        $this->db->join('districts','districts.id = villages.district_id');  
        $this->db->join('regencies','regencies.id = districts.regency_id');  
        $this->db->join('provinces','provinces.id = regencies.province_id');  
        return $this->db->get();
    }

    public function hapusData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function updateData($id, $data, $table)
    {
        $this->db->where('id_kkn', $id);
        return $this->db->update($table, $data);
    }

    public function updateLokasiKknMahasiswa($id, $data, $table)
    {
        $this->db->where('id_kkn', $id);
        return $this->db->update($table, $data);
    }

    public function getProvinsi()
    {
        $this->db->distinct();
        $this->db->select('name_province,id,provinsi_id');
        
        $this->db->from('lokasi_kkn');
        $this->db->join('provinces','provinces.id = lokasi_kkn.provinsi_id');      
        $query = $this->db->get();
        return $query;
    }

    public function all_data($table)
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        $this->db->join('fakultas','fakultas.id = jurusan.fakultas_id');      
        $query = $this->db->get();
        return $query;
    }

    function get_kabupaten($provinsi_id){
        $this->db->distinct();
        $this->db->select('kabupaten_id,name_regencie,id,provinsi_id');
        $this->db->join('regencies','regencies.id = lokasi_kkn.kabupaten_id');
        $query = $this->db->get_where('lokasi_kkn', array('provinsi_id' => $provinsi_id));
        return $query;
    }

    function get_kecamatan($kabupaten_id){
        $this->db->join('districts','districts.id = lokasi_kkn.kecamatan_id');
        $query = $this->db->get_where('lokasi_kkn', array('kabupaten_id' => $kabupaten_id));
        return $query;
    }

    function get_desa($kec_id){
        $this->db->join('villages','villages.id = lokasi_kkn.desa_Id');
        $query = $this->db->get_where('lokasi_kkn', array('kecamatan_id' => $kec_id));
        return $query;
    }

    public function getLaporan($table, $id)
    {
        $this->db->where('id_kkn', $id);
        return $this->db->get($table);
    }

    public function jadwalKkn($table)
    {
        return $this->db->get($table);
    }

    public function getLokasiDpl($id_dpl)
    {
        $this->db->where('id_dpl', $id_dpl);
        return $this->db->get('lokasi_kkn');
    }

    public function getLokasiDesa($id_lokasi)
    {
        $this->db->where('id_lokasi', $id_lokasi);
        return $this->db->get('lokasi_kkn');
    }

    public function getMahasiswaBimbinganReguler($data)
    {
        // var_dump($data);
        $this->db->where_in('lokasi_kkn', $data);
        $this->db->Where('jenis_kkn', 'kkn_reguler');
        $this->db->join('mahasiswa','mahasiswa.id_mhs = kkn.id_mhs_kkn','left');
        $this->db->join('nilai_kkn','nilai_kkn.id_kkn_mhs = kkn.id_kkn','left');
        return $this->db->get('kkn');
    }

    public function getMahasiswaBimbinganMerdeka($data)
    {
        // var_dump($data);
        $this->db->where_in('lokasi_kkn', $data);
        $this->db->Where('jenis_kkn', 'kkn_merdeka');
        $this->db->join('mahasiswa','mahasiswa.id_mhs = kkn.id_mhs_kkn','left');
        $this->db->join('nilai_kkn','nilai_kkn.id_kkn_mhs = kkn.id_kkn','left');
        return $this->db->get('kkn');
    }

    public function getMahasiswaDesa($desa_id)
    {
        // var_dump($data);
        $this->db->where('lokasi_kkn', $desa_id);
        $this->db->join('mahasiswa','mahasiswa.id_mhs = kkn.id_mhs_kkn');
        $this->db->join('nilai_kkn','nilai_kkn.id_kkn_mhs = kkn.id_kkn','left');
        return $this->db->get('kkn');
    }

    public function cekIdMhs($id_kkn_mhs)
    {
        $this->db->where('id_kkn_mhs',$id_kkn_mhs);
        return $this->db->get('nilai_kkn');
    }

    public function cekNilai($id_nilai)
    {
        $this->db->where('id_nilai',$id_nilai);
        return $this->db->get('nilai_kkn');
    }

    public function insertNilai($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function updateNilai($id, $data, $table)
    {
        $this->db->where('id_nilai', $id);
        return $this->db->update($table, $data);
    }

}

?>