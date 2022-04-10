<?php

class Kkn_reguler extends CI_Controller
{

    public function index()
    {
        if ($this->session->level == 'admin') {
            $data['Kkn_reguler'] = $this->Kkn_reguler_model->tampil_data_admin('kkn_reguler')->result();
        } else {
            $data['Kkn_reguler'] = $this->Kkn_reguler_model->tampil_data('kkn_reguler', $this->session->userdata('nim'))->result();
        }


        $data['cek_nim'] = $this->Kkn_reguler_model->tampil_data('kkn_reguler', $this->session->userdata('nim'))->result();
        $data['title'] = "KKN Reguler";
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar_user');
        $this->load->view('mahasiswa/Kkn_reguler', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function detail($id)
    {
        $data['title'] = "Detail Data";
        $data['detail'] = $this->Kkn_reguler_model->ambil_id_kkn_reguler($id);
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar_user');
        $this->load->view('mahasiswa/Kkn_reguler_detail', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_Kkn_reguler()
    {
        $data['title'] = " Tambah Data";
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar_user');
        $this->load->view('mahasiswa/Kkn_reguler_form', $data);
        $this->load->view('templates_administrator/footer');
    }


    public function tambah_Kkn_reguler_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_Kkn_reguler();
        } else {
            $nim                       = $this->input->post('nim');
            $nama_lengkap              = $this->input->post('nama_lengkap');
            $fakultas                  = $this->input->post('fakultas');
            $jurusan_prodi             = $this->input->post('jurusan_prodi');
            $tempat_lahir              = $this->input->post('tempat_lahir');
            $tanggal_lahir             = $this->input->post('tanggal_lahir');
            $semester                  = $this->input->post('semester');
            $agama                     = $this->input->post('agama');
            $no_hp                     = $this->input->post('no_hp');
            $alamat_sekarang           = $this->input->post('alamat_sekarang');
            $asal_daerah               = $this->input->post('asal_daerah');
            $rekom_jurusanprodi = $_FILES['rekom']['name'];
            $krs = $_FILES['krs']['name'];
            $slip = $_FILES['slip']['name'];
            $sk_bm = $_FILES['sk_bm']['name'];
            $sk_ukt = $_FILES['sk_ukt']['name'];
            $sk_sehat = $_FILES['sk_sehat']['name'];
            $rekom_kkn = $_FILES['rekom_kkn']['name'];
            $photo = $_FILES['photo']['name'];
            $foto_almamater = $_FILES['foto_almamater']['name'];

            if ($rekom_jurusanprodi !== "") {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "rekom-jurusan-prodi-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('rekom')) {
                    // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('rekom_jurusanprodi', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($krs !== "") {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "krs-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('krs')) {
                    // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('krs', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($slip !== "") {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "slip-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('slip')) {
                    // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('slip', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($sk_bm !== "") {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "sk_bm-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('sk_bm')) {
                    // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('sk_bm', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($sk_ukt !== "") {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "sk_bm-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('sk_ukt')) {
                    // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('sk_ukt', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($sk_sehat !== "") {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "sk_sehat-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('sk_sehat')) {
                    // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('sk_sehat', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($rekom_kkn !== "") {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "rekom_kkn-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('rekom_kkn')) {
                    // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('rekom_kkn', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($photo !== "") {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "photo-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('photo')) {
                    // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('photo', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($foto_almamater !== "") {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "foto_almamater-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto_almamater')) {
                    // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('foto_almamater', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }






            $data = array(
                'nim'                   => $nim,
                'nama_lengkap'          => $nama_lengkap,
                'fakultas'              => $fakultas,
                'jurusan_prodi'         => $jurusan_prodi,
                'tempat_lahir'          => $tempat_lahir,
                'tanggal_lahir'         => $tanggal_lahir,
                'semester'              => $semester,
                'agama'                 => $agama,
                'no_hp'                 => $no_hp,
                'alamat_sekarang'       => $alamat_sekarang,
                'asal_daerah'           => $asal_daerah,
                // 'rekom_jurusanprodi'    => $rekom_jurusanprodi,
                // 'krs'                   => $krs,
                // 'slip'                  => $slip,
                // 'sk_bm'                 => $sk_bm,
                // 'sk_ukt'                => $sk_ukt,
                // 'sk_sehat'              => $sk_sehat,
                // 'rekom_kkn'             => $rekom_kkn,
                // 'photo'                 => $photo,
                // 'foto_almamater'        => $foto_almamater,

            );



            $this->Kkn_reguler_model->insert_data($data, 'Kkn_reguler');
            $this->session->set_flashdata('pesan_kkn_reguler', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
            </div>');
            redirect('mahasiswa/Kkn_reguler');
        }
    }

    public function update($id)
    {
        // $where = array('id' => $id);
        $data['title'] = "Update Data KKN Reguler";
        $data['Kkn_reguler'] = $this->Kkn_reguler_model->edit_data('Kkn_reguler', $id)->result();
        $ayam = $this->Kkn_reguler_model->edit_data('Kkn_reguler', $id)->result();
        // var_dump($ayam);die;
        $data['detail'] = $this->Kkn_reguler_model->ambil_id_kkn_reguler($id);
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar_user');
        $this->load->view('mahasiswa/Kkn_reguler_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_Kkn_reguler_aksi()
    {

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update('id');
        } else {

            // get value file folder

            $rekom                     = $this->input->post('rekom');
            $krs1                       = $this->input->post('krs1');
            $slip1                      = $this->input->post('slip1');
            $sk_bm1                     = $this->input->post('sk_bm1');
            $sk_ukt1                    = $this->input->post('sk_ukt1');
            $foto_almamater1            = $this->input->post('foto_almamater1');
            $sk_sehat1                  = $this->input->post('sk_sehat1');
            $rekom_kkn1               = $this->input->post('rekom_kkn1');
            $photo1                     = $this->input->post('photo1');




            $id                        = $this->input->post('id');
            $nim                       = $this->input->post('nim');
            $nama_lengkap              = $this->input->post('nama_lengkap');
            $fakultas                  = $this->input->post('fakultas');
            $jurusan_prodi             = $this->input->post('jurusan_prodi');
            $tempat_lahir              = $this->input->post('tempat_lahir');
            $tanggal_lahir             = $this->input->post('tanggal_lahir');
            $semester                  = $this->input->post('semester');
            $agama                     = $this->input->post('agama');
            $no_hp                     = $this->input->post('no_hp');
            $alamat_sekarang           = $this->input->post('alamat_sekarang');
            $asal_daerah               = $this->input->post('asal_daerah');
            $rekom_jurusanprodi        = $_FILES['rekom_jurusanprodi']['name'];
            $krs                       = $_FILES['krs']['name'];
            $slip                      = $_FILES['slip']['name'];
            $sk_bm                     = $_FILES['sk_bm']['name'];
            $sk_ukt                    = $_FILES['sk_ukt']['name'];
            $foto_almamater            = $_FILES['foto_almamater']['name'];
            $sk_sehat                  = $_FILES['sk_sehat']['name'];
            $rekom_kkn                 = $_FILES['rekom_kkn']['name'];
            $photo                     = $_FILES['photo']['name'];

            // var_dump($rekom_jurusanprodi);die;   



            if ($rekom_jurusanprodi) {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "rekom-jurusan-prodi-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('rekom_jurusanprodi')) {
                    unlink(FCPATH . "/assets/uploads/" . $rekom); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('rekom_jurusanprodi', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($krs) {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "krs-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('krs')) {
                    unlink(FCPATH . "/assets/uploads/" . $krs1); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('krs', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($slip) {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "slip-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('slip')) {
                    unlink(FCPATH . "/assets/uploads/" . $slip1); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('slip', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($sk_bm) {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "sk_bm-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('sk_bm')) {
                    unlink(FCPATH . "/assets/uploads/" . $sk_bm1); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('sk_bm', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($sk_ukt) {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "sk_ukt-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('sk_ukt')) {
                    unlink(FCPATH . "/assets/uploads/" . $sk_ukt1); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('sk_ukt', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($foto_almamater) {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "foto_almamater-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto_almamater')) {
                    unlink(FCPATH . "/assets/uploads/" . $foto_almamater1); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('foto_almamater', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($sk_sehat) {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "sk_sehat-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('sk_sehat')) {
                    unlink(FCPATH . "/assets/uploads/" . $sk_sehat1); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('sk_sehat', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }

            if ($rekom_kkn) {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '10000';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "rekom_kkn-" . $nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('rekom_kkn')) {
                    unlink(FCPATH . "/assets/uploads/" . $rekom_kkn1); //hapus file lama
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('rekom_kkn', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }





            if ($photo) {
                $config['upload_path'] = 'assets/uploads';
                $config['allowed_types'] = 'jpg|png|gif|tift';

                $this->load->library('upload', $config);
                if ($this->upload->do_upload('userfile')) {
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('photo', $userfile);
                } else {
                    echo "Gagal Upload";
                    die();
                }
            }
            $data = array(
                'nim'                   => $nim,
                'nama_lengkap'          => $nama_lengkap,
                'fakultas'              => $fakultas,
                'jurusan_prodi'         => $jurusan_prodi,
                'tempat_lahir'          => $tempat_lahir,
                'tanggal_lahir'         => $tanggal_lahir,
                'semester'              => $semester,
                'agama'                 => $agama,
                'no_hp'                 => $no_hp,
                'alamat_sekarang'       => $alamat_sekarang,
                'asal_daerah'           => $asal_daerah,
                // 'rekom_jurusanprodi'    => $rekom_jurusanprodi,
                // 'krs'                   => $krs,
                // 'slip'                  => $slip,
                // 'sk_bm'                 => $sk_bm,
                // 'sk_ukt'                => $sk_ukt,
                // 'foto_almamater'        => $foto_almamater,
                // 'sk_sehat'              => $sk_sehat,
                // 'rekom_kkn'             => $rekom_kkn
            );

            $where = array(
                'id' => $id
            );

            $this->Kkn_reguler_model->update_data($where, $data, 'Kkn_reguler');
            $this->session->set_flashdata('pesan_kkn_reguler', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                 Data KKN berhasil diupdate!
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times; </span>
             </button>
             </div>');
            redirect('mahasiswa/Kkn_reguler');
        }
    }
    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->Kkn_reguler_model->hapus_data($where, 'Kkn_reguler');
        $this->session->set_flashdata('pesan_kkn_reguler', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data KKN berhasil dihapus!
         <button type="button"class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
     </button>
     </div>');
        redirect('mahasiswa/Kkn_reguler');
    }

    public function downloadZip($id)
    {

        $query = $this->Kkn_reguler_model->ambil_id_kkn_reguler($id);

        foreach ($query as $q) {
            $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->rekom_jurusanprodi);
            $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->krs);
            $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->slip);
            $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->sk_bm);
            $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->sk_ukt);
            $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->foto_almamater);
            $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->sk_sehat);
            $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->rekom_kkn);
        }

        $this->zip->download('Data Berkas KKN Reguler.zip');
    }
    public function search()
    {

        // $config['base_url'] = site_url('administrator/Kkn_reguler');
        // $config['total_rows'] = $this->db->count_all('kkn_reguler');
        // $config['per_page'] = 10;
        // $config['uri_segment'] = 3;
        // $choice = $config["total_rows"] / $config['per_page'];
        // $config["num_links"] = floor($choice);

        // $config['first_link'] = 'First';
        // $config['last_link'] = 'Last';
        // $config['next_link'] = 'Next';
        // $config['prev_link'] = 'Prev';
        // $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        // $config['full_tag_close'] = '</ul></nav></div>';
        // $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['num_tag_close'] = '</span></li>';
        // $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        // $config['cur_tag_close'] = '</span></li>';
        // $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['next_tagl_close'] = '<span aria-hidden="true">&raquo</span></li>';
        // $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['prev_tagl_close'] = '</span>Next</li>';
        // $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['first_tagl_close'] = '</span></li>';
        // $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        // $config['last_tagl_close'] = '</span></li>';


        // $this->pagination->initialize($config);
        // $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;



        // $data['Kkn_reguler'] = $this->Kkn_reguler_model->get_data($config["per_page"], $data['page'])->result();
        // $data['pagination'] = $this->pagination->create_links();



        $keyword = $this->input->post('cari_data');
        $data['Kkn_reguler'] = $this->Kkn_reguler_model->get_keyword($keyword);


        $data['title'] = 'search data KKN Reguler';
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar_user');
        $this->load->view('mahasiswa/Kkn_reguler', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function downloadExcel()
    {

        $data['kkn'] = $this->Kkn_reguler_model->export_excel('Kkn_reguler')->result_array();

        $this->load->view('mahasiswa/laporan_excel', $data);
    }




    public function _rules()
    {
        $this->form_validation->set_rules('nim', 'Nim', 'required', [
            'required' => 'NIM wajib diisi!'
        ]);

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', [
            'required' => 'Nama Lengkap wajib diisi!'
        ]);

        $this->form_validation->set_rules('fakultas', 'fakultas', 'required', [
            'required' => 'Fakultas wajib diisi!'
        ]);

        $this->form_validation->set_rules('jurusan_prodi', 'Jurusan/Prodi', 'required', [
            'required' => 'Jurusan/Prodi wajib diisi!'
        ]);

        $this->form_validation->set_rules('tempat_lahir', 'Tempat_lahir', 'required', [
            'required' => 'Tempat Lahir wajib diisi!'
        ]);

        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal_lahir', 'required', [
            'required' => 'Tanggal Lahir wajib diisi!'
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required', [
            'required' => 'Semester wajib diisi!'
        ]);

        $this->form_validation->set_rules('agama', 'Agama', 'required', [
            'required' => 'Agama wajib diisi!'
        ]);

        $this->form_validation->set_rules('no_hp', 'Nomor Telepon', 'required', [
            'required' => 'Nomor Telepon wajib diisi!'
        ]);

        $this->form_validation->set_rules('alamat_sekarang', 'Alamat sekarang', 'required', [
            'required' => 'Alamat wajib diisi!'
        ]);

        $this->form_validation->set_rules('asal_daerah', 'Asal daerah', 'required', [
            'required' => 'Asal Daerah wajib diisi!'
        ]);

        // $this->form_validation->set_rules('rekom', 'Rekom jurusanprodi', 'required', [
        //     'required' => 'Rekomendasi wajib diisi!'
        // ]);

        // $this->form_validation->set_rules('krs', 'KRS', 'required', [
        //     'required' => 'KRS wajib diisi!'
        // ]);
        // $this->form_validation->set_rules('slip', 'Slip', 'required', [
        //     'required' => 'Slip wajib diisi!'
        // ]);

        // $this->form_validation->set_rules('foto_almamater', 'Foto almamater', 'required', [
        //     'required' => 'Foto wajib diisi!'
        // ]);

        // $this->form_validation->set_rules('sk_sehat', 'Sk sehat', 'required', [
        //     'required' => 'Surat Berbadan Sehat wajib diisi!'
        // ]);

        // $this->form_validation->set_rules('rekom_kkn',  'rekom_kkn', 'required', [
        //     'required' => 'Rekomendasi KKN wajib diisi!'
        // ]);
    }
}
