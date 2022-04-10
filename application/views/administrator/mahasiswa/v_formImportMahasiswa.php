<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-university"></i> Form Import Data Mahasiswa
            </div>

            <?php echo form_open_multipart('administrator/C_mahasiswa/uploadDataMahasiswa');?>

            <div class="box-body">
        
                <div class="form-group">
                    <label>Berkas</label>
                    <input type="file" id="importExcel" name="importExcel" class="form-group" accept=".xlsx,.xls">
                    
                </div>
                <a class="btn btn-primary" href="<?= base_url('administrator/C_mahasiswa')?>">Kembali</a>

                <button type="submit" name="submit" value="upload" class="btn btn-primary">Simpan</button>
            </div>
           
            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>