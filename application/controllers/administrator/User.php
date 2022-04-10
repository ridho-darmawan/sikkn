<?php

class User extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->User_model->tampil_data('user')->result();
        $data['title'] = "Data User";
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/Daftar_user', $data);
        $this->load->view('templates_administrator/footer');
    }
    public function tambah_user()
    {
        $data = array(
            'nama'            => set_value('nama'),
            'password'       => set_value('password'),
            'email'          => set_value('email'),
            'level'          => set_value('level'),
            'blokir'         => set_value('blokir'),
        );
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/User_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_user_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_user();
        } else {
            $data = array(
                'nama'           => $this->input->post('nama', TRUE),
                'password'      => MD5($this->input->post('password', TRUE)),
                'email'         => $this->input->post('email', TRUE),
                'level'         => $this->input->post('level', TRUE),
                'blokir'        => $this->input->post('blokir', TRUE),
                'id_sessions'    => MD5($this->input->post('id_sessions', TRUE)),
            );
        }

        $this->User_model->insert_data($data, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Admin berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/user');
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password wajib diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required', [
            'required' => 'Email wajib diisi!'
        ]);
        $this->form_validation->set_rules('level', 'Level', 'required', [
            'required' => 'Level wajib diisi!'
        ]);
        $this->form_validation->set_rules('blokir', 'Blokir', 'required', [
            'required' => 'Blokir wajib diisi!'
        ]);
    }
    public function update($id)
    {
        $where = array('id' => $id);
        $data['title'] = "Edit User";
        $data['User'] = $this->User_model->edit_data($where, 'User')->result();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/user_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi()
    {
        $id          = $this->input->post('id');
        $nama         = $this->input->post('nama');
        $password    = $this->input->post('password');
        $email       = $this->input->post('email');
        $level       = $this->input->post('level');
        $blokir      = $this->input->post('blokir');
        $id_sessions = $this->input->post('id_sessions');

        $data = array(
            'nama'        => $nama,
            'password'   => $password,
            'email'      => $email,
            'level'      => $level,
            'blokir'     => $blokir,
        );

        $where = array(
            'id' => $id
        );

        $this->User_model->update_data($where, $data, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Admin berhasil diupdate!
                 <button type="button"class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
             </button>
             </div>');
        redirect('administrator/user');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->User_model->hapus_data($where, 'user');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Admin berhasil dihapus!
         <button type="button"class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
     </button>
     </div>');
        redirect('administrator/user');
    }
}
