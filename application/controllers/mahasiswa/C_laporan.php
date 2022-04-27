<?php

class C_laporan extends CI_Controller
{

    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'cekJadwalKkn' => $this->M_kkn->jadwalKkn('setting_kkn')->row(),
        );

        $data['title'] = "Laporan KKN ";
        $data['dataKkn'] = $this->M_kkn->getData($this->session->userdata['username'],'mahasiswa')->row();
        $data['kkn'] = $this->M_kkn->getDataKkn( $data['dataKkn']->id_mhs,'kkn')->row();

        // var_dump($data['kkn']);die;
      
      
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('mhs/v_laporanKkn', $data);
        $this->load->view('templates_administrator/footer',$data);
    }

    public function store()
    {

        $id_kkn     = $this->input->post('id');
        $laporan    = $_FILES['upload_laporan']['name'];

        if ($laporan) {
            $randomString = random_string('numeric', 3);
            $config['upload_path'] = 'assets/uploads/laporan_kkn';
            $config['allowed_types'] = 'pdf|docx|doc|xls';
            $config['file_name'] = "Laporan-". $randomString;
                   

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('upload_laporan')) {
                // unlink(FCPATH . "/assets/uploads/laporan_kkn/" . $getNamaBerkas); //hapus file lama
                $userfile = $this->upload->data('file_name');
                $this->db->set('laporan_kkn', $userfile);
            } else {
                echo "Gagal Upload";
                die();
            }
        }

        $data = [];

        $this->M_kkn->updateData($id_kkn, $data, 'kkn');
        // $id_kkn = $this->db->insert_id(); 

        $dataNilai = [
            'id_kkn_mhs' => $id_kkn
        ];
        $this->M_kkn->insertNilai($dataNilai,'nilai_kkn');

        $this->session->set_flashdata('laporan_kkn', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Laporan akhir berhasil Ditambah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
            </div>');
        redirect('mahasiswa/C_laporan');
    }

    public function downloadLaporan($id)
    {

        $query = $this->M_kkn->getLaporan('kkn', $id)->row();

        $data = "assets/uploads/laporan_kkn/" . $query->laporan_kkn;
        force_download($data, NULL);
    }

    public function edit($id)
    {
        $data['title'] = "Edit Laporan";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'kkn' => $this->M_kkn->getIdKkn($id,'kkn')->row()
        );
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('mhs/v_edit_laporan_kkn', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $getNamaBerkas = $this->input->post('upload_laporan_old');
        $id_kkn     = $this->input->post('id');
        $laporan    = $_FILES['upload_laporan']['name'];



        if ($laporan) {
            $config['upload_path'] = 'assets/uploads/laporan_kkn';
            $config['allowed_types'] = 'pdf|docx|doc|xls';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('upload_laporan')) {
                unlink(FCPATH . "/assets/uploads/laporan_kkn/" . $getNamaBerkas); //hapus file lama
                $userfile = $this->upload->data('file_name');
                $this->db->set('laporan_kkn', $userfile);
            } else {
                echo "Gagal Upload";
                die();
            }
        }

        $data = [];

        $this->M_kkn->updateData($id_kkn, $data, 'kkn');
        $this->session->set_flashdata('laporan_kkn', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Laporan akhir berhasil diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
            </div>');
        redirect('mahasiswa/C_laporan');
    }

    public function pelaporanMahasiswa()
    {
        $data['title'] = "Pelaporan";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'lokasiKkn' => $this->M_laporan->getLokasiKkn()->result(),
            'fakultas' => $this->M_laporan->getFakultas()->result(),
            'jurusan' => $this->M_laporan->getJurusan()->result()
        );

        $byLokasi       = $this->input->post('lokasi');
        $byFakultas     = $this->input->post('fakultas');
        $byJurusan      = $this->input->post('jurusan');
        $byJenisKkn     = $this->input->post('jenis_kkn');
        $byJenisKelamin = $this->input->post('jk');

        if ($byLokasi == null && $byFakultas == null  && $byJurusan == null && $byJenisKkn == null && $byJenisKelamin == null) 
        {
            $data['mahasiswa'] = [];
        }
        elseif($byLokasi != null && $byFakultas == null && $byJurusan == null && $byJenisKkn == null && $byJenisKelamin == null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByLokasi($byLokasi)->result();
        }
        elseif($byLokasi == null && $byFakultas != null && $byJurusan == null && $byJenisKkn == null && $byJenisKelamin == null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByFakultas($byFakultas)->result();
        }

        elseif($byLokasi == null && $byFakultas == null && $byJurusan != null && $byJenisKkn == null && $byJenisKelamin == null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByJurusan($byJurusan)->result();
        }

        elseif($byLokasi == null && $byFakultas == null && $byJurusan == null && $byJenisKkn != null && $byJenisKelamin == null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByJenisKkn($byJenisKkn)->result();
        }

        elseif($byLokasi == null && $byFakultas == null && $byJurusan == null && $byJenisKkn == null && $byJenisKelamin != null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByJenisKelamin($byJenisKelamin)->result();
        }

        elseif($byLokasi != null && $byFakultas != null && $byJurusan == null && $byJenisKkn == null && $byJenisKelamin == null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByLokasidanFakultas($byLokasi,$byFakultas)->result();
        }

        elseif($byLokasi != null && $byFakultas == null && $byJurusan != null && $byJenisKkn == null && $byJenisKelamin == null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByLokasidanJurusan($byLokasi,$byJurusan)->result();
        }

        elseif($byLokasi != null && $byFakultas == null && $byJurusan == null && $byJenisKkn != null && $byJenisKelamin == null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByLokasidanJenisKkn($byLokasi,$byJenisKkn)->result();
        }

        elseif($byLokasi != null && $byFakultas == null && $byJurusan == null && $byJenisKkn == null && $byJenisKelamin != null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByLokasidanJenisKelamin($byLokasi,$byJenisKelamin)->result();
        }

        elseif($byLokasi == null && $byFakultas != null && $byJurusan != null && $byJenisKkn == null && $byJenisKelamin == null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByFakultasdanJurusan($byFakultas,$byJurusan)->result();
        }

        elseif($byLokasi == null && $byFakultas != null && $byJurusan == null && $byJenisKkn != null && $byJenisKelamin == null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByFakultasdanJenisKkn($byFakultas,$byJenisKkn)->result();
        }

        elseif($byLokasi == null && $byFakultas != null && $byJurusan == null && $byJenisKkn == null && $byJenisKelamin != null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByFakultasdanJenisKelamin($byFakultas,$byJenisKelamin)->result();
        }

        elseif($byLokasi == null && $byFakultas == null && $byJurusan != null && $byJenisKkn != null && $byJenisKelamin == null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByJurusandanJenisKkn($byJurusan,$byJenisKkn)->result();
        }

        elseif($byLokasi == null && $byFakultas == null && $byJurusan != null && $byJenisKkn == null && $byJenisKelamin != null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByJurusandanJenisKelamin($byJurusan,$byJenisKelamin)->result();
        }

        elseif($byLokasi == null && $byFakultas == null && $byJurusan == null && $byJenisKkn != null && $byJenisKelamin != null)
        {
            $data['mahasiswa'] = $this->M_laporan->searchByJenisKkndanJenisKelamin($byJenisKkn,$byJenisKelamin)->result();
        }

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/v_pelaporanMahasiswa', $data);
        $this->load->view('templates_administrator/footer');
    }

   public function pelaporanDpl()
   {
        $data['title'] = "Pelaporan";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'dpl' => $this->M_laporan->getDpl()->result(),
        );

        $id_dpl = $this->input->post('id_dpl');

        if ($id_dpl != null) {
            $data['mahasiswa'] = $this->M_laporan->getDataMahasiswa($id_dpl)->result();
        }


        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/v_pelaporanDpl', $data);
        $this->load->view('templates_administrator/footer');
   }


}

?>