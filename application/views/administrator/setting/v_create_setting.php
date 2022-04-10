<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-university"></i> Form Setting Jadwal KKN
            </div>

            <?php echo form_open_multipart('administrator/C_setting/store');?>
            
            <div class="form-group">
                <label>Gelombang</label>
                <input type="number" name="gelombang" class="form-control" required>
                <?php echo form_error('gelombang', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Tahun</label>
                <input type="text" name="tahun" class="form-control" required>
                <?php echo form_error('tahun', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Tanggal Mulai KKN</label>
                <input type="date" name="tanggal_mulai_kkn" class="form-control" required>
                <?php echo form_error('tanggal_mulai_kkn', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Tanggal Akhir KKN</label>
                <input type="date" name="tanggal_akhir_kkn" class="form-control" required>
                <?php echo form_error('tanggal_akhir_kkn', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Tanggal Mulai Input Laporan KKN</label>
                <input type="date" name="tanggal_mulai_laporan" class="form-control" required>
                <?php echo form_error('tanggal_mulai_laporan', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Tanggal Akhir Input Laporan KKN</label>
                <input type="date" name="tanggal_akhir_laporan" class="form-control" required>
                <?php echo form_error('tanggal_akhir_laporan', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

          
            <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>
           
            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>