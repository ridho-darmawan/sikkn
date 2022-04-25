<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <button class="btn btn-sm btn-warning mb-4" onclick="goBack()">Kembali</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>

            
            <div class="alert alert-success" role="alert">
           
                <i class="fas fa-university"></i> Form Edit Data Mahasiswa
            </div>

            <?php echo form_open_multipart('administrator/C_mahasiswa/update');?>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="id" value="<?= $mahasiswa->id_mhs ?>">
                    <input type="text" name="nama" class="form-control" value="<?= $mahasiswa->nama_mhs ?>">
                    <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>  

                <div class="form-group">
                    <label>NIM</label>
                    <input type="number" name="nim" class="form-control" value="<?= $mahasiswa->nim ?>" readonly>
                    <?php echo form_error('nim', '<div class="text-danger small ml-3">', '</div>') ?>
                </div> 

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $mahasiswa->email ?>">
                    <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" value="<?= $mahasiswa->tempat_lahir ?>">
                    <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?= $mahasiswa->tanggal_lahir ?>">
                    <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?= $mahasiswa->alamat ?>">
                    <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label>Asal Daerah</label>
                    <input type="text" name="asal_daerah" class="form-control" value="<?= $mahasiswa->asal_daerah ?>"> 
                    <?php echo form_error('asal_daerah', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>

                <div class="form-group">
                    <label for="">Agama</label>
                    <select class="form-control" name="agama">
                        <option value="islam" <?= $mahasiswa->agama == 'islam' ? 'selected':'' ?>>Islam</option>
                        <option value="protestan" <?= $mahasiswa->agama == 'protestan' ? 'selected':'' ?>>Protestan</option>
                        <option value="katolik" <?= $mahasiswa->agama == 'katolik' ? 'selected':'' ?>>Katolik</option>
                        <option value="hindu" <?= $mahasiswa->agama == 'hindu' ? 'selected':'' ?>>Hindu</option>
                        <option value="buddha" <?= $mahasiswa->agama == 'buddha' ? 'selected':'' ?>>Buddha</option>
                        <option value="khonghucu" <?= $mahasiswa->agama == 'khonghucu' ? 'selected':'' ?>>Khonghucu</option>
                    
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select class="form-control" name="jk">
                        <option value="pria" <?= $mahasiswa->jk == 'pria' ? 'selected':'' ?>>Pria</option>
                        <option value="wanita" <?= $mahasiswa->jk == 'wanita' ? 'selected':'' ?>>Wanita</option>
                    
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Fakultas</label>
                    <select class="form-control" name="fakultas" id="sel_fakultas">
                        <option value="">Pilih Fakultas</option>
                        <?php foreach ($fakultas as $value) : ?> 
                        <option value="<?php echo $value->id ?>" <?= $mahasiswa->fakultas_id == $value->id ? 'selected' :'' ?>><?php echo $value->nama ?></option>
                        <?php endforeach; ?>
                        <!-- <option value="">asdfa</option> -->
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Jurusan</label>
                    <select class="form-control" name="jurusan" id="sel_jurusan">
                    <option value="">Pilih Jurusan</option>
                    <?php foreach ($jurusan as $value) : ?> 
                        <option value="<?php echo $value->id_jurusan ?>" <?= $mahasiswa->jurusan_id == $value->id_jurusan ? 'selected' :'' ?>><?php echo $value->nama_jurusan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>


                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?= $mahasiswa->no_hp ?>">
                    <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>

                <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>

            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>