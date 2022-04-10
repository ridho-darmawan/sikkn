<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Form Input KKN MERDEKA BELAJAR
    </div>



    <?php echo form_open_multipart('administrator/Kkn_merdeka/tambah_Kkn_merdeka_aksi'); ?>

    <div class="form-group">
        <label>NIM </label>
        <input type="text" name="nim" class="form-control" readonly value="<?= $this->session->userdata('nim') ?>">
        <?php echo form_error('nim', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control">
        <?php echo form_error('nama_lengkap', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Fakultas</label>
        <input type="text" name="fakultas" class="form-control">
        <?php echo form_error('fakultas', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Jurusan/Prodi</label>
        <input type="text" name="jurusan_prodi" class="form-control">
        <?php echo form_error('jurusan_prodi', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" name="tempat_lahir" class="form-control">
        <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Tanggal Lahir</label><br>
        <input type="date" name="tanggal_lahir" class="form-control">
        <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>
    <div class="form-group">
        <label>Semester</label>
        <input type="number" name="semester" class="form-control">
        <?php echo form_error('semester', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Agama</label>
        <input type="text" name="agama" class="form-control">
        <?php echo form_error('agama', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Nomor Telepon</label>
        <input type="number" name="no_hp" class="form-control">
        <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Alamat Tempat Tinggal (sekarang)</label>
        <input type="text" name="alamat_sekarang" class="form-control">
        <?php echo form_error('alamat_sekarang', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Asal Daerah</label><br>
        <input type="text" name="asal_daerah" class="form-control">
        <?php echo form_error('asal_daerah', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Rekomendasi Dari Jurusan/Prodi </label><br>
        <input type="file" class="form-control" name="rekom" required>
        <!-- <small class="form-text text-muted">*file Harus PDF</small> -->

        <?php echo form_error('rekom_jurusanprodi', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>KRS Semester Ganjil/Genap </label><br>
        <input type="file" class="form-control" name="krs" required>
        <!-- <small class="form-text text-muted">*file Harus PDF</small> -->
        <?php echo form_error('krs', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Slip Asli UKT semester Ganjil/Genap </label><br>
        <input type="file" class="form-control" name="slip" required>
        <!-- <small class="form-text text-muted">*file Harus PDF</small> -->
        <?php echo form_error('slip', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Surat Keputusan Penerima Bidik Misi/KIPK</label><br>
        <input type="file" class="form-control" name="sk_bm">
        <!-- <small class="form-text text-muted">*file Harus PDF</small> -->
        <?php echo form_error('sk_bm', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Surat Keterangan Pengurangan UKT/bantuan lainnya</label><br>
        <input type="file" class="form-control" name="sk_ukt">
        <!-- <small class="form-text text-muted">*file Harus PDF</small> -->
        <?php echo form_error('sk_ukt', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class=" form-group">
        <label>Pasfoto menggunakan jas almamater ukuran 3x4 berlatar merah</label><br>
        <input type="file" class="form-control" name="foto_almamater" required>
        <small class="form-text text-muted">*file Harus JPEG / PNG</small>
        <?php echo form_error('foto_almamater', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>
    <div class="form-group">
        <label>Surat Keterangan Berbadan Sehat dari Puskesmas/Klinik Unima</label><br>
        <input type="file" class="form-control" name="sk_sehat" required>
        <!-- <small class="form-text text-muted">*file Harus PDF</small> -->
        <?php echo form_error('sk_sehat', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Rekomendasi Lokasi KKN dari Desa/Kelurahan</label><br>
        <input type="file" class="form-control" name="rekom_kkn" required>
        <!-- <small class="form-text text-muted">*file Harus PDF</small> -->
        <?php echo form_error('rekom_kkn', '<div class="text-danger small ml-3">', '</div>') ?>
    </div>

    <div class="form-group">
        <label>Foto</label><br>
        <input type="file" class="form-control" name="photo">
        <!-- <small class="form-text text-muted">*file Harus JPEG / PNG</small> -->
    </div>
    <button type="submit" value="upload" class="btn btn-primary mb-5 mt-3">Simpan</button>


    <?php echo form_close() ?>

</div>