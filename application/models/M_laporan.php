<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
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
        $this->db->from('laporan');
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
		$this->db->from('laporan');
		$this->db->order_by('id', 'asc');
		$this->db->limit($limit, $start);
		return $this->db->get();
	}


    public function getLokasiKkn()
    {
        $this->db->select('*');
        $this->db->from('lokasi_kkn');
        $this->db->join('villages', 'villages.id=lokasi_kkn.desa_id');
        return $this->db->get();
    }

    public function getFakultas()
    {
        $this->db->select('*');
        $this->db->from('fakultas');
        return $this->db->get();
    }

    public function getJurusan()
    {
        $this->db->select('*');
        $this->db->from('jurusan');
        return $this->db->get();
    }

    public function searchByLokasi($byLokasi)
    {
        $this->db->select('*');
        $this->db->from('kkn');
        $this->db->where('lokasi_kkn',$byLokasi);
        $this->db->join('mahasiswa', 'mahasiswa.id_mhs = kkn.id_mhs_kkn', 'left');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id', 'left');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn', 'left');
        return $this->db->get();
    }

    public function searchByFakultas($byFakultas)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('mahasiswa.fakultas_id',$byFakultas);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByJurusan($byJurusan)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('mahasiswa.jurusan_id',$byJurusan);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByJenisKkn($byJenisKkn)
    {
        $this->db->select('*');
        $this->db->from('kkn');
        $this->db->where('jenis_kkn',$byJenisKkn);
        $this->db->join('mahasiswa', 'mahasiswa.id_mhs = kkn.id_mhs_kkn', 'left');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id', 'left');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id', 'left');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn', 'left');
        return $this->db->get();
    }

    public function searchByJenisKelamin($byJenisKelamin)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('jk',$byJenisKelamin);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByLokasidanFakultas($byLokasi,$byFakultas)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('kkn.lokasi_kkn',$byLokasi);
        $this->db->where('mahasiswa.fakultas_id',$byFakultas);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByLokasidanJurusan($byLokasi,$byjurusan)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('kkn.lokasi_kkn',$byLokasi);
        $this->db->where('mahasiswa.jurusan_id',$byjurusan);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByLokasidanJenisKkn($byLokasi,$byJenisKkn)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('kkn.lokasi_kkn',$byLokasi);
        $this->db->where('kkn.jenis_kkn',$byJenisKkn);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByLokasidanJenisKelamin($byLokasi,$byJenisKelamin)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('kkn.lokasi_kkn',$byLokasi);
        $this->db->where('jk',$byJenisKelamin);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByFakultasdanJurusan($byFakultas,$byJurusan)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('mahasiswa.fakultas_id',$byFakultas);
        $this->db->where('mahasiswa.jurusan_id',$byJurusan);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByFakultasdanJenisKkn($byFakultas,$byJenisKkn)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('mahasiswa.fakultas_id',$byFakultas);
        $this->db->where('kkn.jenis_kkn',$byJenisKkn);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByFakultasdanJenisKelamin($byFakultas,$byJenisKelamin)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('mahasiswa.fakultas_id',$byFakultas);
        $this->db->where('mahasiswa.jk',$byJenisKelamin);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByJurusandanJenisKkn($byJurusan,$byJenisKkn)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('mahasiswa.jurusan_id',$byJurusan);
        $this->db->where('kkn.jenis_kkn',$byJenisKkn);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByJurusandanJenisKelamin($byJurusan,$byJenisKelamin)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('mahasiswa.jurusan_id',$byJurusan);
        $this->db->where('mahasiswa.jk',$byJenisKelamin);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }

    public function searchByJenisKkndanJenisKelamin($byJenisKkn,$byJenisKelamin)
    {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->where('kkn.jenis_kkn',$byJenisKkn);
        $this->db->where('mahasiswa.jk',$byJenisKelamin);
        $this->db->join('kkn', 'kkn.id_mhs_kkn = mahasiswa.id_mhs');
        $this->db->join('fakultas', 'fakultas.id = mahasiswa.fakultas_id');
        $this->db->join('jurusan', 'jurusan.id_jurusan = mahasiswa.jurusan_id');
        $this->db->join('villages', 'villages.id = kkn.lokasi_kkn');
        return $this->db->get();
    }


}

