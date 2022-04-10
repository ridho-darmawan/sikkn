<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i>
        Edit Laporan KKN
    </div>

    <?php if($this->session->flashdata('laporan_kkn')) :?>
            <?php echo $this->session->flashdata('laporan_kkn') ?>
            <?php echo $this->session->unset_userdata('laporan_kkn'); ?>
    <?php endif; ?>

        <?php echo form_open_multipart('mahasiswa/C_laporan/update'); ?>
            <div class="form-group row ml-2 mb-4 mt-4">
                <label for="" class="col-sm-2 col-form-label">Upload Laporan KKN</label>
                <div class="col-sm-1"><a href="<?php echo base_url('assets/uploads/laporan_kkn/'.$kkn->laporan_kkn); ?>" target="blank"><?= $kkn->laporan_kkn ?></a></div>
                <div class="col-sm-4">
                    <input type="hidden" name="id" value="<?= $kkn->id_kkn ?>">
                    <input type="hidden" class="form-control" name="upload_laporan_old" value="<?= $kkn->laporan_kkn ?>">
                    <input type="file" class="form-control" name="upload_laporan" required>
                    <?php echo form_error('upload_laporan', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
            </div>

            <button type="submit" value="upload" class="btn btn-primary mb-5 mt-3">Simpan</button>
        <?php echo form_close() ?>

</div>