<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i>
       Ubah Password
    </div>

    <button class="btn btn-sm btn-warning mb-4" onclick="goBack()">Kembali</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>

    <?php if($this->session->flashdata('ubahpassword')) :?>
            <?php echo $this->session->flashdata('ubahpassword') ?>
            <?php echo $this->session->unset_userdata('ubahpassword'); ?>
    <?php endif; ?>

    
    <?php echo form_open_multipart('mahasiswa/C_profil/updatePassword'); ?>
        <input type="hidden" name="id" value="<?= $mahasiswa->id ?>">
                <!-- <div class="form-group row ml-2 mb-4 mt-4">
                    <label for="" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-3">
                        <input type="text" name="pass_lama" class="form-control" >
                        <?php echo form_error('pass_lama', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                </div> -->
            
                <div class="form-group row ml-2 mb-4 mt-4">
                    <label for="" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-3">
                        <input type="text" name="pass_baru" class="form-control" >
                        <?php echo form_error('pass_baru', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                </div>
            
                <div class="form-group row ml-2 mb-4 mt-4">
                    <label for="" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-sm-3">
                        <input type="text" name="confirm_pass" class="form-control" >
                        <?php echo form_error('confirm_pass', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                </div>

                <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>
        
    <?php echo form_close() ?>
        
    

    
</div>
