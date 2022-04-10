<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Update Laporan KKN Merdeka Belajar
    </div>

    <?php foreach ($laporan_merdeka as $l) : ?>
        <?php echo form_open_multipart('administrator/Laporan_akhir_merdeka/update_laporan_akhir_merdeka_aksi') ?>
        <input type="hidden" name="id" class="form-control" value="<?php echo $l->id ?>">
        <input type="hidden" name="nama" class="form-control" value="<?php echo $l->nama ?>">
        <input type="hidden" name="nim" class="form-control" value="<?php echo $l->nim ?>">
        <input type="hidden" name="fakultas" class="form-control" value="<?php echo $l->fakultas ?>">
        <input type="hidden" name="jurusan" class="form-control" value="<?php echo $l->jurusan ?>">
        <div class="form-group">
            <label>Lokasi KKN</label>

            <input type="text" name="lokasi" class="form-control" value="<?= $l->lokasi_kkn; ?>">
            <?php echo form_error('lokasi', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Nama DPL</label>
            <input type="text" name="nama_dpl" class="form-control" value="<?= $l->nama_dpl; ?>">
            <?php echo form_error('nama_dpl', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>


        <div class="form-group">
            <label>Laporan Akhir</label>
            <div class="row">
                <div class="col-sm-3">
                    <a href="<?php echo base_url('assets/uploads/laporan_merdeka/' . $l->berkas); ?>" target="blank">
                        <?= $l->berkas ?>
                    </a>
                </div>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="hidden" name="upload_akhir1" value="<?= $l->berkas; ?>">
                        <input type="file" class="form-control" name="upload_akhir" id="upload_akhir" value=<?= $l->berkas; ?>>

                        <?php echo form_error('upload_akhir', '<div class="text-danger small ml-3">', '</div>') ?>
                        <small class="form-text text-muted">*abaikan jika tidak ingin merubah</small>
                    </div>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>

        <?php form_close(); ?>
    <?php endforeach; ?>
</div>