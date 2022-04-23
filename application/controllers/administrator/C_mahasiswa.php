<?php


require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


class C_mahasiswa extends CI_Controller
{
    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );
        $data['title'] = "Data Mahasiswa";
        $data['mahasiswa'] = $this->M_mahasiswa->all_data('mahasiswa')->result();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/mahasiswa/v_mahasiswa', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function create()
    {
        $data['title'] = " Tambah Data Mahasiswa";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => 'Form Mahasiswa',
            'fakultas' =>$this->M_jurusan->getDataFakultas(),

        );

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/mahasiswa/v_create_mahasiswa',$data);
        $this->load->view('templates_administrator/footer');
    }

    function get_jurusan()
    {
        $fakultas_id = $this->input->post('id',TRUE);
        $data = $this->M_mahasiswa->get_jurusan($fakultas_id)->result();
        echo json_encode($data);
    }

    public function store()
    {
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $email = $this->input->post('email');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $fakultas = $this->input->post('fakultas');
        $jurusan = $this->input->post('jurusan');
        $no_hp = $this->input->post('no_hp');
        $asal_daerah = $this->input->post('asal_daerah');
        $agama = $this->input->post('agama');

        $this->form_validation->set_rules('email','Email','is_unique[mahasiswa.email]', 
            [
                'is_unique' => 'Email Telah Terdaftar'
            ]
        );

        $this->form_validation->set_rules('nim','NIM','is_unique[mahasiswa.nim]', 
            [
                'is_unique' => 'NIM Telah Terdaftar'
            ]
        );

        if($this->form_validation->run() != false){
            $data = array(
                'nama_mhs'  => $nama,
                'nim'  => $nim,
                'email'  => $email,
                'tempat_lahir'  => $tempat_lahir,
                'tanggal_lahir'  => $tanggal_lahir,
                'alamat'  => $alamat,
                'fakultas_id'  => $fakultas,
                'jurusan_id'  => $jurusan,
                'no_hp'  => $no_hp,
                'asal_daerah'   => $asal_daerah,
                'agama' => $agama
            );
    
            
            $this->M_mahasiswa->insert_data($data, 'mahasiswa');
            $id_mhs = $this->db->insert_id(); 
    
            $dataLoginMhs = [
                'username'  => $nim,
                'password'  => md5($nim),
                'level'     => 'mahasiswa',
                'id_user'   => $id_mhs
            ];
            $this->M_user->insert_data($dataLoginMhs,'login_user');
            $this->session->set_flashdata('mahasiswa', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
            </div>');
            redirect('administrator/C_mahasiswa');
        }else{
            $data = $this->User_model->ambil_data($this->session->userdata['username']);
            $data = array(
                'nama' => $data->username,
                'level' => $data->level,
                'title' => 'Form Mahasiswa',
                'fakultas' =>$this->M_jurusan->getDataFakultas(),
    
            );
    
            $this->load->view('templates_administrator/header', $data);
            $this->load->view('templates_administrator/sidebar', $data);
            $this->load->view('administrator/mahasiswa/v_create_mahasiswa',$data);
            $this->load->view('templates_administrator/footer');
        }


       
    }

    public function edit($id)
    {
        $data['title'] = "Edit Data Mahasiswa";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'fakultas' =>$this->M_jurusan->getDataFakultas(),
        );
        
        $data['mahasiswa'] = $this->M_mahasiswa->getData('mahasiswa', $id)->row();
        $data['jurusan'] = $this->M_jurusan->getDataByfakultas('jurusan', $data['mahasiswa']->jurusan_id)->result();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/mahasiswa/v_edit_mahasiswa', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {

        $id     = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nim = $this->input->post('nim');
        $email = $this->input->post('email');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $alamat = $this->input->post('alamat');
        $fakultas = $this->input->post('fakultas');
        $jurusan = $this->input->post('jurusan');
        $no_hp = $this->input->post('no_hp');
        $asal_daerah = $this->input->post('asal_daerah');
        $agama = $this->input->post('agama');
        $jk = $this->input->post('jk');

        $dataMhs = $this->M_mahasiswa->getData('mahasiswa',$id)->row();

        if($nim != $dataMhs->nim) {
            $is_unique =  '|is_unique[mahasiswa.nim]';
         } else {
            $is_unique =  '';
         }

         if($email != $dataMhs->email) {
            $is_unique_email =  '|is_unique[mahasiswa.email]';
         } else {
            $is_unique_email =  '';
         }

        $this->form_validation->set_rules('nim','NIM','required'.$is_unique, 
            [
                'is_unique' => 'NIM Telah Terdaftar'
            ]
        );

        $this->form_validation->set_rules('email','EMAIL','required'.$is_unique_email, 
            [
                'is_unique' => 'Email Telah Terdaftar'
            ]
        );

        if($this->form_validation->run() != false){
            $data = array(
                'nama_mhs'  => $nama,
                'nim'  => $nim,
                'email'  => $email,
                'tempat_lahir'  => $tempat_lahir,
                'tanggal_lahir'  => $tanggal_lahir,
                'alamat'  => $alamat,
                'fakultas_id'  => $fakultas,
                'jurusan_id'  => $jurusan,
                'no_hp'  => $no_hp,
                'asal_daerah'   => $asal_daerah,
                'agama' => $agama,
                'jk' => $jk
            );
    
            $this->M_mahasiswa->updateData($id, $data, 'mahasiswa');
            $this->session->set_flashdata('mahasiswa', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
            </div>');
            redirect('administrator/C_mahasiswa');
        }else{
            $this->edit($id);
        }
        

       
    }

    public function destroy($id, $nim)
    {
        $where = array('id_mhs' => $id);
        $whereLogin = ['id_user' => $id];
        $whereLoginNim = ['id_user' => $nim];
        $this->M_mahasiswa->hapusData($where, 'mahasiswa');
        $this->M_user->hapusUser($whereLogin,$whereLoginNim, 'login_user');
        $this->session->set_flashdata('mahasiswa', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        data berhasil dihapus!
         <button type="button"class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('administrator/C_mahasiswa');
    }

    public function form_importMahasiswa()
	{
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
        );
        $this->load->view('templates_administrator/header',$data);
        $this->load->view('templates_administrator/sidebar',$data);
        $this->load->view('administrator/mahasiswa/v_formImportMahasiswa');
        $this->load->view('templates_administrator/footer');
	}

    public function uploadDataMahasiswa()
	{
        if ($this->input->post('submit', TRUE) == 'upload') {
            $config['upload_path']='./data_mahasiswa/';
            $config['allowed_types']='xlsx|xls';
            $config['file_name']='data_mahasiswa'. time();
            $this->load->library('upload',$config);

            if($this->upload->do_upload('importExcel')){
                $file= $this->upload->data();
    
                $reader = ReaderEntityFactory::createXLSXReader();
    
                $reader->open('data_mahasiswa/'.$file['file_name']);
    
                foreach($reader->getSheetIterator() as $sheet){
                    $numRow = 1;
                    $saveMahasiswa = [];
                    $saveUserLogin = [];

                        foreach($sheet->getRowIterator() as $row){
                            if($numRow > 1)
                            {
                                $dataMahasiswa = array (
                                    'nama_mhs' => $row->getCellAtIndex(0),
                                    'nim' => $row->getCellAtIndex(1),
                                );


                                array_push($saveMahasiswa, $dataMahasiswa);
                                $dataUserLogin = array (
                                    'username'  =>$row->getCellAtIndex(1),
                                    'password'  => md5($row->getCellAtIndex(1)),
                                    'level'     => 'mahasiswa',
                                    'id_user'   => $row->getCellAtIndex(1) //nim
                                );

                                array_push($saveUserLogin, $dataUserLogin);

                            }
                            $numRow ++;	
                        }
                       

                        $this->M_mahasiswa->importDataMahasiswa($saveMahasiswa);
                        $this->M_user->insert_data_multiple($saveUserLogin);
                        
                        $reader->close();
                        unlink('data_mahasiswa/'.$file['file_name']);
                        $this->session->set_flashdata('mahasiswa', '<div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Import data berhasil
                            </div>');
                        // $this->session->set_flashdata('message','Import data berhasil');
                        redirect('administrator/C_mahasiswa','refresh');
                }
    
            }else{
                echo "Error :".$this->upload->display_errors();
            };
    

        }
        
	}

    public function kknReguler()
    {
        $data['title'] = "Data KKN Reguler";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'mahasiswa' => $this->M_mahasiswa->kknReguler()->result()
        );

        // $data['nilaiKkn'] = $this->M_Mahasiswa->nilaiKkn($data['mahasiswa'])->row();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/kkn/v_kknMahasiswaReguler', $data);
        $this->load->view('templates_administrator/footer',$data);
    }

    public function kknMerdeka()
    {
        $data['title'] = "Data KKN Merdeka";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'mahasiswa' => $this->M_mahasiswa->kknMerdeka()->result()
        );
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/kkn/v_kknMahasiswaMerdeka', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function sertifikat()
    {

        // var_dump(date('d M Y'));die;
        
        $this->load->library('pdfgenerator');
        $id_mhs = $this->input->post('id_mhs');
        $id_kkn = $this->input->post('id_kkn');
        $dataMahasiswa = $this->M_mahasiswa->dataForSertifikat('mahasiswa', $id_mhs, $id_kkn)->row();
        $dataSetKkn = $this->M_mahasiswa->dataSetKkn()->row();

        if($dataMahasiswa->disiplin_dpl == 'A') {
            $disiplinDpl = 4.00;
        }elseif ($dataMahasiswa->disiplin_dpl == 'A-') {
            $disiplinDpl = 3.70;
        }elseif ($dataMahasiswa->disiplin_dpl == 'B+') {
            $disiplinDpl = 3.30;
        }elseif ($dataMahasiswa->disiplin_dpl == 'B') {
            $disiplinDpl = 3.00;
        }elseif ($dataMahasiswa->disiplin_dpl == 'B-') {
            $disiplinDpl = 2.70;
        }elseif ($dataMahasiswa->disiplin_dpl == 'C+') {
            $disiplinDpl = 2.30;
        }elseif ($dataMahasiswa->disiplin_dpl == 'C') {
            $disiplinDpl = 2.00;
        }elseif ($dataMahasiswa->disiplin_dpl == 'D') {
            $disiplinDpl = 1.00;
        }elseif ($dataMahasiswa->disiplin_dpl == 'E') {
            $disiplinDpl = 0.00;
        }

        if($dataMahasiswa->kreatifitas_dpl == 'A') {
            $kreatifitasDpl = 4.00;
        }elseif ($dataMahasiswa->kreatifitas_dpl == 'A-') {
            $kreatifitasDpl = 3.70;
        }elseif ($dataMahasiswa->kreatifitas_dpl == 'B+') {
            $kreatifitasDpl = 3.30;
        }elseif ($dataMahasiswa->kreatifitas_dpl == 'B') {
            $kreatifitasDpl = 3.00;
        }elseif ($dataMahasiswa->kreatifitas_dpl == 'B-') {
            $kreatifitasDpl = 2.70;
        }elseif ($dataMahasiswa->kreatifitas_dpl == 'C+') {
            $kreatifitasDpl = 2.30;
        }elseif ($dataMahasiswa->kreatifitas_dpl == 'C') {
            $kreatifitasDpl = 2.00;
        }elseif ($dataMahasiswa->kreatifitas_dpl == 'D') {
            $kreatifitasDpl = 1.00;
        }elseif ($dataMahasiswa->kreatifitas_dpl == 'E') {
            $kreatifitasDpl = 0.00;
        }

        if($dataMahasiswa->kerjasama_dpl == 'A') {
            $kerjasamaDpl = 4.00;
        }elseif ($dataMahasiswa->kerjasama_dpl == 'A-') {
            $kerjasamaDpl = 3.70;
        }elseif ($dataMahasiswa->kerjasama_dpl == 'B+') {
            $kerjasamaDpl = 3.30;
        }elseif ($dataMahasiswa->kerjasama_dpl == 'B') {
            $kerjasamaDpl = 3.00;
        }elseif ($dataMahasiswa->kerjasama_dpl == 'B-') {
            $kerjasamaDpl = 2.70;
        }elseif ($dataMahasiswa->kerjasama_dpl == 'C+') {
            $kerjasamaDpl = 2.30;
        }elseif ($dataMahasiswa->kerjasama_dpl == 'C') {
            $kerjasamaDpl = 2.00;
        }elseif ($dataMahasiswa->kerjasama_dpl == 'D') {
            $kerjasamaDpl = 1.00;
        }elseif ($dataMahasiswa->kerjasama_dpl == 'E') {
            $kerjasamaDpl = 0.00;
        }

        if($dataMahasiswa->komunikasi_dpl == 'A') {
            $komunikasiDpl = 4.00;
        }elseif ($dataMahasiswa->komunikasi_dpl == 'A-') {
            $komunikasiDpl = 3.70;
        }elseif ($dataMahasiswa->komunikasi_dpl == 'B+') {
            $komunikasiDpl = 3.30;
        }elseif ($dataMahasiswa->komunikasi_dpl == 'B') {
            $komunikasiDpl = 3.00;
        }elseif ($dataMahasiswa->komunikasi_dpl == 'B-') {
            $komunikasiDpl = 2.70;
        }elseif ($dataMahasiswa->komunikasi_dpl == 'C+') {
            $komunikasiDpl = 2.30;
        }elseif ($dataMahasiswa->komunikasi_dpl == 'C') {
            $komunikasiDpl = 2.00;
        }elseif ($dataMahasiswa->komunikasi_dpl == 'D') {
            $komunikasiDpl = 1.00;
        }elseif ($dataMahasiswa->komunikasi_dpl == 'E') {
            $komunikasiDpl = 0.00;
        }

        if($dataMahasiswa->kesesuaianhasil_dpl == 'A') {
            $kesesuaianhasil_dpl = 4.00;
        }elseif ($dataMahasiswa->kesesuaianhasil_dpl == 'A-') {
            $kesesuaianhasil_dpl = 3.70;
        }elseif ($dataMahasiswa->kesesuaianhasil_dpl == 'B+') {
            $kesesuaianhasil_dpl = 3.30;
        }elseif ($dataMahasiswa->kesesuaianhasil_dpl == 'B') {
            $kesesuaianhasil_dpl = 3.00;
        }elseif ($dataMahasiswa->kesesuaianhasil_dpl == 'B-') {
            $kesesuaianhasil_dpl = 2.70;
        }elseif ($dataMahasiswa->kesesuaianhasil_dpl == 'C+') {
            $kesesuaianhasil_dpl = 2.30;
        }elseif ($dataMahasiswa->kesesuaianhasil_dpl == 'C') {
            $kesesuaianhasil_dpl = 2.00;
        }elseif ($dataMahasiswa->kesesuaianhasil_dpl == 'D') {
            $kesesuaianhasil_dpl = 1.00;
        }elseif ($dataMahasiswa->kesesuaianhasil_dpl == 'E') {
            $kesesuaianhasil_dpl = 0.00;
        }

        if($dataMahasiswa->disiplin_desa == 'A') {
            $disiplin_desa = 4.00;
        }elseif ($dataMahasiswa->disiplin_desa == 'A-') {
            $disiplin_desa = 3.70;
        }elseif ($dataMahasiswa->disiplin_desa == 'B+') {
            $disiplin_desa = 3.30;
        }elseif ($dataMahasiswa->disiplin_desa == 'B') {
            $disiplin_desa = 3.00;
        }elseif ($dataMahasiswa->disiplin_desa == 'B-') {
            $disiplin_desa = 2.70;
        }elseif ($dataMahasiswa->disiplin_desa == 'C+') {
            $disiplin_desa = 2.30;
        }elseif ($dataMahasiswa->disiplin_desa == 'C') {
            $disiplin_desa = 2.00;
        }elseif ($dataMahasiswa->disiplin_desa == 'D') {
            $disiplin_desa = 1.00;
        }elseif ($dataMahasiswa->disiplin_desa == 'E') {
            $disiplin_desa = 0.00;
        }

        if($dataMahasiswa->kreatifitas_desa == 'A') {
            $kreatifitas_desa = 4.00;
        }elseif ($dataMahasiswa->kreatifitas_desa == 'A-') {
            $kreatifitas_desa = 3.70;
        }elseif ($dataMahasiswa->kreatifitas_desa == 'B+') {
            $kreatifitas_desa = 3.30;
        }elseif ($dataMahasiswa->kreatifitas_desa == 'B') {
            $kreatifitas_desa = 3.00;
        }elseif ($dataMahasiswa->kreatifitas_desa == 'B-') {
            $kreatifitas_desa = 2.70;
        }elseif ($dataMahasiswa->kreatifitas_desa == 'C+') {
            $kreatifitas_desa = 2.30;
        }elseif ($dataMahasiswa->kreatifitas_desa == 'C') {
            $kreatifitas_desa = 2.00;
        }elseif ($dataMahasiswa->kreatifitas_desa == 'D') {
            $kreatifitas_desa = 1.00;
        }elseif ($dataMahasiswa->kreatifitas_desa == 'E') {
            $kreatifitas_desa = 0.00;
        }

        if($dataMahasiswa->kerjasama_desa == 'A') {
            $kerjasama_desa = 4.00;
        }elseif ($dataMahasiswa->kerjasama_desa == 'A-') {
            $kerjasama_desa = 3.70;
        }elseif ($dataMahasiswa->kerjasama_desa == 'B+') {
            $kerjasama_desa = 3.30;
        }elseif ($dataMahasiswa->kerjasama_desa == 'B') {
            $kerjasama_desa = 3.00;
        }elseif ($dataMahasiswa->kerjasama_desa == 'B-') {
            $kerjasama_desa = 2.70;
        }elseif ($dataMahasiswa->kerjasama_desa == 'C+') {
            $kerjasama_desa = 2.30;
        }elseif ($dataMahasiswa->kerjasama_desa == 'C') {
            $kerjasama_desa = 2.00;
        }elseif ($dataMahasiswa->kerjasama_desa == 'D') {
            $kerjasama_desa = 1.00;
        }elseif ($dataMahasiswa->kerjasama_desa == 'E') {
            $kerjasama_desa = 0.00;
        }

        if($dataMahasiswa->komunikasi_desa == 'A') {
            $komunikasi_desa = 4.00;
        }elseif ($dataMahasiswa->komunikasi_desa == 'A-') {
            $komunikasi_desa = 3.70;
        }elseif ($dataMahasiswa->komunikasi_desa == 'B+') {
            $komunikasi_desa = 3.30;
        }elseif ($dataMahasiswa->komunikasi_desa == 'B') {
            $komunikasi_desa = 3.00;
        }elseif ($dataMahasiswa->komunikasi_desa == 'B-') {
            $komunikasi_desa = 2.70;
        }elseif ($dataMahasiswa->komunikasi_desa == 'C+') {
            $komunikasi_desa = 2.30;
        }elseif ($dataMahasiswa->komunikasi_desa == 'C') {
            $komunikasi_desa = 2.00;
        }elseif ($dataMahasiswa->komunikasi_desa == 'D') {
            $komunikasi_desa = 1.00;
        }elseif ($dataMahasiswa->komunikasi_desa == 'E') {
            $komunikasi_desa = 0.00;
        }

        if($dataMahasiswa->kesesuaianhasil_desa == 'A') {
            $kesesuaianhasil_dpl = 4.00;
        }elseif ($dataMahasiswa->kesesuaianhasil_desa == 'A-') {
            $kesesuaianhasil_desa = 3.70;
        }elseif ($dataMahasiswa->kesesuaianhasil_desa == 'B+') {
            $kesesuaianhasil_desa = 3.30;
        }elseif ($dataMahasiswa->kesesuaianhasil_desa == 'B') {
            $kesesuaianhasil_desa = 3.00;
        }elseif ($dataMahasiswa->kesesuaianhasil_desa == 'B-') {
            $kesesuaianhasil_desa = 2.70;
        }elseif ($dataMahasiswa->kesesuaianhasil_desa == 'C+') {
            $kesesuaianhasil_desa = 2.30;
        }elseif ($dataMahasiswa->kesesuaianhasil_desa == 'C') {
            $kesesuaianhasil_desa = 2.00;
        }elseif ($dataMahasiswa->kesesuaianhasil_desa == 'D') {
            $kesesuaianhasil_desa = 1.00;
        }elseif ($dataMahasiswa->kesesuaianhasil_desa == 'E') {
            $kesesuaianhasil_desa = 0.00;
        }


      
        $this->data  = [
            'title_pdf' => 'Sertifikat',
            'mahasiswa' => $dataMahasiswa,
            'dataSetKkn' => $dataSetKkn,
            'disiplin' => ($disiplinDpl+$disiplin_desa)/2,
            'kerjasama' => ($kerjasamaDpl+$kerjasama_desa)/2,
            'kreatifitas' => ($kreatifitasDpl+$kreatifitas_desa)/2,
            'komunikasi' => ($komunikasi_desa+$komunikasiDpl)/2,
            'kesesuaianhasil' => ($kesesuaianhasil_desa+$kesesuaianhasil_dpl)/2,
        ];
        
        // var_dump( $this->data->$komunikasi);die;
        // filename dari pdf ketika didownload
        $file_pdf = 'Sertifikat';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "landscape";
        
		$html = $this->load->view('administrator/mahasiswa/sertifikat',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    }

    public function createSertifikat()
    {
        $id_kkn = $this->input->post('id_kkn');
        $sertifikat = $this->input->post('sertifikat');
        $nim = $this->input->post('nim');
        
        $data = [
            'sertifikat'  => 'sertifikat_'.$sertifikat.'_'.$nim
        ];

        $this->M_mahasiswa->updateSertifikat($id_kkn, $data, 'kkn');
        $this->session->set_flashdata('kknreguler', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Sertifikat berhasil Dibuat!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_mahasiswa/kknReguler');
    }

    public function createSertifikatMerdeka()
    {
        $id_kkn = $this->input->post('id_kkn');
        $sertifikat = $this->input->post('sertifikat');
        $nim = $this->input->post('nim');
        
        $data = [
            'sertifikat'  => 'sertifikat_'.$sertifikat.'_'.$nim
        ];

        $this->M_mahasiswa->updateSertifikat($id_kkn, $data, 'kkn');
        $this->session->set_flashdata('kknmerdeka', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Sertifikat berhasil Dibuat!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('administrator/C_mahasiswa/kknMerdeka');
    }

    public function editKkn($id)
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            
        );
        $data['title'] = "Update Data KKN ";
        $data['kkn'] = $this->M_mahasiswa->kkn($id,'kkn')->row();

        $data['getProvinsi'] = $this->M_kkn->getProvinsi()->result();
        $data['getKab'] = $this->M_kkn->get_kabupaten($data['kkn']->province_id)->result();
        $data['getKec'] = $this->M_kkn->get_kecamatan($data['kkn']->regency_id)->result();
        $data['getDesa'] = $this->M_kkn->get_desa($data['kkn']->district_id)->result();

        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('administrator/mahasiswa/v_updateKkn', $data);
        $this->load->view('templates_administrator/footer',$data);


    }

    public function updateKknReguler()
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
            $lokasi_kkn                  = $this->input->post('desa');

            $rekom_jurusanprodi        = $_FILES['rekom']['name'];
            $krs                       = $_FILES['krs']['name'];
            $slip                      = $_FILES['slip']['name'];
            $sk_bm                     = $_FILES['sk_bm']['name'];
            $foto                       = $_FILES['foto_almamater']['name'];
            $sk_sehat                  = $_FILES['sk_sehat']['name'];
            

            if ($rekom_jurusanprodi) {
                // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
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

            if($jenis_kkn == 'kkn_merdeka'){

                $this->session->set_flashdata('kknmerdeka', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data KKN berhasil diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times; </span>
                </button>
                </div>');
                redirect('administrator/C_mahasiswa/kknMerdeka');

            }else{
                $this->session->set_flashdata('kknreguler', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data KKN berhasil diupdate!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times; </span>
                </button>
                </div>');
                redirect('administrator/C_mahasiswa/kknReguler');
            }

            
        
    }

    public function destroyKkn($id_kkn, $nim, $id_mhs)
    {
        $getDataKkn = $this->M_mahasiswa->kkn($id_kkn,'kkn')->row();

        // print_r($getDataKkn);die;

        $where = array('id_kkn' => $id_kkn);        
        $whereLogin = ['id_user' => $id_mhs];
        $whereLoginNim = ['id_user' => $nim];
        // unlink(FCPATH . "/assets/uploads/" . $getDataKkn->rekom_kkn);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->krs);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->slip);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->sk_bm);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->sk_ukt);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->sk_sehat);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->sk_foto);
        unlink(FCPATH . "/assets/uploads/" . $getDataKkn->rekom_jurusanprodi);
        $this->M_user->hapusUser($whereLogin,$whereLoginNim, 'login_user');
        $delete = $this->M_kkn->hapusData($where, 'kkn');

        if($jenis_kkn == 'kkn_merdeka'){
            $this->session->set_flashdata('kknmerdeka', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            data berhasil dihapus!
             <button type="button"class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('administrator/C_mahasiswa/kknMerdeka');
        }else{
            $this->session->set_flashdata('kknreguler', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            data berhasil dihapus!
            <button type="button"class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('administrator/C_mahasiswa/kknReguler');
        }
        
        
    }

}