<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Upload Laporan Akhir KKN Merdeka Belajar
    </div>



    <?php foreach ($laporan_merdeka as $value) : ?>
        <?php echo form_open_multipart('mahasiswa/Laporan_akhir_merdeka/laporan_akhir_merdeka_save'); ?>


        <input type="hidden" name="nim" value=<?= $value->nim; ?>>
        <input type="hidden" name="fakultas" value=<?= $value->fakultas; ?>>
        <input type="hidden" name="jurusan" value=<?= $value->jurusan_prodi; ?>>
        <!-- <input type="text" name="nama_lengkap" value=<?= $value->nama_lengkap; ?>> -->

        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" class="form-control">
            <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
        </div>

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