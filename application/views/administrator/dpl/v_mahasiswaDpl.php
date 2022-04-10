<div class="container-fluid">

    <div class="alert alert-success" role="alert">
        <i class="fas fa-university"></i> Mahasiswa Bimbingan KKN
    </div>

    <?php if($this->session->flashdata('mhskkn')) :?>
            <?php echo $this->session->flashdata('mhskkn') ?>
            <?php echo $this->session->unset_userdata('mhskkn'); ?>
    <?php endif; ?>

    <div id="accordion">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            KKN REGULER
                            </button>
                        </h5>
                    </div>

                   
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                           KKN MERDEKA
                            </button>
                        </h5>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <P>KKN REGULER</P>
                    <table class="table table-striped table-hover table-bordered">
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
                            <th colspan='2'>AKSI</th>
                        </tr>
                        <?php
                        $no = 1;
                        foreach ($mhsBimbinganReguler as $value) : ?>
                        
                            <tr>
                                <td><?php echo $no++ ?> </td>
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
                                    <?php elseif($value->disiplin_dpl == null) : ?>

                                        <?php echo anchor('mahasiswa/C_kkn/inputNilai/'.$value->id_kkn, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit">Input Nilai</i></div>') ?>

                                    <?php elseif($value->disiplin_dpl != null) : ?>
                                        

                                        <?php echo anchor('mahasiswa/C_kkn/editNilai/'.$value->id_kkn, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit">Edit Nilai</i></div>') ?>

                                    <?php else:  ?>

                                        <?php echo anchor('mahasiswa/C_kkn/inputNilai/'.$value->id_mhs, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit">Input Nilai</i></div>') ?>

                                    <?php endif;?>
                                    
                                </td>
                            
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
       
        <div class="card mt-4">
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
                <P>KKN MERDEKA</P>
                <table class="table table-striped table-hover table-bordered">
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
                        <th colspan='2'>AKSI</th>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($mhsBimbinganMerdeka as $value) : ?>
                    
                        <tr>
                            <td><?php echo $no++ ?> </td>
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
                                <?php elseif($value->disiplin_dpl == null) : ?>

                                    <?php echo anchor('mahasiswa/C_kkn/inputNilai/'.$value->id_kkn, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit">Input Nilai</i></div>') ?>

                                <?php elseif($value->disiplin_dpl != null) : ?>
                                    

                                    <?php echo anchor('mahasiswa/C_kkn/editNilai/'.$value->id_kkn, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit">Edit Nilai</i></div>') ?>

                                <?php else:  ?>

                                    <?php echo anchor('mahasiswa/C_kkn/inputNilai/'.$value->id_mhs, '<div class="btn btn-sm btn-primary"><i class="fa fa-edit">Input Nilai</i></div>') ?>

                                <?php endif;?>
                                
                            </td>
                        
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        </div>
       
</div>

</div>