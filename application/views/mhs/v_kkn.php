<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i>
        Daftar KKN
    </div>
   
    <?php if($this->session->flashdata('kkn')) :?>
            <?php echo $this->session->flashdata('kkn') ?>
            <?php echo $this->session->unset_userdata('kkn'); ?>
    <?php endif; ?>

    <?php if($kkn->email == null || $kkn->tempat_lahir == null || $kkn->tanggal_lahir == null || $kkn->alamat == null || $kkn->fakultas_id == null || $kkn->jurusan_id == null || $kkn->no_hp == null || $kkn->asal_daerah == null): ?>

        <h3 style="color:red;" class="p-4 mt-4 text-center"><strong>Silakan Lengkapi semua Data Anda Pada Menu Profil untuk dapat mendaftar KKN!</strong></h3>
    <?php else: ?>
    
    <?php if(  strtotime(date('Y-m-d')) >= strtotime($cekJadwalKkn->tgl_mulai_kkn) && strtotime(date('Y-m-d')) <= strtotime($cekJadwalKkn->tgl_akhir_kkn) )  :?>
        <?php if(!empty($dataKkn) ) : ?>
            
            <div class="row">   
                <div class="col-md-4 d-flex justify-content-center">
                <div class="card mb-4 text-center" style="width: 18rem;">
                    <img class="card-img-top" src="<?= base_url('assets/uploads/').$dataKkn->foto ?>"  alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?= ucwords($kkn->nama_mhs) ?></h5>
                        <p class="card-text">Semester : <b><?= $dataKkn->semester ?></b></p>
                        <p class="card-text">Jenis KKN : <b><?= strtoupper($dataKkn->jenis_kkn) ?></b></p>
                        
                    </div>
                    </div>
                </div>

                <div class="col-md-8 ">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3>File Dokumen</h3>
                            <div class="row mb-4 ml-1">
                                
                                <?php echo anchor('mahasiswa/C_kkn/downloadZip/' . $dataKkn->id_kkn, '<div class="btn btn-sm btn-info mr-3"><i class="fa fa-download"> Download File</i></div>') ?>

                                <?php echo anchor('mahasiswa/C_kkn/edit/' . $dataKkn->id_kkn, '<div class="btn btn-sm btn-primary mr-3"><i class="fa fa-edit"> Edit</i></div>') ?>
                                
                                <!-- <td width="20px" onclick="javascript:return confirm('Anda yakin ingin menghapus?')">
                                    <?php echo anchor('mahasiswa/C_kkn/destroy/' . $dataKkn->id_kkn, '<div class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"> Hapus</i></div>') ?>
                                </td> -->

                            </div>
                            
                
                            <div class="row">
                                <div class="col-4">
                                    <div class="list-group" id="list-tab" role="tablist">
                                        <a class="list-group-item list-group-item-action active" id="list-pasfoto" data-toggle="list" href="#pasfoto" role="tab" aria-controls="home">Pasfoto Menggunakan Jas Almamater Ukuran 3x4 Berlatar Merah</a>
                                        <a class="list-group-item list-group-item-action" id="list-rekom-jurusan" data-toggle="list" href="#rekom_jurusan" role="tab" aria-controls="home">Rekomendasi Dari Jurusan/Prodi</a>
                                        <a class="list-group-item list-group-item-action" id="list-krs" data-toggle="list" href="#krs" role="tab" aria-controls="profile">KRS Semester Ganjil/Genap</a>
                                        <a class="list-group-item list-group-item-action" id="list-slip" data-toggle="list" href="#slip" role="tab" aria-controls="messages">Slip asli UKT semester Ganjil/Genap</a>
                                        <a class="list-group-item list-group-item-action" id="list-bm" data-toggle="list" href="#bm" role="tab" aria-controls="settings">Surat Keputusan Penerima Bidik Misi/KIPK</a>
                                        <a class="list-group-item list-group-item-action" id="list-bs" data-toggle="list" href="#bs" role="tab" aria-controls="settings">Surat Keterangan Berbadan Sehat dari Puskesmas / Klinik Unima</a>
                                        <a class="list-group-item list-group-item-action" id="list-ukt" data-toggle="list" href="#ukt" role="tab" aria-controls="settings">Surat Keterangan Pengurangan UKT /Bantuan Lainnya</a>
                                        <!-- <a class="list-group-item list-group-item-action" id="list-rekom-desa" data-toggle="list" href="#rekom_desa" role="tab" aria-controls="settings">Rekomendasi Lokasi KKN dari Desa/Kelurahan</a> -->
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="pasfoto" role="tabpanel" aria-labelledby="list-pasfoto">
                                            <a href="<?php echo base_url('assets/uploads/'.$dataKkn->foto); ?>" target="blank"><?= $dataKkn->foto ?></a> 
                                        </div>
                                        <div class="tab-pane fade" id="rekom_jurusan" role="tabpanel" aria-labelledby="list-rekom_jurusan"> 
                                            <a href="<?php echo base_url('assets/uploads/'.$dataKkn->rekom_jurusanprodi); ?>" target="blank"><?= $dataKkn->rekom_jurusanprodi ?></a>  
                                        </div>
                                        <div class="tab-pane fade" id="krs" role="tabpanel" aria-labelledby="list-krs">
                                            <a href="<?php echo base_url('assets/uploads/'.$dataKkn->krs); ?>" target="blank"><?= $dataKkn->krs ?></a> 
                                        </div>
                                        <div class="tab-pane fade" id="slip" role="tabpanel" aria-labelledby="list-slip">
                                            <a href="<?php echo base_url('assets/uploads/'.$dataKkn->slip); ?>" target="blank"><?= $dataKkn->slip ?></a> 
                                        </div>
                                        <div class="tab-pane fade" id="bm" role="tabpanel" aria-labelledby="list-bm">
                                            <a href="<?php echo base_url('assets/uploads/'.$dataKkn->sk_bm); ?>" target="blank"><?= $dataKkn->sk_bm ?></a> 
                                        </div>
                                        <div class="tab-pane fade" id="bs" role="tabpanel" aria-labelledby="list-bs">
                                            <a href="<?php echo base_url('assets/uploads/'.$dataKkn->sk_sehat); ?>" target="blank"><?= $dataKkn->sk_sehat ?></a> 
                                        </div>
                                        <!-- <div class="tab-pane fade" id="ukt" role="tabpanel" aria-labelledby="list-ukt">
                                            <a href="<?php echo base_url('assets/uploads/'.$dataKkn->sk_ukt); ?>" target="blank"><?= $dataKkn->sk_ukt ?></a> 
                                        </div> -->
                                        <div class="tab-pane fade" id="rekom_desa" role="tabpanel" aria-labelledby="list-rekom-desa">
                                            <!-- <a href="<?php echo base_url('assets/uploads/'.$dataKkn->rekom_kkn); ?>" target="blank"><?= $dataKkn->rekom_kkn ?></a>  -->
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
            
                </div>
            </div>

        <?php endif;?>

        <?php if(empty($dataKkn)) : ?>
            <h3 style="color:green;" class="p-4 mt-4 text-center">Silakan isi semua form yang tersedia dibawah ini</h3>

            <?php echo validation_errors('<div class="text-danger small ml-3">', '</div>'); ?>
           
            <div id="smartwizard">
                <ul class="nav">
                    <li>
                        <a class="nav-link" href="#step-1">
                            Jenis KKN
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#step-2">
                            Lokasi KKN
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#step-3">
                            File Pendukung
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="#step-4">
                            Selesai
                        </a>
                    </li>


                </ul>

                <?php echo form_open_multipart('mahasiswa/C_kkn/store'); ?>
                    <div class="tab-content">
                        <div id="step-1" class="tab-pane" role="tabpanel">
                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Jenis KKN</label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="" name="jenis_kkn">
                                        <option value="">Pilih Jenis KKN</option>
                                        <option value="kkn_reguler" <?=set_value('jenis_kkn') == 'kkn_reguler' ? 'selected' :'' ?>>KKN Reguler</option>
                                        <option value="kkn_merdeka" <?=set_value('jenis_kkn') == 'kkn_merdeka' ? 'selected' :'' ?>>KKN Merdeka</option>
                                    </select>
                                    <?php echo form_error('jenis_kkn', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>

                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Semester</label>
                                <div class="col-sm-3">
                                    <input type="number" name="semester" class="form-control" value="<?=set_value('semester')?>" >
                                    <?php echo form_error('semester', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>
                        

                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Pasfoto menggunakan jas almamater ukuran 3x4 berlatar merah</label>
                                <div class="col-sm-3">
                                    <input type="file" class="form-control" name="foto_almamater"  value="<?= set_value('foto_almamater')?>">
                                    <small class="form-text text-muted">*file Harus JPEG / PNG</small>
                                  
                                </div>
                            </div>
                        </div>

                        <div id="step-2" class="tab-pane" role="tabpanel">
                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="sel_provinsi" name="provinsi"  value="<?=set_value('provinsi')?>">
                                        <option value="">Pilih Provinsi</option>
                                        <?php foreach($getProvinsi as $value) : ?>
                                            <option value="<?= $value->id ?>"><?= $value->name_province ?></option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php echo form_error('provinsi', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>

                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Kabupaten</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="kabupaten" id="sel_kabupaten" value="<?=set_value('kabupaten')?>">
                                        <option value="">Pilih Kabupaten</option>
                                    
                                    </select>
                                    <?php echo form_error('kabupaten', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>

                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="sel_kecamatan" name="kecamatan" value="<?=set_value('kecamatan')?>">
                                        <option value="">Pilih Kecamatan</option>
                                    
                                    </select>
                                    <?php echo form_error('kecamatan', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>

                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                                <div class="col-sm-3">
                                    <select class="form-control" id="sel_desa_kkn" name="desa"  value="<?=set_value('desa')?>" >
                                        <option value="">Pilih Desa/Kelurahan</option>
                                        
                                    </select>
                                    <?php echo form_error('desa', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>
                        </div>
                        <div id="step-3" class="tab-pane" role="tabpanel">

                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Rekomendasi Dari Jurusan/Prodi</label>
                                <div class="col-sm-3">
                                    <input type="file" class="form-control" name="rekom" value="<?=set_value('rekom')?>">
                                    <small class="form-text text-muted">*file Harus PDF</small>
                                    <?php echo form_error('rekom', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>

                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">KRS Semester Ganjil/Genap</label>
                                <div class="col-sm-3">
                                <input type="file" class="form-control" name="krs" value="<?=set_value('krs')?>">
                                    <small class="form-text text-muted">*file Harus PDF</small>
                                    <?php echo form_error('krs', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>

                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Slip Asli UKT semester Ganjil/Genap </label>
                                <div class="col-sm-3">
                                <input type="file" class="form-control" name="slip"  value="<?=set_value('slip')?>">
                                    <small class="form-text text-muted">*file Harus PDF</small>
                                    <?php echo form_error('slip', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>

                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Surat Keputusan Penerima Bidik Misi/KIPK </label>
                                <div class="col-sm-3">
                                <input type="file" class="form-control" name="sk_bm" value="<?=set_value('sk_bm')?>">
                                    <small class="form-text text-muted">*Jika Ada</small>
                                    <?php echo form_error('sk_bm', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>

                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Surat Keterangan Pengurangan UKT/bantuan lainnya </label>
                                <div class="col-sm-3">
                                    <input type="file" class="form-control" name="sk_ukt" value="<?=set_value('sk_ukt')?>">
                                    <small class="form-text text-muted">*Jika Ada</small>
                                    <?php echo form_error('sk_ukt', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>

                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Surat Keterangan Berbadan Sehat dari Puskesmas/Klinik Unima </label>
                                <div class="col-sm-3">
                                <input type="file" class="form-control" name="sk_sehat" value="<?=set_value('sk_sehat')?>">
                                    <small class="form-text text-muted">*file Harus PDF</small>
                                    <?php echo form_error('sk_sehat', '<div class="text-danger small ml-3">', '</div>') ?>
                                </div>
                            </div>

                        
                        </div>
                        <div id="step-4" class="tab-pane" role="tabpanel">
                        
                            <div class="form-group row ml-2 mb-4 mt-4">
                                <label for="" class="col-sm-2 col-form-label">Silakan klik tombol simpan untuk mendaftar</label>
                                <div class="col-sm-3">
                                <button type="submit" value="upload" class="btn btn-primary mb-5 mt-3">Simpan</button>

                                </div>
                            </div>
                            
                        </div>

                    </div>
                <?php echo form_close() ?>
            </div>

        <?php endif;?>

    <?php else : ?>
        <h1 class="text-center p-4 mt-4" style="color:red">Jadwal Pendaftaran KKN dimulai pada tanggal <?= date('d M Y', strtotime($cekJadwalKkn->tgl_mulai_kkn)) ?> s/d <?= date('d M Y', strtotime($cekJadwalKkn->tgl_akhir_kkn)) ?></h1> 
    <?php endif;?>

  
    <?php endif; ?>


   
</div>
