<?php

class C_setting extends CI_Controller
{
    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );
        $data['title'] = "Set Jadwal KKN";
        $data['jadwal'] = $this->M_setting->all_data('setting_kkn')->row();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/setting/v_settingKkn', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function create()
    {
        $data['title'] = " Set Jadwal KKN";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/setting/v_create_setting');
        $this->load->view('templates_administrator/footer');
    }

    public function store()
    {
        $gelombang = $this->input->post('gelombang');
        $tahun = $this->input->post('tahun');
        $mulaiKkn = $this->input->post('tanggal_mulai_kkn');
        $akhirKkn = $this->input->post('tanggal_akhir_kkn');
        $mulaiLaporan = $this->input->post('tanggal_mulai_laporan');
        $akhirLaporan = $this->input->post('tanggal_akhir_laporan');

        $data = array(
            'tgl_mulai_kkn'  => $mulaiKkn,
            'tgl_akhir_kkn'  => $mulaiKkn,
            'tgl_mulai_Laporan'  => $mulaiLaporan,
            'tgl_akhir_Laporan'  => $akhirLaporan,
            'gelombang'  => $gelombang,
            'tahun' =>$tahun
        );

        $this->M_setting->insert_data($data, 'setting_kkn');
        $this->session->set_flashdata('setting', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_setting');
    }

    public function edit($id)
    {
        $data['title'] = "Edit Jadwal KKN";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );
        $data['jadwal'] = $this->M_setting->all_data('setting_kkn')->row();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/setting/v_edit_setting', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $mulaiKkn = $this->input->post('tanggal_mulai_kkn');
        $akhirKkn = $this->input->post('tanggal_akhir_kkn');
        $mulaiLaporan = $this->input->post('tanggal_mulai_laporan');
        $akhirLaporan = $this->input->post('tanggal_akhir_laporan');
        $gelombang = $this->input->post('gelombang');
        $tahun = $this->input->post('tahun');

        $data = array(
            'tgl_mulai_kkn'  => $mulaiKkn,
            'tgl_akhir_kkn'  => $akhirKkn,
            'tgl_mulai_laporan'  => $mulaiLaporan,
            'tgl_akhir_laporan'  => $akhirLaporan,
            'gelombang'  => $gelombang,
            'tahun' =>$tahun
        );

        $this->M_setting->updateData($id, $data, 'setting_kkn');
        $this->session->set_flashdata('setting', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil diubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_setting');
    }

    // public function destroy($id)
    // {
    //     $where = array('id' => $id);
    //     $this->M_fakultas->hapusData($where, 'fakultas');
    //     $this->session->set_flashdata('fakultas', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //     data berhasil dihapus!
    //      <button type="button"class="close" data-dismiss="alert" aria-label="Close">
    //          <span aria-hidden="true">&times;</span>
    //     </button>
    //     </div>');
    //     redirect('administrator/C_fakultas');
    // }
}