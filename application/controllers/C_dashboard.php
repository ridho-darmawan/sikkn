<?php

class C_dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Anda belum login!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
          </div>');
            redirect('C_login');
        }
    }


    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);

        // var_dump($data);die;
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'dpl' => $this->M_user->dataDpl($data->id_user, 'dpl')->row(),
        );
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/Dashboard', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function mahasiswa()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);

        // var_dump($data);die;
        $nim = $data->id_user;
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'mahasiswa' => $this->M_dashboard->getMahasiswa($nim)->row(),
            'cekJadwalKkn' => $this->M_kkn->jadwalKkn('setting_kkn')->row(),
            
        );
        $data['kkn'] = $this->M_kkn->getData($this->session->userdata['username'],'mahasiswa')->row();
        $data['dataKkn'] = $this->M_kkn->getDataKkn($data['kkn']->id_mhs,'kkn')->row();
        if (empty($data['dataKkn'])) {
            $data['mahasiswa1'] = [];
        }else{
            $data['mahasiswa1'] = $this->M_dashboard->all_data($data['dataKkn']->lokasi_kkn)->result();
            $data['pembimbing'] = $this->M_kkn->getPembimbing($data['dataKkn']->lokasi_kkn)->row();
        }
        
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/v_dashboardMahasiswa', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function admin()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);

        $nim = $data->id_user;
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'username' =>$data->username,
            'totalPendaftar' =>sda,
        );
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/v_dashboardAdmin', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function desa()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);

        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'username' => $data->username,
            // 'dpl' => $this->M_user->dataDpl($data->id_user, 'dpl')->row(),
        );
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/v_dashboardDesa', $data);
        $this->load->view('templates_administrator/footer');
    }
}
