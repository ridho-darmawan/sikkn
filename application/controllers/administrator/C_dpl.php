<?php

class C_dpl extends CI_Controller
{
    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );
        $data['title'] = "Data DPL";
        $data['dpl'] = $this->M_dpl->all_data('dpl')->result();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/dpl/v_dpl', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function create()
    {
        $data['title'] = " Tambah Data DPL";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/dpl/v_create_dpl',$data);
        $this->load->view('templates_administrator/footer',$data);
    }

    public function store()
    {
        $nama_dpl = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');

        $sk = $_FILES['sk']['name'];

        if ($sk != "") 
        {

            $randomString = random_string('numeric', 3);
            $config['max_size'] = '1024';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['upload_path'] = 'assets/uploads';
            $config['file_name'] = "sk-" . $randomString;
            $config['overwrite'] = true;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('sk')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('sk', $userfile);
            }
             else {
                
                echo "Gagal Upload";
                die();
            }
        }

        $data = array(
            'nama_dpl'  => $nama_dpl,
            'nip'  => $nip,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir'  => $tgl_lahir,
            'alamat'  => $alamat,
            'no_hp'  => $no_hp
        );

        $this->M_dpl->insert_data($data, 'dpl');
        $insert_id = $this->db->insert_id(); 
        $dataLoginDpl = [
            'username' => $nip,
            'password' => md5($nip),
            'level'    => 'dpl', 
            'id_user'  => $insert_id
        ]; 

        $this->M_user->insert_data($dataLoginDpl, 'login_user');
        $this->session->set_flashdata('dpl', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_dpl');
    }

    public function edit($id)
    {
        $data['title'] = "Edit DPL";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'dpl' => $this->M_dpl->getData('dpl', $id)->row()
        );
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/dpl/v_edit_dpl', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $nama_dpl = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $id     = $this->input->post('id');

        $sk = $_FILES['sk']['name'];

        if ($sk != "") 
        {

            $randomString = random_string('numeric', 3);
            $config['max_size'] = '1024';
            $config['allowed_types'] = 'jpg|jpeg|png|pdf';
            $config['upload_path'] = 'assets/uploads';
            $config['file_name'] = "sk-" . $randomString;
            $config['overwrite'] = true;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('sk')) {
                $userfile = $this->upload->data('file_name');
                $this->db->set('sk', $userfile);
            }
             else {
                
                echo "Gagal Upload";
                die();
            }
        }

        $data = array(
            'nama_dpl'  => $nama_dpl,
            'nip'  => $nip,
            'tempat_lahir'  => $tempat_lahir,
            'tanggal_lahir'  => $tgl_lahir,
            'alamat'  => $alamat,
            'no_hp'  => $no_hp,
        );

        $this->M_dpl->updateData($id, $data, 'dpl');
        $this->session->set_flashdata('dpl', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil diubah!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_dpl');
    }

    public function destroy($id)
    {
        $where = array('id_dpl' => $id);
        $whereUser = ['id_user' => $id];
        $this->M_dpl->hapusData($where, 'dpl');
        $this->M_user->hapusUser($whereUser,'login_user');
        $this->session->set_flashdata('dpl', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        data berhasil dihapus!
         <button type="button"class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('administrator/C_dpl');
    }

  
}