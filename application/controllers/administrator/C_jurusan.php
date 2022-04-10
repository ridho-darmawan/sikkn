<?php

class C_jurusan extends CI_Controller
{
    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );
        $data['title'] = "Data Jurusan";
        $data['jurusan'] = $this->M_jurusan->all_data('jurusan')->result();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/jurusan/v_jurusan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function create()
    {
        $data['title'] = " Tambah Data Jurusan";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'fakultas' =>$this->M_jurusan->getDataFakultas()
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/jurusan/v_create_jurusan',$data);
        $this->load->view('templates_administrator/footer',$data);
    }

    public function store()
    {
        $nama = $this->input->post('nama');
        $fakultas_id = $this->input->post('fakultas');

        $data = array(
            'nama_jurusan'  => $nama,
            'fakultas_id'  => $fakultas_id
        );

        $this->M_jurusan->insert_data($data, 'jurusan');
        $this->session->set_flashdata('jurusan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_jurusan');
    }

    public function edit($id)
    {
        $data['title'] = "Edit Jurusan";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'fakultas' =>$this->M_jurusan->getDataFakultas(),
            'jurusan' => $this->M_jurusan->getData('jurusan', $id)->row()
        );
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/jurusan/v_edit_jurusan', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $nama   = $this->input->post('nama');
        $id     = $this->input->post('id');
        $fakultas = $this->input->post('fakultas');

        $data = [
            'nama_jurusan'  => $nama,
            'fakultas_id'   => $fakultas
        ];

        $this->M_jurusan->updateData($id, $data, 'jurusan');
        $this->session->set_flashdata('jurusan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil diubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_jurusan');
    }

    public function destroy($id)
    {
        $where = array('id_jurusan' => $id);
        $this->M_jurusan->hapusData($where, 'jurusan');
        $this->session->set_flashdata('jurusan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        data berhasil dihapus!
         <button type="button"class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('administrator/C_jurusan');
    }
}