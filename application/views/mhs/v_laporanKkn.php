<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i>
        Upload Laporan KKN
    </div>

    

    <?php if($this->session->flashdata('laporan_kkn')) :?>
            <?php echo $this->session->flashdata('laporan_kkn') ?>
            <?php echo $this->session->unset_userdata('laporan_kkn'); ?>
    <?php endif; ?>

    <?php if(!empty($kkn->id_mhs_kkn)) :?>

        <?php if(  strtotime(date('Y-m-d')) >= strtotime($cekJadwalKkn->tgl_mulai_laporan) && strtotime(date('Y-m-d')) <= strtotime($cekJadwalKkn->tgl_akhir_laporan) )  :?>
            <p>Waktu Input dimulai dari tanggal <strong><?= $cekJadwalKkn->tgl_mulai_laporan ?></strong> sampai dengan <strong><?= $cekJadwalKkn->tgl_akhir_laporan ?></strong><br>pastikan laporan anda telah terupload</p>
            <?php if($kkn->laporan_kkn == null) : ?>
                <?php echo form_open_multipart('mahasiswa/C_laporan/store'); ?>
                    <div class="form-group row ml-2 mb-4 mt-4">
                        <label for="" class="col-sm-2 col-form-label">Upload Laporan KKN</label>
                        <div class="col-sm-3">
                            <input type="hidden" name="id" value="<?= empty($kkn->id_kkn) ? '' : $kkn->id_kkn  ?>">
                            <!-- <input type="hidden" class="form-control" name="upload_laporan_old" value="<?= $kkn->laporan_kkn ?>"> -->
                            <input type="file" class="form-control" name="upload_laporan" required>
                            <?php echo form_error('upload_laporan', '<div class="text-danger small ml-3">', '</div>') ?>
                        </div>
                    </div>

                    <button type="submit" value="upload" class="btn btn-primary mb-5 mt-3">Simpan</button>
                <?php echo form_close() ?>
            <?php else : ?>
                <table class="table table-striped table-hover table-bordered mt-4">
                    <tr>
                        <th>File</th>
                        <th>Lihat</th>
                        <th>Download</th>
                        <th>Edit</th>
                    </tr>
                
                
                    <tr>
                        <td>Laporan KKN</td>
                        <td><a href="<?php echo base_url('assets/uploads/laporan_kkn/'.$kkn->laporan_kkn); ?>" target="blank"><?= $kkn->laporan_kkn ?></a> </td>

                        <td>
                            <?php echo anchor('mahasiswa/C_laporan/downloadLaporan/' . $kkn->id_kkn, '<div class="btn btn-sm btn-info">
                            <i class="fa fa-download"></i></div>') ?>
                        </td>

                        <td>
                            <?php echo anchor('mahasiswa/C_laporan/edit/' . $kkn->id_kkn, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                        </td>
                    </tr>
                
                </table>
            <?php endif ?>
            
            
    <?php elseif(  strtotime(date('Y-m-d')) >= strtotime($cekJadwalKkn->tgl_mulai_laporan) && strtotime(date('Y-m-d')) >= strtotime($cekJadwalKkn->tgl_akhir_laporan) && $kkn->laporan_kkn != null):?>
        <table class="table table-striped table-hover table-bordered mt-4">
                    <tr>
                        <th>File</th>
                        <th>Lihat</th>
                        <th>Download</th>
                        <!-- <th>Edit</th> -->
                    </tr>
                
                
                    <tr>
                        <td>Laporan KKN</td>
                        <td><a href="<?php echo base_url('assets/uploads/laporan_kkn/'.$kkn->laporan_kkn); ?>" target="blank"><?= $kkn->laporan_kkn ?></a> </td>

                        <td>
                            <?php echo anchor('mahasiswa/C_laporan/downloadLaporan/' . $kkn->id_kkn, '<div class="btn btn-sm btn-info">
                            <i class="fa fa-download"></i></div>') ?>
                        </td>

                        <!-- <td>
                            <?php echo anchor('mahasiswa/C_laporan/edit/' . $kkn->id_kkn, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>') ?>
                        </td> -->
                    </tr>
                
                </table>
        <?php else:?>
            <h4 style="color:red;" class="p-4 mt-4 text-center"><strong>  Input Laporan Dibuka Pada tanggal <?= $cekJadwalKkn->tgl_mulai_laporan ?> sampai <?= $cekJadwalKkn->tgl_akhir_laporan ?></strong></h4> 
        <?php endif;?>

    <?php else: ?>
        <h4 style="color:red;" class="p-4 mt-4 text-center"><strong>  Anda Belum Mendaftar KKN</strong></h4> 
    <?php endif; ?>

    


</div>