<?php

class Laporan_akhir_merdeka extends CI_Controller
{
    public function index()
    {

        if ($this->session->level == 'admin') {
            $data['laporan_merdeka'] = $this->M_laporan_merdeka->tampil_data_semua('laporan_merdeka')->result();
        } else {
            $data['laporan_merdeka'] = $this->M_laporan_merdeka->tampil_data('laporan_merdeka', $this->session->userdata('nim'))->result();
        }

        $data['title'] = " Upload Laporan KKN Merdeka Belajar";
        // $data['laporan'] = $this->M_laporan->tampil_data('laporan',$this->session->userdata('nim'))->result();
        $data['getDataLaporanByNim'] = $this->M_laporan_merdeka->tampil_data('laporan_merdeka', $this->session->userdata('nim'))->row();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/v_laporan_akhir_merdeka', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function laporan_akhir_merdeka_form()
    {
        $data['title'] = " Upload Laporan KKN Merdeka Belajar";
        $data['laporan_merdeka'] = $this->M_laporan_merdeka->tampil_data('kkn_merdeka', $this->session->userdata('nim'))->result();

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/laporan_akhir_merdeka_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function laporan_akhir_merdeka_save()
    {
        // $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $fakultas = $this->input->post('fakultas');
        $jurusan = $this->input->post('jurusan');
        $lokasi = $this->input->post('lokasi');
        $nama_dpl = $this->input->post('nama_dpl');
        $laporan = $_FILES['upload_akhir']['name'];

        if ($laporan) {
            $config['upload_path'] = 'assets/uploads/laporan_merdeka';
            $config['allowed_types'] = 'pdf|docx|doc|xls';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('upload_akhir')) {
                // unlink(FCPATH."/assets/uploads/laporan/".$getNamaBerkas); //hapus file lama
                $userfile = $this->upload->data('file_name');
                $this->db->set('berkas', $userfile);
            } else {
                echo "Gagal Upload";
                die();
            }
        }



        $data = array(
            'nim'                   => $nim,
            'nama'                  => $nama,
            'fakultas'              => $fakultas,
            'jurusan'               => $jurusan,
            'lokasi_kkn'            => $lokasi,
            'nama_dpl'              => $nama_dpl,
            // 'berkas'                => $laporan

        );

        $this->M_laporan_merdeka->insert_data($data, 'laporan_merdeka');
        $this->session->set_flashdata('pesan_laporan_merdeka_admin', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/Laporan_akhir_merdeka');
    }

    public function downloadLaporan($id)
    {

        $query = $this->M_laporan_merdeka->getLaporan('laporan_merdeka', $id)->row();


        $data = "assets/uploads/laporan_merdeka/" . $query->berkas;
        force_download($data, NULL);
    }

    public function update($id)
    {

        $data['title'] = "Update Laporan KKN Merdeka Belajar";
        $data['laporan_merdeka'] = $this->M_laporan_merdeka->edit_data('laporan_merdeka', $id)->result();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/laporan_akhir_merdeka_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_laporan_akhir_merdeka_aksi()
    {

        $getNamaBerkas = $this->input->post('upload_akhir1');
        $id         = $this->input->post('id');
        $nama       = $this->input->post('nama');
        $nim        = $this->input->post('nim');
        $fakultas   = $this->input->post('fakultas');
        $jurusan    = $this->input->post('jurusan');
        $lokasi    = $this->input->post('lokasi');
        $nama_dpl   = $this->input->post('nama_dpl');
        $laporan    = $_FILES['upload_akhir']['name'];



        if ($laporan) {
            $config['upload_path'] = 'assets/uploads/laporan_merdeka';
            $config['allowed_types'] = 'pdf|docx|doc|xls';

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('upload_akhir')) {
                unlink(FCPATH . "/assets/uploads/laporan_merdeka/" . $getNamaBerkas); //hapus file lama
                $userfile = $this->upload->data('file_name');
                $this->db->set('berkas', $userfile);
            } else {
                echo "Gagal Upload";
                die();
            }
        }

        $data = array(
            'lokasi_kkn'            => $lokasi,
            'nama_dpl'              => $nama_dpl,
            'nama'                  => $nama,
            'nim'                   => $nim,
            'fakultas'              => $fakultas,
            'jurusan'               => $jurusan,

        );

        $where = array(
            'id' => $id
        );

        $this->M_laporan_merdeka->update_data($where, $data, 'laporan_merdeka');
        $this->session->set_flashdata('pesan_laporan_merdeka_admin', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Laporan akhir berhasil diupdate!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
            </div>');
        redirect('administrator/Laporan_akhir_merdeka');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_laporan_merdeka->hapus_data($where, 'laporan_merdeka');
        $this->session->set_flashdata('pesan_laporan_merdeka_admin', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Laporan berhasil dihapus!
         <button type="button"class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('administrator/Laporan_akhir_merdeka');
    }
    public function search()
    {

        $config['base_url'] = site_url('/administrator/Laporan_akhir_merdeka');
        $config['total_rows'] = $this->db->count_all('laporan_merdeka');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $choice = $config["total_rows"] / $config['per_page'];
        $config["num_links"] = floor($choice);

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo</span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';


        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;



        $data['laporan_merdeka'] = $this->M_laporan_merdeka->get_data($config["per_page"], $data['page'])->result();
        $data['pagination'] = $this->pagination->create_links();



        $keyword = $this->input->post('keyword');
        $data['laporan_merdeka'] = $this->M_laporan_merdeka->get_keyword($keyword);
        $data['title'] = 'search laporan akhir';



        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/v_laporan_akhir_merdeka', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function downloadExcel()
    {

        $data['laporan_merdeka'] = $this->M_laporan_merdeka->export_excel('laporan_akhir_merdeka')->result_array();

        $this->load->view('administrator/laporan_akhir_merdeka_excel', $data);
    }
}
