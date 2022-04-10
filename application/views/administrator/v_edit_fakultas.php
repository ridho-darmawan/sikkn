<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-university"></i> Form Edit Fakultas
            </div>
            <button class="btn btn-sm btn-warning mb-4" onclick="goBack()">Kembali</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>

            <?php echo form_open_multipart('administrator/C_fakultas/update');?>

            <div class="form-group">
                <label>Nama</label>
                <input type="hidden" name="id" value="<?= $fakultas->id ?>" required>
                <input type="text" name="nama" class="form-control" value="<?php echo $fakultas->nama ?>">
                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>
           
            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>