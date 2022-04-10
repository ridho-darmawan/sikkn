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

        // var_dump(strtotime(date('d-m-y')));
        // var_dump(strtotime($data['cekJadwalKkn']->tgl_mulai_kkn));
        
        // die;

    //     $a = new datetime($data['cekJadwalKkn']->tgl_mulai_kkn);
    //     $b = new datetime($data['cekJadwalKkn']->tgl_akhir_kkn);
    //     $c = $b->diff($a);
    //     $nextN = mktime(0, 0, 0, date("m"), date("d") + $n, date("Y"));

    // var_dump($c->d );die;

    //     var_dump(date_diff('day',$data['cekJadwalKkn']->tgl_mulai_kkn, $data['cekJadwalKkn']->tgl_akhir_kkn));die;
        $data['title'] = "Laporan KKN ";
        $data['dataKkn'] = $this->M_kkn->getData($this->session->userdata['username'],'mahasiswa')->row();
        $data['kkn'] = $this->M_kkn->getDataKkn( $data['dataKkn']->id_mhs,'kkn')->row();
      
      
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('mhs/v_laporanKkn', $data);
        $this->load->view('templates_administrator/footer',$data);
    }

    public function store()
    {
        // $getNamaBerkas = $this->input->post('upload_laporan_old');
        $id_kkn     = $this->input->post('id');
        $laporan    = $_FILES['upload_laporan']['name'];



        if ($laporan) {
            $config['upload_path'] = 'assets/uploads/laporan_kkn';
            $config['allowed_types'] = 'pdf|docx|doc|xls';

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

        $data = array(
            

        );

        $this->M_kkn->updateData($id_kkn, $data, 'kkn');
        $this->session->set_flashdata('laporan_kkn', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Laporan akhir berhasil diupdate!
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


}

?>