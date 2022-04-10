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
           
                <i class="fas fa-university"></i> Form Edit Lokasi KKN
            </div>

            <?php echo form_open_multipart('administrator/C_lokasiKkn/update');?>
            <input type="hidden" name="id_lokasi" value="<?= $lokasi->id_lokasi ?>">
            <div class="form-group">
                <label for="">Provinsi</label>
                <select class="form-control" name="provinsi" id="sel_prov" required>
                    <option value="">---Pilih Provinsi---</option>
                    <?php foreach ($provinsi as $value) : ?> 
                       <option value="<?php echo $value['id'] ?>" <?php echo $lokasi->provinsi_id == $value['id'] ? 'selected' : '' ?>><?php echo $value['name_province'] ?></option>
                    <?php endforeach; ?>
                    <!-- <option value="">asdfa</option> -->
                </select>
            </div>

            <div class="form-group">
                <label for="">Kabupaten</label>
                <select class="form-control" name="kab" id="sel_kab" required>
                    <option value="">---Pilih Kabupaten---</option>
                    <?php foreach($getKab as $value) : ?>
                        <option value="<?= $value->kabupaten_id ?>" <?= $value->kabupaten_id == $lokasi->kabupaten_id ? 'selected':'' ?>><?= $value->name_regencie ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Kecamatan</label>
                <select class="form-control" name="kec" id="sel_kec" required>
                    <option value="">Pilih Kecamatan</option>
                    <?php foreach($getKec as $value) : ?>
                        <option value="<?= $value->kecamatan_id ?>" <?= $value->kecamatan_id == $lokasi->kecamatan_id ? 'selected':'' ?>><?= $value->name_district ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <label for="">Desa/Kelurahan</label>
                <select class="form-control" name="desa" id="sel_desa" required>
                    <option value="">Pilih Desa/Kelurahan</option>
                    <?php foreach($getDesa as $value) : ?>
                        <option value="<?= $value->desa_id ?>" <?= $value->desa_id == $lokasi->desa_id ? 'selected':'' ?>><?= $value->name_village ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group">
                <label>Kuota Mahasiswa</label>
                <input type="number" name="kuota" class="form-control" value="<?= $lokasi->kuota_kkn ?>" required>
                <?php echo form_error('kuota', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>

            <div class="form-group">
                <label for="">Dosen Pembimbing Lapangan (DPL)</label>
                <select class="form-control" name="dpl" required>
                    <option value="">---Pilih DPL---</option>
                    <?php foreach ($dpl as $value) : ?> 
                       <option value="<?php echo $value['id_dpl'] ?>" <?= $value['id_dpl'] == $lokasi->id_dpl ? 'selected' :'' ?>><?php echo $value['nama_dpl'] ?></option>
                    <?php endforeach; ?>
                    <!-- <option value="">asdfa</option> -->
                </select>
            </div>

            <button type="submit" value="simpan" class="btn btn-primary mb-5 mt-3">Simpan</button>
           
           
            <?php echo form_close() ?>
        </div>
        <div class="col-md-2"></div>
    </div>
    
</div>