<?php

class C_lokasiKkn extends CI_Controller
{
    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'wilayah' => $this->M_lokasiKkn->getWilayah()->result()
        );
        $data['title'] = "Data Lokasi KKN";
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/lokasi_kkn/v_lokasiKkn', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function create()
    {
        $data['title'] = " Tambah Data Lokasi KKN";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'provinsi' =>$this->M_lokasiKkn->getProvinsi(),
            'dpl' => $this->M_lokasiKkn->getDpl()
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/lokasi_kkn/v_create_lokasiKkn',$data);
        $this->load->view('templates_administrator/footer',$data);
    }

    function get_kabupaten(){
        $provinsi_id = $this->input->post('id',TRUE);
        $data = $this->M_lokasiKkn->get_kabupaten($provinsi_id)->result();
        echo json_encode($data);
    }
   

    public function get_kecamatan()
    { 

        $kab_id = $this->input->post('id',TRUE);
        $data = $this->M_lokasiKkn->get_kecamatan($kab_id)->result();
        echo json_encode($data);
    }

    public function get_desa()
    { 

        $kec_id = $this->input->post('id',TRUE);
        $data = $this->M_lokasiKkn->get_desa($kec_id)->result();
        echo json_encode($data);
    }


    public function store()
    {
        $prov = $this->input->post('provinsi');
        $kab = $this->input->post('kab');
        $kec = $this->input->post('kec');
        $desa = $this->input->post('desa');
        $kuota = $this->input->post('kuota');
        $dpl = $this->input->post('dpl');

        $data = array(
            'provinsi_id'  => $prov,
            'kabupaten_id'  => $kab,
            'kecamatan_id' => $kec,
            'desa_id'   => $desa,
            'kuota_kkn' =>$kuota,
            'id_dpl' => $dpl
        );

        $getDesa = $this->M_lokasiKkn->get_desa_name($desa)->row();

        $this->M_lokasiKkn->insert_data($data, 'lokasi_kkn');
        $user_id = $this->db->insert_id(); 

        $dataLogin = [
            'username'  => strtolower($getDesa->name_village),
            'password'  => md5(strtolower($getDesa->name_village)),
            'level'     => 'desa',
            'id_user'   => $user_id
        ];
        $this->M_user->insert_data($dataLogin, 'login_user');
        $this->session->set_flashdata('lokasi', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_lokasiKkn');
    }

    public function edit($id)
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'provinsi' =>$this->M_lokasiKkn->getProvinsi(),
            'lokasi'    => $this->M_lokasiKkn->getData('lokasi_kkn',$id)->row(),
            'dpl' => $this->M_lokasiKkn->getDpl()
        );
        $data['getKab'] = $this->M_kkn->get_kabupaten($data['lokasi']->provinsi_id)->result();
        $data['getKec'] = $this->M_kkn->get_kecamatan($data['lokasi']->kabupaten_id)->result();
        $data['getDesa'] = $this->M_kkn->get_desa($data['lokasi']->kecamatan_id)->result();

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/lokasi_kkn/v_edit_lokasiKkn', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $id_lokasi = $this->input->post('id_lokasi');
        $provinsi_id   = $this->input->post('provinsi');
        $kabupaten_id     = $this->input->post('kab');
        $kecamatan_id     = $this->input->post('kec');
        $desa_id     = $this->input->post('desa');
        $kuota = $this->input->post('kuota');
        $id_dpl = $this->input->post('dpl');

        $data = [
            'provinsi_id'       => $provinsi_id,
            'kabupaten_id'      => $kabupaten_id,
            'kecamatan_id'      => $kecamatan_id,
            'desa_id'           => $desa_id,
            'kuota_kkn'         => $kuota,
            'id_dpl'            => $id_dpl
        ];

        $this->M_lokasiKkn->updateData($id_lokasi, $data, 'lokasi_kkn');
        $this->session->set_flashdata('lokasi', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil diubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_lokasiKkn');
    }

    public function destroy($id)
    {
        $where = array('id_lokasi' => $id);
        $whereUserLogin = ['id_user' => $id];
        $this->M_lokasiKkn->hapusData($where, 'lokasi_kkn');
        $this->M_user->hapusUser($whereUserLogin, 'login_user');
        $this->session->set_flashdata('lokasi', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        data berhasil dihapus!
         <button type="button"class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('administrator/C_lokasiKkn');
    }
}