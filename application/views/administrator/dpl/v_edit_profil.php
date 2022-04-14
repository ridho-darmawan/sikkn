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
           
                <i class="fas fa-university"></i> Form Edit Profil
            </div>

            <?php echo form_open_multipart('administrator/C_dpl/updateProfil');?>

            
            <input type="hidden" name="id" value="<?= $dpl->id_dpl ?>">
           
            <div class="form-group">
                <label>Nama DPL</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $dpl->nama_dpl ?>">
                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>NIP/NIDN</label>
                <input type="text" name="nip" class="form-control" value="<?php echo $dpl->nip ?>" readonly>
                <?php echo form_error('nip', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            

            <div class="form-group">
                <label>Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $dpl->tempat_lahir ?>">
                <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value="<?php echo $dpl->tanggal_lahir ?>">
                <?php echo form_error('tgl_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>NO HP</label>
                <input type="text" name="no_hp" class="form-control" value="<?php echo $dpl->no_hp ?>">
                <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?php echo $dpl->alamat ?>">
                <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>SK</label>
                <input type="file" name="sk" class="form-control" value="<?= $dpl->sk ?>">
                <small class="form-text text-muted">*file Harus PDF <br>abaikan jika tidak diubah</small>
                                
                <?php echo form_error('sk', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>


            <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>
           
            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>