<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-university"></i> Form Setting Pimpinan
            </div>

            <?php echo form_open_multipart('administrator/C_pimpinan/store');?>
            
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $pimpinan->id_set ?>">
                <label>Nama Ketua</label>
                <input type="text" name="ketua" class="form-control" required>
                <?php echo form_error('ketua', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>NIP Ketua</label>
                <input type="text" name="nip_ketua" class="form-control" required>
                <?php echo form_error('nip_ketua', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>TTD Ketua</label>
                <input type="file" name="ttd_ketua" class="form-control" required>
                <?php echo form_error('ttd_ketua', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Nama Koordinator KKN</label>
                <input type="text" name="koordinator" class="form-control" required>
                <?php echo form_error('koordinator', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>NIP Koordinator KKN</label>
                <input type="text" name="nip_koordinator" class="form-control" required>
                <?php echo form_error('nip_koordinator', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>TTD Koordinator KKN</label>
                <input type="file" name="ttd_koordinator" class="form-control" required>
                <?php echo form_error('ttd_koordinator', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

          
            <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>
           
            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>