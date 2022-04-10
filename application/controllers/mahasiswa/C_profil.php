<?php


require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;


class C_profil extends CI_Controller
{
    public function index()
    {
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
       
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'mahasiswa' => $this->M_profil->all_data($data->id_user)->row()
        );
        $data['title'] = "Data Mahasiswa";
        // $data['mahasiswa'] = $this->M_profil->all_data($data->id_user)->row();

        // var_dump($data['mahasiswa']);die;
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('mhs/v_profil', $data);
        $this->load->view('templates_administrator/footer');
    }

 

    function get_jurusan()
    {
        $fakultas_id = $this->input->post('id',TRUE);
        $data = $this->M_profil->get_jurusan($fakultas_id)->result();
        echo json_encode($data);
    }



    public function edit($id)
    {
        $data['title'] = "Edit Data";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'fakultas' =>$this->M_jurusan->getDataFakultas(),
        );
        
        $data['mahasiswa'] = $this->M_profil->getData('mahasiswa', $id)->row();
        $data['jurusan'] = $this->M_jurusan->getDataByfakultas('jurusan', $data['mahasiswa']->jurusan_id)->result();
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('mhs/v_editProfil', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update()
    {
        $id     = $this->input->post('id_mhs');
        $nama   = $this->input->post('nama');
        $nim   = $this->input->post('nim');
        $email   = $this->input->post('email');
        $tempat_lahir   = $this->input->post('tempat_lahir');
        $tanggal_lahir   = $this->input->post('tanggal_lahir');
        $alamat   = $this->input->post('alamat');
        $asal_daerah   = $this->input->post('asal_daerah');
        $agama   = $this->input->post('agama');
        $jurusan   = $this->input->post('jurusan');
        $fakultas   = $this->input->post('fakultas');
        $no_hp   = $this->input->post('no_hp');
        $foto = $_FILES['foto_profil']['name'];

        $foto1 = $this->input->post('foto_profil');

        if ($foto) {
            // unlink(FCPATH."/assets/uploads/".$rekom); //hapus file lama
            $randomString = random_string('numeric', 3);
            $config['max_size'] = '10000';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['upload_path'] = 'assets/uploads';
            $config['file_name'] = "foto_profil-" .$dataMahasiswa->nim . "-" . $randomString;
            $config['overwrite'] = true;

            $this->load->library('upload');
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto_profil')) {
                unlink(FCPATH . "/assets/uploads/" . $foto1); //hapus file lama
                $userfile = $this->upload->data('file_name');
                $this->db->set('foto', $userfile);
            } else {
                echo "Gagal Upload";
                die();
            }
        }
        

        $data = [
            'nama_mhs' => $nama,
            'nim' => $nim,
            'email' => $email,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'alamat' => $alamat,
            'asal_daerah' => $asal_daerah,
            'agama' => $agama,
            'jurusan_id' => $jurusan,
            'fakultas_id' => $fakultas,
            'no_hp' => $no_hp,
        ];

        $this->M_profil->updateData($id, $data, 'mahasiswa');
        $this->session->set_flashdata('mhs_profil', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil ditambahkan!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times; </span>
        </button>
        </div>');
        redirect('mahasiswa/C_profil');
    }

    public function changePassword()
    {
        $data['title'] = "Edit Password";
        $data = $this->User_model->ambil_data($this->session->userdata['username']);
        $data = array(
            'nama' => $data->username,
            'level' => $data->level,
            'title' => $data->level,
            'mahasiswa' => $this->M_profil->getData('login_user', $data->id)->row() 
        );
        
        $this->load->view('templates_administrator/header', $data);
        $this->load->view('templates_administrator/sidebar', $data);
        $this->load->view('mhs/v_changePassword', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function updatePassword()
    {

        $this->form_validation->set_rules('pass_baru','password baru','required');
        $this->form_validation->set_rules('confirm_pass','password','required|matches[pass_baru]');

        $this->form_validation->set_message('required','%s wajib diisi');

        $this->form_validation->set_error_delimiters('<p class="alert">','</p>');

        if( $this->form_validation->run() == FALSE ){
            $this->changePassword();
        } else {

            $id = $this->input->post('id');
            $password_baru = $this->input->post('pass_baru');
            
            $data = array(
                'password' => md5($password_baru),
            );

            $this->M_profil->updatePassword($id, $data, 'login_user');
            $this->session->set_flashdata('ubahpassword', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Password berhasil diubah!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times; </span>
            </button>
            </div>');
            redirect('mahasiswa/C_profil/changePassword');

        }

      
    }

    // public function destroy($id, $nim)
    // {
    //     $where = array('id_mhs' => $id);
    //     $whereLogin = ['id_user' => $id];
    //     $whereLoginNim = ['id_user' => $nim];
    //     $this->M_profil->hapusData($where, 'mahasiswa');
    //     $this->M_user->hapusUser($whereLogin,$whereLoginNim, 'login_user');
    //     $this->session->set_flashdata('mahasiswa', '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //     data berhasil dihapus!
    //      <button type="button"class="close" data-dismiss="alert" aria-label="Close">
    //          <span aria-hidden="true">&times;</span>
    //     </button>
    //     </div>');
    //     redirect('administrator/C_mahasiswa');
    // }

    // public function downloadFormatMahasiswa()
	// {
	// 	$this->load->view('administrator/mahasiswa/v_formatExcel');
	// }

    // public function form_importMahasiswa()
	// {
    //     $data = $this->User_model->ambil_data($this->session->userdata['username']);
    //     $data = array(
    //         'nama' => $data->username,
    //         'level' => $data->level,
    //         'title' => $data->level,
    //     );
    //     $this->load->view('templates_administrator/header',$data);
    //     $this->load->view('templates_administrator/sidebar',$data);
    //     $this->load->view('administrator/mahasiswa/v_formImportMahasiswa');
    //     $this->load->view('templates_administrator/footer');
	// }

    // public function uploadDataMahasiswa()
	// {
    //     if ($this->input->post('submit', TRUE) == 'upload') {
    //         $config['upload_path']='./data_mahasiswa/';
    //         $config['allowed_types']='xlsx|xls';
    //         $config['file_name']='data_mahasiswa'. time();
    //         $this->load->library('upload',$config);

    //         if($this->upload->do_upload('importExcel')){
    //             $file= $this->upload->data();
    
    //             $reader = ReaderEntityFactory::createXLSXReader();
    
    //             $reader->open('data_mahasiswa/'.$file['file_name']);
    
    //             foreach($reader->getSheetIterator() as $sheet){
    //                 $numRow = 1;
    //                 $saveMahasiswa = [];
    //                 $saveUserLogin = [];

    //                     foreach($sheet->getRowIterator() as $row){
    //                         if($numRow > 1)
    //                         {
    //                             $dataMahasiswa = array (
    //                                 'nama_mhs' => $row->getCellAtIndex(1),
    //                                 'nim' => $row->getCellAtIndex(2),
    //                             );

    //                             array_push($saveMahasiswa, $dataMahasiswa);
    //                             $dataUserLogin = array (
    //                                 'username'  =>$row->getCellAtIndex(2),
    //                                 'password'  => md5($row->getCellAtIndex(2)),
    //                                 'level'     => 'mahasiswa',
    //                                 'id_user'   => $row->getCellAtIndex(2)
    //                             );

    //                             array_push($saveUserLogin, $dataUserLogin);

    //                         }
    //                         $numRow ++;	
    //                     }

    //                     $this->M_profil->importDataMahasiswa($saveMahasiswa);
    //                     $this->M_user->insert_data_multiple($saveUserLogin);
                        
                        
    
    //                     $reader->close();
    //                     unlink('data_mahasiswa/'.$file['file_name']);
    //                     $this->session->set_flashdata('mahasiswa', '<div class="alert alert-success alert-dismissible" role="alert">
    //                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    //                         Import data berhasil
    //                         </div>');
    //                     // $this->session->set_flashdata('message','Import data berhasil');
    //                     redirect('administrator/C_mahasiswa','refresh');
    //             }
    
    //         }else{
    //             echo "Error :".$this->upload->display_errors();
    //         };
    

    //     }
        
		
		
		


	// }

    // public function kknReguler()
    // {
    //     $data['title'] = "Data KKN Reguler";
    //     $data = $this->User_model->ambil_data($this->session->userdata['username']);
    //     $data = array(
    //         'nama' => $data->username,
    //         'level' => $data->level,
    //         'title' => $data->level,
    //        'mahasiswa' => $this->M_profil->kknReguler()->result()
    //     );
    //     $this->load->view('templates_administrator/header', $data);
    //     $this->load->view('templates_administrator/sidebar', $data);
    //     $this->load->view('administrator/kkn/v_kknMahasiswaReguler', $data);
    //     $this->load->view('templates_administrator/footer');
    // }

    // public function kknMerdeka()
    // {
    //     $data['title'] = "Data KKN Merdeka";
    //     $data = $this->User_model->ambil_data($this->session->userdata['username']);
    //     $data = array(
    //         'nama' => $data->username,
    //         'level' => $data->level,
    //         'title' => $data->level,
    //        'mahasiswa' => $this->M_profil->kknMerdeka()->result()
    //     );
    //     $this->load->view('templates_administrator/header', $data);
    //     $this->load->view('templates_administrator/sidebar', $data);
    //     $this->load->view('administrator/kkn/v_kknMahasiswaMerdeka', $data);
    //     $this->load->view('templates_administrator/footer');
    // }

    // // public function laporanKknReguler()
    // // {
    // //     $data['title'] = "Laporan KKN Reguler";
    // //     $data = $this->User_model->ambil_data($this->session->userdata['username']);
    // //     $data = array(
    // //         'nama' => $data->username,
    // //         'level' => $data->level,
    // //         'title' => $data->level,
    // //         'mahasiswa' => $this->M_mahasiswa->laporanKknRerdeka()->result()
    // //     );
    // //     $this->load->view('templates_administrator/header', $data);
    // //     $this->load->view('templates_administrator/sidebar', $data);
    // //     $this->load->view('administrator/kkn/v_laporanKknMerdeka', $data);
    // //     $this->load->view('templates_administrator/footer');
    // // }



}