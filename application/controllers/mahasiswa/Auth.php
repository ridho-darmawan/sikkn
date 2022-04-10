<?php

class Auth extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Login";
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('administrator/login');
        $this->load->view('templates_administrator/footer');
    }

    public function proses_login()
    {
        $this->form_validation->set_rules('nama', 'nama', 'required', [
            'required' => 'Nama wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'password', 'required', [
            'required' => 'Password wajib diisi!'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_administrator/header');
            $this->load->view('administrator/login');
            $this->load->view('templates_administrator/footer');
        } else {
            $nama = $this->input->post('nama');
            $password = $this->input->post('password');


            $user = $nama;
            $pass = MD5($password);

            $cek = $this->Login_model->cek_login($user, $pass);

            if ($cek->num_rows() > 0) {
                foreach ($cek->result() as $ck) {
                    $sess_data['nama'] = $ck->nama;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['level'] == 'admin') {
                    redirect('administrator/dashboard');
                } else {
                    $this->session->flashdata('pesan user', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password anda salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('administrator/auth');
                }
            } else {
                $this->session->flashdata('pesan user', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password anda salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times; </span>
                    </button>
                  </div>');
                redirect('administrator/auth');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('administrator/auth');
    }
}
