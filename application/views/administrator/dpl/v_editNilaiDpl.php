<div class="container-fluid">
    <div class="row align-items-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-success" role="alert">
                <i class="fas fa-university"></i> Form Edit Nilai Mahasiswa KKN
            </div>

            <?php echo form_open_multipart('mahasiswa/C_kkn/updateNilaiKkn');?>
            <input type="hidden" value="<?= $id_kkn ?>" name="id_kkn">
            <div class="form-group">
                <label>Disiplin</label>
                <select name="disiplin" class="form-control" id="disiplin" required>
                    <option value="">Pilih Nilai</option>
                    <option value="A" <?= $nilai->disiplin_dpl == 'A' ? 'selected' :'' ?>>A</option>
                    <option value="A-" <?= $nilai->disiplin_dpl == 'A-' ? 'selected' :'' ?>>A-</option>
                    <option value="B+" <?= $nilai->disiplin_dpl == 'B+' ? 'selected' :'' ?>>B+</option>
                    <option value="B" <?= $nilai->disiplin_dpl == 'B' ? 'selected' :'' ?>>B</option>
                    <option value="B-" <?= $nilai->disiplin_dpl == 'B-' ? 'selected' :'' ?>>B-</option>
                    <option value="C+" <?= $nilai->disiplin_dpl == 'C+' ? 'selected' :'' ?>>C+</option>
                    <option value="C" <?= $nilai->disiplin_dpl == 'C' ? 'selected' :'' ?>>C</option>
                    <option value="D" <?= $nilai->disiplin_dpl == 'D' ? 'selected' :'' ?>>D</option>
                    <option value="E" <?= $nilai->disiplin_dpl == 'E' ? 'selected' :'' ?>>E</option>
                </select>
                <?php echo form_error('disiplin', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Kreatifitas</label>
                <select name="kreatifitas" class="form-control" id="kreatifitas" required>
                    <option value="">Pilih Nilai</option>
                    <option value="A" <?= $nilai->kreatifitas_dpl == 'A' ? 'selected' :'' ?>>A</option>
                    <option value="A-" <?= $nilai->kreatifitas_dpl == 'A-' ? 'selected' :'' ?>>A-</option>
                    <option value="B+" <?= $nilai->kreatifitas_dpl == 'B+' ? 'selected' :'' ?>>B+</option>
                    <option value="B" <?= $nilai->kreatifitas_dpl == 'B' ? 'selected' :'' ?>>B</option>
                    <option value="B-" <?= $nilai->kreatifitas_dpl == 'B-' ? 'selected' :'' ?>>B-</option>
                    <option value="C+" <?= $nilai->kreatifitas_dpl == 'C+' ? 'selected' :'' ?>>C+</option>
                    <option value="C" <?= $nilai->kreatifitas_dpl == 'C' ? 'selected' :'' ?>>C</option>
                    <option value="D" <?= $nilai->kreatifitas_dpl == 'D' ? 'selected' :'' ?>>D</option>
                    <option value="E" <?= $nilai->kreatifitas_dpl == 'E' ? 'selected' :'' ?>>E</option>
                </select>
                <?php echo form_error('kreatifitas', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            

            <div class="form-group">
                <label>Kerjasama</label>
                <select name="kerjasama" class="form-control" id="kerjasama" required>
                    <option value="">Pilih Nilai</option>
                    <option value="A" <?= $nilai->kerjasama_dpl == 'A' ? 'selected' :'' ?>>A</option>
                    <option value="A-" <?= $nilai->kerjasama_dpl == 'A-' ? 'selected' :'' ?>>A-</option>
                    <option value="B+" <?= $nilai->kerjasama_dpl == 'B+' ? 'selected' :'' ?>>B+</option>
                    <option value="B" <?= $nilai->kerjasama_dpl == 'B' ? 'selected' :'' ?>>B</option>
                    <option value="B-" <?= $nilai->kerjasama_dpl == 'B-' ? 'selected' :'' ?>>B-</option>
                    <option value="C+" <?= $nilai->kerjasama_dpl == 'C+' ? 'selected' :'' ?>>C+</option>
                    <option value="C" <?= $nilai->kerjasama_dpl == 'C' ? 'selected' :'' ?>>C</option>
                    <option value="D" <?= $nilai->kerjasama_dpl == 'D' ? 'selected' :'' ?>>D</option>
                    <option value="E" <?= $nilai->kerjasama_dpl == 'E' ? 'selected' :'' ?>>E</option>
                </select>
                <?php echo form_error('kerjasama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Komunikasi</label>
                <select name="komunikasi" class="form-control" id="komunikasi" required>
                    <option value="">Pilih Nilai</option>
                    <option value="A" <?= $nilai->komunikasi_dpl == 'A' ? 'selected' :'' ?>>A</option>
                    <option value="A-" <?= $nilai->komunikasi_dpl == 'A-' ? 'selected' :'' ?>>A-</option>
                    <option value="B+" <?= $nilai->komunikasi_dpl == 'B+' ? 'selected' :'' ?>>B+</option>
                    <option value="B" <?= $nilai->komunikasi_dpl == 'B' ? 'selected' :'' ?>>B</option>
                    <option value="B-" <?= $nilai->komunikasi_dpl == 'B-' ? 'selected' :'' ?>>B-</option>
                    <option value="C+" <?= $nilai->komunikasi_dpl == 'C+' ? 'selected' :'' ?>>C+</option>
                    <option value="C" <?= $nilai->komunikasi_dpl == 'C' ? 'selected' :'' ?>>C</option>
                    <option value="D" <?= $nilai->komunikasi_dpl == 'D' ? 'selected' :'' ?>>D</option>
                    <option value="E" <?= $nilai->komunikasi_dpl == 'E' ? 'selected' :'' ?>>E</option>
                </select>
                <?php echo form_error('komunikasi', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label>Kesesuaian Hasil</label>
                <select name="kesesuaian" class="form-control" id="kesesuaian" required>
                    <option value="">Pilih Nilai</option>
                    <option value="A" <?= $nilai->kesesuaianhasil_dpl == 'A' ? 'selected' :'' ?>>A</option>
                    <option value="A-" <?= $nilai->kesesuaianhasil_dpl == 'A-' ? 'selected' :'' ?>>A-</option>
                    <option value="B+" <?= $nilai->kesesuaianhasil_dpl == 'B+' ? 'selected' :'' ?>>B+</option>
                    <option value="B" <?= $nilai->kesesuaianhasil_dpl == 'B' ? 'selected' :'' ?>>B</option>
                    <option value="B-" <?= $nilai->kesesuaianhasil_dpl == 'B-' ? 'selected' :'' ?>>B-</option>
                    <option value="C+" <?= $nilai->kesesuaianhasil_dpl == 'C+' ? 'selected' :'' ?>>C+</option>
                    <option value="C" <?= $nilai->kesesuaianhasil_dpl == 'C' ? 'selected' :'' ?>>C</option>
                    <option value="D" <?= $nilai->kesesuaianhasil_dpl == 'D' ? 'selected' :'' ?>>D</option>
                    <option value="E" <?= $nilai->kesesuaianhasil_dpl == 'E' ? 'selected' :'' ?>>E</option>
                </select>
                <?php echo form_error('kesesuaian', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>
           
            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>