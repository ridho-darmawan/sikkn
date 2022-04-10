<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-university"></i> Form Input Jurusan
            </div>

            <button class="btn btn-sm btn-warning mb-4" onclick="goBack()">Kembali</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>

            <?php echo form_open_multipart('administrator/C_jurusan/store');?>
            
            <div class="form-group">
                <label for="">Fakultas</label>
                <select class="form-control" name="fakultas" required>
                    <option value="">---Pilih Fakultas---</option>
                    <?php foreach ($fakultas as $value) : ?> 
                       <option value="<?php echo $value->id ?>"><?php echo $value->nama ?></option>
                    <?php endforeach; ?>
                    <!-- <option value="">asdfa</option> -->
                </select>
            </div>

            <div class="form-group">
                <label>Jurusan</label>
                <input type="text" name="nama" class="form-control" required>
                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>
           
            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>