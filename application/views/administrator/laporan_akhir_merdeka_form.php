<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Upload Laporan Akhir
    </div>



    <?php foreach ($laporan_merdeka as $value) : ?>
        <?php echo form_open_multipart('administrator/Laporan_akhir_merdeka/laporan_akhir_merdeka_save'); ?>

        <input type="hidden" name="nama" value=<?= $value->nama_lengkap; ?>>
        <input type="hidden" name="nim" value=<?= $value->nim; ?>>
        <input type="hidden" name="fakultas" value=<?= $value->fakultas; ?>>
        <input type="hidden" name="jurusan" value=<?= $value->jurusan_prodi; ?>>

        <!-- <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control">
                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Nim</label>
                <input type="text" name="nama" class="form-control">
                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div> -->

        <!-- <div class="form-group">
                <label>Fakultas</label>
                <input type="text" name="fakultas" class="form-control">
                <?php echo form_error('fakultas', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Jurusan/Prodi</label>
                <input type="text" name="jurusan_prodi" class="form-control">
                <?php echo form_error('jurusan_prodi', '<div class="text-danger small ml-3">', '</div>') ?>
            </div> -->

        <div class="form-group">
            <label>Lokasi KKN</label>
            <input type="text" name="lokasi" class="form-control">
            <?php echo form_error('lokasi', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Nama DPL</label>
            <input type="text" name="nama_dpl" class="form-control">
            <?php echo form_error('nama_dpl', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

        <div class="form-group">
            <label>Laporan Akhir</label><br>

            <input type="file" class="form-control" name="upload_akhir" required>
            <!-- <small class="form-text text-muted">*file Harus JPEG / PNG</small> -->
        </div>
        <button type="submit" value="upload" class="btn btn-primary mb-5 mt-3">Simpan</button>


        <?php echo form_close() ?>
    <?php endforeach; ?>

</div>