<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-university"></i> Form Input Data Mahasiswa
            </div>

            <a class="btn btn-sm btn-warning mb-4" href="<?= base_url('administrator/C_mahasiswa')?>">Kembali</a>

            <?php echo form_open_multipart('administrator/C_mahasiswa/store');?>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>  

            <div class="form-group">
                <label>NIM</label>
                <input type="number" name="nim" class="form-control" required>
                <?php echo form_error('nim', '<div class="text-danger small ml-3">', '</div>') ?>
            </div> 
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required> 
                <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" required>
                <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
                <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
                <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Asal Daerah</label>
                <input type="text" name="asal_daerah" class="form-control" required>
                <?php echo form_error('asal_daerah', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label for="">Agama</label>
                <select class="form-control" name="agama" required>
                    <option value="">---Pilih Agama---</option>
                    <option value="islam">Islam</option>
                    <option value="protestan">Protestan</option>
                    <option value="katolik">Katolik</option>
                    <option value="hindu">Hindu</option>
                    <option value="buddha">Buddha</option>
                    <option value="khonghucu">Khonghucu</option>
                
                </select>
            </div>
            
            <div class="form-group">
                <label for="">Fakultas</label>
                <select class="form-control" name="fakultas" id="sel_fakultas" required>
                    <option value="">---Pilih Fakultas---</option>
                    <?php foreach ($fakultas as $value) : ?> 
                       <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                    <?php endforeach; ?>
                    <!-- <option value="">asdfa</option> -->
                </select>
            </div>

            <div class="form-group">
                <label for="">Jurusan</label>
                <select class="form-control" name="jurusan" id="sel_jurusan" required>
                    <option value="">---Pilih Jurusan---</option>
                </select>
            </div>


            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp" class="form-control" required>
                <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>
           
            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>