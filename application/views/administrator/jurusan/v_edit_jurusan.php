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
           
                <i class="fas fa-university"></i> Form Edit Jurusan
            </div>

            <?php echo form_open_multipart('administrator/C_jurusan/update');?>

            <div class="form-group">
                <label for="">Fakultas</label>
                <select class="form-control" name="fakultas">
                    <?php foreach ($fakultas as $value) : ?> 
                       <option value="<?php echo $value->id ?>" <?php echo $jurusan->fakultas_id == $value->id ? 'selected' : '' ?>><?php echo $value->nama ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Nama</label>
                <input type="hidden" name="id" value="<?= $jurusan->id_jurusan ?>">
                <input type="text" name="nama" class="form-control" value="<?php echo $jurusan->nama_jurusan ?>">
                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>
           
            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>