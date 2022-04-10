<?php

class C_pimpinan extends CI_Controller
{
    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );
        $data['title'] = "Pimpinan";
        $data['pimpinan'] = $this->M_pimpinan->all_data('setting_kkn')->row();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/pimpinan/v_pimpinan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function create()
    {
        $data['title'] = " Set Pimpinan";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        // $data['pimpinan'] = $this->M_pimpinan->all_data('setting_kkn')->row();
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'pimpinan' => $this->M_pimpinan->all_data('setting_kkn')->row()
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/pimpinan/v_create_pimpinan',$data);
        $this->load->view('templates_administrator/footer',$data);
    }

    public function store()
    {
        $id = $this->input->post('id');
        $ketua = $this->input->post('ketua');
        $nip_ketua = $this->input->post('nip_ketua');
        $koordinator_kkn = $this->input->post('koordinator');
        $nip_koordinator_kkn = $this->input->post('nip_koordinator');

        $ttd_ketua = $_FILES['ttd_ketua']['name'];
        $ttd_koordinator_kkn = $_FILES['ttd_koordinator']['name'];

        if ($ttd_ketua !== "") {
            // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
            $randomString = random_string('numeric', 3);
            $config['max_size'] = '2024';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['upload_path'] = 'assets/uploads/';
            $config['file_name'] = "ttd-" . $randomString;
            $config['overwrite'] = true;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('ttd_ketua')) {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $userfile = $this->upload->data('file_name');
                $this->db->set('ttd_ketua', $userfile);
            } else {
                echo "Gagal Upload";
                die();
            }
        }

        if ($ttd_koordinator_kkn !== "") {
            // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
            $randomString = random_string('numeric', 3);
            $config['max_size'] = '1024';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['upload_path'] = 'assets/uploads/';
            $config['file_name'] = "ttd-" . $randomString;
            $config['overwrite'] = true;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('ttd_koordinator')) {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $userfile = $this->upload->data('file_name');
                $this->db->set('ttd_koordinator', $userfile);
            } else {
                echo "Gagal Uploaad";
                die();
            }
        }

        $data = array(
            'ketua'  => $ketua,
            'nip_ketua'  => $nip_ketua,
            'koordinator_kkn'  => $koordinator_kkn,
            'nip_koordinator'  => $nip_koordinator_kkn,
        );

        $this->M_pimpinan->updateData($id, $data, 'setting_kkn');
        $this->session->set_flashdata('pimpinan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_pimpinan');
    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Pimpinan";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );
        $data['pimpinan'] = $this->M_pimpinan->all_data('setting_kkn')->row();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/pimpinan/v_edit_pimpinan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $ketua = $this->input->post('ketua');
        $nip_ketua = $this->input->post('nip_ketua');
        $koordinator_kkn = $this->input->post('koordinator');
        $nip_koordinator_kkn = $this->input->post('nip_koordinator');

        $ttdKetuaLama = $this->input->post('ttd_ketua');
        $ttdKoordinatorLama = $this->input->post('ttd_koordinator_lama');

        $ttd_ketua = $_FILES['ttd_ketua']['name'];
        $ttd_koordinator_kkn = $_FILES['ttd_koordinator']['name'];

        if ($ttd_ketua) {
            
            $randomString = random_string('numeric', 3);
            $config['max_size'] = '2024';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['upload_path'] = 'assets/uploads/';
            $config['file_name'] = "ttd-" . $randomString;
            $config['overwrite'] = true;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('ttd_ketua')) {
                unlink(FCPATH."/assets/uploads/".$ttdKetuaLama); //hapus file lama
                $userfile = $this->upload->data('file_name');
                $this->db->set('ttd_ketua', $userfile);
            } else {
                echo "Gagal Upload";
                die();
            }
        }

        if ($ttd_koordinator_kkn) {
            
            $randomString = random_string('numeric', 3);
            $config['max_size'] = '1024';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['upload_path'] = 'assets/uploads/';
            $config['file_name'] = "ttd-" . $randomString;
            $config['overwrite'] = true;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('ttd_koordinator')) {
                unlink(FCPATH."/assets/uploads/".$ttdKoordinatorLama); //hapus file lama
                $userfile = $this->upload->data('file_name');
                $this->db->set('ttd_koordinator', $userfile);
            } else {
                echo "Gagal Uploaad";
                die();
            }
        }

        $data = array(
            'ketua'  => $ketua,
            'nip_ketua'  => $nip_ketua,
            'koordinator_kkn'  => $koordinator_kkn,
            'nip_koordinator'  => $nip_koordinator_kkn,
        );
        $this->M_pimpinan->updateData($id, $data, 'setting_kkn');
        $this->session->set_flashdata('pimpinan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil diubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_pimpinan');
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