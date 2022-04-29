<?php

class C_kkn extends CI_Controller
{

    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'cekJadwalKkn' => $this->M_kkn->jadwalKkn('setting_kkn')->row(),
        );

        // var_dump($data['cekJadwalKkn']);die;
        $data['title'] = "Data KKN ";
        $data['kkn'] = $this->M_kkn->getData($this->session->userdata['username'],'mahasiswa')->row();
        $data['dataKkn'] = $this->M_kkn->getDataKkn($data['kkn']->id_mhs,'kkn')->row();
        if ($data['dataKkn'] == null) {
            
        }else{
            $data['lokasiKkn'] = $this->M_kkn->getLokasiKknMahasiswa($data['dataKkn']->id_kkn,'kkn')->row();
            $data['pembimbing'] = $this->M_kkn->getPembimbing($data['lokasiKkn']->lokasi_kkn)->row();
        }
        
        $data['getProvinsi'] = $this->M_kkn->getProvinsi()->result();
      
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('mhs/v_kkn', $data);
        $this->load->view('templates_administrator/footer',$data);
    }

    public function destroy($id)
    {
        $getDataKkn = $this->M_kkn->getIdKkn($id,'kkn')->row();

        $where = array('id_kkn' => $id);
        // unlink(FCPATH . "/assets/uploads/" . $getDataKkn->rekom_kkn);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->krs);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->slip);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->sk_bm);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->sk_ukt);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->sk_sehat);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->sk_foto);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->rekom_jurusanprodi);
        $delete = $this->M_kkn->hapusData($where, 'kkn');
        
        $this->session->set_flashdata('kkn', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        data berhasil dihapus!
         <button type="button"class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('mahasiswa/C_kkn');
    }

    public function store()
    {
       
        $dataMahasiswa = $this->M_kkn->getDataMahasiswa('mahasiswa',$this->session->userdata('username'))->row();

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();

        } else {


            $jenis_kkn                 = $this->input->post('jenis_kkn');
            $semester                  = $this->input->post('semester');
            $lokasi_kkn                = $this->input->post('desa');
            $nama_lengkap              = $dataMahasiswa->nama_mhs;
            $fakultas                  = $dataMahasiswa->fakultas_id;
            $jurusan_prodi             = $dataMahasiswa->jurusan_id;
            $tempat_lahir              = $dataMahasiswa->tempat_lahir;
            $tanggal_lahir             = $dataMahasiswa->tanggal_lahir;
            $agama                     = $dataMahasiswa->agama;
            $no_hp                     = $dataMahasiswa->no_hp;
            $alamat_sekarang           = $dataMahasiswa->alamat;
            $asal_daerah               = $dataMahasiswa->asal_daerah;

            $rekom_jurusanprodi = $_FILES['rekom']['name'];
            $krs = $_FILES['krs']['name'];
            $slip = $_FILES['slip']['name'];
            $sk_bm = $_FILES['sk_bm']['name'];
            $sk_sehat = $_FILES['sk_sehat']['name'];
            $foto_almamater = $_FILES['foto_almamater']['name'];

            $randomString = random_string('numeric', 3);

            if ($foto_almamater != "") 
            {
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '1024';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "foto_almamater-" . $dataMahasiswa->nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('foto_almamater')) {
                    $userfile = $this->upload->data('file_name');
                    $this->db->set('foto', $userfile);
                }
                 else {
                     
                    echo "Gagal Upload foto almamater";
                    die();
                   
                }
            }

            if ($rekom_jurusanprodi !== "") {
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '1024';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "rekom-jurusan-prodi-" . $dataMahasiswa->nim . "-" . $randomString;
                $config['overwrite'] = true;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if ($this->upload->do_upload('rekom')) {
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
                $config['max_size'] = '1024';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "krs-" . $dataMahasiswa->nim . "-" . $randomString;
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
                $config['max_size'] = '1024';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "slip-" . $dataMahasiswa->nim . "-" . $randomString;
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
                $config['max_size'] = '1024';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "sk_bm-" . $dataMahasiswa->nim . "-" . $randomString;
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

            if ($sk_sehat !== "") {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                $randomString = random_string('numeric', 3);
                $config['max_size'] = '1024';
                $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                $config['upload_path'] = 'assets/uploads';
                $config['file_name'] = "sk_sehat-" . $dataMahasiswa->nim . "-" . $randomString;
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


            $data = array(
                'id_mhs_kkn'        => $dataMahasiswa->id_mhs,
                'semester'          => $semester,
                'jenis_kkn'         => $jenis_kkn,
                'lokasi_kkn'        => $lokasi_kkn,

            );

            

            $dataLokasiKkn = $this->M_kkn->lokasiKkn($lokasi_kkn,'lokasi_kkn')->row();

            $sisaKuota = $dataLokasiKkn->sisa_kuota + 1;

            $dataUpdateKuotaKkn = [
                'sisa_kuota' =>$sisaKuota
            ];
            

            $this->M_kkn->insert_data($data, 'kkn');            
            $idKkn = $this->db->insert_id();

            $this->M_kkn->updateKuotaKkn($lokasi_kkn,$dataUpdateKuotaKkn,'lokasi_kkn');

            $this->session->set_flashdata('kkn', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
            </div>');
            redirect('mahasiswa/C_kkn');
        }
    }

        function get_kabupaten(){
            $provinsi_id = $this->input->post('id',TRUE);
            $data = $this->M_kkn->get_kabupaten($provinsi_id)->result();
            echo json_encode($data);
        }
    

        public function get_kecamatan()
        { 
            $kab_id = $this->input->post('id',TRUE);
            $data = $this->M_kkn->get_kecamatan($kab_id)->result();
            echo json_encode($data);
        }

        public function get_desa($get)
        { 
            $kec_id = $this->input->post('id',TRUE);
            $data = $this->M_kkn->get_desa($kec_id)->result();
            echo json_encode($data);
        }
        

        public function downloadZip($id)
        {
            $query = $this->M_kkn->getIdKkn($id,'kkn')->result();

            foreach ($query as $q) {
                $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->rekom_jurusanprodi);
                $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->krs);
                $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->slip);
                $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->sk_bm);
                $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->sk_ukt);
                $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->foto);
                $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->sk_sehat);
                $this->zip->read_file(FCPATH . "/assets/uploads/" . $q->rekom_kkn);
            }

            $this->zip->download('file-pendukung.zip');
        }

        public function edit($id)
        {
            $data = $this->User_model->ambil_data($this->session->userdata['username']);
            $data = array(
                'nama' => $data->username,
                'level' => $data->level,
                'title' => $data->level,
            );
            $data['title'] = "Update Data KKN ";
            $data['kkn'] = $this->M_kkn->getIdKkn($id,'kkn')->row();
            $data['getLokasiKkn'] = $this->M_kkn->getLokasiKknMahasiswa($id,'kkn')->row();
            // var_dump($data['getLokasiKkn']);die;
            $data['getProvinsi'] = $this->M_kkn->getProvinsi()->result();
            $data['getKab'] = $this->M_kkn->get_kabupaten($data['getLokasiKkn']->province_id)->result();
            $data['getKec'] = $this->M_kkn->get_kecamatan($data['getLokasiKkn']->regency_id)->result();
            $data['getDesa'] = $this->M_kkn->get_desa($data['getLokasiKkn']->district_id)->result();
          
            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar', $data);
            $this->load->view('mhs/v_editKkn', $data);
            $this->load->view('templates_administrator/footer',$data);


        }

        public function update()
        {
            $dataMahasiswa = $this->M_kkn->getDataMahasiswa('mahasiswa',$this->session->userdata('username'))->row();
               
    
                $rekom                      = $this->input->post('rekom');
                $krs1                       = $this->input->post('krs1');
                $slip1                      = $this->input->post('slip1');
                $sk_bm1                     = $this->input->post('sk_bm1');
                $sk_ukt1                    = $this->input->post('sk_ukt1');
                $foto_almamater1            = $this->input->post('foto_almamater1');
                $sk_sehat1                  = $this->input->post('sk_sehat1');

                $id                        = $this->input->post('id'); 
                $jenis_kkn                 = $this->input->post('jenis_kkn');
                $semester                  = $this->input->post('semester');
                $lokasi_kkn                = $this->input->post('desa');

                $rekom_jurusanprodi        = $_FILES['rekom']['name'];
                $krs                       = $_FILES['krs']['name'];
                $slip                      = $_FILES['slip']['name'];
                $sk_bm                     = $_FILES['sk_bm']['name'];
                $foto                       = $_FILES['foto_almamater']['name'];
                $sk_sehat                  = $_FILES['sk_sehat']['name'];    
    
    
                if ($rekom_jurusanprodi) {
                    $randomString = random_string('numeric', 3);
                    $config['max_size'] = '10000';
                    $config['allowed_types'] = 'pdf|jpg|docx|jpeg|png';
                    $config['upload_path'] = 'assets/uploads';
                    $config['file_name'] = "rekom-jurusan-prodi-" .$dataMahasiswa->nim . "-" . $randomString;
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
                    $config['file_name'] = "krs-" .$dataMahasiswa->nim . "-" . $randomString;
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
                    $config['file_name'] = "slip-" .$dataMahasiswa->nim . "-" . $randomString;
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
                    $config['file_name'] = "sk_bm-" .$dataMahasiswa->nim . "-" . $randomString;
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
    
                if ($foto) {
                    // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
                    $randomString = random_string('numeric', 3);
                    $config['max_size'] = '10000';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['upload_path'] = 'assets/uploads';
                    $config['file_name'] = "foto_almamater-" .$dataMahasiswa->nim . "-" . $randomString;
                    $config['overwrite'] = true;
    
                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('foto_almamater')) {
                        unlink(FCPATH . "/assets/uploads/" . $foto_almamater1); //hapus file lama
                        $userfile = $this->upload->data('file_name');
                        $this->db->set('foto', $userfile);
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
                    $config['file_name'] = "sk_sehat-" .$dataMahasiswa->nim . "-" . $randomString;
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
    
                $data = array(
                 
                    'semester'              => $semester,
                    'jenis_kkn'             => $jenis_kkn,
                    'lokasi_kkn'             => $lokasi_kkn,
                );
    
                    
                $this->M_kkn->updateData($id, $data, 'kkn');


                $this->session->set_flashdata('kkn', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                     Data KKN berhasil diupdate!
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times; </span>
                 </button>
                 </div>');
                redirect('mahasiswa/C_kkn');
    
        }

        public function downloadExcelKknReguler()
        {
            $data['kkn'] = $this->M_kkn->export_excel_kkn_reguler('kkn')->result_array();
            $this->load->view('mhs/v_laporan_excel_reguler', $data);
        }

        public function downloadExcelKknMerdeka()
        {

            $data['kkn'] = $this->M_kkn->export_excel_kkn_merdeka('kkn')->result_array();

            // var_dump($data['kkn']);die;

            $this->load->view('mhs/v_laporan_excel_merdeka', $data);
        }

        public function _rules()
        {
            $this->form_validation->set_rules('jenis_kkn', 'Jenis KKN', 'required', [
                'required' => 'Jenis KKN wajib diisi!'
            ]);

            $this->form_validation->set_rules('semester', 'semester', 'required', [
                'required' => 'semester wajib diisi!'
            ]);

            if (empty($_FILES['foto_almamater']['name']))
            {
                $this->form_validation->set_rules('foto_almamater', 'Foto Alamamater', 'required', [
                    'required' => 'Foto wajib diisi ya!'
                ]);
            }
                

            if (empty($_FILES['sk_sehat']['name']))
            {
                $this->form_validation->set_rules('sk_sehat', 'Sk sehat', 'required', [
                    'required' => 'Surat Berbadan Sehat wajib diisi!'
                ]);
            }

            if (empty($_FILES['rekom']['name']))
            {
            $this->form_validation->set_rules('rekom', 'Rekom jurusanprodi', 'required', [
                'required' => 'Rekomendasi wajib diisi!'
                ]);
            }

            if (empty($_FILES['krs']['name']))
            {
                $this->form_validation->set_rules('krs', 'KRS', 'required', [
                    'required' => 'KRS wajib diisi!'
                ]);
            }

            if (empty($_FILES['slip']['name']))
            {
                $this->form_validation->set_rules('slip', 'Slip', 'required', [
                    'required' => 'Slip wajib diisi!'
                ]);
            }


            
        }

        public function mahasiswaDpl()
        {
            $data = $this->User_model->ambil_data($this->session->userdata['username']);

            $data = array(
                'nama' => $data->username,
                'level' => $data->level,
                'title' => $data->level,
                'getLokasiDpl' => $this->M_kkn->getLokasiDpl($data->id_user)->result(),
                'lokasiBimbingan' => [],
                
            );

            // var_dump($data['getLokasiDpl']);die;
        
            foreach ($data['getLokasiDpl'] as $value) {
            array_push($data['lokasiBimbingan'],$value->desa_id);
            }

            if (empty($data['getLokasiDpl'])) {
                $data['mhsBimbinganReguler'] = [];
                $data['mhsBimbinganMerdeka'] = [];
            }else{

                $data['mhsBimbinganReguler'] = $this->M_kkn->getMahasiswaBimbinganReguler($data['lokasiBimbingan'])->result();
                $data['mhsBimbinganMerdeka'] = $this->M_kkn->getMahasiswaBimbinganMerdeka($data['lokasiBimbingan'])->result();
            }


            $data['title'] = "Data Mahasiswa ";
        
            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar', $data);
            $this->load->view('administrator/dpl/v_mahasiswaDpl', $data);
            $this->load->view('templates_administrator/footer',$data);
        }

        public function inputNilai($id_nilai)
        {
            // $dataMhs = $this->M_kkn->getMahasiswa($id_mhs)->row();
            $data = $this->User_model->ambil_data($this->session->userdata['username']);

            $data = array(
                'nama' => $data->username,
                'level' => $data->level,
                'title' => $data->level,
                'id_nilai' =>$id_nilai
                
            );
            $data['title'] = "Input Nilai KKN";
            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar', $data);
            $this->load->view('administrator/dpl/v_inputNilaiDpl', $data);
            $this->load->view('templates_administrator/footer',$data);

        }
    
        public function storeNilaiKkn()
        {
            
            $id_nilai = $this->input->post('id_nilai');
            $disiplin = $this->input->post('disiplin');
            $kreatifitas = $this->input->post('kreatifitas');
            $kerjasama = $this->input->post('kerjasama');
            $komunikasi = $this->input->post('komunikasi');
            $kesesuaian = $this->input->post('kesesuaian');

            $data = [
                'disiplin_dpl' => $disiplin,
                'kreatifitas_dpl' => $kreatifitas,
                'kerjasama_dpl' =>$kerjasama,
                'komunikasi_dpl' =>$komunikasi,
                'kesesuaianhasil_dpl' =>$kesesuaian,
            ];

                $this->M_kkn->updateNilai($id_nilai,$data,'nilai_kkn');
                $this->session->set_flashdata('mhskkn', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times; </span>
                </button>
                </div>');
                redirect('mahasiswa/C_kkn/mahasiswaDpl');
            
        }

        public function editNilai($id_nilai)
        {
            // $dataMhs = $this->M_kkn->getMahasiswa($id_mhs)->row();
            $data = $this->User_model->ambil_data($this->session->userdata['username']);

            $data = array(
                'nama' => $data->username,
                'level' => $data->level,
                'title' => $data->level,                
                'nilai' => $this->M_kkn->cekNilai($id_nilai)->row(),
            );


            $data['title'] = "Edit Nilai KKN";
            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar', $data);
            $this->load->view('administrator/dpl/v_editNilaiDpl', $data);
            $this->load->view('templates_administrator/footer',$data);

        }

      

        public function mahasiswaDesa()
        {
            $data = $this->User_model->ambil_data($this->session->userdata['username']);

        
            $data = array(
                'nama' => $data->username,
                'level' => $data->level,
                'title' => $data->level,
                'id_lokasi' =>$data->id_user,
                'getLokasiDesa' => $this->M_kkn->getLokasiDesa($data->id_user)->row(),
                
            );

            // $data['']

            // var_dump($data['getLokasiDesa']);die;
        
            // foreach ($data['getLokasiDesa'] as $value) {
            //    array_push($data['lokasiMhs'],$value->desa_id);
            // }

            if($data['getLokasiDesa'] != null){

                $data['mhsDesa'] = $this->M_kkn->getMahasiswaDesa($data['getLokasiDesa']->desa_id)->result();
            
            }

            $data['title'] = "Data Mahasiswa ";
        
            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar', $data);
            $this->load->view('desa/v_mahasiswaDesa', $data);
            $this->load->view('templates_administrator/footer',$data);
        }

        public function editNilaiDesa($id_nilai)
        {
            // $dataMhs = $this->M_kkn->getMahasiswa($id_mhs)->row();
            $data = $this->User_model->ambil_data($this->session->userdata['username']);

            $data = array(
                'nama' => $data->username,
                'level' => $data->level,
                'title' => $data->level,
                'nilai' => $this->M_kkn->cekNilai($id_nilai)->row(),
            );


            $data['title'] = "Edit Nilai KKN";
            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar', $data);
            $this->load->view('desa/v_editNilaiDesa', $data);
            $this->load->view('templates_administrator/footer',$data);

        }

        public function inputNilaiDesa($id_nilai)
        {
            // $dataMhs = $this->M_kkn->getMahasiswa($id_mhs)->row();
            $data = $this->User_model->ambil_data($this->session->userdata['username']);

            $data = array(
                'nama' => $data->username,
                'level' => $data->level,
                'title' => $data->level,
                'id_nilai' =>$id_nilai
                
            );
            $data['title'] = "Input Nilai KKN";
            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar', $data);
            $this->load->view('desa/v_inputNilaiDesa', $data);
            $this->load->view('templates_administrator/footer',$data);

        }

        public function storeNilaiKknDesa()
        {
            
            $id_nilai = $this->input->post('id_nilai');
            $disiplin = $this->input->post('disiplin');
            $kreatifitas = $this->input->post('kreatifitas');
            $kerjasama = $this->input->post('kerjasama');
            $komunikasi = $this->input->post('komunikasi');
            $kesesuaian = $this->input->post('kesesuaian');
        
            $data = [
                    'disiplin_desa' => $disiplin,
                    'kreatifitas_desa' => $kreatifitas,
                    'kerjasama_desa' =>$kerjasama,
                    'komunikasi_desa' =>$komunikasi,
                    'kesesuaianhasil_desa' =>$kesesuaian,
                ];

                $this->M_kkn->updateNilai($id_nilai,$data,'nilai_kkn');
                $this->session->set_flashdata('desakkn', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil ditambahkan!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times; </span>
                </button>
                </div>');
                redirect('mahasiswa/C_kkn/mahasiswaDesa');


        }

}

?>