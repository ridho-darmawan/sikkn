<div class="container-fluid">


    <div class="alert alert-success" role="alert">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
    </div>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading"> Selamat Datang! </h4>
        </h4>
        <p>Selamat Datang <strong><?php echo $mahasiswa->nama_mhs; ?></strong> di Sistem Informasi Kuliah Kerja Nyata(KKN) Universitas Negeri Manado, Anda login sebagai <strong><?php echo $level; ?></strong>
        </p>

        <!-- <h3 style="color:red;" class="p-4 mt-4 text-center">Data Anda Belum </h3> -->
        

    </div>
    <?php if($mahasiswa->tempat_lahir == null || $mahasiswa->tanggal_lahir == null || $mahasiswa->fakultas_id == null || $mahasiswa->alamat == null || $mahasiswa->jurusan_id == null) : ?>
        <h3 style="color:red;" class="p-4 mt-4 text-center"><strong>Anda Belum Melengkapi Data Umum</strong></h3>
        <h3 style="color:red;" class="p-4 mt-4 text-center"><strong>Silakan Lengkapi semua Data Anda Pada Menu Profil untuk dapat mendaftar KKN!</strong></h3>
    <?php else: ?>
    <?php endif; ?>

    <?php if(  strtotime(date('Y-m-d')) >= strtotime($cekJadwalKkn->tgl_mulai_kkn) && strtotime(date('Y-m-d')) >= strtotime($cekJadwalKkn->tgl_akhir_kkn) && $dataKkn != null):?>

        <div class="card">
            <div class="alert alert-default" role="alert">
                <i class="fas fa-list"></i>
                Kelompok KKN
            </div>

            <div class="alert alert-default" role="alert">
                <h4>Pembimbing KKN : <b> <?= $pembimbing->nama_dpl ?> </b></h4>
                <h4>NO HP Pembimbing KKN : <?= $pembimbing->no_hp ?></h4>
            </div>
            
            
            <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>TTL</th>
                    <th>JK</th>
                    <th>Alamat</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>No HP</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    foreach ($mahasiswa1 as $value) : ?>
                        <tr>
                            <td><?=$no++ ?>.</td>
                            <td><?php echo $value->nama_mhs ?></td>
                            <td><?php echo $value->nim ?></td>
                            <td><?php echo $value->email ?></td>
                            <td><?php echo $value->tempat_lahir ?>, <?php echo $value->tanggal_lahir ?></td>
                            <td><?php echo $value->jk ?></td>
                            <td><?php echo $value->alamat ?></td>
                            <td><?php echo $value->nama ?></td>
                            <td><?php echo $value->nama_jurusan ?></td>
                            <td><?php echo $value->no_hp ?></td>

                        
                        </tr>
                    <?php endforeach; ?>
                </tbody>       
            </table>
        </div>
            </div>
        </div>

        
    <?php endif;?>



</div>
