<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-university"></i> Form Input Nilai Mahasiswa KKN
            </div>

            <button class="btn btn-sm btn-warning mb-4" onclick="goBack()">Kembali</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>

            <?php echo form_open_multipart('mahasiswa/C_kkn/storeNilaiKkn');?>
            <input type="hidden" value="<?= $id_nilai ?>" name="id_nilai">
            <div class="form-group">
                <label>Disiplin</label>
                <select name="disiplin" class="form-control" id="disiplin" required>
                    <option value="">Pilih Nilai</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <?php echo form_error('disiplin', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Kreatifitas</label>
                <select name="kreatifitas" class="form-control" id="kreatifitas" required>
                    <option value="">Pilih Nilai</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <?php echo form_error('kreatifitas', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            

            <div class="form-group">
                <label>Kerjasama</label>
                <select name="kerjasama" class="form-control" id="kerjasama" required>
                    <option value="">Pilih Nilai</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <?php echo form_error('kerjasama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Komunikasi</label>
                <select name="komunikasi" class="form-control" id="komunikasi" required>
                    <option value="">Pilih Nilai</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <?php echo form_error('komunikasi', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Kesesuaian Hasil</label>
                <select name="kesesuaian" class="form-control" id="kesesuaian" required>
                    <option value="">Pilih Nilai</option>
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <?php echo form_error('kesesuaian', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>
           
            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>