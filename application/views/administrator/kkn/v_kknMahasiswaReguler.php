<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Daftar Mahasiswa KKN Reguler
    </div>

    <?php if($this->session->flashdata('kknreguler')) :?>
            <?php echo $this->session->flashdata('kknreguler') ?>
            <?php echo $this->session->unset_userdata('kknreguler'); ?>
    <?php endif; ?>

        
    <?php if(empty($mahasiswa)): ?>
    <?php else : ?>
        <?php echo anchor('mahasiswa/C_kkn/downloadExcelKknReguler', '<button class="btn btn-sm btn-success mb-3 mr-3"><i class="fas fa-download fa-sm">
        </i> Download Data Mahasiswa KKN Reguler</button>'); ?>
    <?php  endif; ?>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>No HP</th>
                    <th>Agama</th>
                    <th>Asal Daerah</th>
                    <th>File Dokumen</th>
                    <th>Laporan</th>
                    <th>Nilai</th>
                    <th>Sertifikat</th>
                    <th>Edit</th>
                    <th>Hapus</th>
                </tr>
            </thead>
          
            <tbody>
            <?php
            $no = 1;
            foreach ($mahasiswa as $value) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $value->nama_mhs ?></td>
                    <td><?php echo $value->nim ?></td>
                    <td><?php echo $value->email ?></td>
                    <td><?php echo $value->tempat_lahir ?>, <?php echo $value->tanggal_lahir ?></td>
                    <td><?php echo $value->alamat ?></td>
                    <td><?php echo $value->nama ?></td>
                    <td><?php echo $value->nama_jurusan ?></td>
                    <td><?php echo $value->no_hp ?></td>
                    <td><?php echo $value->agama ?></td>
                    <td><?php echo $value->asal_daerah ?></td>
                    <td>
                        <?php echo anchor('mahasiswa/C_kkn/downloadZip/' . $value->id_kkn, '<div class="btn btn-sm btn-info mr-3"><i class="fa fa-download"> Download File</i></div>') ?>
                    </td>
                    <td>
                        <?php if($value->laporan_kkn == null) : ?>
                            -
                        <?php else:?>
                            <a href="<?php echo base_url('assets/uploads/laporan_kkn/'.$value->laporan_kkn); ?>" target="blank"><?= $value->laporan_kkn ?></a>
                        <?php endif;?>
                        
                    </td>
                    <td>
                        <?php if($value->disiplin_dpl == null || $value->disiplin_desa == null) : ?>
                            <p style="color:red"> Belum Ada Nilai Diinput</p>   
                        <?php else: ?>
                        <a href="#lihat<?=$value->id_kkn_mhs?>" class="btn btn-sm btn-primary" data-toggle="modal" data-toggle="modal">Lihat Nilai</a>
                        <?php endif; ?>

                        <div class="modal fade" id="lihat<?=$value->id_kkn_mhs?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Data Nilai dari DPL dan DESA</h5>
                                        <h6 class="modal-title" id="exampleModalLongTitle">KKN REGULER</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>1. DPL</h5>
                                        <p>
                                            <ul>
                                                <li>Disiplin : <?= $value->disiplin_dpl ?></li>
                                                <li>Kreatifitas : <?= $value->kreatifitas_dpl ?></li>
                                                <li>Kerjasama : <?= $value->kerjasama_dpl ?></li>
                                                <li>Komunikasi : <?= $value->komunikasi_dpl ?></li>
                                                <li>kesesuaian Hasil : <?= $value->kesesuaianhasil_dpl ?></li>
                                            </ul>
                                        </p>
                                        <hr>
                                        <h5>2. Desa</h5>
                                        <p>
                                            <ul>
                                            <li>Disiplin : <?= $value->disiplin_desa ?></li>
                                                <li>Kreatifitas : <?= $value->kreatifitas_desa ?></li>
                                                <li>Kerjasama : <?= $value->kerjasama_desa ?></li>
                                                <li>Komunikasi : <?= $value->komunikasi_desa ?></li>
                                                <li>kesesuaian Hasil : <?= $value->kesesuaianhasil_desa ?></li>
                                            </ul>
                                        </p>
                                    </div>

                                    <div class="modal-footer">
                                        <?php if($value->disiplin_dpl == null || $value->disiplin_desa == null || $value->sertifikat != null):?>    
                                        <?php else:?>
                                            <?php echo form_open_multipart('administrator/C_mahasiswa/createSertifikat');?>
                                                <input type="hidden" name="sertifikat" value="<?= $value->nama_mhs ?>">
                                                <input type="hidden" name="nim" value="<?= $value->nim ?>">
                                                <input type="hidden" name="id_kkn" value="<?= $value->id_kkn_mhs ?>" >
                                                <button type="submit" class="btn btn-primary">Buat Sertifikat</button>
                                            <?php echo form_close() ?>
                                        
                                        <?php endif;?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                    <td>  
                        <?php if($value->sertifikat == null) :  ?>
                        <?php else: ?>
                            <?php echo form_open_multipart('administrator/C_mahasiswa/sertifikat');?>
                            <input type="hidden" name="id_mhs" value="<?= $value->id_mhs ?>">
                            <input type="hidden" name="id_kkn" value="<?= $value->id_kkn_mhs ?>" >
                            <button type="submit" class="btn btn-sm btn-success" >Cetak Sertifikat</button>
                        <?php echo form_close() ?>
                        <?php endif;?>
                    </td>
                    <td><?php echo anchor('administrator/C_mahasiswa/editKkn/'.$value->id_kkn, '<div class="btn btn-sm btn-primary mr-3">Edit</div>') ?></td>
                    <td><?php echo anchor('administrator/C_mahasiswa/destroyKkn/'.$value->id_kkn, '<div class="btn btn-sm btn-danger"> Hapus</div>') ?></td>

            
                </tr>
            <?php endforeach; ?>
            
            </tbody>
        </table>
    </div>
   