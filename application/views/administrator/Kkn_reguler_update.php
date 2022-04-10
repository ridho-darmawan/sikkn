<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Update KKN REGULER
    </div>

    <?php foreach ($Kkn_reguler as $kknr) : ?>
        <?php echo form_open_multipart('administrator/Kkn_reguler/update_Kkn_reguler_aksi') ?>

        <div class="form-group">
            <label>NIM </label>
            <input type="hidden" name="id" class="form-control" value="<?php echo $kknr->id ?>">
            <input type="text" name="nim" class="form-control" readonly value="<?php echo $kknr->nim ?>">
            <?php echo form_error('nim', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value=" <?php echo $kknr->nama_lengkap ?>">
            <?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Fakultas</label>
            <input type="text" name="fakultas" class="form-control" value="<?php echo $kknr->fakultas ?>">
            <?php echo form_error('fakultas', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Jurusan/Prodi</label>
            <input type="text" name="jurusan_prodi" class="form-control" value="<?php echo $kknr->jurusan_prodi ?>">
            <?php echo form_error('jurusan_prodi', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $kknr->tempat_lahir ?>">
            <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir</label><br>
            <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $kknr->tanggal_lahir ?>">
            <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>
        <div class="form-group">
            <label>Semester</label>
            <input type="text" name="semester" class="form-control" value="<?php echo $kknr->semester ?>">
            <?php echo form_error('semester', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" value="<?php echo $kknr->agama ?>">
            <?php echo form_error('agama', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Nomor Telepon</label>
            <input type="text" name="no_hp" class="form-control" value="<?php echo $kknr->no_hp ?>">
            <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Alamat Tempat Tinggal (sekarang)</label>
            <input type="text" name="alamat_sekarang" class="form-control" value="<?php echo $kknr->alamat_sekarang ?>">
            <?php echo form_error('alamat_sekarang', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Asal Daerah</label><br>
            <input type="text" name="asal_daerah" class="form-control" value="<?php echo $kknr->asal_daerah ?>">
            <?php echo form_error('asal_daerah', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

      

        <div class="form-group">
            <label>Rekomendasi Dari Jurusan/Prodi </label>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo base_url('assets/uploads/'.$kknr->rekom_jurusanprodi); ?>" target="blank">
                        <?= $kknr->rekom_jurusanprodi ?>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="hidden" name="rekom" value="<?= $kknr->rekom_jurusanprodi; ?>">
                        <input type="file" class="form-control" name="rekom_jurusanprodi" id="rekom_jurusanprodi" value=<?= $kknr->rekom_jurusanprodi; ?> >
                        <?php echo form_error('rekom_jurusanprodi', '<div class="text-danger small ml-3">', '</div>') ?>
                        <small class="form-text text-muted">*abaikan jika tidak ingin merubah</small>
                        <!-- <label class="custom-file-label" for="rekom_jurusanprodi"><?= $kknr->rekom_jurusanprodi ?></label> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>KRS Semester Ganjil/Genap</label>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo base_url('assets/uploads/'.$kknr->krs); ?>" target="blank">
                        <?= $kknr->krs ?>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="hidden" name="krs1" value="<?= $kknr->krs; ?>">
                        <input type="file" class="form-control" name="krs" id="krs" value=<?= $kknr->krs; ?> >
                        <?php echo form_error('krs', '<div class="text-danger small ml-3">', '</div>') ?>
                        <small class="form-text text-muted">*abaikan jika tidak ingin merubah</small>
                        <!-- <label class="custom-file-label" for="krs"><?= $kknr->krs ?></label> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Slip Asli UKT semester Ganjil/Genap</label>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo base_url('assets/uploads/'.$kknr->slip); ?>" target="blank">
                        <?= $kknr->slip ?>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                    <input type="hidden" name="slip1" value="<?= $kknr->slip; ?>">
                        <input type="file" class="form-control" name="slip" id="slip" value=<?= $kknr->slip; ?>>
                        <?php echo form_error('slip', '<div class="text-danger small ml-3">', '</div>') ?>
                        <small class="form-text text-muted">*abaikan jika tidak ingin merubah</small>
                        <!-- <label class="custom-file-label" for="slip"><?= $kknr->slip ?></label> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Surat Keputusan Penerima Bidik Misi/KIPK</label>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo base_url('assets/uploads/'.$kknr->sk_bm); ?>" target="blank">
                        <?= $kknr->sk_bm ?>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                    <input type="hidden" name="sk_bm1" value="<?= $kknr->sk_bm; ?>">
                        <input type="file" class="form-control" name="sk_bm" id="sk_bm" value=<?= $kknr->sk_bm; ?>>
                        <?php echo form_error('sk_bm', '<div class="text-danger small ml-3">', '</div>') ?>
                        <small class="form-text text-muted">*abaikan jika tidak ingin merubah</small>
                        <!-- <label class="custom-file-label" for="sk_bm"><?= $kknr->sk_bm ?></label> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Surat Keterangan Pengurangan UKT /bantuan lainnya</label>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo base_url('assets/uploads/'.$kknr->sk_ukt); ?>" target="blank">
                        <?= $kknr->sk_ukt ?>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="hidden" name="sk_ukt1" value="<?= $kknr->sk_ukt; ?>">
                        <input type="file" class="form-control" name="sk_ukt" id="sk_ukt" value=<?= $kknr->sk_ukt; ?>>
                        <?php echo form_error('sk_ukt', '<div class="text-danger small ml-3">', '</div>') ?>
                        <small class="form-text text-muted">*abaikan jika tidak ingin merubah</small>
                        <!-- <label class="custom-file-label" for="sk_ukt"><?= $kknr->sk_ukt ?></label> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Pasfoto menggunakan jas almamater ukuran 3x4 berlatar merah</label>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo base_url('assets/uploads/'.$kknr->foto_almamater); ?>" target="blank">
                        <?= $kknr->foto_almamater ?>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="hidden" name="foto_almamater1" value="<?= $kknr->foto_almamater; ?>">
                        <input type="file" class="form-control" name="foto_almamater" id="foto_almamater" value=<?= $kknr->foto_almamater; ?>>
                        <?php echo form_error('foto_almamater', '<div class="text-danger small ml-3">', '</div>') ?>
                        <small class="form-text text-muted">*abaikan jika tidak ingin merubah</small>
                        <!-- <label class="custom-file-label" for="foto_almamater"><?= $kknr->foto_almamater ?></label> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Surat Keterangan Berbadan Sehat dari Puskesmas / Klinik Unima</label>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo base_url('assets/uploads/'.$kknr->sk_sehat); ?>" target="blank">
                        <?= $kknr->sk_sehat ?>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                    <input type="hidden" name="sk_sehat1" value="<?= $kknr->sk_sehat; ?>">
                        <input type="file" class="form-control" name="sk_sehat" id="sk_sehat" value=<?= $kknr->sk_sehat; ?>>
                        <?php echo form_error('sk_sehat', '<div class="text-danger small ml-3">', '</div>') ?>
                        <small class="form-text text-muted">*abaikan jika tidak ingin merubah</small>
                        <!-- <label class="custom-file-label" for="sk_sehat"><?= $kknr->sk_sehat ?></label> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Rekomendasi Lokasi KKN dari Desa/Kelurahan</label>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo base_url('assets/uploads/'.$kknr->rekom_kkn); ?>" target="blank">
                        <?= $kknr->rekom_kkn ?>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                    <input type="hidden" name="rekom_kkn1" value="<?= $kknr->rekom_kkn; ?>">
                        <input type="file" class="form-control" name="rekom_kkn" id="rekom_kkn" value=<?= $kknr->rekom_kkn; ?>>
                        <?php echo form_error('rekom_kkn', '<div class="text-danger small ml-3">', '</div>') ?>
                        <small class="form-text text-muted">*abaikan jika tidak ingin merubah</small>
                        <!-- <label class="custom-file-label" for="rekom_kkn"><?= $kknr->rekom_kkn ?></label> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>Foto</label>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo base_url('assets/uploads/'.$kknr->photo); ?>" target="blank">
                        <?= $kknr->photo ?>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                    <input type="hidden" name="photo1" value="<?= $kknr->photo; ?>">
                        <input type="file" class="form-control" name="photo" id="photo" value=<?= $kknr->photo; ?>>
                        <small class="form-text text-muted">*abaikan jika tidak ingin merubah</small>
                        <?php echo form_error('photo', '<div class="text-danger small ml-3">', '</div>') ?>
                        <!-- <label class="custom-file-label" for="photo"><?= $kknr->photo ?></label> -->
                    </div>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>

        <?php form_close(); ?>
    <?php endforeach; ?>
</div>