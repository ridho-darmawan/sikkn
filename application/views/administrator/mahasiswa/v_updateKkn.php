<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i>
        Update Data KKN
    </div>

    <?php if($this->session->flashdata('kkn')) :?>
            <?php echo $this->session->flashdata('kkn') ?>
            <?php echo $this->session->unset_userdata('kkn'); ?>
    <?php endif; ?>

    <?php if($kkn->jenis_kkn == 'kkn_merdeka') : ?>
        <a class="btn btn-sm btn-primary mb-4" href="<?= base_url('administrator/C_mahasiswa/kknMerdeka')?>">Kembali</a>
    <?php else : ?>
        <a class="btn btn-sm btn-primary mb-4" href="<?= base_url('administrator/C_mahasiswa/kknReguler')?>">Kembali</a>
    <?php endif; ?>

    

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

            <?php echo form_open_multipart('administrator/C_mahasiswa/updateKknReguler'); ?>
                <input type="hidden" name="id" value="<?= $kkn->id_kkn ?>">
                <div class="tab-content">
                    <div id="step-1" class="tab-pane" role="tabpanel">
                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Jenis KKN</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="jenis_kkn" value="<?= $kkn->jenis_kkn ?>" >
                                    <option value="kkn_reguler" <?= $kkn->jenis_kkn == 'kkn_reguler' ? 'selected':'' ?>>KKN Reguler</option>
                                    <option value="kkn_merdeka" <?= $kkn->jenis_kkn == 'kkn_merdeka' ? 'selected':'' ?>>KKN Merdeka</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Semester</label>
                            <div class="col-sm-3">
                                <input type="number" name="semester" value="<?= $kkn->semester ?>" class="form-control" >
                            </div>
                        </div>
                    

                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Pasfoto menggunakan jas almamater ukuran 3x4 berlatar merah</label>
                            <div class="col-sm-1">
                                <img src="<?= base_url('assets/uploads/').$kkn->foto; ?>" alt="pas foto" width="100px">
                            </div>
                            <div class="col-sm-2">
                                <input type="hidden" name="foto_almamater1" value="<?= $kkn->foto ?>">
                                <input type="file" class="form-control" name="foto_almamater" value="<?= $kkn->foto ?>" >
                                <small class="form-text text-muted">*file Harus JPEG / PNG <br> *abaikan jika tidak diubah</small>
                                <?php echo form_error('foto_almamater', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>
                    </div>

                    <div id="step-2" class="tab-pane" role="tabpanel">
                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-3">
                                <select class="form-control" id="sel_provinsi" name="provinsi"  >
                                    <option value="">Pilih Provinsi</option>
                                    <?php foreach($getProvinsi as $value) : ?>
                                        <option value="<?= $value->provinsi_id ?>" <?= $value->provinsi_id == $kkn->province_id ? 'selected':'' ?>><?= $value->name_province ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Kabupaten</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="kabupaten" id="sel_kabupaten" >
                                    <option value="">Pilih Kabupaten</option>
                                    <?php foreach($getKab as $value) : ?>
                                        <option value="<?= $value->kabupaten_id ?>" <?= $value->kabupaten_id == $kkn->regency_id ? 'selected':'' ?>><?= $value->name_regencie ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-3">
                                <select class="form-control" id="sel_kecamatan" name="kecamatan" >
                                    <option value="">Pilih Kecamatan</option>
                                    <?php foreach($getKec as $value) : ?>
                                        <option value="<?= $value->kecamatan_id ?>" <?= $value->kecamatan_id == $kkn->district_id ? 'selected':'' ?>><?= $value->name_district ?></option>
                                    <?php endforeach ?>
                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Desa/Kelurahan</label>
                            <div class="col-sm-3">
                                <select class="form-control" id="sel_desa_kkn" name="desa" value="<?= $kkn->lokasi_kkn ?>">
                                    <option value="">Pilih Desa/Kelurahan</option>
                                    <?php foreach($getDesa as $value) : ?>
                                        <option value="<?= $value->desa_id ?>" <?= $value->desa_id == $kkn->lokasi_kkn ? 'selected':'' ?>><?= $value->name_village ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="step-3" class="tab-pane" role="tabpanel">

                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Rekomendasi Dari Jurusan/Prodi</label>
                            <div class="col-sm-1">
                                <a href="<?php echo base_url('assets/uploads/'.$kkn->rekom_jurusanprodi); ?>" target="blank"><?= $kkn->rekom_jurusanprodi ?></a>  
                            </div>
                            <div class="col-sm-2">
                            <input type="hidden" name="rekom" value="<?= $kkn->rekom_jurusanprodi; ?>">
                                <input type="file" class="form-control" name="rekom" value="<?= $kkn->rekom_jurusanprodi ?>"  >
                                <?php echo form_error('rekom', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>

                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">KRS Semester Ganjil/Genap</label>
                            <div class="col-sm-1">
                                <a href="<?php echo base_url('assets/uploads/'.$kkn->krs); ?>" target="blank"><?= $kkn->krs ?></a>  
                            </div>
                            <div class="col-sm-2">
                            <input type="hidden" name="krs1" value="<?= $kkn->krs; ?>">
                            <input type="file" class="form-control" name="krs" value="<?= $kkn->krs ?>"  >
                                <!-- <small class="form-text text-muted">*file Harus PDF</small> -->
                                <?php echo form_error('krs', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>

                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Slip Asli UKT semester Ganjil/Genap </label>
                            <div class="col-sm-1">
                                <a href="<?php echo base_url('assets/uploads/'.$kkn->slip); ?>" target="blank"><?= $kkn->slip ?></a>  
                            </div>
                            <div class="col-sm-2">
                            <input type="hidden" name="slip1" value="<?= $kkn->slip; ?>">
                            <input type="file" class="form-control" name="slip" value="<?= $kkn->slip ?>"   >
                                <!-- <small class="form-text text-muted">*file Harus PDF</small> -->
                                <?php echo form_error('slip', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>

                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Surat Keputusan Penerima Bidik Misi/KIPK </label>
                            <div class="col-sm-1">
                                <a href="<?php echo base_url('assets/uploads/'.$kkn->sk_bm); ?>" target="blank"><?= $kkn->sk_bm ?></a>  
                            </div>
                            <div class="col-sm-2">
                            <input type="hidden" name="sk_bm1" value="<?= $kkn->sk_bm; ?>">
                            <input type="file" class="form-control" name="sk_bm" value="<?= $kkn->sk_bm ?>" >
                                <small class="form-text text-muted">*Jika Ada</small>
                                <?php echo form_error('sk_bm', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>


                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Surat Keterangan Berbadan Sehat dari Puskesmas/Klinik Unima </label>
                            <div class="col-sm-1">
                                <a href="<?php echo base_url('assets/uploads/'.$kkn->sk_sehat); ?>" target="blank"><?= $kkn->sk_sehat ?></a>  
                            </div>
                            <div class="col-sm-2">
                            <input type="hidden" name="sk_sehat1" value="<?= $kkn->sk_sehat ?>">
                            <input type="file" class="form-control" name="sk_sehat" value="<?= $kkn->sk_sehat ?>"  >
                                <!-- <small class="form-text text-muted">*file Harus PDF</small> -->
                                <?php echo form_error('sk_sehat', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>

                      
                    </div>
                    <div id="step-4" class="tab-pane" role="tabpanel">
                    
                        <div class="form-group row ml-2 mb-4 mt-4">
                            <label for="" class="col-sm-2 col-form-label">Silakan klik tombol simpan untuk mendaftar</label>
                            <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>
        
                            </div>
                        </div>
                        
                    </div>

                </div>
            <?php echo form_close() ?>
        </div>
    

    
</div>
