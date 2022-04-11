<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Daftar Mahasiswa KKN
    </div>

    <?php if($this->session->flashdata('desakkn')) :?>
            <?php echo $this->session->flashdata('desakkn') ?>
            <?php echo $this->session->unset_userdata('desakkn'); ?>
    <?php endif; ?>

    <!-- <?php echo anchor('administrator/C_fakultas/create', '<button class="btn btn-sm btn-primary mb-3 mr-3"><i class="fas fa-download fa-sm">
        </i> Download Data Mahasiswa</button>'); ?> -->


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>foto</th>
                    <th>NAMA MHS</th>
                    <th>NIM</th>
                    <th>TTL</th>
                    <th>NO HP</th>
                    <th>ALAMAT</th>
                    <th>Jurusan</th>
                    <th>semester</th>
                    <th>email</th>
                    <th>agama</th>
                    <th>asal daerah</th>
                    <th>Laporan KKN</th>
                    <th>AKSI</th>
                </tr>
        </thead>
        <tbody>
            <?php  $no = 1; ?>

            <?php if($getLokasiDesa == null) : ?>
                <tr>
                    <td colspan="14" class="text-center p-4"><strong>Belum Ada Data Mahasiswa</strong></td>
                </tr>
            <?php else: ?>
                <?php foreach ($mhsDesa as $value) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><img src="<?= base_url('assets/uploads/'). $value->foto?>" alt="pas foto" width="100px"></td>
                        <td><?php echo $value->nama_mhs ?></td>
                        <td><?php echo $value->nim ?></td>
                        <td><?php echo $value->tempat_lahir ?> , <?php echo $value->tanggal_lahir ?></td>
                        <td><?php echo $value->no_hp ?></td>
                        <td><?php echo $value->alamat ?></td>
                        <td><?php echo $value->jurusan_id ?></td>
                        <td><?php echo $value->semester ?></td>
                        <td><?php echo $value->email ?></td>
                        <td><?php echo $value->agama ?></td>
                        <td><?php echo $value->asal_daerah?></td>
                        <td>
                            <?php if($value->laporan_kkn == null) : ?>
                                -
                            <?php else:?>
                                <a href="<?php echo base_url('assets/uploads/laporan_kkn/'.$value->laporan_kkn); ?>" target="blank"><?= $value->laporan_kkn ?></a>
                            <?php endif;?>
                            
                        </td>
        
                        <td width="20px">
                            <?php if($value->laporan_kkn == null) : ?>
                                -
                            <?php elseif($value->disiplin_desa == null) : ?>
        
                                <?php echo anchor('mahasiswa/C_kkn/inputNilaiDesa/'.$value->id_nilai, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit">Input Nilai</i></div>') ?>
        
                            <?php elseif($value->disiplin_desa != null) : ?>
        
                                <?php echo anchor('mahasiswa/C_kkn/editNilaiDesa/'.$value->id_nilai, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit">Edit Nilai</i></div>') ?>
        
                            <?php else:  ?>
        
                                <?php echo anchor('mahasiswa/C_kkn/inputNilaiDesa/'.$value->id_nilai, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit">Input Nilai</i></div>') ?>
        
                            <?php endif;?>
                            
                        </td>
                    
                    </tr>
                <?php endforeach; ?>
            
            <?php endif;?>
        </tbody>
       
    </table>
    </div>
</div>