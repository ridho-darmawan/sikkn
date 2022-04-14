<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_login extends CI_Controller
{

    public function index()
	{
		$this->load->view('v_login');
	}

    public function proses_login()
    {
        $data['title'] = "Login";
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password wajib diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) 
        {
            $this->load->view('v_login');
        } 
        else 
        {
            $username = $this->input->post('username');
            $password = MD5($this->input->post('password'));

            $cek = $this->M_login->cek_login($username, $password);

            if ($cek->num_rows() > 0) {
                foreach ($cek->result() as $ck) {
                    $sess_data['username'] = $ck->username;
                    $sess_data['level'] = $ck->level;
                    $sess_data['id_user'] = $ck->id_user;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['level'] == 'dpl') {
                    redirect('C_dashboard');
                }elseif($sess_data['level'] == 'mahasiswa'){
                    redirect('C_dashboard/mahasiswa');
                }elseif($sess_data['level'] == 'lppm'){
                    redirect('C_dashboard/admin');
                }elseif($sess_data['level'] == 'desa'){
                    redirect('C_dashboard/desa');
                }
               
            } 
            else 
            {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Username dan Password anda Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times; </span>
                    </button>
                  </div>');
                redirect('C_login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    

    // public function index()
    // {
    //     // Fungsi Login  
    //     $valid = $this->form_validation;
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     $valid->set_rules('username', 'Username', 'required');
    //     $valid->set_rules('password', 'Password', 'required');

    //     if ($valid->run()) {
    //         $this->simple_login->login($username, $password, base_url('dashboard'), base_url('login'));
    //     }
    //     // End fungsi login  
    //     $this->load->view('account/v_login');
    // }

    // public function logout()
    // {
    //     $this->simple_login->logout();
    // }
}
