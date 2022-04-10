<?php

class C_fakultas extends CI_Controller
{
    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );
        $data['title'] = "Data Fakultas";
        $data['fakultas'] = $this->M_fakultas->all_data('fakultas')->result();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/v_fakultas', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function create()
    {
        $data['title'] = " Tambah Data Fakultas";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/v_create_fakultas');
        $this->load->view('templates_administrator/footer');
    }

    public function store()
    {
        $nama = $this->input->post('nama');

        $data = array(
            'nama'  => $nama
        );

        $this->M_fakultas->insert_data($data, 'fakultas');
        $this->session->set_flashdata('fakultas', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_fakultas');
    }

    public function edit($id)
    {
        $data['title'] = "Edit Fakultas";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );
        $data['fakultas'] = $this->M_fakultas->getData('fakultas', $id)->row();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/v_edit_fakultas', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $nama   = $this->input->post('nama');
        $id     = $this->input->post('id');

        $data = [
            'nama' => $nama
        ];

        $this->M_fakultas->updateData($id, $data, 'fakultas');
        $this->session->set_flashdata('fakultas', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_fakultas');
    }

    public function destroy($id)
    {
        $where = array('id' => $id);
        $this->M_fakultas->hapusData($where, 'fakultas');
        $this->session->set_flashdata('fakultas', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        data berhasil dihapus!
         <button type="button"class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('administrator/C_fakultas');
    }
}